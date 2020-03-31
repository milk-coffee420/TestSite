<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.admin
     *
     * @return void
     */

    public function run()
    {
        DB::table('users')->delete();

        if (env('APP_ENV') == 'local' || env('APP_ENV') == 'staging' ) {
            DB::table('users')->insert([
                [
                    'id' => 1,
                    'name'                 => 'admin_dev',
                    'email'                 => 'admin@example.com',
                    'password'               => bcrypt('password'),
                    'created_at' => '2020-03-25 23:59:59',
                    'updated_at' => '2020-03-25 23:59:59',
                ],
            ]);
        }elseif (env('APP_ENV') == 'production'){
            DB::table('users')->insert([
                [
                    'id' => 1,
                    'name'                 => 'admin_master',
                    'email'                 => 'admin@mail.com',
                    'password'               => bcrypt('vc01R2t6'),
                    'created_at' => '2020-03-25 23:59:59',
                    'updated_at' => '2020-03-25 23:59:59',
                ],
            ]);
        }
    }
}
