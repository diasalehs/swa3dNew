<?php
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Individuals;
use App\Institute;
use App\Initiative;
use App\Intrest;
use App\targetedGroups;

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
		        $Individuals->major = "all";
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
	            $Institute->license = $faker->buildingNumber;
	            $Institute->mobileNumber = $faker->ean8;
	            $Institute->email = $users->email;
	            $Institute->address = $faker->address;
	            $Institute->establishmentYear = $faker->date;
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
		        $initiative->cityName = "nablus";
		        $initiative->country = "pal";
		        $initiative->dateOfBirth = "2011-1-1";
		        $initiative->email = $users->email;
		        $initiative->preVoluntary = 0;
		        $initiative->voluntaryYears = 0;
  		        $initiative->adminId = ($i-2);
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

	            $users = new user();
	            $users->name = $faker->name;
	            $users->email = "user22@swa3d.com";
	            $users->userType = 1;
	            $users->flag = 0;
	            $users->verified = 1;
	            $users->password = bcrypt('secret');
	            $users->save();

	    $Intrest= new Intrest();
	    $Intrest->name="Social and Economic Rights"; 
	    $Intrest->save();       
	    	    $Intrest= new Intrest();
	    $Intrest->name="Legal Aid"; 
	    $Intrest->save();   
	    	    $Intrest= new Intrest();
	    $Intrest->name="Capacity Building"; 
	    $Intrest->save();   
	    	    $Intrest= new Intrest();
	    $Intrest->name="Stop the Wall Campaign"; 
	    $Intrest->save();   
	    	    $Intrest= new Intrest();
	    $Intrest->name="BSD Campaign"; 
	    $Intrest->save();   
	    	    $Intrest= new Intrest();
	    $Intrest->name="Regional Campaigns"; 
	    $Intrest->save(); 
	    	    $Intrest= new Intrest();
	    $Intrest->name="Research"; 
	    $Intrest->save();   
	      
	    	    $Intrest= new Intrest();
	    $Intrest->name="Administration"; 
	    $Intrest->save();   
	    	    $Intrest= new Intrest();
	    $Intrest->name="Culture and the Arts"; 
	    $Intrest->save();   
	    	    $Intrest= new Intrest();
	    $Intrest->name="Environment and Agriculture"; 
	    $Intrest->save();   
	    	    $Intrest= new Intrest();
	    $Intrest->name="Education"; 
	    $Intrest->save();   
	    	    $Intrest= new Intrest();
	    $Intrest->name="Youth and Children"; 
	    $Intrest->save();   
	    	    $Intrest= new Intrest();
	    $Intrest->name="Goverance, Democracy and Human Rights"; 
	    $Intrest->save();   
	    	    $Intrest= new Intrest();
	    $Intrest->name="Development"; 
	    $Intrest->save();   
	    	    $Intrest= new Intrest();
	    $Intrest->name="Law"; 
	    $Intrest->save();   
	    	    $Intrest= new Intrest();
	    $Intrest->name="Women"; 
	    $Intrest->save();   
	    	    $Intrest= new Intrest();
	    $Intrest->name="People with Disablities"; 
	    $Intrest->save();   
	    	    $Intrest= new Intrest();
	    $Intrest->name="Health"; 
	    $Intrest->save();   
	    	    $Intrest= new Intrest();
	  
	  	    $target= new targetedGroups();
	    $target->name="Pre-School Children (< 5)"; 
	    $target->save(); 
	  	    $target= new targetedGroups();
	    $target->name="Elementary School Children (5-11)"; 
	    $target->save(); 
	  	    $target= new targetedGroups();
	    $target->name="Middle School Children (11-14)"; 
	    $target->save(); 
	  	    $target= new targetedGroups();
	    $target->name="High School Children (14-18)"; 
	    $target->save(); 
	  	    $target= new targetedGroups();
	    $target->name="Young Adults (18-30) "; 
	    $target->save(); 
	  	    $target= new targetedGroups();
	    $target->name="Adults (31-59)"; 
	    $target->save(); 
	  	    $target= new targetedGroups();
	    $target->name="Elderly (60 >)"; 
	    $target->save(); 
	    }
}
