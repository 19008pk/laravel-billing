<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UnitSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('units')->insert([
            // --- Piece / Count ---
            [
                'name' => 'Piece',
                'short_code' => 'pc',
                'priority' => 1,
                'is_active' => true,
                'is_system' => true,
                'description' => 'Single item unit',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Dozen',
                'short_code' => 'dz',
                'priority' => 2,
                'is_active' => true,
                'is_system' => true,
                'description' => '12 items unit',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            // --- Weight ---
            [
                'name' => 'Gram',
                'short_code' => 'g',
                'priority' => 3,
                'is_active' => true,
                'is_system' => true,
                'description' => 'Small weight unit',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Kilogram',
                'short_code' => 'kg',
                'priority' => 4,
                'is_active' => true,
                'is_system' => true,
                'description' => 'Weight-based unit',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            // --- Volume ---
            [
                'name' => 'Millilitre',
                'short_code' => 'ml',
                'priority' => 5,
                'is_active' => true,
                'is_system' => true,
                'description' => 'Small volume unit',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Litre',
                'short_code' => 'ltr',
                'priority' => 6,
                'is_active' => true,
                'is_system' => true,
                'description' => 'Volume-based unit',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            // --- Length ---
            [
                'name' => 'Centimetre',
                'short_code' => 'cm',
                'priority' => 7,
                'is_active' => true,
                'is_system' => true,
                'description' => 'Length measurement unit',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Metre',
                'short_code' => 'm',
                'priority' => 8,
                'is_active' => true,
                'is_system' => true,
                'description' => 'Standard length unit',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            // --- Time ---
            [
                'name' => 'Hour',
                'short_code' => 'hr',
                'priority' => 9,
                'is_active' => true,
                'is_system' => true,
                'description' => 'Time-based unit',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Minute',
                'short_code' => 'min',
                'priority' => 10,
                'is_active' => true,
                'is_system' => true,
                'description' => 'Time-based unit',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
