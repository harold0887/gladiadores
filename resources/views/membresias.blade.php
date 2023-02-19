@extends('layouts.app', [
'class' => 'login-page',
'backgroundImagePath' => '',
'folderActive' => '',
'elementActive' => '',
'title'=>'Membresias',
'navbarClass'=>'bg-dark py-3',
'activePage'=>'membership',
])

@section('content')

<div class="content">
    <div class="container p-0">
        <div class="row justify-content-center">

            @if(isset($memberships) && $memberships->count() > 0)

            @foreach($memberships as $membership)


            <div class="col-lg-4  p-0 p-md-3">
                <div class="card card-pricing  {{$membership->main==0 ? 'card-plain border': 'border border-warning'}} " style=" overflow: hidden;">
                    <div class="card-header bg-warning">
                        <h6 class="title">{{$membership->name}}</h6>
                    </div>
                    @if($membership->main==1)

                    <div class="price-label"><span>Oferta</span></div>

                    @endif
                    
                    <div class="card-header text-center pt-4 pb-3 " style="height: 150px">

                        @if($membership->main==1)
                        <h4 class="text-mindle mt-0 text-left pl-5" style="color:grey; text-decoration: line-through">
                            <small class=" text-mindle align-top me-1">$ {{$membership->price}}</small>
                        </h4>
                        <h1 class="font-weight-bold mt-2">
                            <small class=" text-mindle align-top me-1">$</small>{{$membership->price_with_discount}}<small class="text-md"></small>
                        </h1>

                        @else
                        <h2 class="text-mindle mt-5 pt-2 ">
                            <small class=" text-mindle align-top me-1">$</small>{{$membership->price_with_discount}}<small class="text-md"></small>
                        </h2>
                        @endif
                    </div>
                    <div class="card-body text-start  pt-0">
                        <div class="d-flex justify-content-start r p-2">
                            <i class="material-icons my-auto mr-2">done</i>
                            <span class="ps-3">Acceso ilimitado al gimnasio.</span>
                        </div>
                        <div class="d-flex justify-content-start p-2">
                            <i class="material-icons my-auto mr-2">done</i>
                            <span class="ps-3">Equipo de cardio y fuerza.</span>
                        </div>
                        <div class="d-flex   p-2">
                            <i class="material-icons my-auto mr-2">done</i>
                            <span class="ps-3">Entrenamiento personalizado. </span>
                        </div>
                        <div class="d-flex justify-content-start  p-2">
                            <i class="material-icons my-auto mr-2">remove</i>
                            <span class="ps-3">Sketch Files </span>
                        </div>
                        <div class="d-flex justify-content-lg-start justify-content-center p-2">
                            <i class="material-icons my-auto mr-2">remove</i>
                            <span class="ps-3">API Access </span>
                        </div>
                        <div class="d-flex justify-content-lg-start justify-content-center p-2">
                            <i class="material-icons my-auto mr-2">remove</i>
                            <span class="ps-3">Complete documentation </span>
                        </div>

                    </div>
                    <div class="card-footer">
                        <button class=" btn   btn-primary btn-round ">
                            <span>inscribirme</span>
                        </button>
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