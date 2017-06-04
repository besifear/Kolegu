@extends('main')

@section('title',' | Login')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="panel panel-default">
                <div class="panel-heading">Login</div>
                @include('partials.flash')
                <div class="panel-body">
                    {!!  Form::open([
                            'url'                       => url('/login'),
                            'class'                     => 'form-horizontal',
                            'role'                      => 'form',
                            'id'                        => 'login-form',
                            'method'                    => 'POST',
                            'data-parsley-validate',
                    ]) !!}
                        <div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">
                            <label for="username" class="col-md-4 control-label">Username</label>

                            <div class="col-md-6">

                                {!! Form::text('username', null, [
                                'class'                         => 'form-control',
                                'type'                          => 'text',
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

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                                    {!! Form::password('password', [
                                    'id'                            => 'password',
                                    'name'                          => 'password',
                                    'type'                          => 'password',
                                    'class'                         => 'form-control',
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
                            <div class="col-md-6 col-md-offset-4">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember"> <p style="padding-top: 3px;">Më kujto</p>
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Kyçu
                                </button>

                                <a class="btn btn-link" href="{{ url('/password/reset') }}">
                                    Ke harruar passwordin?
                                </a>
                            </div>
                        </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
