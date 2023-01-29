@extends('layouts.app',[
'class' => '',
'folderActive' => '',
'elementActive' => 'membresias',
'title'=>'Membresias',
'navbarClass'=>'navbar-transparent',
'activePage'=>'membresias',
])

@section('content')
@include('includes.spinner')



<div class="content">
    <div class="container-fluid mt--6  ">
        <div class="row m-0">
            <div class="col-xl-12 order-xl-1">
                <div class="card">
                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col-12 text-right">
                                <a href="{{ route('membresias.index') }}" class="btn btn-sm btn-primary">{{ __('Back to list') }}</a>
                            </div>
                            <div class="col-12 text-center">
                                <h3 class="mb-0">Nueva membresía</h3>
                            </div>

                        </div>
                    </div>
                    <div class="card-body">
                        <form id="create-membership-admin" method="post" action="{{ route('membresias.store') }}" autocomplete="off" enctype="multipart/form-data">
                            @csrf

                            <h6 class="heading-small text-muted mb-4">{{ __('Membersip information') }}</h6>
                            <div class="pl-lg-4">
                                <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-name">{{ __('Name') }}</label>
                                    <input type="text" name="name" id="input-name" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Name') }}..." value="{{ old('name') }}" required autofocus>

                                    @include('alerts.feedback', ['field' => 'name'])
                                </div>
                                <div class="form-group{{ $errors->has('frecuencia_id') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-role">Frecuencia</label>
                                    <select name="frecuencia_id" id="input-role" class="form-control{{ $errors->has('frecuencia_id') ? ' is-invalid' : '' }}" placeholder="Frecuencia..." required>
                                        <option value="" selected>Selecciona una opcion...</option>
                                        @foreach ($frecuencias as $frecuencia)
                                        <option value="{{ $frecuencia->id }}" {{ $frecuencia->id == old('frecuencia_id') ? 'selected' : '' }}>{{ $frecuencia->name }}</option>
                                        @endforeach
                                    </select>

                                    @include('alerts.feedback', ['field' => 'frecuencia_id'])
                                </div>


                                <div class="form-group{{ $errors->has('price') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-price">{{ __('Price') }}</label>
                                    <input type="number" name="price" id="input-name" class="form-control{{ $errors->has('price') ? ' is-invalid' : '' }}" placeholder="{{ __('Price') }}..." value="{{ old('price') }}" required>

                                    @include('alerts.feedback', ['field' => 'price'])
                                </div>

                                <div class="form-group{{ $errors->has('discount') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-discount">{{ __('Discount') }}</label>
                                    <input type="number" name="discount" id="input-discount" class="form-control{{ $errors->has('discount') ? ' is-invalid' : '' }}" placeholder="{{ __('Discount') }}..." value="{{ old('discount') }}" required>

                                    @include('alerts.feedback', ['field' => 'discount'])
                                </div>






                                <div class="text-center">
                                    <button type="submit" class="btn btn-success mt-4">{{ __('Save') }}</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



@endsection
@include('includes.notificaciones')