<?php
/*
 * @Description: 
 * @Author: uSee
 * @Date: 2020-02-25 15:01:25
 * @LastEditors: uSee
 * @LastEditTime: 2020-02-25 16:10:43
 * @FilePath: \laravel-blog\database\seeds\ArticleTagsTableSeeder.php
 */

use Illuminate\Database\Seeder;

class ArticleTagsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\Models\ArticleTags::class)->times(600)->create();
    }
}
