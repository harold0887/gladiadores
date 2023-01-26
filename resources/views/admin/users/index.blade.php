@extends('layouts.app',[
'class' => '',
'folderActive' => '',
'elementActive' => 'users',
'title'=>'Usuarios',
'navbarClass'=>'navbar-transparent',
'activePage'=>'users',
])

@section('content')
<livewire:index-users/>
@endsection

