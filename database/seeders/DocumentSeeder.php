<?php

namespace Database\Seeders;

use App\Models\Document;
use App\Models\DocumentType;
use App\Models\User;
use Illuminate\Database\Seeder;

class DocumentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users         = User::query()->pluck('id')->toArray();
        $documentTypes = DocumentType::query()->pluck('id')->toArray();

        foreach ($users as $item) {
            foreach ($documentTypes as $documentTypeItem)
                Document::factory()->count(5)->create(
                    [
                        'user_id'          => $item,
                        'document_type_id' => $documentTypeItem,
                    ])
                ;
        }
    }
}
