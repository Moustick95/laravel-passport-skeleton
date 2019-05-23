<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateCommentRequest extends FormRequest
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
        $owner_assigned = DB::table("tickets")->select("owner", "assigned")->where("id","=",$id)->get();
        return ($user["id"] == $owner_assigned["owner"]["id"]||$user["id"] == $owner_assigned["assigned"]["id"]);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'owner' => 'required|integer',
            'content' => 'required|string|max:255',
        ];
    }
}
