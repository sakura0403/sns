<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

use App\Post;
use App\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $post = new Post;
        // $posts = $post->all()->toArray();

        // ログイン中のユーザー(Auth::user)が持つ -> 投稿データ(post)として -> 入力値を保存(save(データ))
        $posts = Auth::user()->post()->get();

        // ログイン中のユーザー(Auth::user)
        $user = Auth::user();

        return view('mypage',[
            'posts' => $posts,
            'user' => $user,
        ]);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user_delete');
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // $user = new User;
        // $user = $user -> find($id);

        $user = Auth::user();

        return view('user_edit',[
            'user' => $user,
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
        // $user = new User;
        // $user = $user->find($id);

        $user = Auth::user();

        $image = $request->file('image');
        if($image){
            // レコードを挿入したときのIDを取得
            $lastInsertedId = $user->id;

            if (!file_exists(public_path() . "/img/" . $lastInsertedId)) {
                mkdir(public_path() . "/img/" . $lastInsertedId, 0777);
            }
    
            $imageName = $request->file('image')->getClientOriginalName();
            $extension = $request->file('image')->getClientOriginalExtension();

            $newImageName = pathinfo($imageName, PATHINFO_FILENAME) . "_" . uniqid() . "." . $extension;

            // imgフォルダに上記の画像ファイルを移動する
            $request->file('image')->move(public_path() . "/img/". $lastInsertedId , $newImageName);
        
        }else{
            $newImageName = NULL;
        }
    

        $user->image = $newImageName;

        $user->name = $request->name;
        $user->email = $request->email;

        $user->save();

        return redirect()->route('users.index');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = new User;
        $user = $user->find($id);

        $user->delete();
        return redirect()->route('users.index');
    }
}
