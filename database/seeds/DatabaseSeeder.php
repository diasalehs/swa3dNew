<?php
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Individuals;
use App\Institute;
use App\Initiative;
use App\news;
use App\slider;
use Faker\Factory as Faker;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$faker = Faker::create();

	            $i = 1;
    	foreach (range(1,5) as $index) {
	       		$users = new user();
	            $users->name = $faker->name;
	            $users->email = "user".$i."@swa3d.com";
	            $users->userType = 0;
	            $users->flag = 1;
	            $users->verified = 1;
	            $users->password = bcrypt('secret');
	            $users->save();

	            $Individuals = new Individuals();
		        $Individuals->nameInEnglish = $users->name;
		        $Individuals->nameInArabic = $users->name;
		        $Individuals->user_id = $users->id;
		        $Individuals->cityName = "nablus";
		        $Individuals->country = "pal";
		        $Individuals->gender = "male";
		        $Individuals->currentWork = "all";
		        $Individuals->educationalLevel = "school";
		        $Individuals->dateOfBirth = "2011-1-1";
		        $Individuals->email = $users->email;
		        $Individuals->preVoluntary = 0;
		        $Individuals->voluntaryYears = 0;
		        $Individuals->save();

		        $i++;
	            $users = new user();
	            $users->name = $faker->name;
	            $users->email = "user".$i."@swa3d.com";
	            $users->userType = 1;
	            $users->flag = 1;
	            $users->verified = 1;
	            $users->password = bcrypt('secret');
	            $users->save();

		        $Institute=new Institute;
	            $Institute->nameInEnglish =  $users->name;
	            $Institute->nameInArabic = $users->name;
	            $Institute->user_id =  $users->id;
	            $Institute->livingPlace = "camp";
	            $Institute->cityName = "nablus";
	            $Institute->country = "pal";
	            $Institute->license = $faker->postcode;
	            $Institute->workSummary = 0;
	            $Institute->activities = $faker->text;
	            $Institute->mobileNumber = $faker->ean8;
	            $Institute->email = $users->email;
	            $Institute->address = $faker->address;
	            $Institute->save();
	            $users->adminApproval=1;
	            $users->save();

		        $i++;
	            $users = new user();
	            $users->name = $faker->name;
	            $users->email = "user".$i."@swa3d.com";
	            $users->userType = 3;
	            $users->flag = 1;
	            $users->verified = 1;
	            $users->password = bcrypt('secret');
	            $users->save();

	            $initiative = new Initiative();
  		        $initiative->nameInEnglish = $users->name;
  		        $initiative->nameInArabic = $users->name;
  		        $initiative->user_id = $users->id;
  		        $initiative->adminId = ($i-2);
  		        $initiative->livingPlace = "camp";
  		        $initiative->cityName = "nablus";
  		        $initiative->country = "pal";
  		        $initiative->currentWork = "all";
  		        $initiative->dateOfBirth = "2011-1-1";
  		        $initiative->email = $users->email;
  		        $initiative->preVoluntary = 0;
  		        $initiative->voluntaryYears = 0;
  		        $initiative->save();

		        $i++;

	            $sliders = new slider();
	            $sliders->mainImgpath = $faker->imageUrl($width = 640, $height = 480);
	            $sliders->title = $faker->word;
	            $sliders->textarea = $faker->text;
	            $sliders->save();

        }

        $users = new user();
	            $users->name = "admin";
	            $users->email = "admin@a.a";
	            $users->userType = 10;
	            $users->flag = 1;
	            $users->password = bcrypt('admin@a.a');
	            $users->verified = 1;
	            $users->save();
    }
}
