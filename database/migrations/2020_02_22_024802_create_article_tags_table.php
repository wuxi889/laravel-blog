<?php
/*
 * @Description:
 * @Author: uSee
 * @Date: 2020-02-24 14:19:33
 * @LastEditors: uSee
 * @LastEditTime: 2020-02-25 13:27:09
 * @FilePath: \laravel-blog\database\migrations\2020_02_22_024802_create_article_tag_table.php
 */

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArticleTagsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('article_tags', function (Blueprint $table) {
            $table->unsignedBigInteger('article_id')->default(0)->comment('文章ID')->index();
            $table->unsignedBigInteger('tag_id')->default(0)->comment('标签ID')->index();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('article_tags');
    }
}
