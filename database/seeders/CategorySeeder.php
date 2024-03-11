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
            ['category' => 'Cars'],
            ['category' => 'Trucks'],
            ['category' => 'SUVs'],
            ['category' => 'Vans'],
            ['category' => 'Motorcycles'],
            ['category' => 'Boats'],
            ['category' => 'RVs'],
            ['category' => 'Trailers'],
        ]);
    }
}
