@extends('main')

@section('title',' | View Post')

@section('content')
    <div class="row">
        <div class="col-md-8">
            <!-- Single Resource Answer Beginning-->
            @include('singles.resourcesingle')
            <!-- Single Resource Answer Ending-->
            <hr>
            <h4>Komentet</h4>
            <hr>
            <div class="content-box-large box-with-header">
            @foreach(App\ResourceReply::where('resource_id','=',$resource->id)->get() as $resourceReply)
                <!-- Single Formatted Resource Reply Beginning-->
                @include('singles.resourcereplysingle')
                <!-- Single Formatted Resource Reply Ending-->
            @endforeach
            <!-- Resource Reply Vote Form Beginning -->
            @include('forms.resourcereplyvoteform')
            <!-- Resource Reply Vote Form Ending -->
            </div>
            <div id="result"></div>
            <h3>Komenti juaj</h3>
            <!-- Resource Reply Create Form Beginning -->
            @include('forms.resourcereplycreateform')
            <!-- Resource Reply Create Form Ending -->
            <br><br>
        </div>
        <div class="col-md-4">
            <div class="well">
                <dl class="dl-horizontal">
                    <dt>Created At :</dt>
                    <dd>{{ date('j/m/Y H:i',strtotime ($resource->created_at)) }}</dd>
                </dl>
                <dl class="dl-horizontal">
                    <dt>Last Updated:</dt>
                    <dd>{{ date('j/m/Y H:i',strtotime ($resource->updated_at)) }}</dd>
                </dl>
                @if(Auth::check())
                    @if(Auth::user()->id==$resource->user_id)
                        <hr>
                        <div class="row">
                            <div class="col-sm-6">
                                <a href="#" class="btn btn-primary btn-block">Edit</a>
                            </div>
                        <!-- Resource Destroy Form Beginning -->
                        @include('forms.resourcedestroyform')
                        <!-- Resource Destroy Form Ending -->
                        </div>
                    @endif
                @endif
            </div>
        </div>
    </div>
@stop

@section('scripts')
    <!-- Go to www.addthis.com/dashboard to customize your tools -->
    <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-585fc7f429fa1254"></script>
@stop
