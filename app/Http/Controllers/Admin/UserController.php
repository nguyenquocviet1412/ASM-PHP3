<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    //
    public function indexUser(){
        // Get all users
        $users = User::all();

        return view('admin.users.index', compact('users'));
    }

    public function toggleStatusUser(Request $request, User $user){
        // Cập nhật trạng thái của người dùng
        $user->active = $request->active;
        $user->save();

        return redirect()->back()->with('message', 'Trạng thái người dùng đã được cập nhật!');
}

    public function showUser(User $user){
        // Hiển thị thông tin người dùng
        return view('admin.users.show', compact('user'));
    }
    public function createUser(){
        // Hiển thị form tạo người dùng
        return view('admin.users.create');
    }
    public function storeUser(Request $request){
        $data = $request->validate([
            'username' => ['required','min:3','unique:users'],
            'fullname'=>['required','min:3'],
            'email' => ['required','email'],
            'password' => ['required','min:5'],
            'confirm_password' =>['required','same:password'],
            'role' => ['required', 'in:admin,user'],
            'address' => ['nullable'],
        ]);
        // dd($data);
        User::query()->create($data);

        return redirect()->route('admin.users.index')->with('message', 'Thêm tài khoản thành công');
    }
    public function editUser(User $user){
        // Hiển thị form cập nhật người dùng
        return view('Admin.users.edit', compact('user'));
    }
    public function updateUser(Request $request, User $user){
        $data = $request->validate([
            'username' => ['required','min:3','unique:users,username,'.$user->id],
            'fullname'=>['required','min:3'],
            'email' => ['required','email'],
            'password' => ['required','min:5'],
            'confirm_password' =>['required','same:password'],
            'role' => ['required', 'in:admin,user'],
            'address' => ['nullable'],
        ]);
        // dd($data);
        $user->update($data);

        return redirect()->route('admin.users.index')->with('message', 'Cập nhật tài khoản thành công');
    }
    public function destroyUser(User $user){
        // Xóa người dùng
        $user->delete();

        return redirect()->route('admin.users.index')->with('message', 'Xóa tài khoản thành công');
    }

}
