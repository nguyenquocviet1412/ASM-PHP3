<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    //Login
    public function getLogin(){
        return view('Client.login');
    }
    public function postLogin(Request $request){
        $user = $request->only(['email','password']);
        // $user = $request->validate([
        //     'email' => ['required', 'email'],
        //     'password' => ['required'],
        // ]);

        //Xác thực thông tin của user
        if(Auth::attempt($user)){
            // Lưu thông tin user vào session
            session(['user' => Auth::user()]); // Lưu user đang đăng nhập vào session

            // Debug user data từ session
            // dd(session('user')); // In ra dữ liệu người dùng từ session
            return redirect()->route('posts.index');
        }else{
            return redirect()->back()->with('message', 'Email hoặc Password không chính xác');
        }
    }

    public function getRegister(){
        return view('Client.register');
    }
    public function postRegister(Request $request){
        $data = $request->validate([
            'username' => ['required','min:3','unique:users'],
            'fullname'=>['required','min:3'],
            'email' => ['required','email'],
            'password' => ['required','min:5'],
            'confirm_password' =>['required','same:password'],
        ]);
        // dd($data);
        User::query()->create($data);

        return redirect()->route('login')->with('message', 'Đăng lý tài khoản thành công');
    }

    public function logout(){
        Auth::logout();
        session()->forget('user');
        return redirect()->route('login');
    }


}
