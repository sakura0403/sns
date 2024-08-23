<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

use App\Post;
use App\User;
use App\Violation;

class DisplayController extends Controller
{
    
    public function index(){
        // $user = Auth::user();
        //     if(isset($user) && $user->role == 1){
        //         return redirect('/admin');
        //     }
       
        $post = new Post;
        // $posts = $post->all()->toArray();
        $posts = Post::with('user')->orderByDesc('id')->get(); // 全データを取得した場合の降順 orderBy('oo','desc')　→ orderByDesc('oo')->get()
// dd($posts);
        $keyword = '';
        $account = '';
        $date = '';

        // $user = Auth::user();
        // $user = Auth::user()->post()->get();
        

        return view('main',[ 
            'posts' => $posts,
            'keyword' => $keyword,
            'account' => $account,
            'date' => $date,
        ]);
    }


    public function adminindex(){

        $post = new Post;
        $posts = Post::withCount('violation')->orderBy('violation_count', 'DESC')->take(20)->get(); // withCount() リレーション先のレコード数を取得する, 件数はモデルの{リレーション名}_count

        $user = new User;
        // $users = User::withCount('post')->orderBy('post_count', 'DESC')->take(10)->get();

        $users = User::whereHas('post', function ($query) {
            $query->onlyTrashed();  // ソフトデリートされた投稿を持つユーザーを検索
        })->withCount(['post' => function ($query) {
            $query->onlyTrashed();  // ソフトデリートされた投稿の件数をカウント
        }])->orderBy('post_count', 'DESC')->take(10)->get();
        
        return view('ownerpage',[  
            'posts' => $posts,
            'users' => $users,
        ]);
    }

}
