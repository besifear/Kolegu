@extends('main')

  @section('title',' | Users')
  <style media="screen">
            ul {
                list-style: none;
                padding: 0;
            }
            /*@media(max-width: 767px) {
                .input-group{
                    width: 98%;
                    padding-left: 15px;
                }
            }
            @media(max-width: 480px) {
                .input-group{
                    width: 95%;
                    padding-left: 15px;
                }
            }*/
    </style>

  @section('content')

  <div class="row">
      <div class="col-md-12">


      <div class="content-box clearfix">
            <div class="row">

                <div class="col-md-12">
                  {!! Form::open(array('route' => 'searchusers')) !!}
                  <div class="input-group">
                      <input type="text" class="form-control" placeholder="Search Users" name="word">
                      <div class="input-group-btn">
                          <button style="height: 34px;" class="btn btn-default" type="submit"><i class="glyphicon glyphicon-search"></i></button>
                      </div>
                  </div>
                  {!! Form::close() !!}
                  </div>

                    <div>
                          <ul class="thumbnails">
                              @foreach($users as $user)
                              <li class="clearfix col-lg-4">
                                  @include('singles.usersingle')
                               </li>
                               @endforeach
                          </ul>
                  </div>
                </div>
        </div>

        </div>
    </div>
  @stop
