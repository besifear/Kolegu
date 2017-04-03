@extends('main')

@section('title',' | Upload Resources')

@section('stylesheets')

    {!! Html::style('css/parsley.css')!!}

@stop
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-8">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="content-box-large clearfix">
                                <!-- Resource Create Form Beginning-->
                                @include('forms.resourcecreateform')
                                <!-- Resource Create Form Ending-->
                                <br/>
                                <br/>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <!-- Rules Side Bar Beginning -->
                @include('partials.rules')
                <!-- Rules Side Bar Ending-->
                </div>
            </div>
        </div>
    </div>
@stop

@section('scripts')
    {!! Html::script('js/parsley.min.js')!!}
@stop