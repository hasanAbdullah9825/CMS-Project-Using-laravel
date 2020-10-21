<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Category;
use App\Tag;
use App\Http\Requests\Post\CreatePostRequest;
use App\Http\Requests\Post\UpdatePostRequest;
use Illuminate\Support\Facades\Storage;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('posts.index')->with('posts',Post::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

     public function __construct(){

        $this->middleware('VeryfiCategoriesCount')->only(['create','store']);
     }
    public function create()
    {
        return view('posts.create')->with('categories',Category::all())->with('tags',Tag::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreatePostRequest $request)
    {  
        
      $image=$request->image->store('posts');
    // dd($image);
     

        $post=Post::create(
        [
        'title'=>$request->title,
        'description'=>$request->description,
        'content'=>$request->content,
         'published_at'=>$request->published_at,
         'category_id' => $request->category,
        'image'=>$image,
        'published_at'=>$request->published_at
        ]
    );

    if($request->tags){
        $post->tags()->attach($request->tags);
        //dd($request->tags);
     }
      session()->flash('success','Post successfully inserted');
      return redirect(route('posts.index'));
        

        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        return view('posts.create')->with('post',$post)->with('categories',Category::all())->with('tags',Tag::all());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePostRequest $request, Post $post)
    {
        if($request->hasFile('image')){
            $image=$request->image->store('posts');
            storage::delete($post->image);
        }
        $post->update([
        'title'=>$request->title,
        'description'=>$request->description,
        'content'=>$request->content,
         'published_at'=>$request->published_at,
         'image'=>$image,
      
        'published_at'=>$request->published_at]);

        session()->flash('success','Post successfully Updated');
    return redirect(route('posts.index'));


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       

        $post=Post::withTrashed()->where('id',$id)->firstOrFail();
        if($post->trashed()){
            $post->forceDelete();
            storage::delete($post->image);
            
        }

        else{

            $post->delete();
        }
        


        session()->flash('success','Post successfully deleted');
        return redirect(route('posts.index'));

    }

    public function trashed(){

        $trashed=Post::onlyTrashed()->get();
        return view('posts.index')->with('posts',$trashed);
    }
}
