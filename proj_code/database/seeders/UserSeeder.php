<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $admin = User::create([
            'first_name' => 'Super',
            'last_name' => 'Admin',
            'email' => 'admin@accountspos.com',
            'password' => Hash::make('password'),
            'created_at' => date("Y-m-d H:i:s"),
        ]);

        $purchaser = User::create([
            'first_name' => 'POS',
            'last_name' => 'purchaser',
            'email' => 'purchaser@accountspos.com',
            'password' => Hash::make('password'),
            'created_at' => date("Y-m-d H:i:s"),
        ]);

        $admin->attachRole('admin');
        $purchaser->attachRole('purchaser');
    }
}
