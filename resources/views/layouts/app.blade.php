<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Découvrez notre service de SMS marketing performant, compatible avec tous les opérateurs au Cameroun, pour des campagnes de communication efficaces.">
    <title>Service de SMS Marketing | Bulk SMS Cameroun</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="flex flex-col min-h-screen">
    @include('components.header')
    
    <main class="flex-grow">
        @yield('content')
    </main>
    
    @include('components.footer')
</body>
</html>