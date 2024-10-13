<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function indexCategory(){
        //danh sách phân trang
        $categories2 = Category::query()->orderBy('id','desc')->paginate(5);

        return view('Admin.categories.index', compact('categories2'));
    }

    public function createCategory(){
        return view('Admin.categories.create');
    }

    public function storeCategory(Request $request){

        $data = $request->validate([
            'name' =>'required|unique:categories|max:255'
        ]);
        // dd($data);
        Category::query()->create($data);
        return redirect()->route('admin.categories.index')->with('success', 'Thêm mới thành công');
    }
    public function editCategory(Category $category){
        // $category = Category::find($id);
        return view('Admin.categories.edit', compact('category'));
    }
    public function updateCategory(Request $request, Category $category){
        $request->validate([
            'name' =>'required|unique:categories,name,'.$category->id.'|max:255'
        ]);

        $category->update($request->all());
        return redirect()->route('admin.categories.index')->with('success', 'Cập nhật thành công');
    }
    public function destroyCategory(Category $category){
        $category->delete();
        return redirect()->route('admin.categories.index')->with('success', 'Xóa thành công');
    }
    public function showCategory(Category $category){
        // $category = Category::find($id);
        return view('Admin.categories.show', compact('category'));
    }
}
