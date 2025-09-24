<?= $this->extend(config('Profile')->views['layout']) ?>

<?= $this->section('page_title') ?>Modifier le profil<?= $this->endSection() ?>
<?= $this->section('page_description') ?>Mettez à jour vos informations personnelles<?= $this->endSection() ?>

<?= $this->section('page_actions') ?>
<a href="<?= site_url('profile') ?>"
    class="inline-flex items-center gap-2 px-4 py-2 text-gray-600 hover:text-gray-900 text-sm font-medium rounded-lg hover:bg-gray-50 transition-colors duration-200">
    <span class="material-symbols-outlined text-lg">arrow_back</span>
    Retour au profil
</a>
<?= $this->endSection() ?>

<?= $this->section('profile_content') ?>

<!-- Success/Error Messages -->
<?php if (session('success')): ?>
<div class="mb-6 p-4 bg-green-50 border border-green-200 rounded-lg alert-auto-hide">
    <div class="flex items-center">
        <span class="material-symbols-outlined text-green-600 mr-3">check_circle</span>
        <p class="text-green-800 font-medium"><?= session('success') ?></p>
    </div>
</div>
<?php endif; ?>

<?php if (session('error')): ?>
<div class="mb-6 p-4 bg-red-50 border border-red-200 rounded-lg alert-auto-hide">
    <div class="flex items-center">
        <span class="material-symbols-outlined text-red-600 mr-3">error</span>
        <p class="text-red-800 font-medium"><?= session('error') ?></p>
    </div>
</div>
<?php endif; ?>

<!-- Main Content -->
<div class="max-w-3xl mx-auto space-y-6">
    <!-- Account Information Card -->
    <div class="bg-white rounded-xl shadow-sm border border-gray-200">
        <div class="px-6 py-4 border-b border-gray-200">
            <h2 class="text-lg font-semibold text-gray-900">Informations du compte</h2>
            <p class="mt-1 text-sm text-gray-600">Modifiez vos identifiants de connexion</p>
        </div>

        <div class="p-6">
            <form method="post" action="<?= site_url('profile/update') ?>">
                <?= csrf_field() ?>

                <div class="grid gap-4 sm:grid-cols-2">
                    <!-- Username -->
                    <div>
                        <label class="block mb-2 text-sm font-medium text-gray-700">
                            Nom d'utilisateur <span class="text-red-500">*</span>
                        </label>
                        <input type="text" name="username" required
                            value="<?= old('username', esc(auth()->user()->username ?? '')) ?>"
                            class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:border-primary focus:ring-2 focus:ring-primary/20 transition-colors duration-200" />
                        <p class="mt-1 text-xs text-gray-500">Lettres, chiffres et points uniquement</p>
                    </div>

                    <!-- Email -->
                    <div>
                        <label class="block mb-2 text-sm font-medium text-gray-700">
                            Adresse email <span class="text-red-500">*</span>
                        </label>
                        <input type="email" name="email" required
                            value="<?= old('email', esc(auth()->user()->getEmail() ?? '')) ?>"
                            class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:border-primary focus:ring-2 focus:ring-primary/20 transition-colors duration-200" />
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!-- Personal Information Card -->
    <div class="bg-white rounded-xl shadow-sm border border-gray-200">
        <div class="px-6 py-4 border-b border-gray-200">
            <h2 class="text-lg font-semibold text-gray-900">Informations personnelles</h2>
            <p class="mt-1 text-sm text-gray-600">Modifiez vos informations de contact</p>
        </div>

        <div class="p-6">
            <form method="post" action="<?= site_url('profile/update') ?>">
                <?= csrf_field() ?>

                <p class="mb-4 text-sm text-gray-600">
                    <span class="text-red-500">*</span> Champs obligatoires
                </p>

                <div class="grid gap-4 sm:grid-cols-2">
                    <!-- First Name -->
                    <div>
                        <label class="block mb-2 text-sm font-medium text-gray-700">
                            Prénom <span class="text-red-500">*</span>
                        </label>
                        <input type="text" name="first_name" required
                            value="<?= old('first_name', esc(auth()->user()->first_name ?? '')) ?>"
                            class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:border-primary focus:ring-2 focus:ring-primary/20 transition-colors duration-200" />
                    </div>

                    <!-- Last Name -->
                    <div>
                        <label class="block mb-2 text-sm font-medium text-gray-700">
                            Nom <span class="text-red-500">*</span>
                        </label>
                        <input type="text" name="last_name" required
                            value="<?= old('last_name', esc(auth()->user()->last_name ?? '')) ?>"
                            class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:border-primary focus:ring-2 focus:ring-primary/20 transition-colors duration-200" />
                    </div>

                    <!-- Phone -->
                    <div class="sm:col-span-2">
                        <label class="block mb-2 text-sm font-medium text-gray-700">
                            Téléphone <span class="text-red-500">*</span>
                        </label>
                        <input type="text" name="phone" required
                            value="<?= old('phone', esc(auth()->user()->phone ?? '')) ?>"
                            class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:border-primary focus:ring-2 focus:ring-primary/20 transition-colors duration-200" />
                    </div>

                    <!-- Address -->
                    <div class="sm:col-span-2">
                        <label class="block mb-2 text-sm font-medium text-gray-700">
                            Adresse
                        </label>
                        <input type="text" name="address"
                            value="<?= old('address', esc(auth()->user()->address ?? '')) ?>"
                            class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:border-primary focus:ring-2 focus:ring-primary/20 transition-colors duration-200" />
                    </div>

                    <!-- Postal Code -->
                    <div>
                        <label class="block mb-2 text-sm font-medium text-gray-700">
                            Code postal
                        </label>
                        <input type="text" name="postal_code"
                            value="<?= old('postal_code', esc(auth()->user()->postal_code ?? '')) ?>"
                            class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:border-primary focus:ring-2 focus:ring-primary/20 transition-colors duration-200" />
                    </div>

                    <!-- City -->
                    <div>
                        <label class="block mb-2 text-sm font-medium text-gray-700">
                            Ville
                        </label>
                        <input type="text" name="city" value="<?= old('city', esc(auth()->user()->city ?? '')) ?>"
                            class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:border-primary focus:ring-2 focus:ring-primary/20 transition-colors duration-200" />
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!-- Form Actions -->
    <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
        <div class="flex flex-col sm:flex-row gap-3 justify-center">
            <a href="<?= site_url('profile') ?>"
                class="px-6 py-2 text-gray-700 border border-gray-300 rounded-lg hover:bg-gray-50 transition-colors duration-200 text-center">
                Annuler
            </a>
            <button type="submit" form="profile-form"
                class="px-6 py-2 text-white bg-primary rounded-lg hover:bg-primary/90 focus:ring-2 focus:ring-primary/20 transition-colors duration-200">
                Enregistrer les modifications
            </button>
        </div>
    </div>
</div>

<script>
// Combine all forms into one submission
document.addEventListener('DOMContentLoaded', function() {
    const forms = document.querySelectorAll('form');
    const mainForm = document.createElement('form');
    mainForm.id = 'profile-form';
    mainForm.method = 'post';
    mainForm.action = '<?= site_url('profile/update') ?>';
    mainForm.innerHTML = '<?= csrf_field() ?>';
    document.body.appendChild(mainForm);

    document.querySelector('button[form="profile-form"]').addEventListener('click', function() {
        forms.forEach(form => {
            const inputs = form.querySelectorAll('input, select, textarea');
            inputs.forEach(input => {
                if (input.name) {
                    const existingInput = mainForm.querySelector(
                        `[name="${input.name}"]`);
                    if (existingInput) {
                        existingInput.value = input.value;
                    } else {
                        const newInput = document.createElement('input');
                        newInput.type = 'hidden';
                        newInput.name = input.name;
                        newInput.value = input.value;
                        mainForm.appendChild(newInput);
                    }
                }
            });
        });
        mainForm.submit();
    });
});
</script>
<?= $this->endSection() ?>