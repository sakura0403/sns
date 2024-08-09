<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;


use App\Post;
use App\Comment;
use App\User;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return redirect('/');
    }

    
    public function search(Request $request)
    {
        $keyword = $request->input('keyword');
        $post = new Post;
        
        $account = $request->input('account');
        $user = new User;

        if(!empty($keyword)) {
            $posts = $post->where('episode', 'LIKE', "%{$keyword}%")->get();
        }else{
            $posts = $post->all()->toArray();
        }

        if(!empty($account)) {
            $user = $user->where('name', 'LIKE', "%{$account}%")->get();
        }else{
            $user = $user->all()->toArray();
        }

        return view('main', [
            'keyword' => $keyword,
            'posts' => $posts,
            'account' => $account,
        ]);

    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('post_form');
    }


    public function confilm(Request $request)
    {
        return view('post_confilm',[
            'request' => $request,
        ]);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $post = new Post;
        $post->episode = $request->episode;

        // ログイン中のユーザー(Auth::user)が持つ -> 投稿データ(post)として -> 入力値を保存(save(データ))
        Auth::user()->post()->save($post);  

        return redirect()->route('users.index');
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // 各詳細表示
        $post = new Post;
        $post = $post -> find($id);  // find() 指定したキーの要素だけ取得

        // 各詳細のコメント表示
        $comment = new Comment;
        // SELECT * FROM comments WHERE post_id = $id; -> 取得 get()
        $comments = $comment -> where('post_id','=',$id)->get();

        // $user = new User;
        // $user = $user -> where($id,'=','name')->get();
        $user = Auth::user();


        return view('post_detail',[
            'post' => $post,
            'comments' => $comments,
            'user' => $user,
        ]);
    }


    public function myshow($id)
    {
        $post = new Post;
        $post = $post -> find($id);

        $comment = new Comment;
        $comments = $comment -> where('post_id','=',$id)->get();

        return view('mypost_detail',[
            'post' => $post,
            'comments' => $comments,
            'user' => $user,
        ]);
    }
    

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = new Post;
        $post = $post->find($id);

        return view('post_edit',[ 
            'post' => $post,
        ]);
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
        $post = new Post;
        $post = $post->find($id);  // 1.モデルから対象とするカラムを抽出する

        $post->episode = $request->episode;  // 2.更新するカラムに値を代入

        $post->save();  // 3.saveを実行 保存

        return redirect('users'); // redirect('')中身はURL ターミナルだとURI
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = new Post;
        $post = $post->find($id);

        $post->delete();  // deleteを実行 削除 (この場合は物理削除)
        // 論理削除の場合はマイグレーションファイルを修正し、deleted_atカラムを追加 → softDeletes()を使用できるようにモデルで宣言)
        
        return redirect()->route('users.index');
    }
}
