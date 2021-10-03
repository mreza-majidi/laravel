<?php

namespace App\Http\Requests;

use App\Models\DocumentType;
use Illuminate\Foundation\Http\FormRequest;

class DocumentRequest extends FormRequest
{


    /**
     * Determine if the user is authorized to make this request.
     *
     * @return boolean
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'file'          => 'required|file|mimes:jpeg,jpg,png|max:2048',
            'document_type' => 'required|exists:document_types,uuid',
        ];
    }


    /**
     * @return array|\Illuminate\Http\UploadedFile|\Illuminate\Http\UploadedFile[]|null
     */
    public function getFile()
    {
        return $this->file('file');
    }

    /**
     * @return mixed
     */
    public function getDocumentType()
    {
        return $this->get('document_type');
    }

    /**
     * @return boolean
     */
    public function isFile(): bool
    {
        return $this->hasFile('file');
    }
}
