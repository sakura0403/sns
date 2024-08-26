<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\SoftDeletes;

class Like extends Model
{
    use SoftDeletes;

    public function user() {
        return $this->belongsTo('App\User', 'user_id', 'id'); // user_id → likesテーブル , id → usersテーブル
    }
    
    public function post() {
        return $this->belongsTo('App\Post', 'post_id', 'id');
    }    

    public function like_exist($user_id, $post_id) {  
        return Like::where('user_id', $user_id)->where('post_id', $post_id)->exists();
    }
}
