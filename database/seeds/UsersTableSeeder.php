<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::insert([
            'name' => 'Sylvain',
            'email' => 'sylvain@coucounco.ch',
            'email_verified_at' => now(),
            'password' => \Illuminate\Support\Facades\Hash::make('pass123$'), // password
            'remember_token' => Str::random(10),
            'api_token' => '4KTODlM6npusK202lC0sXSmL2cnRkDAzuOLjnRXO3dotLPpATlIUfsyUkUh9IocIQumv25hXn4wSMvZe'
        ]);
        User::insert([
            'name' => 'Andreas',
            'email' => 'andreas@coucounco.ch',
            'email_verified_at' => now(),
            'password' => \Illuminate\Support\Facades\Hash::make('pass123$'), // password
            'remember_token' => Str::random(10),
            'api_token' => 'ojoobYA7MN1p846XNLc249TlI8mSRPLhzgjgDe4iA7UUAZLBuNB0c1eiN4ok4QZeMkUjKufBZqlmeQF6'
        ]);
    }
}
