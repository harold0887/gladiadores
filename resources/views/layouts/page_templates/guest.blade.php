@include('includes.navbar')

<div class="wrapper wrapper-full-page ">
    <div class="full-page section-image" filter-color="black" data-image="{{ asset($backgroundImagePath ?? "img/bg/fabio-mangione.jpg") }}">
        @yield('content')
        @include('includes.footer')
    </div>
</div>