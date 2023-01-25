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

@push('scripts')
<script>
    $(document).ready(function() {
        // Javascript method's body can be found in assets/js/demos.js
        demo.initDashboardPageCharts();
        demo.initVectorMap();
    });
</script>
@endpush