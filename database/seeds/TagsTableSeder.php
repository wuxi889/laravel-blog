<?php
/*
 * @Description: 
 * @Author: uSee
 * @Date: 2020-02-25 15:01:46
 * @LastEditors: uSee
 * @LastEditTime: 2020-02-25 16:10:58
 * @FilePath: \laravel-blog\database\seeds\TagsTableSeder.php
 */

use Illuminate\Database\Seeder;

class TagsTableSeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\Models\Tags::class)->times(20)->create();
    }
}
