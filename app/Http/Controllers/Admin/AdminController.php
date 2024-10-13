<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    //Hiển thị tổng quát về WEB
    public function index(){
        // Lấy số liệu tổng quát của user,post,category
        $totalUsers = User::count(); // Đếm tổng số users
        $totalCategories = Category::count(); // Đếm tổng số categories
        $totalPosts = Post::count(); // Đếm tổng số posts
        return view('Admin.dashboard', compact('totalUsers', 'totalCategories', 'totalPosts'));
    }
}
