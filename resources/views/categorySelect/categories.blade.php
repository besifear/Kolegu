  @extends('main')

  @section('title',' | Homepage')
<head>
</head>

@section('content')

<div class="row">
  
  @foreach($categories as $category)
  
    <div class="col-xs-6 col-md-3">
      <a  class="thumbnail">
        <!--<img src="/images/subjects.png" alt="{{$category->Name}}">-->
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
