<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'first_name' => 'Aisha',
            'last_name' => 'Admin',
            'email' => 'aisha23@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('12344321'),
            'remember_token' => Str::random(10),
            'is_admin' => true,
        ]);
          
        $this->call([
            CategorySeeder::class,
        ]);
    }
}
