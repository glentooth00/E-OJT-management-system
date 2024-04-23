<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
@include('includes.sections.header')

<body>
    @include('includes.menus.side')
    @include('includes.menus.top')

    @yield('content')

    @include('includes.sections.footer')

</body>

</html>
