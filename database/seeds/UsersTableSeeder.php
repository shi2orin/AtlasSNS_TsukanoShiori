<?php

use Illuminate\Database\Seeder;


class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    DB::table('users')->insert([
            'username' => '一郎',
            'mail' => 'abc@atlas',
            'password' => bcrypt('12345'),

        ]);
        DB::table('users')->insert([
            'username' => '二郎',
            'mail' => 'def@atlas',
            'password' => bcrypt('12345'),

        ]);
        DB::table('users')->insert([
            'username' => '三郎',
            'mail' => 'ghi@atlas',
            'password' => bcrypt('12345'),

        ]);
    }

}
