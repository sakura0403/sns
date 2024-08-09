<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddDeletedAtToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->softDeletes()->nullable();  //追記
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropSoftDeletes();   //追記
        });
    }
}



// 論理削除 (物理削除＋下記追記)

// ①マイグレーションファイルを新たに作成
//php artisan make:migration add_deleted_at_to_users_table --table=users

// マイグレーションファイルを修正し、deleted_atカラムを追加する

// マイグレーションの実行
// php artisan migrate


// ②ソフトデリートを使用できるようにモデルで宣言
// app/Model/post.php へ移動