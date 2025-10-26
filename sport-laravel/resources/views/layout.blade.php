<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <title>@yield('title')</title>
</head>
<body class="min-h-screen bg-gradient-to-b from-blue-50 to-blue-100 text-gray-800">

    <!-- Navbar -->
    <nav class="bg-blue-600 text-white py-4 shadow-lg">
        <div class="container mx-auto flex justify-center space-x-8 font-semibold">
            <a href="/" class="hover:text-yellow-300 transition-colors {{Request::is('/') ? 'bg-blue-700 rounded-sm p-1' : ''}}">Accueil</a>
            <a href="/exercices/create" class="hover:text-yellow-300 transition-colors {{Request::is('create') ? 'bg-blue-700 rounded-sm p-1' : ''}}">Créer</a>
            <a href="/" class="hover:text-yellow-300 transition-colors {{Request::is('/') ? 'bg-blue-700 rounded-sm p-1' : ''}}">Se connecter</a>
        </div>
    </nav>

    <section>
        @yield('mainSection')
    </section>

    <footer class="bg-blue-600 text-white text-center py-4 mt-10">

        <p>&copy; 2025 Mon Application de Sport</p>

        
    </footer>
</body>
</html>