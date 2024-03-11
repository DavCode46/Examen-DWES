<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class VehicleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('vehicles')->insert([
            [
                'make' => 'Toyota',
                'model' => 'Camry',
                'photo' => 'toyota_camry.jpg',
                'price' => 25000.00,
                'user_id' => 1,
                'category_id' => 1,
            ],
            [
                'make' => 'Honda',
                'model' => 'Civic',
                'photo' => 'honda_civic.jpg',
                'price' => 22000.00,
                'user_id' => 2,
                'category_id' => 2,
            ],
            [
                'make' => 'Ford',
                'model' => 'Fusion',
                'photo' => 'ford_fusion.jpg',
                'price' => 27000.00,
                'user_id' => 3,
                'category_id' => 1,
            ],
            [
                'make' => 'Chevrolet',
                'model' => 'Malibu',
                'photo' => 'chevrolet_malibu.jpg',
                'price' => 26000.00,
                'user_id' => 4,
                'category_id' => 1,
            ],
            [
                'make' => 'Nissan',
                'model' => 'Altima',
                'photo' => 'nissan_altima.jpg',
                'price' => 24000.00,
                'user_id' => 1,
                'category_id' => 1,
            ],
            [
                'make' => 'BMW',
                'model' => '3 Series',
                'photo' => 'bmw_3_series.jpg',
                'price' => 35000.00,
                'user_id' => 2,
                'category_id' => 1,
            ],
            [
                'make' => 'Mercedes-Benz',
                'model' => 'C-Class',
                'photo' => 'mercedes_c_class.jpg',
                'price' => 38000.00,
                'user_id' => 3,
                'category_id' => 1,
            ],
            [
                'make' => 'Audi',
                'model' => 'A4',
                'photo' => 'audi_a4.jpg',
                'price' => 40000.00,
                'user_id' => 1,
                'category_id' => 1,
            ],
            [
                'make' => 'Tesla',
                'model' => 'Model 3',
                'photo' => 'tesla_model_3.jpg',
                'price' => 45000.00,
                'user_id' => 2,
                'category_id' => 1,
            ],
            [
                'make' => 'Subaru',
                'model' => 'Outback',
                'photo' => 'subaru_outback.jpg',
                'price' => 28000.00,
                'user_id' => 3,
                'category_id' => 1,
            ],
        ]);
        
    }
}
