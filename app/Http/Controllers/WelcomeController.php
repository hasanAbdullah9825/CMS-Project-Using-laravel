<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tag;
use App\Category;
use App\Post;

class WelcomeController extends Controller
{
    public function index(){

$search=request()->query('search');
if($search){
    $posts=Post::where('title','LIKE',"%{$search}%")->simplePaginate(1);
}
else{

    $posts=Post::simplePaginate(2);
}

        return view('welcome')->with('tags',Tag::all())->with('categories',Category::all())->with('posts',$posts);
    }
}
