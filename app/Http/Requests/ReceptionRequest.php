<?php

namespace App\Http\Requests;
use Illuminate\Foundation\Http\FormRequest;

class ReceptionRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'object_uuid'=>'alpha_num|required|exists:facilities,uuid',
            'card_uuid'=>'alpha_num|required|exists:cards,card_uuid'
        ];
    }

    public function messages()
    {
        return [
            'required' => 'The :attribute field is required.',
            'alpha_num' => 'The :attribute field is not alphanumeric.',
            'exists'  => 'The :attribute does not existasds in Database.'
        ];
    }

    public function validated()
    {
        $data = parent::validated();
        return ['card_uuid'  => $data['card_uuid'], 'object_uuid' => $data['object_uuid']];
    }
}
