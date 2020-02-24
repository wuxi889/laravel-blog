<?php
/*
 * @Description: 
 * @Author: uSee
 * @Date: 2020-02-24 14:55:18
 * @LastEditors: uSee
 * @LastEditTime: 2020-02-24 14:55:18
 * @FilePath: \laravel-blog\database\migrations\2020_02_22_024750_create_article_category_table.php
 */

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArticleCategoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('article_category', function (Blueprint $table) {
            $table->unsignedBigInteger('article_id')->default(0)->comment('文章ID');;
            $table->unsignedBigInteger('category_id')->default(0)->comment('分类ID');;
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('article_category');
    }
}
