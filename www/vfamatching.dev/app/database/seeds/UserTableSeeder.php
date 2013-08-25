<?php

class UserTableSeeder extends Seeder {

    public function run()
    {
        DB::table('users')->delete();

        User::create(array(
        	'email' => 'me@scottdlowe.com',
        	'username' => 'lowe0292',
        	'password' => Hash::make('scottsfakepassword')
        	));
    }

}