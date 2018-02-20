<!DOCTYPE html>
<html>
<head>
    <title>Orçamento</title>
    {{--<link rel="stylesheet" type="text/css" href="{{ asset('css/all.css') }}">--}}
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">


    @yield('css')
</head>
<body>

<div class="container">
    @yield('content')
</div>
<!-- js -->
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
{{--<script src="{{ asset('js/bootstrap.min.js') }}"></script>--}}
@yield('js')
</body>
</html>