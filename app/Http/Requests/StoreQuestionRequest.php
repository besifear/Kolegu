<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Services\QuestionService;

class StoreQuestionRequest extends FormRequest
{

    private $questionService;

    public function __construct(QuestionService $questionService){
        $this->questionService = $questionService;
    }

    
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return $this->questionService->authorizedToAskQuestion();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
                'title' => 'required | max:50',
                'content'  => 'max:500'
          ];
    }
}
