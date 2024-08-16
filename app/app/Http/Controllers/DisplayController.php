<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Post;

class DisplayController extends Controller
{
    public function index(){
        $post = new Post;
        $posts = $post->all()->toArray();


        $keyword = '';
        $account = '';
        $date = '';

        return view('main',[
            'posts' => $posts,
            'keyword' => $keyword,
            'account' => $account,
            'date' => $date,


        ]);
    }
}
