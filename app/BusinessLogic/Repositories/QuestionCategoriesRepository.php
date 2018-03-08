<?php
	namespace App\BusinessLogic\Repositories;

	use App\QuestionCategories;
	use App\BusinessLogic\Interfaces\QuestionCategoriesInterface;

	class QuestionCategoriesRepository implements QuestionCategoriesInterface{
		public function create( $body ){
			QuestionCategories::create( $body );
		}	
	}
?>