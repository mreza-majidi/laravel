<?php

namespace Database\Seeders;

use App\Constants\RoleConstants;
use App\Models\Role;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach (RoleConstants::$roles as $roleName) {
            $role = new Role();
            $role->name = $roleName;
            $role->description = "$roleName role.";
            $role->save();
        }
    }
}
