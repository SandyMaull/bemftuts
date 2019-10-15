@if (session('success'))
    <script>
        toastr.success("{{ session('success') }}", {timeOut: 5000})
    </script>
@endif
@if (session('error'))
    <script>
        toastr.error("{{ session('error') }}", {timeOut: 5000})
    </script>
@endif
@if (session('warning'))
    <script>
        toastr.warning("{{ session('warning') }}", {timeOut: 5000})
    </script>
@endif