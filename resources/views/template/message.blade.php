@if (session('success'))
    <script nonce="4LLScR1pT1H4V3">
        toastr.success("{{ session('success') }}", {timeOut: 5000})
    </script>
@endif
@if (session('error'))
    <script nonce="4LLScR1pT1H4V3">
        toastr.error("{{ session('error') }}", {timeOut: 5000})
    </script>
@endif
@if (session('warning'))
    <script nonce="4LLScR1pT1H4V3">
        toastr.warning("{{ session('warning') }}", {timeOut: 5000})
    </script>
@endif