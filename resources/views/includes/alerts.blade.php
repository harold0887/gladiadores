@push('scripts')
@if(session('success'))
<script>
    $(function() {
        Swal.fire({
            icon: 'success'
            , title: "¡Buen trabajo!"
            , text: '{{session('success')}}'
            , showConfirmButton: true
        , }).catch(swal.noop);
    })

</script>
@endif


@if (session('error'))
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

@if (session('status'))
<script>
    $(function() {
        Swal.fire({
            icon: 'success'
            , title: "¡Buen trabajo!"
            , text: '{{session('status')}}'
            , showConfirmButton: true
        , }).catch(swal.noop);
    })

</script>
@endif



@endpush
