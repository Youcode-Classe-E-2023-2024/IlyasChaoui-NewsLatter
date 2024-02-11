<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class AdminRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $userEmail = 'admin@gmail.com';

        $user = User::where('email', $userEmail)->first();

        if ($user) {
            $adminRole = Role::findByName('admin');

            $user->assignRole($adminRole);

            echo "Admin role assigned to user: " . $user->email . "\n";

        } else {

            echo "User with email {$userEmail} not found.\n";
        }
    }
}
