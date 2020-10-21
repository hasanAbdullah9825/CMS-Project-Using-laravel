@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-end">
<a href="{{route('posts.create')}}" class="btn btn-success my2"> Add posts</a>
</div>

<div class="card card-default">

    <div class="card-header">
     posts
    </div>

    <div class="card-body">
        @if ($posts->count()>0)
        <table class="table">
            <thead>
                <th>Image</th>
                <th>Title</th>
                <th></th>
            </thead>
        <tbody>
            @foreach ($posts as $post )
            <tr>
             <td>
                 <img src="{{ asset('storage/'.$post->image) }}" width="120px" height="65px" alt="image">
             
             </td>
             <td>
     
                 {{$post->title}}
             </td>
     
             <td>
                 @if (!$post->trashed())
             <a href="{{route('posts.edit',$post->id)}}" class="btn btn-info btn-sm">Edit</a>
                 @endif
                 
             </td>
             <td>
             <form action="{{route('posts.destroy',$post->id)}}" method="POST">
              @csrf
              @method('DELETE')
              <button  type="submit" class="btn btn-danger btn-sm">
                 {{$post->trashed()?'Delete':'Trash'}}
                
             </button>
     
                 </form>
             </td>
         </tr>
                
            @endforeach
        </tbody>
             </table>
             @else
             <h2 class="text-info text-center">No Posts Yet!</h2>
        @endif
        
       
    </div>
</div>
@endsection