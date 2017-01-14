@extends('main')
@section('content')

    <form action="{{route('addentry', [])}}" method="post" enctype="multipart/form-data">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <input type="file" name="filefield" multiple>
        <input type="submit">
    </form>
 
 <h1> Pictures list</h1>
 


 <div class="row">
        <ul class="thumbnails">
 @foreach($entries as $entry)
            <div class="col-md-2">
                <div class="thumbnail"> 
                    @if(substr($entry->mime, 0, 5) == 'image') 
                        <img src="{{route('getentry', $entry->filename)}}" alt="Click Link!!" class="img-responsive" />
                    
                    @else
                    <img src="images/filelogo.png" alt="Click Link!!" class="img-responsive" />
                    
                    @endif
                    <div class="caption">
                    <a href="http://localhost:8000/fileentry/get/{{$entry->filename}}">{{ substr($entry->original_filename,0,18)}}{{strlen($entry->original_filename)>18 ? "..." : ""}}</a>
                       
                    </div>
                </div>
            </div>
 @endforeach
 </ul>
 </div>

@endsection