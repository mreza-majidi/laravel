<?php

namespace Database\Seeders;

use App\Models\Request;
use App\Models\User;
use App\Models\WalletType;
use Illuminate\Database\Seeder;

class RequestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users       = User::query()->pluck('id')->toArray();
                foreach ($users as $user)
                    Request::factory()->count(5)->create(['user_id' => $user]);
        }
}
