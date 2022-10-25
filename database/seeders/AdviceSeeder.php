<?php

namespace Database\Seeders;

use App\Models\Advice;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdviceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Advice::updateOrCreate([
            'name'  => 'যে সমস্ত খাবার খেলে চুলকানি হয় (যেমন- হাঁসের ডিম, গরুর গোশত, বেগুন ইত্যাদি), সেগুলো পরিহার করবেন।'
        ]);

        Advice::updateOrCreate([
            'name'  => 'ব্যাক্তিগত পরিষ্কার পরিচ্ছন্নতা ও স্বাস্থ্যবিধি মেনে চলবেন।'
        ]);

        Advice::updateOrCreate([
            'name'  => 'আজ রাতে ও ৭ দিন পর রাতে।'
        ]);

        Advice::updateOrCreate([
            'name'  => 'ঠান্ডা পানি,আইসক্রিম সহ সকল প্রকার শীতল খাবার থেকে বিরত থাকবেন।'
        ]);

        Advice::updateOrCreate([
            'name'  => 'শ্বাস-প্রশ্বাসের ব্যায়াম করবেন।'
        ]);
    }
}
