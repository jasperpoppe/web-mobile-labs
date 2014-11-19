<?php

class UsersTableSeeder extends Seeder {

	/**
	 * Auto generated seed file
	 *
	 * @return void
	 */
	public function run()
	{
		/*
        \DB::table('users')->truncate();
        
		\DB::table('users')->insert(array (
			0 => 
			array (
				'ID' => '2',
				'First_name' => 'Jasper',
				'Last_name' => 'Poppe',
				'Email' => 'jasper.poppe@odisee.be',
				'Password' => Hash::make('Azerty123'),
				'Biography' => 'I live in Lokeren',
				'Profession' => 'I\'m a developer at Odisee.',
				'Picture' => '1.jpg',
				'LinkedIn' => '',
				'Website' => '',
				'Mentor' => '0',
				'Countries_ID' => '21',
				'User_Roles_ID' => '2',
				'created_at' => '2014-11-17 13:16:17',
				'updated_at' => '2014-11-17 13:16:17',
				'Accept_date' => NULL,
				'remember_token' => NULL,
			),
		));*/

        DB::table('users')->delete();
        User::create(array(
            'ID' => '1',
            'First_name' => 'Jasper',
            'Last_name' => 'Poppe',
            'Email' => 'jasper.poppe@odisee.be',
            'Password' => Hash::make('Azerty123'),
            'Biography' => 'I live in Lokeren',
            'Profession' => 'I\'m a developer at Odisee.',
            'Picture' => '1.jpg',
            'LinkedIn' => 'http://be.linkedin.com/pub/jasper-poppe/a4/7a1/563',
            'Website' => NULL,
            'Mentor' => '0',
            'Countries_ID' => '21',
            'User_Roles_ID' => '2',
            'created_at' => '2014-11-17 13:16:17',
            'updated_at' => '2014-11-17 13:16:17',
            'Accept_date' => '2014-11-18 13:16:17',
            'remember_token' => NULL,
        ));
	}

}
