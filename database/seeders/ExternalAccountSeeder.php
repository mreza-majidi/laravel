<?php

namespace Database\Seeders;

use App\Models\ExternalAccount;
use App\Models\User;
use Illuminate\Database\Seeder;

class ExternalAccountSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = User::query()->pluck('id')->toArray();
        foreach ($users as $item) {
            ExternalAccount::factory()->count(5)->create(['user_id' => $item]);
        }
    }
}
