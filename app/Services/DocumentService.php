<?php

namespace App\Services;

use App\Models\Document;
use App\Models\DocumentType;
use App\Models\User;

/**
 * Class DocumentService
 *
 * @package App\Services
 */
class DocumentService extends BaseService
{
    /**
     * @param array $parameter
     *
     * @return \Illuminate\Database\Eloquent\Builder[]|\Illuminate\Database\Eloquent\Collection
     */
    public function index(array $parameter)
    {
        return Document::query()->where('user_id', $parameter['user_id'])->get();
    }

    /**
     * @return \Illuminate\Database\Eloquent\Builder[]|\Illuminate\Database\Eloquent\Collection
     */
    public function documentType()
    {
        return DocumentType::query()->get();
    }

    const FAIL_UPLOAD = 'fail_upload';

    /**
     * @param array $parameters
     *
     * @return Document|string
     *
     * @throws \Exception
     */
    public function uploadDocument(array $parameters)
    {
        if (!$parameters['file']) {
            return self::FAIL_UPLOAD;
        }

        /** @var DocumentType $documentType */
        $documentType = DocumentType::findByUuid($parameters['document_type']);
        /** @var User $user */
        $user = User::query()->find($parameters['user_id']);
        /** @var Document $previousDocument */
        $previousDocument = $user->documents()->where('document_type_id', '=', $documentType->getId())->first();
        if ($previousDocument) {
            $previousDocument->delete();
        }

        $document                   = new Document();
        $document->document_type_id = $documentType->getId();
        $document->user_id          = $user->getId();
        $document->save();

        uploadService()->uploadFileWithOwner($parameters['file'], $document->refresh());

        return $document;
    }

    /**
     * @param array $parameter
     *
     * @return integer
     */
    public function completedScore(array $parameter): int
    {
        $documentTypesCount = DocumentType::query()->where('required', true)->count('id');

        $userDocuments = Document::query()->where('user_id', $parameter['user_id'])->pluck('is_verified')->toArray();

        if ($documentTypesCount) {
            $eachDocumentScore = (100 / $documentTypesCount);
        }

        $score = 0;
        foreach ($userDocuments as $userDocument) {
            if ($userDocument) {
                $score += $eachDocumentScore;
            }
        }

        return $score;
    }
}
