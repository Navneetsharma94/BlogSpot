<!-- Dashboard for admin with users details -->
@extends('layouts.index')
<style>
    .table{
        margin:auto !important;
        width:90% !important;
        text-align:center;
    }
</style>

@section('content')
    <table class="table table-striped">
        <tr>
            <th> id </th>
            <th> name </th>
            <th> email </th>
            <th> No. of Posts </th>
        <tr>
        
            @foreach( $users as $user)
                <tr>
                    <td> <a href="{{ route('index' , 'user_id='.$user->id)}}">{{ $user->id }} </a></td>
                    <td> {{ $user->name }}</td>
                    <td> {{ $user->email }}</td>
                    <td> {{$user->new_article_count}} </td>
                </tr>
            @endforeach 
        </tr>
    </table>    




@endsection