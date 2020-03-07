<script src="{{ $cdn?? asset('vendor/sweetalert/sweetalert.all.js')  }}"></script>
@if (Session::has('alert.config'))
@if(config('sweetalert.animation.enable'))
<link rel="stylesheet" href="{{ config('sweetalert.animatecss') }}">
@endif
<script>
    var popupId = "{{ uniqid() }}";
    if(!sessionStorage.getItem('shown-' + popupId)) {
        Swal.fire({!! Session::pull('alert.config') !!});
    }
    sessionStorage.setItem('shown-' + popupId, '1');
</script>
@endif
