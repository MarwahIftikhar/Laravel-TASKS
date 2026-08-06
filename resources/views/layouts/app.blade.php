<!DOCTYPE html>
<html>

<head>
    <title>My Website</title>

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
</head>

<body>

    @if(!request()->routeIs('departments.create'))

        <nav>
            <a href="{{ url('/') }}">Home</a> |
            <a href="{{ url('/about') }}">About</a> |
            <a href="{{ url('/contact') }}">Contact</a> |
            <a href="{{ route('departments.index') }}">Departments</a> |
            <a href="{{ route('employees.index') }}">Employees</a>
        </nav>

        <hr>

    @endif

    <div class="container">
        @yield('content')
    </div>

    @stack('scripts')

</body>

</html>