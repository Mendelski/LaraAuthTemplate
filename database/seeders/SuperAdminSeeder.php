<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class SuperAdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Creating Super Admin User
        $superAdmin = User::create([
            'name' => 'Erick Mendelski',
            'email' => 'erick.mendelski@gmail.com',
            'password' => Hash::make('laravel123')
        ]);
        $superAdmin->assignRole('Super Admin');

        // Creating Admin User
        $admin = User::create([
            'name' => 'admin user',
            'email' => 'admin@email.com',
            'password' => Hash::make('laravel123')
        ]);
        $admin->assignRole('Admin');

        // Creating Product Manager User
        $productManager = User::create([
            'name' => 'product Manager User',
            'email' => 'pmuser@email.com',
            'password' => Hash::make('laravel123')
        ]);
        $productManager->assignRole('Product Manager');
    }
}
