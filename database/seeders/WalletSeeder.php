<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Wallet;
use App\Models\WalletType;
use Illuminate\Database\Seeder;

class WalletSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = User::query()->pluck('id')->toArray();

        $walletTypes = WalletType::query()->pluck('id')->toArray();
        foreach ($users as $user) {
            foreach ($walletTypes as $item) {
                Wallet::factory()->count(1)->create(['user_id' => $user, 'wallet_type_id' => $item]);
            }
        }
    }
}
