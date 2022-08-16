<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
    <script src="{{ mix('/js/app.js') }}" defer></script>
    <link rel="stylesheet" href="{{asset('js/template/air-datepicker/css/datepicker.min.css')}}">
    <link rel = "stylesheet" href = "{{asset('js/template/jqvmap/jqvmap.min.css')}}">
    <link rel = "stylesheet" href = "{{asset('css/template/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/template/icons.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/template/app.min.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    @inertiaHead
</head>
<body @class([
        "bg-primary bg-pattern"=>Request::is("login") || Request::is("register")
])>
@inertia
    <script src = "{{asset('js/template/jquery/jquery.min.js')}}"></script>
    <script src = "{{asset('js/template/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('js/template/metismenu/metisMenu.min.js')}}"></script>
    <script src = "{{asset('js/template/simplebar/simplebar.min.js')}}"></script>
    <script src="{{asset('js/template/node-waves/waves.min.js')}}"></script>
    <script src="https://unicons.iconscout.com/release/v2.0.1/script/monochrome/bundle.js"></script>
    <script src="{{asset('js/template/air-datepicker/js/datepicker.min.js')}}"></script>
    <script src="{{asset('js/template/air-datepicker/js/i18n/datepicker.en.js')}}"></script>
    <script src="{{asset('js/template/apexcharts/apexcharts.min.js')}}"></script>
    <script src = "{{asset('js/template/jquery-knob/jquery.knob.min.js')}}"></script>
    <script src="{{asset('js/template/jqvmap/jquery.vmap.min.js')}}"></script>
    <script src="{{asset('js/template/jqvmap/maps/jquery.vmap.usa.js')}}"></script>
    <script src="{{asset('js/template/dashboard.init.js')}}"></script>
    <script src = "{{asset('js/template/app.js')}}"></script>
</body>
</html>
