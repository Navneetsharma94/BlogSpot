<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\NewArticle;
use App\User;
class IndexController extends Controller
{
 public function index(Request $request)
    {
        if($request->query('user_id')) {
            $posts = NewArticle::where('user_id', $request->query('user_id'))->get();
        } else {
            $posts = NewArticle::get();
        }

        return view('pages.AdminPostIndex', compact('posts'));
    }   
   
}
