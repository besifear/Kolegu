<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VoteAnswerRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return ( $this->vote == 0 || $this->vote == 1 );
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
