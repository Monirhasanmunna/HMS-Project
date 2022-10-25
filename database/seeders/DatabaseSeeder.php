<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UserSeeder::class);
        $this->call(DoctorSeeder::class);
        $this->call(AssistantSeeder::class);
        $this->call(DiseaseSeeder::class);
        $this->call(BloodSeeder::class);
        $this->call(FrequencySeeder::class);
        $this->call(QuantitySeeder::class);
        $this->call(QuantityTypeSeeder::class);
        $this->call(EatingTimeSeeder::class);
        $this->call(AdviceSeeder::class);
    }
}
