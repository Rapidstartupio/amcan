<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

       
        <style >
            [wire\:loading], [wire\:loading\.delay], [wire\:loading\.inline-block], [wire\:loading\.inline], [wire\:loading\.block], [wire\:loading\.flex], [wire\:loading\.table], [wire\:loading\.grid], [wire\:loading\.inline-flex] {
                display: none;
            }

            [wire\:loading\.delay\.shortest], [wire\:loading\.delay\.shorter], [wire\:loading\.delay\.short], [wire\:loading\.delay\.long], [wire\:loading\.delay\.longer], [wire\:loading\.delay\.longest] {
                display:none;
            }

            [wire\:offline] {
                display: none;
            }

            [wire\:dirty]:not(textarea):not(input):not(select) {
                display: none;
            }

            input:-webkit-autofill, select:-webkit-autofill, textarea:-webkit-autofill {
                animation-duration: 50000s;
                animation-name: livewireautofill;
            }

        </style>
        <!-- Scripts -->
        <link rel="preload" as="style" href="{{ asset('/css/build/app-b076542d.css') }}" />
        <link rel="modulepreload" href="{{ asset('/js/build/app-ce9f0651.js') }}" />
        <link rel="stylesheet" href="{{ asset('/css/build/app-b076542d.css') }}" />
        <script type="module" src="{{ asset('/js/build/app-ce9f0651.js') }}"></script>        
        <script>
            if (localStorage.getItem('dark-mode') === 'false' || !('dark-mode' in localStorage)) {
                document.querySelector('html').classList.remove('dark');
                document.querySelector('html').style.colorScheme = 'light';
            } else {
                document.querySelector('html').classList.add('dark');
                document.querySelector('html').style.colorScheme = 'dark';
            }
        </script>          
    </head>
    <body class="font-inter antialiased bg-slate-100 dark:bg-slate-900 text-slate-600 dark:text-slate-400">

        @yield('content')

    </body>
</html>
