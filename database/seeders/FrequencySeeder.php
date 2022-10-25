<?php

namespace Database\Seeders;

use App\Models\Frequency;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FrequencySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Frequency::updateOrCreate([
            'name'  => 'শুক্রবার বাদে প্রতিদিন'
        ]);

        Frequency::updateOrCreate([
            'name'  => 'মলদ্বারে'
        ]);

        Frequency::updateOrCreate([
            'name'  => 'মঙ্গল ও বুধবার বাদে প্রতিদিন'
        ]);

        Frequency::updateOrCreate([
            'name'  => 'প্রতি মঙ্গল ও বুধবার'
        ]);
    }
}
