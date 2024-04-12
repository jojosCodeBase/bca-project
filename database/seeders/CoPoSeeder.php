<?php

namespace Database\Seeders;

use App\Models\CoPoRelation;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CoPoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 1; $i <= 5; $i++) {
            CoPoRelation::create([
                'batch' => '2021',
                'cid' => 'CA2313',
                'CO' => 'CO'.$i,
                'PO1' => rand(1, 3),
                'PO2' => rand(1, 3),
                'PO3' => null,
                'PO4' => rand(1, 3),
                'PO5' => null,
                'PO6' => rand(1, 3),
                'PO7' => null, // Leave some POs empty
                'PO8' => rand(1, 3),
                'PO9' => rand(1, 3),
                'PO10' => rand(1, 3),
                'PO11' => rand(1, 3),
                'PO12' => null,
            ]);
        }
    }
}
