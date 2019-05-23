<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GetTicketsRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return !!$this->user();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'users' => 'optional|array',
            'before' => 'optional|date',
            'after' => 'optional|date',
            'creators' => 'optional|array',
            'assigned_to' => 'optional|array',
            'priorities' => 'optional|array',
            'states' => 'optional|array'
        ];
    }
}
