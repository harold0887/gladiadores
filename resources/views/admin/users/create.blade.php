@extends('layouts.app',[
'class' => '',
'folderActive' => '',
'elementActive' => 'users',
'title'=>'Usuarios',
'navbarClass'=>'navbar-transparent',
'activePage'=>'users',
])

@section('content')
<div class="content">
    <div class="container-fluid mt--6  ">
        <div class="row m-0">
            <div class="col-xl-12 order-xl-1">
                <div class="card">
                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">Nuevo usuario</h3>
                            </div>
                            <div class="col-4 text-right">
                                <a href="{{ route('users.index') }}" class="btn btn-sm btn-primary">{{ __('Back to list') }}</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{ route('users.store') }}" autocomplete="off" enctype="multipart/form-data">
                            @csrf

                            <h6 class="heading-small text-muted mb-4">{{ __('User information') }}</h6>
                            <div class="pl-lg-4">
                                <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-name">{{ __('Name') }}</label>
                                    <input type="text" name="name" id="input-name" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Name') }}" value="{{ old('name') }}"  autofocus>

                                    @include('alerts.feedback', ['field' => 'name'])
                                </div>
                                <div class="form-group{{ $errors->has('email') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-email">{{ __('Email') }}</label>
                                    <input type="email" name="email" id="input-email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="{{ __('Email') }}" value="{{ old('email') }}" >

                                    @include('alerts.feedback', ['field' => 'email'])
                                </div>
                                <div class="form-group{{ $errors->has('phone') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-phone">{{ __('Phone') }}</label>
                                    <input type="phone" name="phone" id="input-phone" class="form-control{{ $errors->has('phone') ? ' is-invalid' : '' }}" placeholder="{{ __('Phone') }}" value="{{ old('phone') }}" >

                                    @include('alerts.feedback', ['field' => 'phone'])
                                </div>
                                <div class="form-group{{ $errors->has('nickname') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-nickname">Alias</label>
                                    <input type="text" name="nickname" id="input-nickname" class="form-control{{ $errors->has('nickname') ? ' is-invalid' : '' }}" placeholder="Alias" value="{{ old('nickname') }}"  autofocus>

                                    @include('alerts.feedback', ['field' => 'nickname'])
                                </div>
                                <div class="form-group{{ $errors->has('role_id') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-role">{{ __('Role') }}</label>
                                    <select name="role_id" id="input-role" class="form-control{{ $errors->has('role_id') ? ' is-invalid' : '' }}" placeholder="{{ __('Role') }}" >
                                        <option value="">-</option>
                                        @foreach ($roles as $role)
                                        <option value="{{ $role->id }}" {{ $role->id == old('role_id') ? 'selected' : '' }}>{{ $role->name }}</option>
                                        @endforeach
                                    </select>

                                    @include('alerts.feedback', ['field' => 'role_id'])
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
                                <div class="form-group{{ $errors->has('password') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-password">{{ __('Password') }}</label>
                                    <input type="password" name="password" id="input-password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" placeholder="{{ __('Password') }}" value="" >

                                    @include('alerts.feedback', ['field' => 'password'])
                                </div>
                                <div class="form-group">
                                    <label class="form-control-label" for="input-password-confirmation">{{ __('Confirm Password') }}</label>
                                    <input type="password" name="password_confirmation" id="input-password-confirmation" class="form-control" placeholder="{{ __('Confirm Password') }}" value="" >
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