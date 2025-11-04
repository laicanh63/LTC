<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class AccountController extends Controller
{
    public function loadAccount() 
    {
        $users = User::all();
        return view('admin.users.index', compact('users'));
    }

    public function show(Request $request)
    {
        // Tìm người dùng theo mã ID
        $user = User::findOrFail($request->userId);
        return response()->json($user);
    }

    public function update(Request $request)
    {
        // Tìm người dùng theo ID
        $user = User::find($request->userId);

        // Kiểm tra nếu không tìm thấy user
        if (!$user) {
            return response()->json(['status' => 'error', 'message' => 'Người dùng không tồn tại'], 404);
        }

        // Cập nhật thông tin
        $user->role = $request->role;
        $user->is_active = filter_var($request->is_active, FILTER_VALIDATE_BOOLEAN); // Chuyển đổi sang boolean
        $user->save();

        // Trả về phản hồi thành công
        return response()->json([
            'status' => 'success',
            'message' => 'Cập nhật thông tin người dùng thành công',
            'user' => $user
        ]);
    }

    public function delete($id)
    {
        $user = User::find($id);
        if (!$user) {
            return response()->json(['status' => 'error', 'message' => 'Không tìm thấy người dùng'], 404);
        }
        // Xóa dữ liệu liên quan trước khi xóa user để tránh lỗi ràng buộc
        try {
            if (method_exists($user, 'cart')) $user->cart()->delete();
            if (method_exists($user, 'orders')) $user->orders()->delete();
            if (method_exists($user, 'sessions')) $user->sessions()->delete();
            $user->delete();
            return response()->json(['status' => 'success', 'message' => 'Đã xóa tài khoản thành công']);
        } catch (\Exception $e) {
            return response()->json(['status' => 'error', 'message' => 'Có lỗi xảy ra khi xóa tài khoản: ' . $e->getMessage()], 500);
        }
    }
}
