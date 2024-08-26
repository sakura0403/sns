<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

use App\Violation;
use App\Post;

use App\Http\Requests\CreateDate;

class ViolationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        return view('violation',[
            'id' => $id,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store($id, CreateDate $request)
    {
        $violation = new Violation;
        $violation->comment = $request->comment;
        $violation->post_id = $id;

        Auth::user()->violation()->save($violation);

        return redirect('/');


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
        //
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
        //
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
        $posts = $post->find($id);

        $posts->delete();  // deleteを実行 削除 (この場合は物理削除)
        // 論理削除の場合はマイグレーションファイルを修正し、deleted_atカラムを追加 → softDeletes()を使用できるようにモデルで宣言)
        
        return redirect()->route('display.adminindex');    
    }
}
