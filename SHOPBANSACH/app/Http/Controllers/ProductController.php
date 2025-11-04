<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Facades\Log;

class ProductController extends Controller
{

    public function viewAll(Request $request, $type, $page = 1)
    {
        $query = Product::query();

        // Filter by type
        if ($type != 'all') {
            $query->whereRaw("LOWER(type) = ?", [strtolower($type)]);
        }

        // Search functionality
        if ($request->has('search') && $request->search) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('name', 'LIKE', "%{$search}%")
                    ->orWhere('description', 'LIKE', "%{$search}%");
            });
        }

        // Filter by category (include all children if parent selected)
        if ($request->has('category') && $request->category) {
            $categoryId = $request->category;
            $category = \App\Models\Category::find($categoryId);
            if ($category) {
                $childIds = \App\Models\Category::getAllChildrenIds($category);
                $allIds = array_merge([$category->id], $childIds);
                \Log::info('Filter category ids: ', $allIds);
                $query->whereIn('category_id', $allIds);
            }
        }
        
        // Filter by price range
        if ($request->has('min_price') && is_numeric($request->min_price)) {
            $query->where('price', '>=', $request->min_price);
        }
        
        if ($request->has('max_price') && is_numeric($request->max_price)) {
            $query->where('price', '<=', $request->max_price);
        }
        // Sắp xếp theo giá nếu có
        if ($request->has('sort_price')) {
            if ($request->sort_price === 'asc') {
                $query->orderBy('price', 'asc');
            } elseif ($request->sort_price === 'desc') {
                $query->orderBy('price', 'desc');
            }
        }
        $products = $query->get();
        // Thêm giảm giá random cho từng sản phẩm
        $products = $products->map(function($product) {
            $discountPercent = rand(10, 40);
            $product->old_price = $product->price; // Lưu giá gốc
            $product->discount_percent = $discountPercent;
            $product->price = round($product->price * (1 - $discountPercent / 100)); // Giá sau giảm
            return $product;
        });
        $categories = Category::whereNull('parent_id')->get();
        // Chuẩn bị mảng id các con cho từng cha
        $categoryChildrenMap = [];
        foreach ($categories as $parent) {
            $childIds = Category::getAllChildrenIds($parent);
            $categoryChildrenMap[$parent->id] = array_merge([$parent->id], $childIds);
        }
        return view("frontend.product", compact("products", "categories", "page", "type", "categoryChildrenMap"));
    }

    public function show(Request $request)
    {
        $product = Product::with(['category', 'images', 'productDescriptions', 'productInventories'])
            ->where('id', $request->id)
            ->first();

        // Đảm bảo sản phẩm tồn tại
        if (!$product) {
            abort(404); // Trả về lỗi 404 nếu sản phẩm không tồn tại
        }

        // Ẩn một số thuộc tính không cần thiết
        $product->makeHidden(['status', 'created_at']);

        // Nếu có productDescriptions, gộp vào thuộc tính chính của product
        if ($product->productDescriptions) {
            $product->info = $product->productDescriptions->infomations;
            $product->features = $product->productDescriptions->features;
            $product->applications = $product->productDescriptions->applications;
            unset($product->productDescriptions);
        }

        // Lấy danh sách sản phẩm cùng danh mục, ngoại trừ sản phẩm hiện tại
        $relatedProducts = Product::where('category_id', $product->category_id)
            ->where('id', '!=', $product->id)
            ->get()
            ->map(function($product) {
                $discountPercent = rand(10, 40);
                $product->old_price = $product->price;
                $product->discount_percent = $discountPercent;
                $product->price = round($product->price * (1 - $discountPercent / 100));
                return $product;
            });
        // Thêm giảm giá cho sản phẩm chi tiết
        $discountPercent = rand(10, 40);
        $product->old_price = $product->price;
        $product->discount_percent = $discountPercent;
        $product->price = round($product->price * (1 - $discountPercent / 100));

        return view("frontend.product-detail", compact("product", "relatedProducts"));
    }
}
