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
		$this->call('FellowsTableSeeder');
		$this->call('OpportunitiesTableSeeder');
		$this->call('HiringmanagersTableSeeder');
		$this->call('AdminsTableSeeder');
		$this->call('PlacementstatusesTableSeeder');
		$this->call('AdminnotesTableSeeder');
		$this->call('PitchesTableSeeder');
		$this->call('FellowskillsTableSeeder');
		$this->call('OpportunitytagsTableSeeder');
		$this->call('StaffrecommendationsTableSeeder');
	}

}