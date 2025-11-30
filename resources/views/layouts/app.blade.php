<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>{{ $title ?? 'Laundry Booking' }}</title>
</head>
<body class="bg-gray-100 text-gray-900">

    {{-- Navbar --}}
    @include('profile.partials.navbar')

    <div class="container mx-auto py-6">
        @yield('content')
    </div>

</body>
</html>
