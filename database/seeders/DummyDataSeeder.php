<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DummyDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // DummyUserData
        User::create(['name' => 'TEST USER', 'email' => 'test@example.com', 'password' => Hash::make('password')]);
        User::factory(99)->create();
    }
}
