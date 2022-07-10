<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Crud</title>

    {{-- This makes day picker have a different date format --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/pikaday/pikaday.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/pikaday/css/pikaday.css">

    {{-- CSS --}}
    <link rel="stylesheet" href="custom.css">

    {{-- Jantinerezzo requirements --}}
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <x-livewire-alert::scripts />

    {{-- Livewire --}}
    <livewire:styles/>
</head>
<body>
    @yield('content')

    @if(isset($slot))
        {{ $slot }}
    @endif

    <livewire:scripts/>
</body>
</html>