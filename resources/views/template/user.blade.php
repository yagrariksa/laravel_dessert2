<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>

    <link rel="stylesheet" href="{{ asset('css/user/nav.css') }}">
    @yield('css')
    @livewireStyles
</head>
<body>

    @livewire('live-search')

    @yield('content')

    <footer>
        Lorem ipsum dolor sit amet consectetur adipisicing elit. Adipisci earum ab eligendi, inventore nobis soluta voluptatem molestias optio voluptates tempora consectetur consequatur omnis animi cumque debitis numquam iusto dolores veritatis!
    </footer>
    
    @yield('js')
    @livewireScripts
</body>
</html>