@extends('layouts.index')
<!-- public function store(Request $request)
    {
        if($request->hasFile('img')){
            $names = [];
            foreach($request->file('img')as $image)
            {
                
            }
            $filename = $request->img->getClientOriginalName();
            $request->img->move('upload/Blogimage/', $filename);

            $NewArticle = new NewArticle;
            $NewArticle->title = $request->title;
            $NewArticle->image= $filename;
            $NewArticle->content = $request->content;
            $NewArticle->save();
            Session::flash ('success', 'Your Blog Has Been Posted Successfully');
            return redirect()->action('PostController@index');
        }
    } -->
@section('content')
    <div>
        @foreach($users as $user)
            <p>{{ $user->user_id}}</p>
        @endforeach
    </div>

@endsection