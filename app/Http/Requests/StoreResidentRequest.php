<?php

namespace App\Http\Requests;

use App\Models\Resident;
use Illuminate\Foundation\Http\FormRequest;

class StoreResidentRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            "first_name"=> "required|string|min:5",
            "last_name"=> "required|string|min:5",
            "email"=> "unique:".Resident::TABLENAME.",".Resident::FIELD_EMAIL,
            Resident::FIELD_CONTACT_NUMBER=> "unique:".Resident::TABLENAME.",".Resident::FIELD_EMAIL,
        ];
    }
}
