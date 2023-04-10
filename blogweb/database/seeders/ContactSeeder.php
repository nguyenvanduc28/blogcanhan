<?php

namespace Database\Seeders;

use App\Models\Contact;
use Illuminate\Database\Seeder;

class ContactSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Contact::firstOrCreate([
            'config_key' => 'facebook',
            'congif_value' => '	https://www.facebook.com'
        ]);
        Contact::firstOrCreate([
            'config_key' => 'youtube',
            'congif_value' => 'https://www.youtube.com/'
        ]);
        Contact::firstOrCreate([
            'config_key' => 'phone',
            'congif_value' => '0123456789'
        ]);
        Contact::firstOrCreate([
            'config_key' => 'instagram',
            'congif_value' => 'https://www.instagram.com/'
        ]);
    }
}
