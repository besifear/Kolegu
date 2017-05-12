  @extends('main')

  @section('title',' | Homepage')

  @section('stylesheets')
    
  @stop  

  
  @section('content')

      @if(!$userCategories->isEmpty())
          <hr>
          <div class="row">
              <h1>Selected Categories:</h1>
                <div id="selected-categories-list">
              @foreach($userCategories as $userCategory)
                  <div id = "category-{{$userCategory->category->id}}" class="col-xs-6 col-md-3">
                      <a  class="thumbnail">
                          <!-- <img src="/images/subjects.png" alt="{{$userCategory->category->name}}"> -->
                          <form class="categoryform" method="post" action="Kategorite/{{$userCategory->category->id}}">
                              <button type="submit"  class="btn btn-primary btn-block open-modal moving-category selected-category" value = "{{$userCategory->category->id}}">{{$userCategory->category->name}}</button>
                              {{csrf_field()}}
                          </form>
                      </a>
                  </div>
              @endforeach
                </div>
          </div>
      @endif

  <div class="row">
    <h1>Available Categories:</h1>
      <div id="available-categories-list">
        @foreach($categories as $category)
            <div id = "category-{{$category->id}}" class="col-xs-6 col-md-3">
                <a  class="thumbnail">
                     <form class="categoryform" method="post" action="Kategorite/{{$category->id}}">
                         <button type="submit"  class="btn btn-primary  btn-block moving-category available-category" value = "{{$category->id}}">{{$category->name}}</button>
                        {{csrf_field()}}
                     </form>
                </a>
            </div>
        @endforeach
      </div>
  </div>





  <!--
  <script type="text/javascript">
    $('.btn ').on('click',function() {
      $(this).prop("disabled",true);
  });
  </script>
  -->

  @stop

  @section('scripts')
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous">
    </script>
    <script src = "{{URL::asset('/js/move-categories-ajax.js')}}"></script>
    <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
    <script src="http://netdna.bootstrapcdn.com/bootstrap/3.0.3/js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
  
  @stop