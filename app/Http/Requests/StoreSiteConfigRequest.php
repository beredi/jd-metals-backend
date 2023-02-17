<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreSiteConfigRequest extends FormRequest
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
        $rules = [
            "name" => "required",
        ];

        if ($this->hasFile("logo")) {
            $rules["logo"] = "image";
        }

        return $rules;
    }

    public function validateResolved()
    {
        if (!$this->hasFile("logo")) {
            $this->request->set("logo", null);
        }

        parent::validateResolved();
    }
}
