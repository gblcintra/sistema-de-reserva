<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		// str_random(10)
	    DB::table('users')->insert([
	        'name' => 'Administrador',
	        'email' => 'camp@capi.com.br',
	        'password' => bcrypt('admin'),
			'profile_id' => 3,
			'statusAccout' => 1,
	        'created_at' => date('Y-m-d H:i:s'),
	        'updated_at' => date('Y-m-d H:i:s'),
	       	'c_auth' => 1,
	    ]);
    }
}
