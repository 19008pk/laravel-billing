<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('categories')->insert([
            [
                'name' => 'Electronics',
                'priority' => 1,
                'is_active' => true,
                'is_system' => false
            ],
            [
                'name' => 'Books',
                'priority' => 2,
                'is_active' => true,
                'is_system' => false
            ],
        ]);
    }
}
