<?php

namespace Modules\Auth\Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Modules\Auth\Models\Role;

class UserRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $userRolePairs = [
            ['email' => 'admin@example.com', 'role_name' => 'admin'],
            ['email' => 'vendor@example.com', 'role_name' => 'vendor'],
            ['email' => 'client@example.com', 'role_name' => 'client'],
        ];

        foreach ($userRolePairs as $pair) {
            $user = User::where('email', $pair['email'])->first();
            $role = Role::where('role_name', $pair['role_name'])->first();

            if ($user && $role) {
                $user->roles()->attach($role->id);
            } else {
                if (!$user) {
                    $this->command->error("User with email {$pair['email']} not found.");
                }
                if (!$role) {
                    $this->command->error("Role with name {$pair['role_name']} not found.");
                }
            }
        }
    }
}
