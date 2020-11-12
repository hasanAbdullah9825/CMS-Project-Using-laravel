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

    {      if(auth()->user()->id==1){

        $posts=Post::all();
    }

    else {
        $posts=Post::where('user_id', auth()->user()->id);
    }
        return view('posts.index')->with('posts',$posts);
       
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
        return view('posts.create')
        ->with('categories',Category::all())
        ->with('tags',Tag::all());
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
         'user_id'=>auth()->user()->id,
        'image'=>$image,
        'published_at'=>$request->published_at
        ]
    );

    if($request->tags){
        $post->tags()->attach($request->tags);
        
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
   

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     * 
     */
    public function update(UpdatePostRequest $request, Post $post)
    {
       
       $data=$request->only(['title','description','content','published_at']);
       $data['category_id']=$request->category;
     
        if($request->hasFile('image')){
            $image = $request->image->store('posts');
            
            storage::delete($post->image);
            $data['image'] = $image;
            
        }
        $post->update($data);
        
       
        
        $post->tags()->sync($request->tags);
        session()->flash('success', 'Post Updated Successfully');
        return redirect(route('posts.index'));

    }
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

    public function restore($id){
       
       $post=Post::withTrashed()->where('id',$id)->firstOrFail();
        
         $post->restore();
         return redirect(route('posts.index'));

    }
}
