<?php
/**
 * Created by PhpStorm.
 * User: longnguyen
 * Date: 10/4/15
 * Time: 3:28 PM
 */

use Carbon\Carbon;

class ArticlesSeeder extends Seeder{

    public function run(){
        DB::table('articles')->delete();

        for($i=0; $i< 100; $i ++) {
            DB::table('articles')->insert(
                [
                    'title' => 'test title ' . rand(1, 100),
                    'body' => 'test body ' . rand(1, 1000),
                    'published_at' => Carbon::now()->toFormattedDateString(),
                ]
            );
        }
    }

}