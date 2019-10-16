@if (session('success'))
    <script src="{{asset('assets/auth/message-success.js')}}"></script>
@endif
@if (session('error'))
    <script src="{{asset('assets/auth/message-error.js')}}"></script>
@endif
@if (session('warning'))
    <script src="{{asset('assets/auth/message-warning.js')}}"></script>
@endif