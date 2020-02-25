<?php
/*
 * @Description: 
 * @Author: uSee
 * @Date: 2020-02-24 14:44:45
 * @LastEditors: uSee
 * @LastEditTime: 2020-02-25 14:44:09
 * @FilePath: \laravel-blog\database\seeds\ArticlesTableSeeder.php
 */

use Illuminate\Database\Seeder;

class ArticlesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\Models\Articles::class)->times(300)->create();
    }
}
