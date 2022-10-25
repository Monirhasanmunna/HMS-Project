<?php

namespace Database\Seeders;

use App\Models\Quantity;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class QuantitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Quantity::updateOrCreate([
            'name'  => '১+২+৩'
        ]);

        Quantity::updateOrCreate([
            'name'  => '১৪+০+২৪'
        ]);

        Quantity::updateOrCreate([
            'name'  => '২৬'
        ]);

        Quantity::updateOrCreate([
            'name'  => '১০'
        ]);
    }
}
