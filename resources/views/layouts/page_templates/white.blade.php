<!-- @include('includes.navbar')

<div class="wrapper wrapper-full-page ">
    <div class="full-page1 section-image" filter-color="black" data-image="{{ asset($backgroundImagePath ?? "img/bg/fabio-mangione.jpg") }}">
        @yield('content')
        @include('includes.footer')
    </div>
</div> -->



<div class="wrapper">



    <div class="main-panel1">
        
        @include('includes.navbar')
        @yield('content')
        @include('includes.footer')
    </div>
</div>