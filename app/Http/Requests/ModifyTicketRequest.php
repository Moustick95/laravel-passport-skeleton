<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Ticket;

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
        $id = $this->route('id');
        $owner = DB::table("tickets")->select("owner")->where("id","=",$id)->get();
        var_dump($user["id"]);
        var_dump($owner["id"]);
        return $user["id"] == $owner["id"];
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
