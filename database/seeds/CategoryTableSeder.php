<?php
/*
 * @Description: 
 * @Author: uSee
 * @Date: 2020-02-25 14:58:40
 * @LastEditors: uSee
 * @LastEditTime: 2020-02-25 14:59:37
 * @FilePath: \laravel-blog\database\seeds\CategoryTableSeder.php
 */

use Illuminate\Database\Seeder;

class CategoryTableSeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\Models\Categories::class)->times(10)->create();
    }
}
