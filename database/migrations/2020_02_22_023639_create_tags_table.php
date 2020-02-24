<?php
/*
 * @Description: 
 * @Author: uSee
 * @Date: 2020-02-24 14:51:15
 * @LastEditors: uSee
 * @LastEditTime: 2020-02-24 14:51:15
 * @FilePath: \laravel-blog\database\migrations\2020_02_22_023639_create_tags_table.php
 */

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTagsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tags', function (Blueprint $table) {
            $table->bigIncrements('id')->comment('标签ID');
            $table->string('name')->unique()->default('')->comment('标签名称');
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
        Schema::dropIfExists('tag');
    }
}
