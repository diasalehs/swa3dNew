<?php

use Illuminate\Database\Seeder;
use App\Individuals;

class IndividualsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $Individuals = new Individuals();
        $Individuals->nameInEnglish = "Mazen";
        $Individuals->nameInArabic = "مازن";
        $Individuals->livingPlace = 1;
        $Individuals->cityName = " ";
        $Individuals->country = " ";
        $Individuals->gender = 0;
        $Individuals->currentWork = " ";
        $Individuals->educationalLevel = 1;
        $Individuals->dateOfBirth = "";
        $Individuals->email = " ";
        $Individuals->preVoluntary = 0;
        $Individuals->voluntaryYears = 0;
        $Individuals->save();

    }
}
