<?php
/*
 * @Description: 
 * @Author: uSee
 * @Date: 2020-02-24 14:54:54
 * @LastEditors: uSee
 * @LastEditTime: 2020-02-24 14:54:54
 * @FilePath: \laravel-blog\database\migrations\2020_02_22_023751_create_config_table.php
 */

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConfigTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('config', function (Blueprint $table) {
            $table->bigIncrements('id')->comment('配置ID');
            $table->string('key', 63)->unique()->default('')->comment('配置关键字');
            $table->string('name', 63)->default('')->comment('配置名称');
            $table->string('value', 255)->default('')->comment('配置值');
            $table->string('tip', 127)->default('')->comment('配置提醒');
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
        Schema::dropIfExists('config');
    }
}
