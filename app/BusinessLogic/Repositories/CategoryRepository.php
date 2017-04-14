<?php

namespace App\BusinessLogic\Repositories;

use App\Category;
use App\BusinessLogic\Interfaces\CategoryInterface;

class CategoryRepository implements CategoryInterface{

    public function all($columns = ['*']){
        return Category::all($columns);
    }


}