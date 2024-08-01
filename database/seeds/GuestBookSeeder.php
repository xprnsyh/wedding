<?php

use App\Models\GuestBook;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GuestBookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $faker = Faker\Factory::create();


            for ($i=3; $i < 125; $i++) { 
                GuestBook::create([
                    'event_id' => 2,
                    'user_id' => $faker->numberBetween(3,99),
                    'text' => $faker->text
                ]);
            }

        

    }
}
