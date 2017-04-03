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
                                <div class="panel-title">Actions</div>
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
                            <div class="text-center">
                                {!! $resources->links() !!}
                            </div>
                            <form id="voteResource-form" method="POST" style="display: none;">
                                <input type="hidden" id="resource_id" name="resource_id"/>
                                {{ csrf_field()}}
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop