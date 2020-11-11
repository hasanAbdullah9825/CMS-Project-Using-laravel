<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Http\Request;

class Post extends Model
{
    use SoftDeletes;

    protected $dates=['published_at'];
    protected $fillable=['title', 'published_at', 'image', 'description', 'content','category_id','user_id'];

    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function tags(){
        return $this->belongsToMany(Tag::class)->withTimestamps();
    }

    public function user(){

        return $this->belongsTo(User::class);
    }

    public function scopeSearched($query){
    $search=request()->query('search');

    if(!$search){
        return $query->published();
    }
    
    return $query->published()->where('title','LIKE',"%{$search}%");

     
    }

    public function scopePublished($query){

     return $query->where('published_at','<=',now());
    }
}