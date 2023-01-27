@push('scripts')
@if(session('success'))
<script>
    $(function() {
        demo.showNotification("top", "right", "¡Buen trabajo!", "{{session('success')}}")
    })
</script>
@endif


@if(session('error'))
<script>
    $(function() {
        Swal.fire({
            icon: 'error'
            , title: "¡Error!"
            , text: '{{session('error')}}'
            , showConfirmButton: true
        , }).catch(swal.noop);
    })

</script>
@endif


@endpush



