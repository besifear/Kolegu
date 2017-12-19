<?php

namespace App\Http\Requests;

use App\Services\AnswerService;
use Illuminate\Foundation\Http\FormRequest;

class StoreAnswerRequest extends FormRequest
{
    private $answerService;

    public function __construct( AnswerService $answerService ){
        $this->answerService = $answerService;
    }

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return $this->answerService->authorizedToGiveAnswer();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'content' => 'required | max:500| unique:answers'            
        ];
    }
}
