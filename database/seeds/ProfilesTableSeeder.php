<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProfilesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('profiles')->insert([
	        'name' => 'Usuário',
	        'moderator' => 0,
	        'administrator' => 0,
	        'default' => 1,
	        'c_auth' => 1,
	    ]);

	    DB::table('profiles')->insert([
	        'name' => 'Moderador',
	        'moderator' => 1,
	        'administrator' => 0,
	        'default' => 0,
	        'c_auth' => 1,
	    ]);

	    DB::table('profiles')->insert([
	        'name' => 'Administrador',
	        'moderator' => 0,
	        'administrator' => 1,
	        'default' => 0,
	        'c_auth' => 1,
	    ]);
    }
}
