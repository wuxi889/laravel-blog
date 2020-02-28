<?php
/*
 * @Description: 
 * @Author: uSee
 * @Date: 2020-02-24 14:54:00
 * @LastEditors: uSee
 * @LastEditTime: 2020-02-28 09:58:44
 * @FilePath: \laravel-blog\database\migrations\2020_02_22_023739_create_resources_table.php
 */

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateResourcesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('resources', function (Blueprint $table) {
            $table->bigIncrements('id')->comment('资源ID');
            $table->string('name', 63)->default('')->comment('名称');
            $table->string('hash', 32)->default('')->comment('文件Hash');
            $table->string('mime', 63)->default('')->comment('类型');
            $table->string('path', 255)->unique()->default('')->comment('路径');
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
        Schema::dropIfExists('resource');
    }
}
