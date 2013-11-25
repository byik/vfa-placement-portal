<?php

class FellowsTableSeeder extends Seeder {

	public function run()
	{
		// Uncomment the below to wipe the table clean before populating
		// DB::table('fellows')->truncate();
        $fourthUser = User::find(4);

		$firstFellow = new Fellow();
        $firstFellow->bio = substr(simplexml_load_file('http://www.lipsum.com/feed/xml?amount=1&what=paras&start=0')->lipsum,0,500);
        $firstFellow->school = substr(simplexml_load_file('http://www.lipsum.com/feed/xml?amount=1&what=paras&start=0')->lipsum,0,40);
        $firstFellow->major = substr(simplexml_load_file('http://www.lipsum.com/feed/xml?amount=1&what=paras&start=0')->lipsum,0,25);
        $firstFellow->degree = "BS";
        $firstFellow->graduationYear = "2014";
        $firstFellow->hometown = substr(simplexml_load_file('http://www.lipsum.com/feed/xml?amount=1&what=paras&start=0')->lipsum,0,60);
        $firstFellow->phoneNumber = 1234567890;
        $firstFellow->user()->associate($fourthUser);
        $firstFellow->save();
	}

}
