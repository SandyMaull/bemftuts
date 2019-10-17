<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>BEM FT UTS - @yield('title')</title>
	<link rel="stylesheet" href="{{asset('assets/auth/bootstrap.min.css')}}">
    <link href="{{ asset('assets/style.css') }}" rel="stylesheet">
    <link href="{{asset('assets/auth/toastr.min.css')}}" rel="stylesheet">
	<link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/img/bem.png') }}" sizes="16x16">
</head>
<body class="bg-dark">

    @include('template.pages_temp.navbar')
    @yield('body')
    @include('template.pages_temp.footer')

    <script nonce="4LLScR1pT1H4V3" src="{{asset('assets/auth/all.js')}}"></script>
    <script nonce="4LLScR1pT1H4V3" src="{{asset('assets/auth/jquery.min.js')}}"></script>
    <script nonce="4LLScR1pT1H4V3" src="{{asset('assets/auth/popper.min.js')}}"></script>
    <script nonce="4LLScR1pT1H4V3" src="{{asset('assets/auth/bootstrap.min.js')}}"></script>
    <script nonce="4LLScR1pT1H4V3" src="{{asset('assets/auth/toastr.min.js')}}"></script>
    <script nonce="4LLScR1pT1H4V3" src="{{asset('assets/auth/script.js')}}"></script>

    
    @yield('script')

    @include('template.message')


</body>
</html>