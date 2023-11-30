<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use App\Models\Address;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        User::factory()->count(50)->hasAddress(1)->hasItems(3)->create();
        User::factory()->count(50)->hasAddress(1)->hasItems(4)->create();
        User::factory()->count(50)->hasAddress(1)->hasItems(5)->create();
        //Address::factory()->count(10)->create();
        //User::factory(10)->create();

        //\App\Models\Item::factory()->count(25)->create();
        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
