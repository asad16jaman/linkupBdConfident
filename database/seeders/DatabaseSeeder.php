<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use App\Models\Company;
use App\Models\Mission;
use App\Models\WhyChooseUs;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        User::create([
            'name'     => 'Admin',
            'username' => 'admin',
            'email'    => 'admin@gmail.com',
            'password' => Hash::make(1),

        ]);
        Company::create([
            'company_name' => 'Company Name.',
            'phone'        => '01700000000',
            'address'      => 'The Address',
            'email'        => 'example@gmail.com',
        ]);

        Mission::create([
            'mission'      => 'This is Mission',
            'vision'       => 'This is Vision',
            'values'       => 'This is Values',
        ]);

        WhyChooseUs::create([
            'title'            => 'This is title',
            'description'       => 'This is Description',
        ]);
    }
}
