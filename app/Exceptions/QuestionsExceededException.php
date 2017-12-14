<?php

namespace App\Exceptions;

class QuestionsExceededException extends \Exception
{
	public function __constructor( $message ){
		
		parent::__constructor( $message );
	}

    

}
