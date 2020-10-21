@extends('layouts.app')
@section('content')

<div class="d-flex justify-content-end">
<a href="{{route('categories.create')}}" class="btn btn-success my-2">Add category</a>
</div>



<div class="card card-default">
    <div class="card-header">
        Categories
    </div>
    <div class="card-body">
      @if ($categories->count()>0)
            
        <table class="table">
          <thead >
              <th>Name</th>
              <th>Categories count</th>
              <th></th>
          </thead>
          <tbody>
              @foreach($categories as $category)
              <tr>
                  <td>
                     {{$category->name}}
                  </td>
                <td>{{$category->posts->count()}}</td>
              <td><a href="{{route('categories.edit',$category->id)}}" class="btn btn-info btn-sm">Edit</a>
                  <button class="btn btn-danger btn-sm mx-2" onclick="handleDelete({{$category->id}})"> Delete</button>
              </td>

            
              </tr>
                  
              @endforeach
          </tbody>
          
      </table>
      @else
      <h2 class="text-center">No Category yet</h2>
      @endif
        <form id="deleteCategoryForm" action="" method="POST">
        <div class="modal fade" id="deleteCategoryModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            

                <div class="modal-dialog" role="document">
                   
                        @csrf
                        @method('DELETE')
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Delete category</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        <p>Are you want to delete this category?</p>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                        
                         <button type="submit"  class="btn btn-danger" >Delete</button>
                       
                      
                      </div>
                    </div>
                
                  </div>
           
          </div>
            </div>
        </div>
    </form>
       
    
@endsection

@section('scripts')
<script>
    function handleDelete(id){
       
       var form=document.getElementById('deleteCategoryForm')
        form.action='/categories/' + id
         $('#deleteCategoryModal').modal('show')
        
    }
</script>
    
@endsection