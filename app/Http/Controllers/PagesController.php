<?php

namespace App\Http\Controllers;

use App\Question;

class PagesController extends Controller{

	public function getIndex(){
        $questions = Question::all();
		return view('pages.welcome')->withQuestions($questions);
	}

	public function getAbout(){

		$name = 'Filan';
		$surname = 'Fisteku';
		$full = $name . " " . $surname;
		$email=$name.".".$surname."@hotmail.com";
		$data=[];
		$data['email']=$email;
		$data['full']=$full;
		return view('pages.about')->withFullname($full)->withEmail($email)->with('data',$data);
	}

	public function getContactUs(){
		return view('pages.contactus');
	}
}