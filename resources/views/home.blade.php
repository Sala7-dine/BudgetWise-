<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>BudgetWise - Votre Assistant Financier Intelligent</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="antialiased">
    <!-- Navigation -->
    <nav class="absolute top-0 left-0 w-full z-50 py-6">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center">
                <div class="flex items-center px-6">
                    <div class="flex items-center space-x-3">
                        <div class="p-2 bg-blue-600/10 rounded-xl">
                            <svg class="w-8 h-8 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                        </div>
                        <span class="text-xl font-bold text-white">BudgetWise</span>
                    </div>
                </div>
                <div class="flex items-center space-x-6">
                    @if (Route::has('login'))
                        @auth
                            <a href="{{ url('/dashboard') }}" class="text-white hover:text-blue-200 transition-colors duration-300">Dashboard</a>
                        @else
                            <a href="{{ route('login') }}" class="text-white hover:text-blue-200 transition-colors duration-300">Connexion</a>
                            @if (Route::has('register'))
                                <a href="{{ route('register') }}" class="bg-white text-blue-600 px-6 py-3 rounded-full font-semibold hover:bg-blue-50 transition-all duration-300 transform hover:scale-105">
                                    Commencer
                                </a>
                            @endif
                        @endauth
                    @endif
                </div>
            </div>
        </div>
    </nav>

    <!-- Hero Section avec design moderne et sombre -->
    <section class="relative min-h-screen flex items-center justify-center bg-gray-900 overflow-hidden">
        <!-- Motif de fond animé -->
        <div class="absolute inset-0">
            <div class="absolute inset-0 bg-[url('/pattern-dark.svg')] opacity-5"></div>
            <div class="absolute top-0 left-0 w-full h-full">
                <div class="relative h-full">
                    <!-- Grille de points animée -->
                    <div class="absolute inset-0 grid grid-cols-12 gap-4 transform rotate-12 scale-150">
                        @for ($i = 0; $i < 24; $i++)
                            <div class="col-span-1 animate-pulse-slow" style="animation-delay: {{ $i * 0.1 }}s">
                                <div class="h-2 w-2 rounded-full bg-blue-500/20"></div>
                            </div>
                        @endfor
                    </div>
                </div>
            </div>
        </div>

        <!-- Cercles lumineux -->
        <div class="absolute top-1/4 -left-12 w-96 h-96 bg-blue-600/10 rounded-full blur-3xl"></div>
        <div class="absolute bottom-1/4 -right-12 w-96 h-96 bg-purple-600/10 rounded-full blur-3xl"></div>

        <!-- Contenu principal -->
        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-32">
            <div class="grid lg:grid-cols-2 gap-12 items-center">
                <!-- Texte et CTA -->
                <div class="text-left">
                    <h1 class="text-5xl md:text-6xl font-bold text-white mb-6 leading-tight">
                        Gérez vos finances avec 
                        <span class="relative">
                            <span class="relative z-10 text-blue-400">intelligence</span>
                            <span class="absolute bottom-2 left-0 w-full h-3 bg-blue-500/20 -rotate-2"></span>
                        </span>
                    </h1>
                    <p class="text-xl text-gray-300 mb-8">
                        Découvrez une nouvelle façon de gérer votre argent avec BudgetWise. Suivi intelligent, objectifs personnalisés et conseils IA en temps réel.
                    </p>
                    <div class="flex flex-col sm:flex-row gap-4">
                        <a href="{{ route('register') }}" class="inline-flex items-center justify-center px-8 py-4 bg-blue-500 text-white rounded-xl font-semibold hover:bg-blue-600 transform hover:scale-105 transition-all duration-300 shadow-lg hover:shadow-blue-500/25">
                            <span>Commencer gratuitement</span>
                            <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                            </svg>
                        </a>
                        <a href="#demo" class="inline-flex items-center justify-center px-8 py-4 border-2 border-gray-700 text-gray-300 rounded-xl font-semibold hover:bg-gray-800 transition-all duration-300">
                            Voir la démo
                        </a>
                    </div>

                    <!-- Statistiques -->
                    <div class="mt-12 grid grid-cols-3 gap-8">
                        <div class="text-center p-4 bg-gray-800/50 rounded-xl backdrop-blur-sm">
                            <div class="text-3xl font-bold text-blue-400">10K+</div>
                            <div class="text-gray-400 text-sm">Utilisateurs</div>
                        </div>
                        <div class="text-center p-4 bg-gray-800/50 rounded-xl backdrop-blur-sm">
                            <div class="text-3xl font-bold text-blue-400">50M DH</div>
                            <div class="text-gray-400 text-sm">Économisés</div>
                        </div>
                        <div class="text-center p-4 bg-gray-800/50 rounded-xl backdrop-blur-sm">
                            <div class="text-3xl font-bold text-blue-400">4.9/5</div>
                            <div class="text-gray-400 text-sm">Note moyenne</div>
                        </div>
                    </div>
                </div>

                <!-- Image/Animation -->
                <div class="relative hidden lg:block">
                    <div class="relative z-10 bg-gray-800 rounded-2xl p-2 shadow-2xl transform hover:scale-105 transition-all duration-500">
                        <img src="/dashboard-preview.png" alt="Dashboard Preview" class="rounded-xl">
                        <!-- Éléments flottants -->
                        <div class="absolute -top-6 -right-6 bg-blue-500 text-white p-4 rounded-xl shadow-lg transform rotate-6">
                            <div class="text-sm font-semibold">+28% d'économies</div>
                        </div>
                        <div class="absolute -bottom-6 -left-6 bg-purple-500 text-white p-4 rounded-xl shadow-lg transform -rotate-6">
                            <div class="text-sm font-semibold">Objectifs atteints</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Comment ça marche Section -->
    <section id="how-it-works" class="py-24 bg-gray-900">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-20">
                <h2 class="text-4xl font-bold text-white mb-4">Comment ça marche ?</h2>
                <p class="text-xl text-gray-400">Une approche simple en trois étapes pour gérer vos finances</p>
            </div>

            <div class="grid md:grid-cols-3 gap-12">
                <div class="relative">
                    <div class="absolute -top-4 -left-4 w-16 h-16 bg-blue-900/50 rounded-full flex items-center justify-center text-2xl font-bold text-blue-400">1</div>
                    <div class="bg-gray-800 rounded-3xl p-8 h-full transform transition-all duration-300 hover:scale-105 hover:shadow-xl border border-gray-700/50">
                        <div class="h-16 w-16 bg-blue-600 rounded-2xl flex items-center justify-center mb-6">
                            <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                            </svg>
                        </div>
                        <h3 class="text-2xl font-semibold text-white mb-4">Créez votre compte</h3>
                        <p class="text-gray-400">Inscrivez-vous en quelques secondes et configurez votre profil financier personnalisé.</p>
                    </div>
                </div>

                <div class="relative">
                    <div class="absolute -top-4 -left-4 w-16 h-16 bg-blue-900/50 rounded-full flex items-center justify-center text-2xl font-bold text-blue-400">2</div>
                    <div class="bg-gray-800 rounded-3xl p-8 h-full transform transition-all duration-300 hover:scale-105 hover:shadow-xl border border-gray-700/50">
                        <div class="h-16 w-16 bg-blue-600 rounded-2xl flex items-center justify-center mb-6">
                            <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4"></path>
                            </svg>
                        </div>
                        <h3 class="text-2xl font-semibold text-white mb-4">Suivez vos dépenses</h3>
                        <p class="text-gray-400">Enregistrez et catégorisez automatiquement toutes vos transactions.</p>
                    </div>
                </div>

                <div class="relative">
                    <div class="absolute -top-4 -left-4 w-16 h-16 bg-blue-900/50 rounded-full flex items-center justify-center text-2xl font-bold text-blue-400">3</div>
                    <div class="bg-gray-800 rounded-3xl p-8 h-full transform transition-all duration-300 hover:scale-105 hover:shadow-xl border border-gray-700/50">
                        <div class="h-16 w-16 bg-blue-600 rounded-2xl flex items-center justify-center mb-6">
                            <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"></path>
                            </svg>
                        </div>
                        <h3 class="text-2xl font-semibold text-white mb-4">Optimisez</h3>
                        <p class="text-gray-400">Recevez des suggestions personnalisées pour améliorer votre situation financière.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section class="py-24 bg-gray-800 relative overflow-hidden">
        <div class="absolute inset-0">
            <div class="absolute inset-0 bg-[url('/pattern-dark.svg')] opacity-5"></div>
            <div class="absolute top-0 right-0 w-96 h-96 bg-blue-600/10 rounded-full blur-3xl"></div>
            <div class="absolute bottom-0 left-0 w-96 h-96 bg-purple-600/10 rounded-full blur-3xl"></div>
        </div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative">
            <div class="text-center mb-20">
                <h2 class="text-4xl font-bold text-white mb-4">Fonctionnalités intelligentes</h2>
                <p class="text-xl text-gray-400">Des outils puissants pour une meilleure gestion financière</p>
            </div>

            <div class="grid lg:grid-cols-2 gap-12">
                <div class="bg-gray-900 rounded-3xl p-8 shadow-lg transform transition-all duration-300 hover:shadow-2xl border border-gray-700/50">
                    <div class="flex items-start space-x-6">
                        <div class="flex-shrink-0">
                            <div class="w-12 h-12 bg-blue-900/50 rounded-2xl flex items-center justify-center">
                                <svg class="w-6 h-6 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                            </div>
                        </div>
                        <div>
                            <h3 class="text-xl font-semibold text-white mb-2">Suivi automatique</h3>
                            <p class="text-gray-400">Vos dépenses sont automatiquement catégorisées et analysées pour vous donner une vue claire de vos finances.</p>
                        </div>
                    </div>
                </div>

                <div class="bg-gray-900 rounded-3xl p-8 shadow-lg transform transition-all duration-300 hover:shadow-2xl border border-gray-700/50">
                    <div class="flex items-start space-x-6">
                        <div class="flex-shrink-0">
                            <div class="w-12 h-12 bg-blue-900/50 rounded-2xl flex items-center justify-center">
                                <svg class="w-6 h-6 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"></path>
                                </svg>
                            </div>
                        </div>
                        <div>
                            <h3 class="text-xl font-semibold text-white mb-2">Objectifs intelligents</h3>
                            <p class="text-gray-400">Définissez des objectifs d'épargne et recevez des suggestions personnalisées pour les atteindre plus rapidement.</p>
                        </div>
                    </div>
                </div>

                <div class="bg-gray-900 rounded-3xl p-8 shadow-lg transform transition-all duration-300 hover:shadow-2xl border border-gray-700/50">
                    <div class="flex items-start space-x-6">
                        <div class="flex-shrink-0">
                            <div class="w-12 h-12 bg-blue-900/50 rounded-2xl flex items-center justify-center">
                                <svg class="w-6 h-6 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4"></path>
                                </svg>
                            </div>
                        </div>
                        <div>
                            <h3 class="text-xl font-semibold text-white mb-2">Rapports détaillés</h3>
                            <p class="text-gray-400">Visualisez vos progrès avec des graphiques interactifs et des rapports personnalisés.</p>
                        </div>
                    </div>
                </div>

                <div class="bg-gray-900 rounded-3xl p-8 shadow-lg transform transition-all duration-300 hover:shadow-2xl border border-gray-700/50">
                    <div class="flex items-start space-x-6">
                        <div class="flex-shrink-0">
                            <div class="w-12 h-12 bg-blue-900/50 rounded-2xl flex items-center justify-center">
                                <svg class="w-6 h-6 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"></path>
                                </svg>
                            </div>
                        </div>
                        <div>
                            <h3 class="text-xl font-semibold text-white mb-2">Alertes intelligentes</h3>
                            <p class="text-gray-400">Recevez des notifications personnalisées pour rester sur la bonne voie.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Section CTA améliorée -->
    <section class="py-24 bg-gray-900 relative overflow-hidden">
        <div class="absolute inset-0">
            <!-- Motif de fond -->
            <div class="absolute inset-0 bg-[url('/pattern-dark.svg')] opacity-5"></div>
            <!-- Cercles lumineux -->
            <div class="absolute top-0 right-0 w-96 h-96 bg-blue-600/10 rounded-full blur-3xl"></div>
            <div class="absolute bottom-0 left-0 w-96 h-96 bg-purple-600/10 rounded-full blur-3xl"></div>
        </div>

        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="bg-gray-800 rounded-3xl p-12 shadow-2xl">
                <div class="grid lg:grid-cols-2 gap-12 items-center">
                    <div>
                        <h2 class="text-4xl font-bold text-white mb-6">
                            Prêt à transformer votre gestion financière ?
                        </h2>
                        <p class="text-xl text-gray-300 mb-8">
                            Rejoignez des milliers d'utilisateurs qui ont déjà pris le contrôle de leurs finances avec BudgetWise.
                        </p>
                        <ul class="space-y-4 mb-8">
                            <li class="flex items-center text-gray-300">
                                <svg class="w-6 h-6 text-blue-400 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                </svg>
                                Configuration rapide en moins de 2 minutes
                            </li>
                            <li class="flex items-center text-gray-300">
                                <svg class="w-6 h-6 text-blue-400 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                </svg>
                                14 jours d'essai gratuit
                            </li>
                            <li class="flex items-center text-gray-300">
                                <svg class="w-6 h-6 text-blue-400 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                </svg>
                                Annulation facile à tout moment
                            </li>
                        </ul>
                    </div>
                    <div class="bg-gray-900 p-8 rounded-2xl">
                        <form class="space-y-6">
                            <div>
                                <label class="block text-sm font-medium text-gray-300 mb-2">Email</label>
                                <input type="email" class="w-full px-4 py-3 bg-gray-800 border border-gray-700 rounded-xl text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent" placeholder="votreemail@exemple.com">
                            </div>
                            <button type="submit" class="w-full bg-blue-500 text-white px-8 py-4 rounded-xl font-semibold hover:bg-blue-600 transform hover:scale-105 transition-all duration-300 shadow-lg hover:shadow-blue-500/25">
                                Commencer gratuitement
                            </button>
                            <p class="text-sm text-gray-400 text-center">
                                Pas de carte de crédit requise
                            </p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-gray-900 text-white py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                <div>
                    <img class="h-8 w-auto mb-4" src="/logo.svg" alt="BudgetWise Logo">
                    <p class="text-gray-400">Votre assistant financier intelligent pour une meilleure gestion de votre argent.</p>
                </div>
                <div>
                    <h4 class="text-lg font-semibold mb-4">Liens rapides</h4>
                    <ul class="space-y-2">
                        <li><a href="#" class="text-gray-400 hover:text-white transition-colors duration-300">À propos</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white transition-colors duration-300">Fonctionnalités</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white transition-colors duration-300">Tarifs</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white transition-colors duration-300">Contact</a></li>
                    </ul>
                </div>
                <div>
                    <h4 class="text-lg font-semibold mb-4">Légal</h4>
                    <ul class="space-y-2">
                        <li><a href="#" class="text-gray-400 hover:text-white transition-colors duration-300">Confidentialité</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white transition-colors duration-300">Conditions</a></li>
                    </ul>
                </div>
                <div>
                    <h4 class="text-lg font-semibold mb-4">Suivez-nous</h4>
                    <div class="flex space-x-4">
                        <a href="#" class="text-gray-400 hover:text-white transition-colors duration-300">
                            <span class="sr-only">Facebook</span>
                            <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24">
                                <path fill-rule="evenodd" d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z" clip-rule="evenodd"/>
                            </svg>
                        </a>
                        <a href="#" class="text-gray-400 hover:text-white transition-colors duration-300">
                            <span class="sr-only">Instagram</span>
                            <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24">
                                <path fill-rule="evenodd" d="M12.315 2c2.43 0 2.784.013 3.808.06 1.064.049 1.791.218 2.427.465a4.902 4.902 0 011.772 1.153 4.902 4.902 0 011.153 1.772c.247.636.416 1.363.465 2.427.048 1.067.06 1.407.06 4.123v.08c0 2.643-.012 2.987-.06 4.043-.049 1.064-.218 1.791-.465 2.427a4.902 4.902 0 01-1.153 1.772 4.902 4.902 0 01-1.772 1.153c-.636.247-1.363.416-2.427.465-1.067.048-1.407.06-4.123.06h-.08c-2.643 0-2.987-.012-4.043-.06-1.064-.049-1.791-.218-2.427-.465a4.902 4.902 0 01-1.772-1.153 4.902 4.902 0 01-1.153-1.772c-.247-.636-.416-1.363-.465-2.427-.047-1.024-.06-1.379-.06-3.808v-.63c0-2.43.013-2.784.06-3.808.049-1.064.218-1.791.465-2.427a4.902 4.902 0 011.153-1.772A4.902 4.902 0 015.45 2.525c.636-.247 1.363-.416 2.427-.465C8.901 2.013 9.256 2 11.685 2h.63zm-.081 1.802h-.468c-2.456 0-2.784.011-3.807.058-.975.045-1.504.207-1.857.344-.467.182-.8.398-1.15.748-.35.35-.566.683-.748 1.15-.137.353-.3.882-.344 1.857-.047 1.023-.058 1.351-.058 3.807v.468c0 2.456.011 2.784.058 3.807.045.975.207 1.504.344 1.857.182.466.399.8.748 1.15.35.35.683.566 1.15.748.353.137.882.3 1.857.344 1.054.048 1.37.058 4.041.058h.08c2.597 0 2.917-.01 3.96-.058.976-.045 1.505-.207 1.858-.344.466-.182.8-.398 1.15-.748.35-.35.566-.683.748-1.15.137-.353.3-.882.344-1.857.048-1.055.058-1.37.058-4.041v-.08c0-2.597-.01-2.917-.058-3.96-.045-.976-.207-1.505-.344-1.858a3.097 3.097 0 00-.748-1.15 3.098 3.098 0 00-1.15-.748c-.353-.137-.882-.3-1.857-.344-1.023-.047-1.351-.058-3.807-.058zM12 6.865a5.135 5.135 0 110 10.27 5.135 5.135 0 010-10.27zm0 1.802a3.333 3.333 0 100 6.666 3.333 3.333 0 000-6.666zm5.338-3.205a1.2 1.2 0 110 2.4 1.2 1.2 0 010-2.4z" clip-rule="evenodd"/>
                            </svg>
                        </a>
                        <a href="#" class="text-gray-400 hover:text-white transition-colors duration-300">
                            <span class="sr-only">Twitter</span>
                            <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M8.29 20.251c7.547 0 11.675-6.253 11.675-11.675 0-.178 0-.355-.012-.53A8.348 8.348 0 0022 5.92a8.19 8.19 0 01-2.357.646 4.118 4.118 0 001.804-2.27 8.224 8.224 0 01-2.605.996 4.107 4.107 0 00-6.993 3.743 11.65 11.65 0 01-8.457-4.287 4.106 4.106 0 001.27 5.477A4.072 4.072 0 012.8 9.713v.052a4.105 4.105 0 003.292 4.022 4.095 4.095 0 01-1.853.07 4.108 4.108 0 003.834 2.85A8.233 8.233 0 012 18.407a11.616 11.616 0 006.29 1.84"/>
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
            <div class="mt-8 pt-8 border-t border-gray-800 text-center text-gray-400">
                <p>&copy; {{ date('Y') }} BudgetWise. Tous droits réservés.</p>
            </div>
        </div>
    </footer>

    <style>
        .animate-float {
            animation: float 6s ease-in-out infinite;
        }
        .animate-float-delay {
            animation: float 6s ease-in-out infinite;
            animation-delay: 3s;
        }
        @keyframes float {
            0% { transform: translateY(0px); }
            50% { transform: translateY(-20px); }
            100% { transform: translateY(0px); }
        }
        .bg-pattern {
            background-image: url("data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' fill-rule='evenodd'%3E%3Cg fill='%239C92AC' fill-opacity='0.1'%3E%3Cpath d='M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E");
        }
    </style>
</body>
</html>
