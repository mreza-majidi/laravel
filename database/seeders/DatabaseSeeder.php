<?php

namespace Database\Seeders;

use App\Models\Announcement;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();\
        $this->call(
            [
                RoleSeeder::class,
                UserSeeder::class,
                DocumentTypeSeeder::class,
                DocumentSeeder::class,
                ExternalAccountSeeder::class,
                ProfileSeeder::class,
                WalletTypeSeeder::class,
                 WalletSeeder::class,
                RequestSeeder::class,
                ProfileSeeder::class,
                AnnouncementSeeder::class,
            ]);
    }
}
