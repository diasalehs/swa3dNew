<?php
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\user;
use App\Individuals;
use App\Institute;
use App\Researcher;
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
				$users = new user();
	            $users->name = "admin";
	            $users->email = "admin@a.a";
	            $users->userType = 10;
	            $users->flag = 1;
	            $users->password = bcrypt('admin@a.a');
	            $users->save();

	            $i = 0;
    	foreach (range(1,5) as $index) {
	       		$users = new user();
	            $users->name = $faker->name;
	            $users->email = "user".$i."@swa3d.com";
	            $users->userType = 0;
	            $users->flag = 1;
	            $users->password = bcrypt('secret');
	            $users->save();

	            $Individuals = new Individuals();
		        $Individuals->nameInEnglish = $users->name;
		        $Individuals->nameInArabic = $users->name;
		        $Individuals->user_id = $users->id;
		        $Individuals->livingPlace = "camp";
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
	            $users->password = bcrypt('secret');
	            $users->save();

	            $Institute = new Institute();
		        $Institute->nameInEnglish = $users->name;
		        $Institute->nameInArabic = $users->name;
		        $Institute->user_id = $users->id;
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

		        $i++;
	            $users = new user();
	            $users->name = $faker->name;
	            $users->email = "user".$i."@swa3d.com";
	            $users->userType = 2;
	            $users->flag = 1;
	            $users->password = bcrypt('secret');
	            $users->save();

	            $Researcher = new Researcher();
		        $Researcher->nameInEnglish = $users->name;
		        $Researcher->nameInArabic = $users->name;
		        $Researcher->user_id = $users->id;
		        $Researcher->livingPlace = "camp";
		        $Researcher->cityName = "nablus";
		        $Researcher->country = "pal";
		        $Researcher->gender = "male";
		        $Researcher->currentWork = "all";
		        $Researcher->educationalLevel = "school";
		        $Researcher->dateOfBirth = "2011-1-1";
		        $Researcher->email = $users->email;
		        $Researcher->preVoluntary = 0;
		        $Researcher->voluntaryYears = 0;
		        $Researcher->save();

		        $i++;
		        $news = new news();
	            $news->mainImgpath = $faker->imageUrl($width = 640, $height = 480);
	            $news->title = $faker->word;
	            $news->textarea = $faker->text;
	            $news->save();

	            $sliders = new slider();
	            $sliders->mainImgpath = $faker->imageUrl($width = 640, $height = 480);
	            $sliders->title = $faker->word;
	            $sliders->textarea = $faker->text;
	            $sliders->save();

        }
    }
}
