@extends('layouts.app',[
'class' => '',
'folderActive' => '',
'elementActive' => 'users',
'title'=>'Usuarios',
'navbarClass'=>'navbar-transparent',
'activePage'=>'users',
])

@section('content')
@include('includes.spinner')



<div class="content">
    <div class="container mt--6  ">
        <div class="row m-0">
            <div class="col-xl-12 order-xl-1">
                <div class="card">
                    <div class="card-header">
                        <div class="row align-items-center">
                        <div class="col-12 text-right">
                                <a href="{{ route('users.index') }}" class="btn btn-sm btn-primary">{{ __('Back to list') }}</a>
                            </div>
                            <div class="col-12 text-center">
                                <h3 class="mb-0">Nuevo usuario</h3>
                            </div>
                           
                        </div>
                    </div>
                    <div class="card-body">
                        <form id="create-user-admin" method="post" action="{{ route('users.store') }}" autocomplete="off" enctype="multipart/form-data">
                            @csrf

                            <h6 class="heading-small text-muted mb-4">{{ __('User information') }}</h6>
                            <div class="pl-lg-4">
                                <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-name">{{ __('Name') }}</label>
                                    <input type="text" name="name" id="input-name" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Name') }}" value="{{ old('name') }}" required autofocus>

                                    @include('alerts.feedback', ['field' => 'name'])
                                </div>
                                <div class="form-group{{ $errors->has('email') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-email">{{ __('Email') }}</label>
                                    <input type="email" name="email" id="input-email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="{{ __('Email') }}" value="{{ old('email') }}" required>

                                    @include('alerts.feedback', ['field' => 'email'])
                                </div>
                                <div class="form-group{{ $errors->has('phone') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-phone">{{ __('Phone') }}</label>
                                    <input type="number" name="phone" id="input-phone" class="form-control{{ $errors->has('phone') ? ' is-invalid' : '' }}" placeholder="{{ __('Phone') }}" value="{{ old('phone') }}" required>

                                    @include('alerts.feedback', ['field' => 'phone'])
                                </div>
                                <div class="form-group{{ $errors->has('nickname') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-nickname">Alias</label>
                                    <input type="text" name="nickname" id="input-nickname" class="form-control{{ $errors->has('nickname') ? ' is-invalid' : '' }}" placeholder="Alias" value="{{ old('nickname') }}" required>

                                    @include('alerts.feedback', ['field' => 'nickname'])
                                </div>

                                <div class="form-group{{ $errors->has('photo') ? ' has-danger' : '' }} d-flex flex-column">
                                    <label class="form-control-label" for="input-name">{{ __('Profile Photo') }}</label>
                                    <div class="fileinput fileinput-new" data-provides="fileinput">
                                        <div class="fileinput-new thumbnail ">
                                            <img src="{{ request()->picture ? request()->picture : asset('img/No Profile Picture.png') }}" alt="...">
                                        </div>
                                        <div class="fileinput-preview fileinput-exists thumbnail"></div>
                                        <div class="custom-file">
                                            <input type="file" name="photo" class="custom-file-input{{ $errors->has('photo') ? ' is-invalid' : '' }}" id="input-picture" accept="image/*">
                                            <label class="custom-file-label" for="input-picture">{{ request()->picture ? request()->picture : 'Seleccionar foto de perfil' }}</label>
                                        </div>
                                        @include('alerts.feedback', ['field' => 'photo'])
                                    </div>
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