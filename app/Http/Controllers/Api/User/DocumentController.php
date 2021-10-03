<?php

namespace App\Http\Controllers\Api\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\DocumentRequest;
use App\Models\Document;
use App\Models\DocumentType;
use App\Services\DocumentService;
use Database\Seeders\DocumentSeeder;

class DocumentController extends Controller
{
    /**
     * @param DocumentRequest $request
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function uploadDocument(DocumentRequest $request): \Illuminate\Http\JsonResponse
    {
        $parameters = [
            'file'          => $request->file(),
            'document_file' => $request->file('document'),
            'document_type' => $request->get('document_type'),
            'user_id'       => auth('api')->id(),
        ];

        $document = documentService()->uploadDocument($parameters);

        if ($document == DocumentService::FAIL_UPLOAD) {
            return $this->error(__('messages.document_message.failed'), 401);
        }

        return $this->success($document, __('messages.document_message.success'));
    }
}
