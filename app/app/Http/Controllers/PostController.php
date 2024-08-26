<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

use App\Post;
use App\Comment;
use App\User;
use App\Like;

use App\Http\Requests\Validation;

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
        $date = $request->input('date');
        $posts = new Post;
        



        if(!empty($keyword)) {
            $posts = $posts->where('episode', 'LIKE', "%{$keyword}%")->orWhereHas('user', function ($query) use ($keyword) {
                $query->where('name', 'LIKE', "%{$keyword}%");
            });
        }

        if(!empty($date)) {
            $posts = $posts->whereDate('created_at', '>=', $date); // 指定日= 以前<= 以降>= 
        }

        $posts = $posts->orderBy('id', 'DESC')->get();  // ->orderBy('id', 'DESC')->get() 降順(新しいものが上)

        
        return view('main', [
            'posts' => $posts,
            'keyword' => $keyword,
            'date' => $date,
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


    public function confilm(Validation $request)
    {
        $post = new Post;

        $image = $request->file('image');
        if($image){
            // 画像
            // 拡張子つきでアップロードされた画像のファイル名を取得  getClientOriginalName:ファイル名を取得
            $imageName = $request->file('image')->getClientOriginalName();

            // 拡張子だけの変数（jpg、pngなど）を定義  getClientOriginalExtension:ファイルの拡張子を取得
            $extension = $request->file('image')->getClientOriginalExtension();

            // pathinfo = 拡張子名やファイル名を取得 / uniqid = 唯一の値(ユニークID)を生成する関数
            // PATHINFO_FILENAME = 拡張子なしのファイル名 (フラッグを指定することでその他にもディレクトリ、拡張子、拡張子ありのファイル名だけを返す事ができる)
            // 取得したファイル名から唯一無二の新しいファイル名を生成（形式：元のファイル名_ランダムの英数字.拡張子）
            $newImageName = pathinfo($imageName, PATHINFO_FILENAME) . "_" . uniqid() . "." . $extension; 

            // file('image') → type="file" name="image" /　move → 画像の格納 / public_path()."/img/tmp" → ファイル
            // tmpフォルダに上記の画像ファイルを移動する
            $request->file('image')->move(public_path() . "/img/tmp", $newImageName);
            $image = "/img/tmp/" . $newImageName;

        }else{
            $newImageName = NULL;
        }


        return view('post_confilm',[
            'request' => $request,
            'post' => $post,
            
            'image'        => $image,
            'newImageName' => $newImageName,
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
        // DBにデータを保存、INSERT処理
        $post = new Post;
        $post->episode = $request->episode;
        $post->image = $request->image;

        Auth::user()->post()->save($post);  

        $image = $request->file('image');

        if(!empty($post['image'])){
            // 画像
            // レコードを挿入したときのIDを取得 (新しく$post->idができあがった情報のみ処理が進む)
            $lastInsertedId = $post->id;

            // ディレクトリを作成、public/imgの配下に名前のidと同じフォルダを生成
            if (!file_exists(public_path() . "/img/" . $lastInsertedId)) { // file_exists = ファイルまたはディレクトリが存在するかどうか調べる
                mkdir(public_path() . "/img/" . $lastInsertedId, 0777); // mkdir = ディレクトリを作成
            }

            // 一時保存から本番の格納場所へ移動、tmpフォルダから上記のフォルダへ移動  rename = ファイルを上書きコピー
            rename(public_path() . "/img/tmp/" . $request -> image , public_path() . "/img/" . $lastInsertedId . "/" . $request->image); // $request->image = $newImageName
        
            // 一時保存の画像を削除、tmpフォルダを空にする
            \File::cleanDirectory(public_path() . "/img/tmp"); // cleanDirectory = 指定されたパスのものを削除

        }else{
            $newImageName = NULL;
        }
        
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
        $post = $post -> withCount('likes') -> with('user') -> find($id);  // withCount('テーブル名')で、リレーションの数を取得


        // 各詳細のコメント表示
        $comment = new Comment;
        // SELECT * FROM comments WHERE post_id = $id; -> 取得 get()
        $comments = $comment -> where('post_id','=',$id)->orderBy('id', 'DESC')->get();  // ->orderBy('id', 'DESC')->get() 降順(新しいものが上)

        // いいね機能
        $like_model = new Like;

        return view('post_detail',[
            'post' => $post,
            'comments' => $comments,
            'user' => $post->user,

            'like_model' => $like_model,
        ]);
    }

    // いいね機能
    public function ajaxlike(Request $request)
    {
        $id = Auth::user()->id;
        $post_id = $request->post_id;
        $like = new Like;
        $post = Post::findOrFail($post_id); // findOrFail() 一致するidが見つからなかった場合、エラーを返す (404 | Not Found)
        

        // 空でない（既にいいねしている）なら
        if ($like->like_exist($id, $post_id)) {  // like_exist() ファイルまたはディレクトリが存在するかチェック
            //likesテーブルのレコードを削除
            $like = Like::where('post_id', $post_id)->where('user_id', $id)->delete();
        } else {
            //空（まだ「いいね」していない）ならlikesテーブルに新しいレコードを作成する
            $like = new Like;
            $like->post_id = $request->post_id;
            $like->user_id = Auth::user()->id;
            $like->save();
        }
        //loadCount() リレーションの数を○○_countという形で取得できる（今回の場合はいいねの総数）
        $postLikesCount = $post->loadCount('likes')->likes_count;

        //一つの変数にajaxに渡す値をまとめる
        $json = [
            'postLikesCount' => $postLikesCount,
        ];
        //下記の記述でajaxに引数の値を返す
        return response()->json($json);
    }


    


    public function myshow($id, Request $request)
    {
        $post = new Post;
        $post = $post -> find($id);  // find() 指定したキーの要素だけ取得

        $comment = new Comment;
        $comments = $comment -> where('post_id','=',$id)->get();

        $user = Auth::user();
        
        
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
    public function edit(Request $request,$id)
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
    public function update(Validation $request, $id)
    {
        $post = new Post;
        $post = $post->find($id);  // 1.モデルから対象とするカラムを抽出する

        $image = $request->file('image');
        if($image){
            // レコードを挿入したときのIDを取得
            $lastInsertedId = $post->id;

            if (!file_exists(public_path() . "/img/" . $lastInsertedId)) {
                mkdir(public_path() . "/img/" . $lastInsertedId, 0777);
            }
    
            $imageName = $request->file('image')->getClientOriginalName();
            $extension = $request->file('image')->getClientOriginalExtension();

            $newImageName = pathinfo($imageName, PATHINFO_FILENAME) . "_" . uniqid() . "." . $extension;

            // imgフォルダに上記の画像ファイルを移動する
            $request->file('image')->move(public_path() . "/img/". $lastInsertedId , $newImageName);

            $post->image = $newImageName;
        
        }
    
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
