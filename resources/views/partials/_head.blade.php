<title>Tregom @yield('title')</title>
    <link rel="shortcut icon" href="{{ asset('images/favicon.png') }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Bootstrap -->
    <link href="/css/bootstrap.min.css" rel="stylesheet">
    <!-- styles -->
    <link href="/css/styles.css" rel="stylesheet">
    <link href="/css/question.css" rel="stylesheet">

    {{Html::style('css/styles.css')}}
    {!! Html::style('css/parsley.css')!!}
    <link href="{{ mix('/css/app.css') }}" rel="stylesheet">

    @yield('stylesheets')
