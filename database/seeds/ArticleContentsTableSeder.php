<?php
/*
 * @Description: 
 * @Author: uSee
 * @Date: 2020-02-25 15:18:56
 * @LastEditors: uSee
 * @LastEditTime: 2020-03-03 14:26:19
 * @FilePath: \laravel-blog\database\seeds\ArticleContentsTableSeder.php
 */

use App\Models\ArticleContents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class ArticleContentsTableSeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $data = [];
        $now = now();
        for ($i = 1; $i <= 300; $i ++) { 
            $data[] = [
                'article_id' => $i,
                'content'    => $faker->text(),
                'created_at' => $now,
                'updated_at' => $now,
            ];
        }
        ArticleContents::insert($data);
    }
}
