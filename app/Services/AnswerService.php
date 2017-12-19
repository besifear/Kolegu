<?php
namespace App\Services;

use DateTimeZone;
use Carbon\Carbon;
use App\Exceptions\AnswersExceededException;
use App\BusinessLogic\Interfaces\AnswerInterface;

class AnswerService{

	const NTHANSWER = 10;
	const HOURLIMIT = 10;

    public $answerInterface;

    /**
     * Creates an instance of the AnswerService which holds the Business Logic of this application.
     * 
     * Creates an instance of the AnswerService which uses the methods of the AnswerInterface to manipulate with answers.
     * 
     * @param AnswerInterface | Is an interface which holds all the methods which can be used to fetch and manipulate with Answer Instances.
     */
    public function __construct(AnswerInterface $answerRepository){
    	$this->answerInterface = $answerRepository;
    }

    /**
     * Creates an Answer that belongs to a Question.
     * 
     * Calls the Create Method of the AnswerInterface which further manages the creation process of the Answer.
     * @param  array $body | Is an array which holds all the attributes of the Answer which will be created.
     * @return App\Answer  | If the execution goes correctly then the Answer instance which has been created will be returned.
     */
    public function storeAnswer( $body ){
        return $this->answerInterface->create( $body );
    }


   	public function authorizedToGiveAnswer(){
   		return $this->withinAnswerLimit();
   	}


    public function getCurrentTime(){
        return Carbon::now(new DateTimeZone('Europe/Monaco'));
    }

   	private function withinAnswerLimit(){
   		$answer = $this->answerInterface->getNthAnswer( self::NTHANSWER );
   		if ( $answer != null ) {
   			$nthAnswerCreatedDate = $answer->created_at;
   			$allowedTime = $this->getCurrentTime()->subHours( self::HOURLIMIT );		
   			
   			if ( $nthAnswerCreatedDate->gt( $allowedTime ) ){
   				$this->raiseAnswersExceededException( $nthAnswerCreatedDate, $allowedTime );
   			}
   		}	

   		return true;
   	}

   	private function raiseAnswersExceededException( $nthAnswerCreatedDate, $allowedTime ){
        $hours = $nthAnswerCreatedDate->diffInHours( $allowedTime );
        $minutes = ( $nthAnswerCreatedDate->diffInMinutes($allowedTime) % 60 );
        $message = "Keni tejkaluar numrin e pergjigjjeve te lejuara! Pergjigjjen e radhes mund ta shtroni pas $hours orëve dhe $minutes minutave!";
        throw new AnswersExceededException( $message );
   	}
}