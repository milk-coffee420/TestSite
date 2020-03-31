<?php

use Illuminate\Database\Seeder;

class NewsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('news')->truncate();

        DB::table('news')->insert([

            [
                'text' => '緊急連絡記事。',
                'publish_at' => '2019-11-01 00:00:00',
                'finished_at' => '2020-11-05 00:00:00',
                'created_at' => '2015-10-27 00:00:00',
                'updated_at' => '2015-10-27 00:00:00',
            ],
            [
                'text' => 'お知らせ1',
                'publish_at' => '2019-11-02 00:00:00',
                'finished_at' => '2020-11-02 00:00:00',
                'created_at' => '2015-10-27 00:00:00',
                'updated_at' => '2015-10-27 00:00:00',
            ],
            [
                'text' => 'お知らせ2',
                'publish_at' => '2019-11-04 00:00:00',
                'finished_at' => '2019-12-02 00:00:00',
                'created_at' => '2015-10-27 00:00:00',
                'updated_at' => '2015-10-27 00:00:00',
            ],
            [
                'text' => 'お知らせ3',
                'publish_at' => '2015-11-03 00:00:00',
                'finished_at' => '2019-11-01 00:00:00',
                'created_at' => '2015-10-27 00:00:00',
                'updated_at' => '2015-10-27 00:00:00',
            ],
            [
                'text' => 'お知らせ4',
                'publish_at' => '2015-11-06 00:00:00',
                'finished_at' => '2015-11-01 00:00:00',
                'created_at' => '2015-10-27 00:00:00',
                'updated_at' => '2015-10-27 00:00:00',
            ],
            [
                'text' => 'お知らせ5',
                'publish_at' => '2015-11-05 00:00:00',
                'finished_at' => '2015-11-01 00:00:00',
                'created_at' => '2015-10-27 00:00:00',
                'updated_at' => '2015-10-27 00:00:00',
            ],
        ]);
    }
}
