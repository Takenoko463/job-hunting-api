<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Corporation;
use App\Models\JobHuntingStatus;

class JobHuntingStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = User::factory(10)->create();
        $corporations = Corporation::factory(20)->create();
        JobHuntingStatus::factory(10)->recycle($users,$corporations)->create();
    }
}
