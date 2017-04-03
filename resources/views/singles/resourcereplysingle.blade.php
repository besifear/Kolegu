<ul class="event-list answer">
    <li>
        <div class="social">
            <ul>
                <li class="facebook" style="width:33%;">
                    <a
                            onclick="event.preventDefault();
                                    document.getElementById('resourceReplyId').setAttribute('value', '{{$resourceReply->id}}');
                                    var forma =  document.getElementById('resourceReply-form');
                                    forma.setAttribute('action', '/resourcereplyupvote');
                                    forma.submit();">
                                    <span class="glyphicon glyphicon-chevron-up">

                                    </span>
                        <br>
                        <small>{{$resourceReply->upVotes->count()}}</small>
                    </a>
                </li>
                <li class="twitter" style="width:33%;">
                    <a
                            onclick="event.preventDefault();
                                    document.getElementById('resourceReplyId').setAttribute('value', '{{$resourceReply->id}}');
                                    var forma =  document.getElementById('resourceReply-form');
                                    forma.setAttribute('action', '/resourcereplydownvote');
                                    forma.submit();">

                                    <span class="glyphicon glyphicon-chevron-down">

                                    </span>
                        <br>
                        <small>{{$resourceReply->downVotes->count()}}</small>
                    </a>
                </li>
            </ul>
        </div>
        <div class="info answerinfo">
            <p class="desc">{{$resourceReply->content}}</p>
            <ul style="width: auto; float: left;" class="pull-right">
                <li><p style="font-size: 9pt;">Posted {{$resourceReply->created_at->diffForHumans()}} by
                        <a>{{$resourceReply->user->username}}</a></p></li>
            </ul>
        </div>
    </li>
</ul>
<div class="pull-right">
    @if(Auth::check())
        @if(Auth::user()->id==$resourceReply->user_id)
            <!-- Resource Reply Destroy Form Ending -->
            @include('forms.resourcereplydestroyform')
            <!-- Resource Reply Destroy Form Ending -->
        @endif
    @endif
    <br>
</div>
<hr style="clear: both;">