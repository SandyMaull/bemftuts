@if (session('success'))
    <script nonce="m355Age">
        toastr.success("{{ session('success') }}", {timeOut: 5000})
    </script>
@endif
@if (session('error'))
    <script nonce="m355Age">
        toastr.error("{{ session('error') }}", {timeOut: 5000})
    </script>
@endif
@if (session('warning'))
    <script nonce="m355Age">
        toastr.warning("{{ session('warning') }}", {timeOut: 5000})
    </script>
@endif