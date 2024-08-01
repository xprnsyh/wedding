<?php

use App\Models\Invite;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class InvitationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();
        for ($i=3; $i < 56; $i++) { 
            Invite::create([
                'kode_kupon' => Str::random(8),
                'event_id' => 2,
                'guest_id' => $faker->numberBetween(3,99),
                'status' => 'Diundang',
                'is_confirmed' => 0,
                'is_invited' => 1,
            ]);
        }
    }
}
