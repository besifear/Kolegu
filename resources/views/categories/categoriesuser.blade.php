  @extends('main')

  @section('title',' | Homepage')

  @section('stylesheets')
    
  @stop  

  
  @section('content')
    <categories-list selectedCategories="categories" remainingCategories="userCategories" ></categories-list>
  @stop

  @section('scripts')
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous">
    </script>
    <script src = "{{URL::asset('/js/move-categories-ajax.js')}}"></script>
    <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
    <script src="http://netdna.bootstrapcdn.com/bootstrap/3.0.3/js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
  
  @stop