@extends('main')

@section('title',' | Resources')

@section('content')

    <div class="row">
        <div class="col-md-2">
            <!-- Left Side Bar Beginning -->
            @include('partials.leftsidebar')
            <!-- Left Side Bar Ending -->
        </div>
        <div class="col-md-10">
            <div class="row">
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="content-box-header">
                                <div class="panel-title">Resurset</div>
                                <div class="pull-right">
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-default btn-xs dropdown-toggle"
                                                data-toggle="dropdown">
                                            Actions
                                            <span class="caret"></span>
                                        </button>
                                        <ul class="dropdown-menu pull-right" role="menu">
                                            <li><a href="/orderresources/Newest">Newest</a>
                                            </li>
                                            <li><a href="/orderresources/A-Z">A-Z</a>
                                            </li>
                                            <li><a href="/orderresources/Z-A">Z-A</a>
                                            </li>

                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <br>
                            @foreach($resources as $resource)
                                <!-- Single Resource Answer Beginning-->
                                @include('singles.resourcesingle')
                                <!-- Single Resource Answer Ending-->
                            @endforeach
                            <!-- Resource Upvote/Downvote Form Beginning-->
                            @include('forms.resourcevoteform')
                            <!-- Resource Upvote/Downvote Form Ending-->
                            <div class="text-center">
                                {!! $resources->links() !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop