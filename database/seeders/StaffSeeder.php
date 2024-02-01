<?php

namespace Database\Seeders;

use App\Models\Staff;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class StaffSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Staff::create([
            'name' => 'Staff',
            'email' => 'staff@gmail.com',
            'username' => 'staff',
            'password' => Hash::make('12345678'),
        ]);
    }
}
