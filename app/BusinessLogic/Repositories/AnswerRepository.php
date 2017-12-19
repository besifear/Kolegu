<?php
namespace app\BusinessLogic\Repositories;

use Auth;
use App\Answer;
use App\BusinessLogic\Interfaces\AnswerInterface;

class AnswerRepository implements AnswerInterface{

    public function all($columns = [ '*' ]){
    	return Answer::all( $columns );	
    }

    public function find($id, $columns = [ '*' ] ){
		return Answer::find( $id, $columns );
    }

    public function orderBy($column, $direction = 'asc' ){
    	return Answer::orderBy( $column, $direction );
    }

    public function create($body){
    	return Answer::create( $body ); 
    }

    public function delete($id){
    	Answer::find( $id )->delete( $id );
    }

    public function ownsAnswer($id){
    	return Answer::where([
    		'id' 		=> $id,
    		'user_id' 	=> Auth::id() 		
    	])->exists();	
    }

    public function update($id, $attributes){
    	Answer::find( $id )->update( $attributes );
    }

    public function where($column,$operator = null ,$value = null ,$boolean = 'and' ){
    	Answer::find( $column, $operator, $value, $boolean );
    }
    
    public function getNthAnswer( $nthQuestion ){
    	return Answer::where( 'user_id', Auth::id() )
    		->orderBy( 'id', 'desc' )->skip( $nthQuestion -1 )->first();
    }
}
