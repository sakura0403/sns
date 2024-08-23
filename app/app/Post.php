<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\SoftDeletes;  //論理削除追記

class Post extends Model
{
    use SoftDeletes;  //論理削除追記

    public function user()
    {
        return $this->belongsTo('App\User','user_id','id'); // user_id → postsテーブル , id → usersテーブル
    }

    // いいね機能
    public function likes()
    {
        return $this->hasMany('App\Like');
    }

    public function violation()
    {
        return $this->hasMany('App\Violation');
    }

}


// belondsTo 多対1,1対1
// hasMany 1対多