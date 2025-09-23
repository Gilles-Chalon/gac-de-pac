<?= $this->extend('layouts/app') ?>

<?= $this->section('main') ?>
<div class="text-center flex flex-col m-4 min-h-max items-center justify-center self-center">
    <h2 class="text-3xl font-bold text-green-700 mb-4">
        Bienvenue sur le futur site du GAC
    </h2>
    <p class="max-w-xl text-gray-600 mb-6">
        Ce site est actuellement en cours de développement.
        Une nouvelle expérience plus moderne sera bientôt disponible pour faciliter vos commandes et améliorer votre
        expérience.
    </p>
    <div class="flex space-x-4 justify-center">
        <a href="#" class="px-5 py-3 bg-green-600 text-white rounded-lg shadow hover:bg-green-700 transition">
            En savoir plus
        </a>
        <a href="#" class="px-5 py-3 bg-gray-200 text-gray-800 rounded-lg hover:bg-gray-300 transition">
            Contacter l'équipe
        </a>
    </div>
</div>
<?= $this->endSection() ?>