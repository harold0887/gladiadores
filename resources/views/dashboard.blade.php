@extends('layouts.app',[
'class' => '',
'folderActive' => '',
'elementActive' => 'dashboard',
'title'=>'Dashboard',
'navbarClass'=>'navbar-transparent',
'activePage'=>'dashboard',
])

@section('content')
<livewire:dashboard-render />
@endsection