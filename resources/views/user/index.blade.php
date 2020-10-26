@extends('layouts.app')

@section('content')


<div class="card card-default">

    <div class="card-header">
     users
    </div>

    <div class="card-body">
        @if ($users->count()>0)
        <table class="table">
            <thead>
                <th>Image</th>
                <th>Name</th>
                <th>Email</th>
                <th></th>
               
            </thead>
        <tbody>
            @foreach ($users as $user )
            <tr>
             <td>
               
             <img style="border-radius: 50%" src="{{Gravatar::src($user->email)}}" alt="">
             
             </td>
             <td>
     
                 {{$user->name}}
             </td>
     
             <td>
                 {{$user->email}}
                 
             </td>
             <td>
                @if (!$user->isAdmin())
                <form action="{{ route('users.make-admin', $user->id) }}" method="post">
                    @csrf
                    <button class="btn btn-success btn-md">Make Admin</button>    
                </form>
            @endif
             </td>
             
         </tr>
                
            @endforeach
        </tbody>
             </table>
             @else
             <h2 class="text-info text-center">No users Yet!</h2>
        @endif
        
       
    </div>
</div>
@endsection