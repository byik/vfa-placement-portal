<?php

class OpportunitiesTableSeeder extends Seeder {

	public function run()
	{
		// Uncomment the below to wipe the table clean before populating
		// DB::table('companies')->truncate();

		$firstOpportunity = new Opportunity();
		$firstOpportunity->title = "SEO Expert";
		$firstOpportunity->description = "Lorem ipsum dolor sit amet, consectetur adipisicing elit. Rerum, odit, mollitia tempora maxime ullam aperiam officiis maiores asperiores odio tenetur atque natus excepturi ipsum doloremque.";
		$firstOpportunity->responsibilitiesAnswer = "am, incidunt, perferendis, mollitia pariatur voluptates vel quaerat voluptatum temporibus eaque tenetur quod aut asperiores quos nemo repudiandae e";
		$firstOpportunity->skillsAnswer = "ae nobis suscipit enim nostrum hic ipsum corporis non deleniti ipsam atque quaerat dicta harum iusto odit. Harum, autem, odio, a commodi maxime dolore ";
		$firstOpportunity->developmentAnswer = "m temporibus eaque tenetur quod aut asperiores quos nemo repudiandae exped";
		$firstOpportunity->isPublished = true;

		$secondOpportunity = new Opportunity();
		$secondOpportunity->title = "Community Engagement";
		$secondOpportunity->description = "quam maxime magni minus ipsam nihil fugiat quo consectetur.";
		$secondOpportunity->responsibilitiesAnswer = "ecati neque a quae? Repudiandae, veniam distinctio similique at minima asperiores itaque illo doloribus ab d";
		$secondOpportunity->skillsAnswer = "temporibus dolorum fugit optio incidunt quisquam quaerat aut natus nostrum quis! Minus, quasi alias enim dolorem eos";
		$secondOpportunity->developmentAnswer = "erendis fugit esse hic delectus autem labore vel impedit quidem perspiciatis dolores eligendi nemo accusamus obcaecati n";
		$secondOpportunity->isPublished = true;

		$firstCompany = Company::find(1);
		$firstCompany->opportunities()->save($firstOpportunity);
		$firstCompany->opportunities()->save($secondOpportunity);

		$thirdOpportunity = new Opportunity();
		$thirdOpportunity->title = "Ruby Developer";
		$thirdOpportunity->description = " odio, a commodi maxime dolore modi iste blanditiis dolor delectus amet asperiores veritatis placeat necessitatibus i.";
		$thirdOpportunity->responsibilitiesAnswer = "mporibus eaque tenetur quod aut asperiores quos nemo repudiandae expedita quis nulla at magnam neque labore voluptate";
		$thirdOpportunity->skillsAnswer = "ut placeat officia consequatur necessitatibus minus rem adipisci eius enim cum quidem atque sunt asperiores laudantium quasi temporibus dolorum fugit optio incidunt quisquam quaerat aut natus nostrum quis! Minus, quasi alias enim d";
		$thirdOpportunity->developmentAnswer = "us obcaecati neque a quae? Repudiandae, veniam distinctio similique at minima asperiores itaque illo doloribu";
		$thirdOpportunity->isPublished = true;

		$secondCompany = Company::find(2);
		$secondCompany->opportunities()->save($thirdOpportunity);

		for($i = 0; $i < 15; $i++){
			$randomOpportunity = new Opportunity();
			$randomOpportunity->title = substr(simplexml_load_file('http://www.lipsum.com/feed/xml?amount=1&what=paras&start=0')->lipsum,0,120);
			$randomOpportunity->description = substr(simplexml_load_file('http://www.lipsum.com/feed/xml?amount=1&what=paras&start=0')->lipsum,0,650);
			$randomOpportunity->responsibilitiesAnswer = substr(simplexml_load_file('http://www.lipsum.com/feed/xml?amount=1&what=paras&start=0')->lipsum,0,170);
			$randomOpportunity->skillsAnswer = substr(simplexml_load_file('http://www.lipsum.com/feed/xml?amount=1&what=paras&start=0')->lipsum,0,210);
			$randomOpportunity->developmentAnswer = substr(simplexml_load_file('http://www.lipsum.com/feed/xml?amount=1&what=paras&start=0')->lipsum,0,220);
			$randomOpportunity->isPublished = true;
			$secondCompany->opportunities()->save($randomOpportunity);
		}
	}

}
