<?php

namespace App\Http\Controllers;

class PagesController extends Controller{

	public function getIndex(){
		return view('pages.welcome');
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