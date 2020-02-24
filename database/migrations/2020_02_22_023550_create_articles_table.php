<?php
/*
 * @Description: 
 * @Author: uSee
 * @Date: 2020-02-24 13:28:38
 * @LastEditors: uSee
 * @LastEditTime: 2020-02-24 14:49:27
 * @FilePath: \laravel-blog\database\migrations\2020_02_22_023550_create_articles_table.php
 */

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArticlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->bigIncrements('id')->comment('文章ID');
            $table->string('author', 31)->default('')->comment('作者');
            $table->unsignedTinyInteger('original')->default(1)->comment('是否原创 [0:否;1:是;]');
            $table->string('title', 127)->unique()->default('')->comment('分类名称');
            $table->string('description', 255)->default('')->comment('分类名称');
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
        Schema::dropIfExists('articles');
    }
}
