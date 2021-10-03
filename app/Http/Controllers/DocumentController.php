<?php

namespace App\Http\Controllers;

use App\Http\Requests\DocumentRequest;
use App\Models\Document;
use App\Services\DocumentService;

class DocumentController extends Controller
{

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $user      = auth()->user();
        $documents = \documentService()->index(['user_id' => $user->id]);

        return view('user.user-profile.documents', compact('documents', 'user'));
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        $documents     = Document::query()->whereUserId(auth()->user()->id)->get();
        $documentTypes = \documentService()->documentType();

        return view('user.user-profile.upload', compact('documentTypes', 'documents'));
    }

    /**
     * @param DocumentRequest $request
     *
     * @return array|\Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\Translation\Translator|\Illuminate\Http\JsonResponse|string
     */
    public function upload(DocumentRequest $request)
    {
        $parameters = [
            'file'          => $request->getFile(),
            'has_file'      => $request->isFile(),
            'document_type' => $request->getDocumentType(),
            'user_id'       => auth()->user()->id,
        ];

        $document = documentService()->uploadDocument($parameters);

        if ($document == DocumentService::FAIL_UPLOAD) {
            return redirect()->route('user.user-profile.upload')->with('error', __('Fail Upload'));
        }
        $message = __('messages.document_message.success');

        return redirect()->route('website.web.user.document.index')->with('message', $message);
    }
}
