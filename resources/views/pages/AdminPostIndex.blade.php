<!-- Index page for admin -->
@extends('layouts.index')

<style> 
img{
   border-radius:10px;
}
.CreatePost{
   background-color:#4e73df;
   padding:10px;
   border-radius:20px;
   color:white;
}
.blogpost{
   margin-top:30px;
}
.blogpost.row{
   border-bottom:2px solid #4e73df;
}
.right_sidebar{
   border-left:2px solid #4e73df;  
   margin-left:100px;
   padding-left:20px;
}
</style>  
 
@section('content')
   <div class="container">
      <div class="row">
         <div class="col-sm-8">
            <div class="blogpost" >
               @foreach($posts  as $post)
                  <div class="blogpost row">
                     <div class="col-sm-6 images">
                      @php $images = json_decode($post->image, true) @endphp
                        <p><img src="{{ asset('upload/Blogimage/'.$images[0]) }}" height='200px;' width='250px;' ></p>
                     </div> 
                     <div class="col-sm-6">
                        <br><a href="{{ route('posts.show', $post->id) }}" > <strong> {{$post->title}} </strong>  </a>
                        <p>{{$post->updated_at}}</p>
                     </div>
                  </div>
               @endforeach
            </div>
         </div>
      </div>

@endsection 