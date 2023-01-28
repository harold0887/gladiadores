@extends('layouts.app',[
'class' => '',
'folderActive' => '',
'elementActive' => 'memberships',
'title'=>'Usuarios',
'navbarClass'=>'navbar-transparent',
'activePage'=>'memberships',
])

@section('content')
<livewire:index-memberships/>
@endsection

