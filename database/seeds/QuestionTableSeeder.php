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
                'comment'         => 'Test1front',
                'created_at'      => Carbon::create('2019','9','1'),
                'updated_at'      => Carbon::create('2019','9','5'),
            ],
            [
                'user_id'         => 2,
                'title'           => 'Test2',
                'tag_category_id' => 1,
                'comment'         => 'Test2front',
                'created_at'      => Carbon::create('2019','9','1'),
                'updated_at'      => Carbon::create('2019','9','5'),
            ],
            [
                'user_id'         => 3,
                'title'           => 'Test3',
                'tag_category_id' => 1,
                'comment'         => 'Test3front',
                'created_at'      => Carbon::create('2019','9','1'),
                'updated_at'      => Carbon::create('2019','9','5'),
            ],
            [
                'user_id'         => 4,
                'title'           => 'Test1',
                'tag_category_id' => 2,
                'comment'         => 'Test1back',
                'created_at'      => Carbon::create('2019','9','1'),
                'updated_at'      => Carbon::create('2019','9','5'),
            ],
            [
                'user_id'         => 2,
                'title'           => 'Test2',
                'tag_category_id' => 2,
                'comment'         => 'Test2back',
                'created_at'      => Carbon::create('2019','9','1'),
                'updated_at'      => Carbon::create('2019','9','5'),
            ],
            [
                'user_id'         => 3,
                'title'           => 'Test3',
                'tag_category_id' => 2,
                'comment'         => 'Test3back',
                'created_at'      => Carbon::create('2019','9','1'),
                'updated_at'      => Carbon::create('2019','9','5'),
            ],
            [
                'user_id'         => 3,
                'title'           => 'Test1',
                'tag_category_id' => 3,
                'comment'         => 'Test1infra',
                'created_at'      => Carbon::create('2019','9','1'),
                'updated_at'      => Carbon::create('2019','9','5'),
            ],
            [
                'user_id'         => 2,
                'title'           => 'Test2',
                'tag_category_id' => 3,
                'comment'         => 'Test2infra',
                'created_at'      => Carbon::create('2019','9','1'),
                'updated_at'      => Carbon::create('2019','9','5'),
            ],
            [
                'user_id'         => 3,
                'title'           => 'Test3',
                'tag_category_id' => 3,
                'comment'         => 'Test3infra',
                'created_at'      => Carbon::create('2019','9','1'),
                'updated_at'      => Carbon::create('2019','9','5'),
            ],
            [
                'user_id'         => 4,
                'title'           => 'Test3',
                'tag_category_id' => 4,
                'comment'         => 'Test1others',
                'created_at'      => Carbon::create('2019','9','1'),
                'updated_at'      => Carbon::create('2019','9','5'),
            ],
            [
                'user_id'         => 2,
                'title'           => 'Test2',
                'tag_category_id' => 4,
                'comment'         => 'Test2others',
                'created_at'      => Carbon::create('2019','9','1'),
                'updated_at'      => Carbon::create('2019','9','5'),
            ],
            [
                'user_id'         => 3,
                'title'           => 'Test3',
                'tag_category_id' => 4,
                'comment'         => 'Test3others',
                'created_at'      => Carbon::create('2019','9','1'),
                'updated_at'      => Carbon::create('2019','9','5'),
            ]
        ]);
    }
}
