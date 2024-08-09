
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddDeletedAtToPostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('posts', function (Blueprint $table) {
            $table->softDeletes()->nullable();   //追記
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('posts', function (Blueprint $table) {
            $table->dropSoftDeletes();   //追記
        });
    }
}



// 論理削除

// ①マイグレーションファイルを新たに作成
// php artisan make:migration add_deleted_at_to_posts_table --table=posts

// マイグレーションファイルを修正し、deleted_atカラムを追加する

// マイグレーションの実行
// php artisan migrate


// ②ソフトデリートを使用できるようにモデルで宣言
// app/Model/post.php へ移動