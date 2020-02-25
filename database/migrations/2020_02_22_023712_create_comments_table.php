<?php
/*
 * @Description: 
 * @Author: uSee
 * @Date: 2020-02-24 14:53:02
 * @LastEditors: uSee
 * @LastEditTime: 2020-02-24 14:53:02
 * @FilePath: \laravel-blog\database\migrations\2020_02_22_023712_create_comments_table.php
 */

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->bigIncrements('id')->comment('评论ID');
            $table->unsignedBigInteger('article_id')->default(0)->comment('文章ID')->index();
            $table->unsignedBigInteger('parent_id')->default(0)->comment('父级ID');
            $table->string('ip', 63)->default('')->comment('IP地址');
            $table->string('comment', 255)->default('')->comment('评论内容');
            $table->unsignedTinyInteger('status')->default(0)->comment('是否显示 [0:否;1:是;]'); // 0 不可视; 1 可视
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('comment');
    }
}
