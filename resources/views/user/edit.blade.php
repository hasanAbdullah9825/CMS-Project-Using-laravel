@extends('layouts.app')

@section('content')

<div class="card card-default">

    <div class="card-header">
        User profile
    </div>
    <div class="card-body">
        @if ($errors->any())
        <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
        @endif
    <form action="{{route('users.update-profile')}}" method="POST">
        @csrf
        @method('put')

        <div class="form-group">
            <label for="name">Name</label>
        <input type="text" class="form-control" name="name" value="{{$user->name}}">
            
        </div>
        <div class="form-group">
            <label for="about">About</label>
        <textarea name="about" id="about" cols="20" rows="10" class="form-control">{{$user->about}}</textarea>
        </div>
        <button type="submit" class="btn btn-success">Update post</button>
       </form>
      
    </div>
    
</div>
    
@endsection