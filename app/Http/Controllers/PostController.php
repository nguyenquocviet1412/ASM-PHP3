<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{
    public function index()
{
    // Lấy danh sách danh mục
    $categories = DB::table('categories')->get();

    $posts = DB::table('posts')->get();

    return view('Client.home', compact('categories', 'posts'));
}

    public function list($id){

        $categoryname = Category::where('id',$id)->first();
        // Lấy danh sách bài viết và phân trang tự động
        $postsPerPage = 2; // Số bài viết hiển thị trên mỗi trang
        $posts = DB::table('posts')->where('id_category',$id)->paginate($postsPerPage);

        return view('Client.category-detail',compact('posts','categoryname'));
    }
    //Hiển thịchi tiếtbài viết
    public function detail($id){
        $post = DB::table('posts')
            ->where('id',$id)
            ->first();

            return view('Client.post-detail',compact('post'));
    }
    //Tìm kiếm
    public function search(Request $request){
        $keyword = $request->get('keyword');
        $posts = Post::where('title', 'LIKE', '%'.$keyword.'%')->get();
        // dd($posts);
        return view('Client.home',compact('posts','keyword'));
    }

}
