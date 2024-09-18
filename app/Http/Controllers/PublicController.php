<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class PublicController extends Controller
{
    public function welcome() {
        $articles= Article::where('is_accepted', true)->orwhere('is_accepted', false)->take(6)->orderBy('created_at','desc')->get();
        return view('welcome',compact('articles'));
    }


}
