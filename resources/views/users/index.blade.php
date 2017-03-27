@extends('main')

  @section('title',' | Homepage')
  <style media="screen">
            ul {
                list-style: none;
                padding: 0;
            }
        </style>

  @section('content')

      <div class="row">
      <div class="col-md-2">
          <!-- Left Side Bar  -->
        @include('partials.leftsidebar')
      </div>
      <div class="col-md-10">
        <div class="row">

          <div class="col-md-12">
            <div class="row">
              <div class="col-md-12">
                
              {!! Form::open(array('route' => 'searchusers' ,'class'=>'navbar-form')) !!}
              <div class="input-group">
                  <input type="text" class="form-control" placeholder="Search Users" name="word">
                  <div class="input-group-btn">
                      <button style="height: 34px;" class="btn btn-default" type="submit"><i class="glyphicon glyphicon-search"></i></button>
                  </div>
              </div>
              {!! Form::close() !!}
                <div class="col-lg-12">
                      <ul class="thumbnails">
                          @foreach($users as $user)
                          <li class="clearfix col-lg-6">
                              @include('singles.user')
                           </li>
                           @endforeach
                      </ul>
              </div>
              </div>
            </div>
          </div>
          <div class="col-md-4">
          </div>

        </div>
      </div>
      </div>

  @stop