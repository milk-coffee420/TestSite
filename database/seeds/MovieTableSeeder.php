<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class MovieTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $now = Carbon::now();
        $yesterday = Carbon::yesterday();
        $dt = new Carbon('today');
        $addyear = $dt->addYear();

        DB::table('movie')->truncate();

        DB::table('movie')->insert([

            [
                'youtube_id' => '364sC__BJ5Y',
                'title' => 'Movie Title',
                'summary' => 'Some quick example text to build on the card title and make up the bulk of the card\'s content.',
                'text' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. ',
                'published_at' => $now,
                'finished_at' => $addyear,
            ],
            [
                'youtube_id' => 'wNDkLudGIx8',
                'title' => 'Movie Title2',
                'summary' => 'This card has supporting text below as a natural lead-in to additional content.',
                'text' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. ',
                'published_at' => $now,
                'finished_at' => $addyear,
            ],
            [
                'youtube_id' => 'dn17-EfMNY8',
                'title' => 'Movie Title3',
                'summary' => 'With supporting text below as a natural lead-in to additional content.',
                'text' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. ',
                'published_at' => $now,
                'finished_at' => $addyear,
            ],
            [
                'youtube_id' => 'FipfA_bUEts',
                'title' => 'Movie Title4',
                'summary' => 'Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.',
                'text' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. ',
                'published_at' => $yesterday,
                'finished_at' => $addyear,
            ],
            [
                'youtube_id' => 'HX4TR6FJ1U4',
                'title' => 'Movie Title5',
                'summary' => 'Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.',
                'text' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. ',
                'published_at' => $yesterday,
                'finished_at' => $addyear,
            ],
            [
                'youtube_id' => '8YMO_EluSEE',
                'title' => 'Movie Title6',
                'summary' => 'Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',
                'text' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. ',
                'published_at' => $yesterday,
                'finished_at' => $addyear,
            ],
        ]);
    }
}
