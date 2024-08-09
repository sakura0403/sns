<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\SoftDeletes;  //論理削除追記

class Post extends Model
{
    use SoftDeletes;  //論理削除追記
}
