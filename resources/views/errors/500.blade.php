@extends('errors.layout', [
'class' => 'login-page',
'backgroundImagePath' => 'img/bg/fabio-mangione.jpg',
'folderActive' => '',
'elementActive' => '',
'title'=>'Error 500',
'navbarClass'=>'',
'activePage'=>'',
])

@section('content')




<div class="content text-center">

    <div class="row ">
        <div class="col-md-12 error-page text-white">
            <h1 class="title">500</h1>
            <h2>{{ __('Server Error') }} :(</h2>
            <h4>{{ __('Ooooups! Looks like something went wrong') }}.</h4>
        </div>
    </div>
    <div class="col-md-12 mt-5">

        <a href="{{ route('home') }}" class="text-white btn btn-outline-primary btn-lg">
            <div class="d-flex align-items-center">
                <i class="material-icons  mr-2">home</i>
                <span>Volver al inicio</span>
            </div>
        </a>

    </div>
</div>
</div>
@endsection


@push('scripts')
<script>
    $(document).ready(function() {
        demo.checkFullPageBackgroundImage();
    });
</script>
@endpush