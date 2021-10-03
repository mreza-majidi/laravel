<?php

namespace Database\Seeders;

use App\Models\WalletType;
use Illuminate\Database\Seeder;

class WalletTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $walletTypes = [
            ['title' => 'ریال'],
            ['title' => 'دلار'],
            ['title' => 'لیر ترکیه'],
        ];
        foreach ($walletTypes as $walletType)
            WalletType::create(
                [
                    'title' => $walletType['title'],
                ]
            );
    }
}
