<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;
class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

    	foreach (range(1,10) as $index) {
	        DB::table('users')->insert([
	            'name' => str_random(10),
                'email' => str_random(10).'@gmail.com',
                'password' => bcrypt('secret'),
	            'created_at' =>Carbon::now(),

	        ]);
	    }



    }
}
