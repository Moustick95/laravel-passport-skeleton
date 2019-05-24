<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\DB;
use App\Ticket;

class ModifyTicketStateRequest extends FormRequest
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
        $assigned = DB::table("tickets")->select("assigned")->where("id","=",$id)->get();
        return $user["id"] == $assigned["id"];
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'state' => 'required|integer'
        ];
    }
}
