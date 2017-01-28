  @extends('main')

  @section('title',' | Homepage')
<head>
<link rel="stylesheet" type="text/css" href="lol.css">
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous">
</script>
<script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
<script src="http://netdna.bootstrapcdn.com/bootstrap/3.0.3/js/bootstrap.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
</head>

@section('content')

<div class="row">
  
  @foreach($categories as $category)
  
    <div class="col-xs-6 col-md-3">
      <a  class="thumbnail">
        <img src="/images/subjects.png" alt="{{$category->Name}}">
        <form method="post" action="Kategorite/{{$category->Name}}">
         <button type="submit"  class="btn btn-danger  btn-block">{{$category->Name}}</button>
         {{csrf_field()}}
         </form>
      </a>
    </div>
  
  @endforeach
</div>


<!--
<script type="text/javascript">
  $('.btn ').on('click',function() {
    $(this).prop("disabled",true);
});
</script>
-->

@stop