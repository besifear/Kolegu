<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppRepositoryProvider extends ServiceProvider{

        public function boot(){

        }

        public function register(){
            $models = array(
                'Question',
                'Category'
            );

            foreach ($models as $idx => $model){
                $this->app->bind(
                    "App\BusinessLogic\Interfaces\\{$model}Interface",
                    "App\BusinessLogic\Repositories\\{$model}Repository"
                );
            }
        }
}