<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Carbon\Carbon;

class InsertDummpyArticles extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{

//        for($i=0; $i< 100; $i ++) {
//            DB::table('articles')->insert(
//                [
//                    'title' => 'test title ' . rand(1, 100),
//                    'body' => 'test body ' . rand(1, 1000),
//                    'published_at' => Carbon::now()->toFormattedDateString(),
//                ]
//            );
//        }
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
        DB::table('articles')->delete();

	}

}
