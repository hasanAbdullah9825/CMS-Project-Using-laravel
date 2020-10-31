@extends('layouts.app')

@section('content')
<div class="card card-default">
    <div class="card-header">

        {{isset($post)?'Edit Post':'Create Post'}}
     

    </div>
    <div class="card-body">
    <form action="{{isset($post)?route('posts.update',$post->id):route('posts.store')}}" method="POST" enctype="multipart/form-data">
      
        @csrf
        @if(isset($post))
        @method('PUT')
        @endif

        @if ($errors->any())
        <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
        @endif



 <div class="form-group">
     <label for="title">Title</label>
 <input type="text" class="form-control" name="title" value="{{isset($post)?$post->title:''}}">
 </div>

 <div class="form-group">
    <label for="description">Description</label>
  <textarea class="form-control" name="description" id="description" cols="5" rows="5" >{{isset($post) ? $post->description : ''}}</textarea>
</div>
<div class="form-group">
    <label for="content">Content</label>
{{-- <input id="content" value="Editor content goes here" type="hidden" name="content" value="{{isset($post) ? $post->content:''}}" > --}}
<input id="content" type="hidden" name="content" value="{{  isset($post) ? $post->content : ''  }}">

  <trix-editor input="content"></trix-editor>
  
</div>
<div class="form-group">
    <label for="published_at">Publishet at</label>
    <input type="text" name="published_at" class="form-control" id="published_at" value="{{isset($post)?$post->published_at:''}}">
</div>
@if(isset($post))
<img src="{{asset('storage/'.$post->image)}}" alt="" style="width:100%">


@endif

<div class="form-group">
    <label for="image">Image</label>
    <input type="file" class="form-control" name="image" id="image" >
</div>

 <div class="form-group">
    <label for="category">Category</label>
    
                <select name="category" id="category" class="form-control">
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}"
                            @isset($post)
                                @if ($category->id == $post->category_id)
                                    selected
                                @endif
                            @endisset
                        >
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
</div> 
@if($tags->count()>0)
<div class="form-group">
    
    <label for="tag">Tag</label>
    <select name="tags[]" id="" class="form-control js-example-basic-single " multiple>
@foreach($tags as $tag)
    <option value="{{$tag->id}} " @isset($post)
        

        @foreach($post->tags as $postTag) 
                                    {{ $postTag->id == $tag->id ? 'selected' : '' }}
                                @endforeach 
                                 @endisset()
        
        
        >{{$tag->name}}</option>
@endforeach
    
    </select>
   
    
</div>
@endif
<div class="form-group">
    <button type="submit" class=" btn btn-success">{{isset($post)?'Update post':'Create post'}}</button>
</div>
     </form>

    </div>
</div>
    
@endsection

@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.0/trix.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.0/trix-core.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.0/trix-core.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.0/trix.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<script>flatpickr('#published_at',{enableTime:true})</script>
<script> $(document).ready(function() {
    $('.js-example-basic-single').select2();
});</script>
    
@endsection

@section('css')
  <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.0/trix.css">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.0/trix.min.css"> 
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">

@endsection