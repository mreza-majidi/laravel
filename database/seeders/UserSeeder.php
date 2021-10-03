<?php

namespace Database\Seeders;

use App\Constants\RoleConstants;
use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $superAdminUser = User::factory()->create(['email' => 'admin@diaweb.ir', 'password' => bcrypt('password')]);
        /** @var Role $superAdminRole */
        $superAdminRole = Role::query()->where('name', RoleConstants::SUPER_ADMIN)->first();
        $superAdminUser->attachRole($superAdminRole);

        User::factory()->count(5)->create();
    }
}
