<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    public function indexPost(){
        //danh sách bài viết phân trang
        $posts = Post::query()->orderBy('id','desc')->with(['user','category'])->paginate(10);
        return view('Admin.posts.index', compact('posts'));
    }

    public function showPost(Post $post){
        //hiển thị bài viết
        return view('Admin.posts.show', compact('post'));
    }

    public function createPost(){
        //hiển thị trang tạo mới bài viết
        return view('Admin.posts.create');
    }

    public function storePost(Request $request){
        //validate post
        $data = $request->validate([
            'title' =>'required|max:255',
            'id_category' =>'required|exists:categories,id',
            'content' =>'required',
            'image' => 'nullable|image|max:2048',
            'status' =>''
        ]);

        $data = $request->except('image');

        //khi chưa có hình ảnh
        $path = '';
        //khi có hình ảnh
        if($request->hasFile('image')){
            $path = $request->file('image')->store('images');

        }
        //Đưa đường dẫn hình vào data
        $data['image'] = $path;

        //đưa user_id vào data
        $data['id_user'] = session('user.id');

        //Insert data
        Post::query()->create($data);

        return redirect()->route('admin.posts.index')->with('message', 'Bài viết đã được tạo thành công!');

    }
    public function editPost(Post $post){
        //hiển thị trang sửa bài viết
        return view('Admin.posts.edit', compact('post'));
    }
    public function updatePost(Request $request, Post $post){
        //validate post
        $data = $request->validate([
            'title' =>'required|max:255',
            'id_category' =>'required|exists:categories,id',
            'content' =>'required',
            'image' => 'nullable|image|max:2048',
            'status' =>''
        ]);

        $data = $request->except('image');

        //xóa hình ảnh cũ
        if($request->hasFile('image') && $post->image){
            Storage::delete($post->image);
        }

        //khi chưa có hình ảnh
        $path = $post->image;
        //khi có hình ảnh
        if($request->hasFile('image')){
            $path = $request->file('image')->store('images');
        }
        //Đưa đường dẫn hình vào data
        $data['image'] = $path;

        //Cập nhật data
        $post->update($data);

        return redirect()->route('admin.posts.index')->with('message', 'Bài viết đã được cập nhật thành công!');
    }
    public function destroyPost(Post $post){
        //xóa hình ảnh cũ
        if($post->image){
            Storage::delete($post->image);
        }
        //xóa bài viết
        $post->delete();

        return redirect()->route('admin.posts.index')->with('message', 'Bài viết đã được xóa thành công!');
    }





    public function toggleStatus(Request $request, Post $post)
{
    // dd($request->status);
    // Cập nhật trạng thái của người dùng
    $post->status = $request->status;
    $post->save();

    return redirect()->back()->with('message', 'Trạng thái bài viết đã được cập nhật!');
}
}
