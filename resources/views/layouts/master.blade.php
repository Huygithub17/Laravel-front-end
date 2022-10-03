<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    @yield('title')

    <link href="{{ asset('eshopper/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('eshopper/css/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('eshopper/css/prettyPhoto.css') }}" rel="stylesheet">
    <link href="{{ asset('eshopper/css/price-range.css') }}" rel="stylesheet">
    <link href="{{ asset('eshopper/css/animate.css') }}" rel="stylesheet">
    <link href="{{ asset('eshopper/css/main.css') }}" rel="stylesheet">

    @yield('css')
</head>

<body>

{{--Bố cục phải như này--}}

@include('components.header')

@yield('content')

@include('components.footer')

{{--<script src="{{ asset('eshopper/js/jquery.js') }}"></script>--}}
{{--<script src="{{ asset('eshopper/js/bootstrap.min.js') }}"></script>--}}
{{--<script src="{{ asset('eshopper/js/jquery.scrollUp.min.js') }}"></script>--}}
{{--<script src="{{ asset('eshopper/js/price-range.js') }}"></script>--}}
{{--<script src="{{ asset('eshopper/js/jquery.prettyPhoto.js') }}"></script>--}}
{{--<script src="{{ asset('eshopper/js/main.js') }}"></script>--}}

<script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" ></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" ></script>

@yield('js')

</body>
</html>
