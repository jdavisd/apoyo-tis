<?php

namespace Database\Seeders;

use App\Models\Adviser;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        User::create(['name'=>'admin','email'=>'admin@admin.com','password'=>Hash::make('admin@admin.com')])->assignRole('Admin');
        User::create(['name'=>'consultor','email'=>'consultor@consultor.com','password'=>Hash::make('consultor@consultor.com')])->assignRole('Consultor');
        Adviser::create(['name'=>'adviser']);

    }
}
