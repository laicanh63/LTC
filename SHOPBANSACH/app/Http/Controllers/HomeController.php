<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index() {
        $role = auth()->user()->role ?? 'guest';
    
        if($role == 'admin') {
            return redirect()->route('admin.dashboard');
        } else if($role == 'sale') {
            return view('sale.dashboard');
        } else if($role == 'warehouse') {
            // Chưa có
        } else {
            // Get popular products from orders
            $popularProducts = Product::select('products.*', DB::raw('COUNT(order_details.product_id) as order_count'))
                ->leftJoin('order_details', 'products.id', '=', 'order_details.product_id')
                ->groupBy('products.id')
                ->having('order_count', '>', 0)
                ->orderBy('order_count', 'desc')
                ->limit(20)
                ->get();
    
            // If popular products are less than 8, add more from regular products
            if ($popularProducts->count() < 8) {
                $additionalProducts = Product::whereNotIn('id', $popularProducts->pluck('id'))
                    ->inRandomOrder()
                    ->limit(8 - $popularProducts->count())
                    ->get();
                $products = $popularProducts->concat($additionalProducts);
            } else {
                $products = $popularProducts->shuffle();
            }

            // Gán giảm giá random cho từng sản phẩm
            $products = $products->map(function($product) {
                $discountPercent = rand(10, 40);
                $product->discount_percent = $discountPercent;
                $product->discount_price = round($product->price * (1 - $discountPercent / 100));
                return $product;
            });
    
            return view("frontend.home", compact("products"));
        }
    }
}
