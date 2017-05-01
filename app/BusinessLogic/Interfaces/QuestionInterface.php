<?php

namespace App\BusinessLogic\Interfaces;

interface QuestionInterface{

    public function all($columns);

    public function find($id, $columns);

    public function orderBy($column, $direction);

    public function create($body);

    public function delete($id);

    public function ownsQuestion($id);
}