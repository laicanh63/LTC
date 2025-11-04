<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class CartController extends Controller
{
    public function add(Request $request)
    {
        $user = auth()->user();
        $productId = $request->product_id;
        $quantity = $request->quantity;
        $totalPrice = floatval(str_replace(',', '', $request->total_price));

        $query = [
            'user_id' => $user->id,
            'product_id' => $productId,
        ];

        $cartItem = Cart::where($query)->first();
        if ($cartItem) {
            $cartItem->quantity += $quantity;
            $cartItem->cost = $totalPrice; 
            $cartItem->save();
        } else {
            $data = [
                'user_id' => $user->id,
                'product_id' => $productId,
                'quantity' => $quantity,
                'cost' => $totalPrice,
            ];
            Cart::create($data);
        }
        return response()->json(['message' => 'Sản phẩm đã được thêm vào đơn hàng!']);
    }

    /**
     * Delete cart items
     */
    public function delete(Request $request)
    {
        try {
            $itemIds = $request->ids;
            $userId = session('user')['id'];
            
            if (!is_array($itemIds)) {
                $itemIds = [$itemIds];
            }
            
            // Only delete items that belong to the current user
            $deleted = Cart::where('user_id', $userId)
                ->whereIn('id', $itemIds)
                ->delete();
            
            return response()->json([
                'success' => true,
                'message' => $deleted > 0 
                    ? ($deleted == 1 
                        ? 'Đã xóa 1 sản phẩm khỏi giỏ hàng' 
                        : "Đã xóa {$deleted} sản phẩm khỏi giỏ hàng")
                    : 'Không tìm thấy sản phẩm để xóa',
                'deleted_count' => $deleted
            ]);
        } catch (\Exception $e) {
            
            return response()->json([
                'success' => false,
                'message' => 'Có lỗi xảy ra khi xóa sản phẩm: ' . $e->getMessage()
            ], 500);
        }
    }

    /**
     * Show cart page
     */
    public function showCart(Request $request)
    {
        $user = auth()->user();
        $cartItems = \App\Models\Cart::with('product')
            ->where('user_id', $user->id)
            ->get();
        $infoUser = $user; // Thêm dòng này để truyền thông tin user
        return view('frontend.cart', compact('cartItems', 'infoUser'));
    }

    /**
     * Update cart item quantity (AJAX)
     */
    public function updateQuantity(Request $request)
    {
        $request->validate([
            'id' => 'required|integer|exists:carts,id',
            'quantity' => 'required|integer|min:1',
        ]);
        $user = auth()->user();
        $cartItem = Cart::where('id', $request->id)
            ->where('user_id', $user->id)
            ->first();
        if (!$cartItem) {
            return response()->json(['success' => false, 'message' => 'Không tìm thấy sản phẩm trong giỏ hàng'], 404);
        }
        $cartItem->quantity = $request->quantity;
        $cartItem->save();
        return response()->json(['success' => true, 'message' => 'Cập nhật số lượng thành công']);
    }
}
