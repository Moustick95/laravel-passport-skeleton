<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DestroyCommentRequest extends FormRequest
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
        $author = DB::table("comments")->select("owner")->where("id","=",$id)->get();
        return ($user["id"] == $owner["id"]||$user["id"] == $author["id"]);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            //
        ];
    }
}
