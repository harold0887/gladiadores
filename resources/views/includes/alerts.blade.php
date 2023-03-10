@push('scripts')
@if(session('success'))
<script>
    swal("¡Buen trabajo!", "{{session('success')}}", "success");
</script>
@endif


@if(session('success-auto-close'))
<script>
    swal({
        title: "¡Buen trabajo!",
        text: "{{session('success-auto-close')}}",
        type: "success",
        timer: 2000,
        button: false,
    });
</script>
@endif


@if (session('error'))
<script>
    swal("¡error!", "{{session('error')}}", "error");
</script>
@endif

@endpush