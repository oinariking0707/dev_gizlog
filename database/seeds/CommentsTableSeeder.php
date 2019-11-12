<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class CommentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('comments')->truncate();
        DB::table('comments')->insert([
            [
                'user_id'         => 3,
                'question_id'     => 1,
                'comment'         => 'Test1',
                'created_at'      => Carbon::create('2019','10','1'),
                'updated_at'      => Carbon::create('2019','10','5'),
            ],
            [
                'user_id'         => 2,
                'question_id'     => 1,
                'comment'         => 'Test2',
                'created_at'      => Carbon::create('2019','10','1'),
                'updated_at'      => Carbon::create('2019','10','5'),
            ]
        ]);
    }
}
