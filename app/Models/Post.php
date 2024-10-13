<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'slug',
        'image',
        'content',
        'status',
        'id_category',
        'id_user'
    ];
    //Nối bảng đến categories
    public function category()
    {
        return $this->belongsTo(Category::class, 'id_category');
    }
    //Nối bảng đến users
    public function user(){
        return $this->belongsTo(User::class, 'id_user');
    }
}
