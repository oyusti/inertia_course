<?php

namespace Database\Seeders;

use App\Models\Country;
use App\Models\Organization;
use App\Models\Contact;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        /* User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]); */

        Country::factory(5)->create();
        Organization::factory(20)->create();
        
        Contact::factory(100)->create();
    }
}
