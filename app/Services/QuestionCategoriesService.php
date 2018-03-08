<?php
	
	namespace App\Services;

	use App\BusinessLogic\Interfaces\QuestionCategoriesInterface;
	
	class QuestionCategoriesService{
		public $questionCategoriesInterface; 		
		
		function __construct(QuestionCategoriesInterface $questionCategoriesRepository){
			$this->questionCategoriesInterface = $questionCategoriesRepository;
		} 

		public function create( $questionId, $categoriesList ){
			//TODO: Zgjidhje me adekuate per evitimin e shtimit te me shume se 5 kategorive per nje pyetje
			$categoriesList = array_slice( $categoriesList, 0, 5, true );	
			foreach( $categoriesList as $categoryId ){
				$body = [
					'question_id' => $questionId,
					'category_id' => $categoryId
				];
				$this->questionCategoriesInterface->create( $body );
			}	
		}	
	}
	
?>	