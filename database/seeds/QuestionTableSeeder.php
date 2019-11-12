<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class QuestionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('questions')->truncate();
        DB::table('questions')->insert([
            [
                'user_id'         => 4,
                'title'           => 'Test1',
                'tag_category_id' => 1,
                'comment'         => 'Test1',
                'created_at'      => Carbon::create('2019','9','1'),
                'updated_at'      => Carbon::create('2019','9','5'),
            ],
            [
                'user_id'         => 2,
                'title'           => 'Test2',
                'tag_category_id' => 2,
                'comment'         => 'Test2',
                'created_at'      => Carbon::create('2019','9','1'),
                'updated_at'      => Carbon::create('2019','9','5'),
            ],
            [
                'user_id'         => 3,
                'title'           => 'Test3',
                'tag_category_id' => 4,
                'comment'         => 'Test3',
                'created_at'      => Carbon::create('2019','9','1'),
                'updated_at'      => Carbon::create('2019','9','5'),
            ]
        ]);
    }
}
