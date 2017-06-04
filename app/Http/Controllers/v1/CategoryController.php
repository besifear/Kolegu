<?php

namespace App\Http\Controllers\v1;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\BusinessLogic\Interfaces\CategoryInterface;

class CategoryController extends Controller
{
	private $repository;

	public function __construct(CategoryInterface $repository){
		$this->middleware('jwt.auth', ['except' => ['index', 'show']]);	
		$this->repository = $repository;
	}

	public function index(){
		$categories = $this->repository->all();
		return response()->json($categories);
	}

}
