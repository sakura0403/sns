<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

use Illuminate\Database\Eloquent\SoftDeletes;  //論理削除追記



class User extends Authenticatable
{
    use SoftDeletes;  //論理削除追記
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    public function post(){
        return $this->hasMany('App\Post');
    }

    public function comment(){
        return $this->hasMany('App\Comment');
    }

    public function violation(){
        return $this->hasMany('App\Violation');
    }

    public function like(){
        return $this->hasMany('App\Like');
    }

    // リレーション先の削除
    public static function boot()
    {
        parent::boot();

        static::deleting(function ($user) {
            // ソフトデリートを適用
            $user->post()->delete();
        });
    }

}
