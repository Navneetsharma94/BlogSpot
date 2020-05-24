<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\NewArticle;
use Session;
class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = NewArticle::get();
        return view('pages.ArticlesWall', compact('posts'));
    }   

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("pages.NewArticle");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request->hasFile('img')){
            $names = [];
            foreach($request->file('img')as $image)
            {
                $filename = $image->getClientOriginalName();
                $image->move('upload/Blogimage/', $filename);
                array_push($names, $filename);
            }
           
            $NewArticle = new NewArticle;
            $NewArticle->user_id =\Auth::user()->id;
            $NewArticle->title = $request->title;
            $NewArticle->image= json_encode($names);
            $NewArticle->content = $request->content;
            $NewArticle->save();
            Session::flash ('success', 'Your Blog Has Been Posted Successfully');
            return redirect()->action('PostController@index');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $posts = NewArticle::findOrFail($id);
        return view('pages.Post', compact('posts'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $posts = NewArticle::findOrFail($id);
        return view('pages.UpdateArticle', compact('posts'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $NewArticle = NewArticle::find($id);

        if($request->hasFile('img')){
            $names = [];
            foreach($request->file('img')as $image)
            {
                $filename = $image->getClientOriginalName();
                $image->move('upload/Blogimage/', $filename);
                array_push($names, $filename);  
            }
           
            
            $NewArticle->title = $request->title;
            $NewArticle->image= json_encode($names);
            $NewArticle->content = $request->content;
            $NewArticle->save();
            Session::flash ('success', 'Your Blog Has Been Updated Successfully');
            return redirect()->action('PostController@index');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $NewArticle = NewArticle::find($id);
        $NewArticle->delete();
        Session::flash ('success', 'Your Blog Has Been deleted Successfully');
        return redirect()->action('PostController@index');
    }
}
