<?php
/*
 * @Description:
 * @Author: uSee
 * @Date: 2020-02-24 14:19:53
 * @LastEditors: uSee
 * @LastEditTime: 2020-03-03 14:26:39
 * @FilePath: \laravel-blog\database\migrations\2020_02_22_023555_create_article_contents_table.php
 */

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArticleContentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */

    public function up()
    {
        Schema::create('article_contents', function (Blueprint $table) {
            $table->bigIncrements('id')->comment('内容ID');
            $table->unsignedBigInteger('article_id')->unique()->default(0)->comment('文章ID')->index();
            $table->text('content')->comment('文章内容')->nullable();
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('article_id', 'article_foreign')->references('id')->on('articles');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('article_contents');
    }
}
