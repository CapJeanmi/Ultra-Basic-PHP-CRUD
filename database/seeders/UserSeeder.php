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

        $admin = [
            'name' => 'Administrador General',
            'email' => 'admin@admin.com',
            'password' => bcrypt('123456789'),
            'is_admin' => true,
        ];

        if(User::where('email', $admin['email'])->count() == 0) {
            User::create($admin);
        }

        $client = [
            'name' => 'Cliente',
            'email' => 'client@client.com',
            'password' => bcrypt('123456789')
        ];

        if(User::where('email', $client['email'])->count() == 0) {
            User::create($client);
        }

        $client2 = [
            'name' => 'Cliente Dos',
            'email' => 'client2@client.com',
            'password' => bcrypt('123456789')
        ];

        if(User::where('email', $client2['email'])->count() == 0) {
            User::create($client2);
        }
    }
}