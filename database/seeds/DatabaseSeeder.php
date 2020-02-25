<?php
/*
 * @Description:
 * @Author: uSee
 * @Date: 2020-02-24 13:58:03
 * @LastEditors: uSee
 * @LastEditTime: 2020-02-25 15:16:26
 * @FilePath: \laravel-blog\database\seeds\DatabaseSeeder.php
 */

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();
        $this->call([
            // UsersTableSeeder::class,
            ArticlesTableSeeder::class,
            CategoryTableSeder::class,
            TagsTableSeder::class,
            ArticleTagsTableSeeder::class,
            ArticleContentsTableSeder::class,
        ]);
    }
}
