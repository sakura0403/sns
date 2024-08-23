<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // 管理者 追記
        // adminのみ許可 Gate機能 = Laravelで権限機能を実装する
        \Gate::define('admin', function ($user) { 
            return ($user->role == 1);
        });
    }
}
