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
                    {!! Form::open([
                        'url' => url('/register'),
                        'class' => 'form-horizontal',
                        'id' => 'register-form',
                        'role' => 'form',
                        'method' => 'POST',
                        'data-parsley-validate',
                    ]) !!}

                    <div  class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">
                        <label for="username" class="col-md-4 control-label">Username</label>

                        <div class="col-md-6">

                            {!! Form::text('username', null, [
                                'class'                         => 'form-control',
                                'type'                          => 'text',
                                'required',
                                'autofocus',
                                'id'                            => 'username',
                                'value'                         => "{{old('username')}}",
                                'data-parsley-required-message' => 'Username-i është obligativ',
                                'data-parsley-trigger'          => 'change focusout',
                                'data-parsley-type'             => 'alphanum',
                                'data-parsley-minlength'        => '5',
                                'data-parsley-maxlength'        => '50',
                                'data-parsley-minlength-message'=> "Username-i duhet të përmbajë së paku 5 karaktera",
                                'data-parsley-maxlength-message'=> "Username-i duhet të përmbajë më së shumti 50 karaktera"
                            ]) !!}

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

                                <label for="inputEmail" class="sr-only">Email address</label>
                                {!! Form::email('email', null, [
                                    'class'                         => 'form-control',
                                    'required',
                                    'id'                            => 'email',
                                    'type'                          => 'email',
                                    'name'                          => 'email',
                                    'value'                         => "{{ old ('email') }}",
                                    'data-parsley-required-message' => 'Ke bërë gabim në email',
                                    'data-parsley-trigger'          => 'change focusout',
                                    'data-parsley-type'             => 'email',
                                    'data-parsley-type-message'     => 'Nuk është email valid',
                                    'data-parsley-maxlength'        => '50',
                                    'data-parsley-minlength'        => '6',
                                    'data-parsley-minlength-message'=> "Email-i duhet të përmbajë së paku 3 karaktera",
                                    'data-parsley-maxlength-message'=> "Email-i duhet të përmbajë më së shumti 50 karaktera"
                                ]) !!}

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
                                <label for="inputPassword" class="sr-only">Password</label>

                                {!! Form::password('password', [
                                    'id'                            => 'password',
                                    'name'                          => 'password',
                                    'type'                          => 'password',
                                    'class'                         => 'form-control',
                                    'required',
                                    'data-parsley-required-message' => 'Ke bërë gabim në password',
                                    'data-parsley-trigger'          => 'change focusout',
                                    'data-parsley-minlength'        => '6',
                                    'data-parsley-maxlength'        => '50',
                                    'data-parsley-minlength-message'=> "Password-i duhet të përmbajë së paku 6 karaktera",
                                    'data-parsley-maxlength-message'=> "Password-i duhet të përmbajë më së shumti 50 karaktera",
                                    'data-parsley-type'             => 'alphanum'
                                ]) !!}

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
                                {!! Form::password('password_confirmation', [
                                    'id'                            => 'password-confirm',
                                    'name'                          => 'password_confirmation',
                                    'type'                          => 'password',
                                    'class'                         => 'form-control',
                                    'required',
                                    'data-parsley-required-message' => 'Ke bërë gabim në password',
                                    'data-parsley-trigger'          => 'change focusout',
                                    'data-parsley-minlength'        => '6',
                                    'data-parsley-maxlength'        => '50',
                                    'data-parsley-minlength-message'=> "Password-i duhet të përmbajë së paku 6 karaktera",
                                    'data-parsley-maxlength-message'=> "Password-i duhet të përmbajë më së shumti 50 karaktera",
                                    'data-parsley-type'             => 'alphanum'
                                ]) !!}
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Regjistrohu
                                </button>
                            </div>
                        </div>
<!--                         <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                               {!! app('captcha')->render($lang = null) !!}
                            </div>
                        </div>
 -->                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@stop
