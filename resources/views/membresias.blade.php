@extends('layouts.app', [
'class' => 'login-page',
'backgroundImagePath' => '',
'folderActive' => '',
'elementActive' => '',
'title'=>'Membresias',
'navbarClass'=>'bg-dark',
'activePage'=>'membership',
])

@section('content')

<div class="content">
    <div class="container">
        <div class="row">

            @if(isset($memberships) && $memberships->count() > 0)

            @foreach($memberships as $membership)
            <div class="col-lg-4">
                <div class="card card-pricing {{$membership->main==0 ? 'card-plain': ''}}  rounded shadow shadow-sm ">
                    <div class="card-header">
                        <h6 class="card-category">{{$membership->name}}</h6>
                    </div>
                    <div class="card-body">
                        <div class="card-icon icon-warning ">
                            <i class="nc-icon nc-spaceship"></i>
                        </div>
                        <h3 class="card-title">${{$membership->price_with_discount}}</h3>
                        <ul>
                            <li>Working materials in EPS</li>
                            <li>6 months access to the library</li>
                        </ul>
                    </div>
                    <div class="card-footer">
                        <a href="#pablo" class="btn btn-round btn-primary ">Add to Cart</a>
                    </div>
                </div>
            </div>
            @endforeach

            @endif






        </div>
    </div>

</div>




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