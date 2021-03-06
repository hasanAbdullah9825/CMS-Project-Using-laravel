<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tag;
use  App\Http\Requests\tags\CreateTagRequest;
use App\Http\Requests\tags\UpdateTagRequest;

class tagsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       
        return view('tags.index')->with('tags',Tag::all());
       
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tags.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateTagRequest $request)
    {
  

       Tag::create(['name'=>$request->name]);
       session()->flash('success','Tag inserted successfully');

      
      return redirect(route('tags.index'));
      

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
    public function edit(Tag $Tag)
    {
        return view('tags.create')->with('tag',$Tag);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTagRequest $request, Tag $Tag)
    {
      $Tag->update(['name'=>$request->name]);

      session()->flash('success','Tag updated successfully');
      return redirect(route('tags.index'));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tag $Tag)
    {
        if($Tag->posts->count()>0){

            session()->flash('error','Tag can not be delete because post is associated with this category');
            return redirect()->back();
        }
       
        $Tag->delete();
        session()->flash('success','Tag deleted successfully');
         return redirect(route('tags.index'));
   
     }
}
