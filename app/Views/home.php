<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accueil - GAC Pont-à-Celles</title>
    <link href="<?= base_url('assets/app.css') ?>" rel="stylesheet">
</head>

<body class="bg-gray-50 text-gray-800 flex flex-col min-h-screen">

    <!-- Header -->
    <header class="bg-white shadow">
        <div class="container mx-auto px-4 py-4 flex justify-between items-center">
            <h1 class="text-2xl font-bold text-green-700">
                GAC Pont-à-Celles
            </h1>
            <nav class="space-x-4">
                <a href="login" class="text-gray-600 hover:text-green-700">Connexion</a>
                <a href="register" class="text-gray-600 hover:text-green-700">Inscription</a>
            </nav>
        </div>
    </header>

    <!-- Main Content -->
    <main class="flex flex-col items-center justify-center flex-1 text-center px-4">
        <h2 class="text-3xl font-bold text-green-700 mb-4">
            Bienvenue sur le futur site du GAC
        </h2>
        <p class="max-w-xl text-gray-600 mb-6">
            Ce site est actuellement en cours de développement.
            Une nouvelle expérience plus moderne sera bientôt disponible pour faciliter vos commandes et améliorer votre
            expérience.
        </p>
        <div class="flex space-x-4">
            <a href="#" class="px-5 py-3 bg-green-600 text-white rounded-lg shadow hover:bg-green-700 transition">
                En savoir plus
            </a>
            <a href="#" class="px-5 py-3 bg-gray-200 text-gray-800 rounded-lg hover:bg-gray-300 transition">
                Contacter l'équipe
            </a>
        </div>
    </main>

    <!-- Footer -->
    <footer class="bg-white shadow mt-8">
        <div class="container mx-auto px-4 py-4 text-sm text-gray-500 text-center">
            © <?= date('Y') ?> GAC Pont-à-Celles. Tous droits réservés.
        </div>
    </footer>

</body>

</html>