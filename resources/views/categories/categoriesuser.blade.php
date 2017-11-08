  @extends('main')

  @section('title',' | Homepage')

  @section('stylesheets')
    
  @stop  

  
  @section('content')
    <categories-list selectedCategories="categories" remainingCategories="userCategories" ></categories-list>
  @stop

  @section('scripts')
  
  @stop