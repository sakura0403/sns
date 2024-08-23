<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\SoftDeletes;  //論理削除追記

class Violation extends Model
{
    use SoftDeletes;  //論理削除追記

    // public function post() {
    //     return $this->belongsTo('App\Post', 'post_id', 'id');
    // }

    
}
