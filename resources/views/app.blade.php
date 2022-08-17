<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
    <script src="{{ mix('/js/app.js') }}" defer></script>
    <base href="/">
    <link rel="stylesheet" href="{{asset('js/template/air-datepicker/css/datepicker.min.css')}}">
    <link rel = "stylesheet" href = "{{asset('js/template/jqvmap/jqvmap.min.css')}}">
    <link rel = "stylesheet" href = "{{asset('css/template/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/template/icons.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/template/app.min.css')}}">
    @inertiaHead
</head>
<body @class([
        "bg-primary bg-pattern"=>Request::is("login") || Request::is("register")
])>

@inertia
<script src="https://unicons.iconscout.com/release/v2.0.1/script/monochrome/bundle.js"></script>
</body>
</html>
