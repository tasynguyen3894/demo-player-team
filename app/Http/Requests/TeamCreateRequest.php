<?php

namespace App\Http\Requests;

use App\Http\Requests\BaseRequest;

class TeamCreateRequest extends BaseRequest
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

    

    public function validationData() {
        return $this->only([
            'id',
            'name',
            'country_id',
            'status'
        ]);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required',
            'country_id' => 'required|exists:country,id'
        ];
    }
}
