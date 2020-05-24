<!-- Page to show individual Post -->
@extends('layouts.index')

<style>
    .container{
        margin:auto;
        text-align:center;
    }
    .description{
        padding:20px;
    }
    .formatting-buttons{
        display:flex;
        margin-left:1200px;
    }
    
    .delete-button{
        color:#4e73df !important;
        background-color:white !important;     
        background:transparent !important;  
        border:0px; 
    }
</style>
@section('content')

    @if(Auth::user()->id  == $posts->user_id)
        <div class="formatting-buttons">
            <a href="{{ route('posts.edit', $posts->id) }}"  title="edit" role="button"><i class="fas fa-edit "></i> </a>
            <form action="/posts/{{$posts->id}}" method="POST">
                {{ csrf_field() }}
                {{ method_field('DELETE') }}
                <button type="submit" class="delete-button" title="delete" onclick="return confirm('Are you sure you want to delete this post?')" > <i class="fas fa-trash-alt"></i> </button>
                
            </form>
            
        </div>
    @endif



    <div class="container">
        <div class="title"> 
            <h1> {{ $posts->title }} </h1><br>
 
        </div>

        <div id="carouselExampleControls" class="carousel slide slider-size" data-ride="carousel">
            <div class="carousel-inner">
                @foreach(json_decode($posts->image, true) as $images)

                    <div class="carousel-item {{$loop->index == 0 ? 'active' : ''}}">
                        <img class="d-block w-100" src="{{ asset('upload/blogimage/'.$images) }}" height="400px;" width="100px;" alt="First slide">
                    </div>
                @endforeach 
            </div>
            <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>

        <div class="description"> 
           <p> {{ $posts->content }} </p><br> 
        </div>
    </div>
@endsection
