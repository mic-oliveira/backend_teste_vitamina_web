<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::factory()->state(['email' => 'admin@admin.com', 'password' => Hash::make('admin')])->create();
        User::factory()->count(20)->create();
    }

}
