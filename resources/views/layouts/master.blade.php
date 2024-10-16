@include('layouts.header')



@include('layouts.navbar')

@section('sidebar')
    @include('layouts.sidebar') <!-- Sidebar default -->
@show


@yield('content')



@include('layouts.footer')
