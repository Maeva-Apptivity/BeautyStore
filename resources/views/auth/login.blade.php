<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion - Mon Application</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            darkMode: 'class',
            theme: {
                extend: {
                    colors: {
                        primary: {
                            50: '#f0f9ff',
                            100: '#e0f2fe',
                            500: '#0ea5e9',
                            600: '#0284c7',
                            700: '#0369a1',
                            900: '#0c4a6e',
                        }
                    }
                }
            }
        }
    </script>
    <style>
        body {
            font-family: 'Inter', sans-serif;
        }
        .theme-toggle {
            position: absolute;
            top: 1.5rem;
            right: 1.5rem;
            cursor: pointer;
            z-index: 10;
        }
        .card {
            transition: all 0.3s ease;
        }
        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
        }
        .btn-google {
            transition: all 0.3s ease;
        }
        .btn-google:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
        }
        .logo-container {
            transition: transform 0.5s ease;
        }
        .logo-container:hover {
            transform: scale(1.05);
        }
    </style>
</head>
<body class="bg-gray-50 dark:bg-gray-900 min-h-screen flex items-center justify-center p-4">
    <!-- Bouton de changement de thème -->
    <button id="themeToggle" class="theme-toggle p-2 rounded-full bg-white dark:bg-gray-800 shadow-md">
        <svg id="themeIcon" class="w-6 h-6 text-gray-800 dark:text-yellow-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z"></path>
        </svg>
    </button>

    <div class="w-full max-w-md">
        <!-- Logo avec changement selon le thème -->
        <div class="logo-container mb-8 flex justify-center">
            <picture>
                <source srcset="https://placehold.co/200x60/0c4a6e/white/jpg?text=Logo+Dark" media="(prefers-color-scheme: dark)">
                <img src="https://placehold.co/200x60/0284c7/white/jpg?text=Logo+Light" alt="Logo de l'application" class="h-12">
            </picture>
        </div>

        <!-- Carte de connexion -->
        <div class="card bg-white dark:bg-gray-800 rounded-2xl shadow-xl overflow-hidden">
            <div class="p-8">
                <h2 class="text-2xl font-bold text-center text-gray-800 dark:text-white mb-2">Connexion</h2>
                <p class="text-center text-gray-600 dark:text-gray-300 mb-8">Accédez à votre compte</p>

                <!-- Bouton Google -->
                <a href="{{route('google.login')}}" class="btn-google flex items-center justify-center w-full py-3 mb-6 border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-700 text-gray-700 dark:text-gray-200 font-medium hover:bg-gray-50 dark:hover:bg-gray-600">
                    <img src="https://cdn-icons-png.flaticon.com/512/2991/2991148.png" class="w-5 h-5 mr-2" alt="Google Logo">
                    Se connecter avec Google
                </a>

                <div class="flex items-center my-6">
                    <div class="flex-grow border-t border-gray-300 dark:border-gray-600"></div>
                    <span class="mx-4 text-gray-500 dark:text-gray-400">Ou</span>
                    <div class="flex-grow border-t border-gray-300 dark:border-gray-600"></div>
                </div>

                <!-- Formulaire de connexion -->
                <form>
                    <div class="mb-4">
                        <label for="email" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Email</label>
                        <input type="email" id="email" class="w-full px-4 py-3 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-transparent dark:bg-gray-700 dark:text-white" placeholder="votre@email.com">
                    </div>

                    <div class="mb-6">
                        <label for="password" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Mot de passe</label>
                        <input type="password" id="password" class="w-full px-4 py-3 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-transparent dark:bg-gray-700 dark:text-white" placeholder="Votre mot de passe">
                    </div>

                    <div class="flex items-center justify-between mb-6">
                        <div class="flex items-center">
                            <input id="remember-me" type="checkbox" class="h-4 w-4 text-primary-600 focus:ring-primary-500 border-gray-300 rounded">
                            <label for="remember-me" class="ml-2 block text-sm text-gray-700 dark:text-gray-300">Se souvenir de moi</label>
                        </div>

                        <a href="#" class="text-sm text-primary-600 dark:text-primary-400 hover:text-primary-500">Mot de passe oublié?</a>
                    </div>

                    <button type="submit" class="w-full bg-primary-600 hover:bg-primary-700 text-white font-medium py-3 px-4 rounded-lg transition duration-300">
                        Se connecter
                    </button>
                </form>
            </div>

            <div class="px-8 py-4 bg-gray-50 dark:bg-gray-700 text-center">
                <p class="text-gray-600 dark:text-gray-300">
                    Pas encore de compte? 
                    <a href="#" class="font-medium text-primary-600 dark:text-primary-400 hover:text-primary-500">S'inscrire</a>
                </p>
            </div>
        </div>

        <!-- Informations supplémentaires -->
        <div class="mt-6 text-center text-sm text-gray-500 dark:text-gray-400">
            <p>En vous connectant, vous acceptez nos 
                <a href="#" class="text-primary-600 dark:text-primary-400 hover:text-primary-500">Conditions d'utilisation</a> 
                et notre 
                <a href="#" class="text-primary-600 dark:text-primary-400 hover:text-primary-500">Politique de confidentialité</a>.
            </p>
        </div>
    </div>

    <script>
        // Gestion du changement de thème
        const themeToggle = document.getElementById('themeToggle');
        const themeIcon = document.getElementById('themeIcon');
        
        // Vérifier le thème actuel
        if (localStorage.getItem('theme') === 'dark' || (!localStorage.getItem('theme') && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
            document.documentElement.classList.add('dark');
            themeIcon.innerHTML = '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z"></path>';
        }
        
        themeToggle.addEventListener('click', () => {
            if (document.documentElement.classList.contains('dark')) {
                document.documentElement.classList.remove('dark');
                localStorage.setItem('theme', 'light');
                themeIcon.innerHTML = '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z"></path>';
            } else {
                document.documentElement.classList.add('dark');
                localStorage.setItem('theme', 'dark');
                themeIcon.innerHTML = '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z"></path>';
            }
        });
    </script>
</body>
</html>