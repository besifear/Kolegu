<?php

namespace App\Http\Requests;

use App\Service\QuestionService;
use Illuminate\Foundation\Http\FormRequest;

class DeleteQuestionRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(QuestionService $questionService)
    {
        return $questionService->ownsQuestion($this->id);
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
