@extends('layouts.app',[
'class' => '',
'folderActive' => '',
'elementActive' => 'memberships',
'title'=>'Membresias',
'navbarClass'=>'navbar-transparent',
'activePage'=>'membresias',
])

@section('content')
<livewire:index-memberships/>
@endsection

