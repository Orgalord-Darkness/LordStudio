<!DOCTYPE html> 
<html lang="fr"> 
    <head> 
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
        <title>Home</title> 
        <!-- Inclure Tailwind CSS via le CDN --> 
        <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
        {{-- @vite('resources/css/app.css') --}}
    </head> 
    <body> 
        @include('layout._navbar')
        <h1>Bienvenue sur la page d'accueil</h1> 
    </body> 
</html>