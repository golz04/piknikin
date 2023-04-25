<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new User();
        $user->name = 'Cila Admin';
        $user->email = 'admin@mail.com';
        $user->email_verified_at = now();
        $user->password = bcrypt('admin123');
        $user->remember_token = \Str::random(60);
        $user->save();

        $user = new User();
        $user->name = 'Haidar Admin';
        $user->email = 'haidar@mail.com';
        $user->email_verified_at = now();
        $user->password = bcrypt('haidar123');
        $user->remember_token = \Str::random(60);
        $user->save();
    }
}
