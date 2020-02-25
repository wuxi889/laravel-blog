<?php
/*
 * @Description: 
 * @Author: uSee
 * @Date: 2020-02-24 14:46:53
 * @LastEditors: uSee
 * @LastEditTime: 2020-02-25 11:18:40
 * @FilePath: \laravel-blog\database\migrations\2020_02_22_023528_create_categories_table.php
 */

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->bigIncrements('id')->comment('分类ID');
            $table->string('name')->unique()->default('')->comment('分类名称');
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
        Schema::dropIfExists('categories');
    }
}
