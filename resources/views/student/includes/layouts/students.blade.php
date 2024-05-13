<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
@include('student.includes.sections.header')

<body>
    @include('student.includes.menus.side')
    @include('student.includes.menus.top')

    @yield('content')

    @include('student.includes.sections.footer')

</body>

</html>
