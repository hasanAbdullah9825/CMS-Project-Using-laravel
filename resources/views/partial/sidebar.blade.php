<div class="col-md-4 col-xl-3">
    <div class="sidebar px-4 py-md-0">

      <h6 class="sidebar-title">Search</h6>
    <form class="input-group" action="{{route('welcome')}}" method="GET">
      @csrf
     
    <input type="text" class="form-control" name="search" placeholder="Search" value="{{request()->query('search')}}">
    <div class="input-group-addon">
      <span><button class="p-1" type="submit"><i class="fa fa-search"></i></button></span>
    </div>
      </form>

      <hr>

      <h6 class="sidebar-title">Categories</h6>
      <div class="row link-color-default fs-14 lh-24">
       @foreach ($categories as $category )
      <div class="col-6"><a href="{{route('blog.category',$category->id)}}">{{$category->name}}</a></div>
           
       @endforeach
        
      </div>

      <hr>

      <h6 class="sidebar-title">Tags</h6>
      <div class="gap-multiline-items-1">
    @foreach ($tags as $tag )
      <a class="badge badge-secondary" href="{{route('blog.tag',$tag->id)}}">{{$tag->name}}</a>
        
    @endforeach
        
      </div>

      <hr>


    </div>
  </div>