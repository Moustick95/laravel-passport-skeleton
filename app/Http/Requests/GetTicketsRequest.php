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
            'id' => 'optional|array',
            'title' => 'optional|array',
            'description' => 'optional|array',
            'owner' => 'optional|array',
            'assigned' => 'optional|array',
            'first_assigned' => 'optional|array',
            'last_assigned' => 'optional|array',
            'priority' => 'optional|array',
            'state' => 'optional|array',
            'deleted_at' => 'optional|array',
            'assigned.id' => 'optional|integer',
            'owner.id' => 'optional|integer',
            'priority.id' => 'optional|integer',
            'state.id' => 'optional|integer'
        ];
    }
}
