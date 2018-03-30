<?php

use App\Datatable;
use Illuminate\Database\Seeder;
use Faker\Factory;

class DatatablesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Datatable::truncate();
        $faker = Factory::create();

        for($i=0; $i<50; $i++)
        {
            if(rand(0,1)==0) {
                $gender='Male';
            }
            else{
                $gender='Female';
            }
                Datatable::create([
                    'firstname' => $faker->unique()->firstName,
                    'lastname' => $faker->unique()->lastName,
                    'email'     => $faker->unique()->email,
                    'job' => $faker->jobTitle,
                    'gender' => $gender,
                    'age' => $faker->numberBetween(20, 80),
                    'points' => $faker->numberBetween(0, 1000),
                    'notes' => $faker->text(100)
                ]);

        }

    }
}
