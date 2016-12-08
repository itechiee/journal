<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class UserRolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         DB::table('user_roles')->insert([
            ['role' => 'admin'],
            ['role' => 'author'],
            ['role' => 'user']
        ]);
    }
}
