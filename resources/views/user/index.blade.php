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
               
            </thead>
        <tbody>
            @foreach ($users as $user )
            <tr>
             <td>
                 {{-- <img src="{{ asset('storage/'.$user->image) }}" width="120px" height="65px" alt="image"> --}}
             
             </td>
             <td>
     
                 {{$user->name}}
             </td>
     
             <td>
                 {{$user->email}}
                 
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