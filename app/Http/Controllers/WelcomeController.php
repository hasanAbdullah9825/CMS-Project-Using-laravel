<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tag;
use App\Category;
use App\Post;

class WelcomeController extends Controller
{
    public function index(){


        $posts=Post::searched()->simplePaginate(4);

        return view('welcome')->with('tags',Tag::all())->with('categories',Category::all())->with('posts',$posts);
    }
}
