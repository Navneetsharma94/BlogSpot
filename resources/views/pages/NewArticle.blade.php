<!-- Create New Post Here -->
@extends('home') 

<style>
.createblog{
    width:70%;
    margin:auto;
}
</style>
@section('content')
<div class="newarticle"> 
    <form class="createblog" action="/posts" method="POST" enctype="multipart/form-data">
        <div class="form-group"> 
            @csrf
            <h3> Create New Article </h3>
            <label for="blogtitle" class="label">  TITLE </label><br>
            <input id="blogtitle" type="text" class="form-control"  required name="title" value="" autocomplete="off" autofocus><br>
            <label for="blogimage" class="label">CHOOSE IMAGE</label><br>
            <input id="blogimage" class="form-control" type="file" id="img" name="img[]" multiple="multiple" placeholder="you can select multiple images" accept="image/*"><br>
            <label for="blogcontent" class="label"> CONTENT </label><br>
            <textarea id="blogcontent" class="form-control" name="content" rows="10" cols="40"> </textarea><br>
            <button type="submit" class="btn btn-primary newblog" > Submit </button>
        </div>    
    </form>
</div>
@endsection 