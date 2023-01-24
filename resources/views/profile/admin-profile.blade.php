@extends('layouts.app', [
'title' => __('User Profile'),
'navClass' => 'bg-default',
'class' => '',
'folderActive' => 'profile',
'elementActive' => 'profile',
'navbarClass'=>'nav-transparent',
'activePage'=>'profile',
])

@section('content')
<div class="content">
    <div class="row">
        <div class="col-md-4">
            <div class="card card-user">
                <div class="image">
                    <img src="{{ asset('img/bg/damir-bosnjak.jpg') }}" alt="...">
                </div>
                <div class="card-body">
                    <div class="author">
                        <a href="#">
                            @if(isset(auth()->user()->picture))
                            <img class="avatar border-gray" src="{{ Storage::url(Auth::user()->picture) }}" alt="...">
                            @else
                            <img class="avatar border-gray" src="{{ asset('img/No Profile Picture.png') }}" alt="...">
                            @endif

                            <h5 class="title">{{ __(auth()->user()->name)}}</h5>
                        </a>
                        <p class="description">
                            @ {{ __(auth()->user()->name)}}
                        </p>
                    </div>
                    <p class="description text-center">
                        {{ __('I like the way you work it') }}
                        <br> {{ __('No diggity') }}
                        <br> {{ __('I wanna bag it up') }}
                    </p>
                </div>
                <div class="card-footer">
                    <hr>
                    <div class="button-container">
                        <div class="row">
                            <div class="col-lg-3 col-md-6 col-6 ml-auto">
                                <h5>{{ __('12') }}
                                    <br>
                                    <small>{{ __('Files') }}</small>
                                </h5>
                            </div>
                            <div class="col-lg-4 col-md-6 col-6 ml-auto mr-auto">
                                <h5>{{ __('2GB') }}
                                    <br>
                                    <small>{{ __('Used') }}</small>
                                </h5>
                            </div>
                            <div class="col-lg-3 mr-auto">
                                <h5>{{ __('24,6$') }}
                                    <br>
                                    <small>{{ __('Spent') }}</small>
                                </h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
           
        </div>
        <div class="col-md-8 text-center" id="profile-tour">
            @include('alerts.error_self_update', ['key' => 'not_allow_profile'])
            <form class="form-horizontal col-md-12 mx-auto" action="{{ route('dashboard.update') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="card">
                    <div class="card-header">
                        <h5 class="title">{{ __('Edit Profile') }}</h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <label class="col-md-3 col-form-label">{{ __('Name') }}</label>
                            <div class="col-md-9">
                                <div class="form-group">
                                    <input type="text" name="name" class="form-control" placeholder="Name" value="{{ auth()->user()->name }}" required>
                                </div>
                                @if ($errors->has('name'))
                                <span class="invalid-feedback" style="display: block;" role="alert">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-md-3 col-form-label">{{ __('Email') }}</label>
                            <div class="col-md-9">
                                <div class="form-group">
                                    <input type="email" name="email" class="form-control" placeholder="Email" value="{{ auth()->user()->email }}" required>
                                </div>
                                @if ($errors->has('email'))
                                <span class="invalid-feedback" style="display: block;" role="alert">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="fileinput fileinput-new text-center" data-provides="fileinput">
                            <div class="fileinput-new thumbnail img-circle img-raised">
                                <img src="{{ auth()->user()->picture ? Storage::url(Auth::user()->picture) : asset('img/No Profile Picture.png') }}" alt="...">
                            </div>
                            <div class="fileinput-preview fileinput-exists thumbnail img-circle img-raised"></div>
                            <div>
                                <span class="btn btn-raised btn-round btn-default btn-file">
                                    <span class="fileinput-new">{{ __('Add Photo') }}</span>
                                    <span class="fileinput-exists">{{ __('Change') }}</span>
                                    <input type="file" name="photo" /></span>
                                <br />
                                <a href="#pablo" class="btn btn-danger btn-round fileinput-exists" data-dismiss="fileinput"><i class="fa fa-times"></i>{{ __('Remove') }}</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer ">
                        <div class="row">
                            <div class="col-md-12 text-center">
                                <button type="submit" class="btn btn-info btn-round">{{ __('Save Changes') }}</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
            <form class="form-horizontal col-md-12 mx-auto" action="{{ route('dashboard.password') }}" method="POST">
                @csrf
                @method('PUT')
                <div class="card">
                    <div class="card-header">
                        <h5 class="title">{{ __('Change Password') }}</h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <label class="col-md-3 col-form-label">{{ __('Old Password') }}</label>
                            <div class="col-md-9">
                                <div class="form-group">
                                    <input type="password" name="old_password" class="form-control" placeholder="{{ __('Old Password') }}" required>
                                </div>
                                @if ($errors->has('old_password'))
                                <span class="invalid-feedback" style="display: block;" role="alert">
                                    <strong>{{ $errors->first('old_password') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-md-3 col-form-label">{{ __('New Password') }}</label>
                            <div class="col-md-9">
                                <div class="form-group">
                                    <input type="password" name="password" class="form-control" placeholder="{{ __('Password') }}" required>
                                </div>
                                @if ($errors->has('password'))
                                <span class="invalid-feedback" style="display: block;" role="alert">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-md-3 col-form-label">{{ __('Password Confirmation') }}</label>
                            <div class="col-md-9">
                                <div class="form-group">
                                    <input type="password" name="password_confirmation" class="form-control" placeholder="{{ __('Password Confirmation') }}" required>
                                </div>
                                @if ($errors->has('password_confirmation'))
                                <span class="invalid-feedback" style="display: block;" role="alert">
                                    <strong>{{ $errors->first('password_confirmation') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="card-footer ">
                        <div class="row">
                            <div class="col-md-12 text-center">
                                <button type="submit" class="btn btn-info btn-round">{{ __('Save Changes') }}</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@include('includes.alerts')
