<?php
namespace App\Exceptions;

class AnswersExceededException extends \Exception{
	public function __constructor( $message ){
		parent::__constructor( $message );
	}
}