<!-- update Existing post for user -->
@extends('home') 

<style>
.createblog{
    width:70%;
    margin:auto;
}
</style>
@section('content')
<div class="newarticle"> 
    <form class="createblog" action="{{ route('posts.update', $posts->id) }}"  method="POST" enctype="multipart/form-data">
        <div class="form-group"> 
            {{ csrf_field() }}
            {{ method_field('PUT') }}
            <h3> Update Your Article </h3>
            <label for="blogtitle" class="label">  TITLE </label><br>
            <input id="blogtitle" type="text" class="form-control"  required name="title" value="{{ $posts->title }}" autocomplete="off" autofocus><br>
            <label for="blogimage" class="label">CHOOSE IMAGE</label><br>
            <input id="blogimage" class="form-control" type="file" id="img" name="img[]" value="{{ $posts-> image }}" multiple="multiple" placeholder="you can select multiple images" accept="image/*"><br>
            <label for="blogcontent" class="label"> CONTENT </label><br>
            <textarea id="blogcontent" class="form-control"  name="content" rows="10" cols="40" > {{ $posts->content}} </textarea><br>
            <button type="submit" class="btn btn-primary newblog" > Update </button>
        </div>    
    </form>
</div>
@endsection 