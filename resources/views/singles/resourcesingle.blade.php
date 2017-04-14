<div class="content-box-large box-with-header clearfix">
    <ul class="event-list">
        <li class="questionListItem">
            <div class="social">
                <ul>
                    <li class="facebook" style="width:33%;">
                        <a
                                onclick="
                                        event.preventDefault();
                                        document.getElementById('resource_id').setAttribute('value', '{{$resource->id}}');
                                        var forma =  document.getElementById('voteResource-form');
                                        forma.setAttribute('action', '/resourceupvote');
                                        forma.submit();
                                        ">
                                    <span class="glyphicon glyphicon-chevron-up">

                                    </span>
                            <br>
                            <small>{{$resource->votes('Yes')->count()}}</small>
                        </a>
                        </small>
                        </button>
                        </form>

                    </li>
                    <li class="twitter" style="width:33%;">

                        <a
                                onclick="
                                        event.preventDefault();
                                        document.getElementById('resource_id').setAttribute('value','{{$resource->id}}');
                                        var forma = document.getElementById('voteResource-form');
                                        forma.setAttribute('action','resourcedownvote');
                                        forma.submit();
                                        ">

                                    <span class="glyphicon glyphicon-chevron-down">

                                    </span>
                            <br>

                            <small>{{$resource->votes('No')->count()}}</small>
                        </a>
                    </li>
                    <li class="google-plus" style="width:33%;"><a
                                href="/resources/{{$resource->id}}"><span
                                    class="glyphicon glyphicon-comment"></span><br>
                            <small>{{$resource->allAnswers->count()}}</small>
                        </a></li>

                </ul>
            </div>

            <div class="info">

                <div class="row">
                    <div class="col-md-4">
                        <ul class="thumbnails">
                            <div class="col-md-12">
                                <div class="thumbnail">
                                    @if(substr($resource->mime, 0, 5) == 'image')
                                        <a target="_blank"
                                           href="/fileentry/get/{{$resource->filename}}"><img
                                                    src="{{route('getentry', $resource->filename)}}"
                                                    alt="Click Link!!"
                                                    class="img-responsive"/></a>

                                    @elseif($resource->mime == 'application/pdf')
                                        <a target="_blank"
                                           href="/fileentry/get/{{$resource->filename}}"><img
                                                    src="/images/pdflogo.png"
                                                    alt="Click Link!!"
                                                    class="img-responsive"/></a>

                                    @else
                                        <a target="_blank"
                                           href="/fileentry/get/{{$resource->filename}}"><img
                                                    src="/images/filelogo.png"
                                                    alt="Click Link!!"
                                                    class="img-responsive"/></a>

                                    @endif
                                    <div class="caption">
                                        <a target="_blank"
                                           href="/fileentry/get/{{$resource->filename}}">{{ substr($resource->original_filename,0,25)}}{{strlen($resource->original_filename)>25 ? "..." : ""}}</a>
                                    </div>
                                </div>
                        </ul>
                    </div>
                    <div class="col-md-8">
                        <a class="title"
                           href="/resources/{{$resource->id}}">{{substr($resource->title,0,40)}}{{strlen($resource->title)>40 ? "..." : ""}}</a>
                        <hr>
                        <p class="desc">{{ substr($resource->content,0,70)}}{{strlen($resource->content)>40 ? "..." : ""}}</p>
                    </div>
                </div>

                <ul style="width:auto; float: left;">
                    <li><a href="/categories">{{$resource->category->name}}</a></li>
                </ul>
                <ul style="width: auto; float: left;" class="pull-right">

                    <li><p style="font-size: 9pt;">
                            Posted {{$resource->created_at->diffForHumans()}} by <a
                                    href="/users/{{$resource->user->id}}">{{$resource->user->username}}</a>
                        </p></li>

                </ul>
            </div>
            </a>
        </li>
    </ul>
    <hr>
</div>