<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Role;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        // Insert roles if they don't exist already
        Role::updateOrCreate(['id' => 1], ['name' => 'Admin', 'url' => '/admin']);
        Role::updateOrCreate(['id' => 2], ['name' => 'User', 'url' => '/user']);
    }
}