<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ModifyTicketRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        $user = $this->user();
        $id = $this->route('ticketId');
        //$ticket =
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
            'title' => 'optional|string|max:255',
            'description' => 'optional|string|max:255',
            'owner' => 'optional|integer',
            'assigned' => 'optional|integer',
            'priority' => 'optional|integer',
            'state' => 'optional|integer'
        ];
    }
}
