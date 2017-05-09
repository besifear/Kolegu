@extends('main')

@section('title',' | Register')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="panel panel-default">
                <div class="panel-heading">Register</div>
                @include('partials.flash')
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" data-parsley-validate action="{{ url('/register') }}">
                        {{ csrf_field() }}

                        <div  class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">
                            <label for="username" class="col-md-4 control-label">Username</label>

                            <div class="col-md-6">
                                <input id="username" type="text" class="form-control" name="username" value="{{ old('username') }}"  autofocus maxlength = "50" minlength="5" 
                                data-parsley-required-message= "Ke bërë gabim në username!"  
                                data-parsley-trigger = "change focusout">
                                @if ($errors->has('username'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('username') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}"   maxlength = "50" minlength="5"
                                data-parsley-type = "email" 
                                data-parsley-required-message= "Ke bërë gabim në email!"  
                                data-parsley-trigger = "change focusout">

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" 
                                maxlength = "50" minlength="5"
                                data-parsley-type = "alphanum" 
                                data-parsley-required-message= "Ke bërë gabim në password!"  
                                data-parsley-trigger = "change focusout"
                                >

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                                    
                        <div class="form-group">
                            <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation"  maxlength = "50" minlength="5"
                                data-parsley-type = "alphanum" 
                                data-parsley-required-message= "Ke bërë gabim në password!"  
                                data-parsley-trigger = "change focusout">
                            </div>
                        </div>
                           <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    {!! app('captcha')->display(); !!}

                                @if ($errors->has('g-recaptcha-response'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('g-recaptcha-response') }}</strong>
                                    </span>
                                @endif

                                </div>
                             </div>  

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Register
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
