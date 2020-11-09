<?php

namespace App\Http\Controllers\Blog;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Post;
use App\Category;
use App\Tag;

class BlogController extends Controller
{
    public function show(Post $post){

        return view('blog.show')->with('post',$post);
    }

    public function category(Category $category){

        $search=request()->query('search');
        if($search){
            $post=Post::where('title','LIKE',"%{$search}%")->simplePaginate(2);
        }
      
        else{
            $post=$category->posts()->simplePaginate(2);
        }
        

        return view('blog.category')
        ->with('category',$category)
        ->with('posts',$post)
        ->with('tags',Tag::all())
        ->with('categories',Category::all());

    }

    public function tag(Tag $tag){

        $search=request()->query('search');
        if($search){
            $post=Post::where('title','LIKE',"%{$search}%")->simplePaginate(2);
        }
      
        else{
            $post=$tag->posts()->simplePaginate(2);
        }
        
        return view('blog.category')
        ->with('tag',$tag)
        ->with('posts',$post)
        ->with('tags',Tag::all())
        ->with('categories',Category::all());

    }
}
