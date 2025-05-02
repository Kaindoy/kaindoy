<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Role;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Ensure roles exist
        Role::updateOrCreate(['id' => 1], ['name' => 'Admin']);
        Role::updateOrCreate(['id' => 2], ['name' => 'User']);

        // Begin a transaction to ensure atomic operation
        DB::beginTransaction();

        try {
            // Create the users
            User::create([
                'name' => 'Admin',
                'email' => 'admin@gmail.com',
                'password' => Hash::make('password123'),
                'role_id' => 1,  // Role ID 1 is 'Admin'
            ]);

            User::create([
                'name' => 'User',
                'email' => 'user@gmail.com',
                'password' => Hash::make('password'),
                'role_id' => 2,  // Role ID 2 is 'User'
            ]);

            // Commit the transaction if all goes well
            DB::commit();
        } catch (\Exception $e) {
            // Rollback the transaction in case of error
            DB::rollBack();
            throw $e; // Or log the error if necessary
        }
    }
}
