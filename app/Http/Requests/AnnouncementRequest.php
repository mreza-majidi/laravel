<?php

namespace App\Http\Requests;

use App\Constants\AnnouncementConstants;
use Illuminate\Foundation\Http\FormRequest;

class AnnouncementRequest extends FormRequest
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
        $priorities = implode(',', AnnouncementConstants::PRIORITIES);

        return [
            'priority'    => 'required|in:'.$priorities,
            'begin'       => 'required|date',
            'end'         => 'required|date',
            'is_active'   => 'required|boolean',
            'description' => 'required|string',
        ];
    }

    /**
     * @return mixed
     */
    public function getPriority()
    {
        return $this->get('priority');
    }

    /**
     * @return mixed
     */
    public function getBegin()
    {
        return $this->get('begin');
    }

    /**
     * @return mixed
     */
    public function getEnd()
    {
        return $this->get('end');
    }

    /**
     * @return mixed
     */
    public function getIsActive()
    {
        return $this->get('is_active');
    }

    /**
     * @return mixed
     */
    public function getText()
    {
        return $this->get('description');
    }
}
