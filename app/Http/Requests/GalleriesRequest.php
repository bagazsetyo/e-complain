<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GalleriesRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        //validasi tabel galleries
        return [
            'photo' => 'required|image',
            'is_default' => 'boolean'
        ];
    }
}
