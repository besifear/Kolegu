<?php

namespace App\Services;


use App\BusinessLogic\Interfaces\QuestionInterface;
use App\BusinessLogic\Interfaces\CategoryInterface;
use App\Exceptions\QuestionsExceededException;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\Question;
use DateTimeZone;

class QuestionService{

    const HOURLIMIT = 10;
    const NTHQUESTION = 10;


    public $questionInterface;
    public $categoryInterface;

    public function __construct(QuestionInterface $questionRepository, CategoryInterface $categoryRepository){
        $this->questionInterface = $questionRepository;
        $this->categoryInterface = $categoryRepository;
    }

    public function topQuestion(){
        // if(Auth::check() && ! Auth::user()->selectedCategories->isEmpty()){
        //     $userCategories = Auth::user()->selectedCategories;
        // }else{
        //     $userCategories = $this->categoryInterface->all();
        // }

        // $topQuestions = (new Question())->newQuery();
        // $firstWhere = true;

        // foreach($userCategories as $category)
        // {
        //     if ($firstWhere)
        //     {
        //         $topQuestions->where([
        //             ['category_id', $category->id],
        //             ['votes', Question::where('category_id', $category->id)->max('votes')]
        //         ]);
        //         $firstWhere = false;
        //     }else{
        //         $topQuestions->orWhere([
        //             ['category_id', $category->id],
        //             ['votes', Question::where('category_id', $category->id)->max('votes')]
        //         ]);
        //     }
        // }

        return Question::inRandomOrder()->take(5)->get();
    }

    public function filter($orderBy){
        switch($orderBy)
        {
            case "Newest":
                $questions = $this->questionInterface
                    ->orderBy('created_at', 'desc')->paginate(5);
                break;
            case "A-Z":
                $questions = $this->questionInterface
                    ->orderBy('title')->paginate(5);
                break;
            case "Z-A":
                $questions = $this->questionInterface
                    ->orderBy('title', 'desc')->paginate(5);
                break;
        }
        return $questions;
    }

    public function all($columns = ['*']){
        return $this->questionInterface->all($columns);
    }

    public function delete($id){
        $this->questionInterface->delete($id);
    }

    public function ownsQuestion($id){
        return $this->questionInterface->ownsQuestion($id);
    }

    public function update($id, $attributes){
        unset($attributes['_token']);
        unset($attributes['_method']);
        if($attributes['answer_id']=='null'){
            $attributes['answer_id']=null;
        }
        return $this->questionInterface->update($id,$attributes);
    }

    public function authorizedToAskQuestion(){
        return $this->withinQuestionLimit();
    }

    public function getCurrentTime(){
        return Carbon::now(new DateTimeZone('Europe/Monaco'));
    }

    private function withinQuestionLimit(){
        $question = $this->questionInterface->getNthQuestion( self::NTHQUESTION );
        if ( $question != null ){

            $nthQuestionCreatedDate = $question->created_at;
            $allowedTime = $this->getCurrentTime()->subHours( self::HOURLIMIT );

            if ( $nthQuestionCreatedDate->gt($allowedTime) ){
                $this->raiseQuestionsExceededException($nthQuestionCreatedDate, $allowedTime);
            }
        }

        return true;
    }

    private function raiseQuestionsExceededException( $nthQuestionCreatedDate, $allowedTime ){
        $hours = $nthQuestionCreatedDate->diffInHours( $allowedTime );
        $minutes = ( $nthQuestionCreatedDate->diffInMinutes($allowedTime) % 60 );
        $message = "Keni tejkaluar numrin e pyetjeve te lejuara! Pytjen e radhes mund ta shtroni pas $hours orëve dhe $minutes minutave!";
        throw new QuestionsExceededException( $message );
    }

}