<?php

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Eloquent::unguard();

		$this->call('UsersTableSeeder');
		$this->call('CompaniesTableSeeder');
		$this->call('MedialinksTableSeeder');
<<<<<<< HEAD
		$this->call('FellowsTableSeeder');
=======
		$this->call('OpportunitiesTableSeeder');
		$this->call('HiringmanagersTableSeeder');
		$this->call('AdminsTableSeeder');
<<<<<<< HEAD
>>>>>>> b89ab0b0fd028736039d2605eb6e7c7e7bc348d6
=======
		$this->call('PlacementstatusesTableSeeder');
>>>>>>> ca90a6e6e8a74036a438aa2bfddd94490502b421
	}

}