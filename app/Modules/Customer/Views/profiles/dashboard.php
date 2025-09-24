<?= $this->extend(config('Profile')->views['layout']) ?>

<?= $this->section('profile_content') ?>
<div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
    <!-- Profile Card -->
    <div class="lg:col-span-2 bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden">
        <!-- Card Header -->
        <div class="bg-gradient-to-r from-green-500 to-green-600 px-6 py-8 sm:px-8">
            <div class="flex flex-col sm:flex-row sm:items-center gap-6">
                <!-- Profile Image -->
                <div
                    class="relative w-20 h-20 sm:w-24 sm:h-24 bg-white rounded-full flex items-center justify-center shadow-lg">
                    <span class="text-2xl sm:text-3xl font-bold text-green-600">
                        <?= strtoupper(substr(auth()->user()->username ?? 'U', 0, 1)) ?>
                    </span>
                    <div
                        class="absolute -bottom-1 -right-1 w-6 h-6 bg-green-400 rounded-full border-2 border-white flex items-center justify-center">
                        <span class="material-symbols-outlined text-xs text-white">check</span>
                    </div>
                </div>

                <!-- Profile Info -->
                <div class="flex-1 text-white">
                    <h2 class="text-xl sm:text-2xl font-bold">
                        <?= esc(auth()->user()->getEmail() ?? 'Utilisateur') ?>
                    </h2>
                    <p class="mt-1 text-green-100 text-sm sm:text-base">
                        @<?= esc(auth()->user()->username ?? 'username') ?>
                    </p>
                    <div class="mt-3 flex items-center gap-2 text-green-100 text-sm">
                        <span class="material-symbols-outlined text-sm">calendar_today</span>
                        <span>Membre depuis <?= date('F Y', strtotime(auth()->user()->created_at ?? 'now')) ?></span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Card Content -->
        <div class="p-6 sm:p-8 grid grid-cols-1 sm:grid-cols-2 gap-6">
            <div class="space-y-4">
                <div>
                    <dt class="text-sm font-medium text-gray-500">Nom d'utilisateur</dt>
                    <dd class="mt-1 text-base text-gray-900 font-medium">
                        <?= esc(auth()->user()->username ?? 'Non défini') ?>
                    </dd>
                </div>
                <div>
                    <dt class="text-sm font-medium text-gray-500">Adresse e-mail</dt>
                    <dd class="mt-1 text-base text-gray-900 font-medium">
                        <?= esc(auth()->user()->getEmail() ?? 'Non défini') ?>
                    </dd>
                </div>
            </div>
            <div class="space-y-4">
                <div>
                    <dt class="text-sm font-medium text-gray-500">Statut du compte</dt>
                    <dd class="mt-1">
                        <span
                            class="inline-flex items-center gap-1 px-2 py-1 text-xs font-medium text-green-800 bg-green-100 rounded-full">
                            <span class="material-symbols-outlined text-xs">verified</span>
                            Compte actif
                        </span>
                    </dd>
                </div>
                <div>
                    <dt class="text-sm font-medium text-gray-500">Dernière connexion</dt>
                    <dd class="mt-1 text-base text-gray-900 font-medium">
                        <?= date('d/m/Y à H:i', strtotime(auth()->user()->last_active ?? auth()->user()->updated_at ?? 'now')) ?>
                    </dd>
                </div>
            </div>
        </div>
    </div>

    <!-- Quick Actions -->
    <div class="space-y-6">
        <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
            <h3 class="text-lg font-semibold text-gray-900 mb-4">Actions rapides</h3>
            <div class="space-y-3">
                <a href="<?= site_url('profile/edit') ?>"
                    class="flex items-center gap-3 p-3 text-gray-700 hover:text-green-700 hover:bg-green-50 rounded-lg transition-colors duration-200 group">
                    <div class="p-2 bg-gray-100 group-hover:bg-green-100 rounded-lg transition-colors duration-200">
                        <span class="material-symbols-outlined text-lg group-hover:text-green-700">edit</span>
                    </div>
                    <span class="font-medium">Modifier les informations</span>
                </a>
                <a href="<?= site_url('profile/password') ?>"
                    class="flex items-center gap-3 p-3 text-gray-700 hover:text-green-700 hover:bg-green-50 rounded-lg transition-colors duration-200 group">
                    <div class="p-2 bg-gray-100 group-hover:bg-green-100 rounded-lg transition-colors duration-200">
                        <span class="material-symbols-outlined text-lg group-hover:text-green-700">lock</span>
                    </div>
                    <span class="font-medium">Changer le mot de passe</span>
                </a>
            </div>
        </div>

        <!-- Account Security Status -->
        <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
            <div class="flex items-center justify-between mb-4">
                <h3 class="text-lg font-semibold text-gray-900">Sécurité</h3>
                <span class="material-symbols-outlined text-green-600">shield</span>
            </div>
            <div class="space-y-3">
                <div class="flex items-center justify-between">
                    <span class="text-sm text-gray-600">Mot de passe fort</span>
                    <span class="material-symbols-outlined text-green-600 text-lg">check_circle</span>
                </div>
                <div class="flex items-center justify-between">
                    <span class="text-sm text-gray-600">Email vérifié</span>
                    <span class="material-symbols-outlined text-green-600 text-lg">check_circle</span>
                </div>
                <div class="flex items-center justify-between">
                    <span class="text-sm text-gray-600">2FA activé</span>
                    <span class="material-symbols-outlined text-gray-400 text-lg">radio_button_unchecked</span>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>

<?= $this->section('page_scripts') ?>
<script>
// Profile image click handler
document.querySelector('.relative')?.addEventListener('click', function() {
    console.log('Profile image upload would be triggered here');
});
</script>
<?= $this->endSection() ?>