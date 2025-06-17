@props(['navigation' => true])

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>@yield('title')</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />

        <!-- Styles / Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="bg-neutral-100 flex justify-center flex-col min-h-screen">
        <div class="mx-5 my-5 md:mx-auto md:min-w-96">
            @if ($navigation)
                <!-- Navigation -->
                <div class="flex items-center justify-center text-sm space-x-3 rtl:space-x-reverse mb-2">
                    <a href="{{ route('client.index') }}">{{ __('Home') }}</a>
                    <span>|</span>
                    <a href="{{ route('dashboard.subscribers.index') }}">{{ __('Subscribers') }}</a>
                    <a href="{{ route('dashboard.subscribers.create') }}">{{ __('Create') }}</a>
                    <span>|</span>
                    <a href="{{ route('dashboard.newsletter.index') }}">{{ __('Newsletter') }}</a>
                </div>
            @endif

            <!-- Messages -->
            <x-session-messages />

            {{ $slot }}
        </div>
    </body>

    <!-- Scripts -->
    <script>
        // Disable form buttons after click
        document.querySelectorAll('form').forEach(form => {
            form.addEventListener('submit', () => {
                form.querySelectorAll('button').forEach(btn => {
                    btn.disabled = true;
                });
            });
        });
    </script>
</html>
