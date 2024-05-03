<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <x-partials.head></x-partials.head>
    </head>
    <body>
        <p>guest</p>
        <div class="font-sans text-gray-900 antialiased">
            {{ $slot }}
        </div>
        <x-partials.footer></x-partials.footer>
    </body>
    @stack('script')

</html>
