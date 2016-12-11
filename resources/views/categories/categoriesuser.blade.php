  @extends('main')

  @section('title',' | Homepage')

  @section('stylesheets')
    <link rel="stylesheet" type="text/css" href="lol.css">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
  @stop  

  
  @section('content')

  <div class="row">
    <h1>Available Categories:</h1>
    @foreach($categories as $category)
      <div class="col-xs-6 col-md-3">
        <a  class="thumbnail">
          <img src="https://getuikit.com/docs/images/placeholder_600x400.svg" alt="{{$category->id}}">
          <form class="categoryform" method="post" action="Kategorite/{{$category->id}}">
           <button type="submit"  class="btn btn-danger  btn-block">{{$category->id}}</button>
           {{csrf_field()}}
           </form>
        </a>
      </div>
    @endforeach
  </div>

  @if(!$userCategories->isEmpty())
      <hr>
      <div class="row">
          <h1>Selected Categories:</h1>
          @foreach($userCategories as $userCategory)
              <div class="col-xs-6 col-md-3">
                  <a  class="thumbnail">
                      <img src="https://getuikit.com/docs/images/placeholder_600x400.svg" alt="{{$userCategory->CategoryName}}">
                      <form class="categoryform" method="post" action="Kategorite/{{$userCategory->CategoryName}}">
                          <button type="submit"  class="btn btn-danger  btn-block">{{$userCategory->category_id}}</button>
                          {{csrf_field()}}
                      </form>
                  </a>
              </div>
          @endforeach
      </div>
  @endif



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
    <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
    <script src="http://netdna.bootstrapcdn.com/bootstrap/3.0.3/js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
  
  @stop