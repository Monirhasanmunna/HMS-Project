<?php

namespace Database\Seeders;

use App\Models\Eatingtime;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EatingTimeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Eatingtime::updateOrCreate([
            'name'  => 'উরুর মাংশপেশীতে দিবেন'
        ]);

        Eatingtime::updateOrCreate([
            'name'  => 'উভয় চোখে দিবেন'
        ]);

        Eatingtime::updateOrCreate([
            'name'  => 'খাবারের ঠিক আগে'
        ]);

        Eatingtime::updateOrCreate([
            'name'  => 'খাবারের সাথে'
        ]);

        Eatingtime::updateOrCreate([
            'name'  => '১ দিন পরপর'
        ]);

        Eatingtime::updateOrCreate([
            'name'  => 'মাসিকের রাস্তায় লাগাবেন'
        ]);

        Eatingtime::updateOrCreate([
            'name'  => '১ম ও ৭ম দিন'
        ]);
    }
}
