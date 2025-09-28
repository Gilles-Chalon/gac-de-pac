<?= $this->extend(config('Customer')->views['layout']) ?>

<?= $this->section('profile_content') ?>

<!-- Main Form -->
<form method="post" action="<?= site_url('profile/update') ?>" id="profile-form" class="space-y-6 max-w-3xl mx-auto">
    <?= csrf_field() ?>

    <!-- Account Information Card -->
    <div class="bg-white rounded-xl shadow-sm border border-gray-200">
        <div class="px-6 py-4 border-b border-gray-200">
            <h2 class="text-lg font-semibold text-gray-900"><?= lang('Profile.accountInfo') ?></h2>
            <p class="mt-1 text-sm text-gray-600"><?= lang('Profile.loginCredentials') ?></p>
        </div>

        <div class="p-6 grid gap-4 sm:grid-cols-2">
            <!-- Username -->
            <div>
                <label for="username" class="block mb-2 text-sm font-medium text-gray-700">
                    <?= lang('Profile.username') ?> <span class="text-red-500">*</span>
                </label>
                <input type="text" id="username" name="username" required
                    value="<?= old('username', esc($user->username)) ?>"
                    class="w-full px-3 py-2 border <?= session('errors.username') ? 'border-red-500' : 'border-gray-300' ?> rounded-lg focus:border-primary focus:ring-2 focus:ring-primary/20 transition-colors duration-200" />
                <?php if (session('errors.username')): ?>
                    <p class="mt-1 text-xs text-red-500"><?= session('errors.username') ?></p>
                <?php else: ?>
                    <p class="mt-1 text-xs text-gray-500"><?= lang('Profile.usernameHint') ?></p>
                <?php endif; ?>
            </div>

            <!-- Email -->
            <div>
                <label for="email" class="block mb-2 text-sm font-medium text-gray-700">
                    <?= lang('Profile.email') ?> <span class="text-red-500">*</span>
                </label>
                <input type="email" id="email" name="email" required value="<?= old('email', esc($user->email)) ?>"
                    class="w-full px-3 py-2 border <?= session('errors.email') ? 'border-red-500' : 'border-gray-300' ?> rounded-lg focus:border-primary focus:ring-2 focus:ring-primary/20 transition-colors duration-200" />
                <?php if (session('errors.email')): ?>
                    <p class="mt-1 text-xs text-red-500"><?= session('errors.email') ?></p>
                <?php endif; ?>
            </div>
        </div>
    </div>

    <!-- Personal Information Card -->
    <div class="bg-white rounded-xl shadow-sm border border-gray-200">
        <div class="px-6 py-4 border-b border-gray-200">
            <h2 class="text-lg font-semibold text-gray-900"><?= lang('Profile.personalInfo') ?></h2>
            <p class="mt-1 text-sm text-gray-600"><?= lang('Profile.contactInfo') ?></p>
        </div>

        <div class="p-6 grid gap-4 sm:grid-cols-2">
            <!-- First Name -->
            <div>
                <label for="first_name" class="block mb-2 text-sm font-medium text-gray-700">
                    <?= lang('Profile.firstName') ?> <span class="text-red-500">*</span>
                </label>
                <input type="text" id="first_name" name="first_name" required
                    value="<?= old('first_name', esc($profile->first_name)) ?>"
                    class="w-full px-3 py-2 border <?= session('errors.first_name') ? 'border-red-500' : 'border-gray-300' ?> rounded-lg focus:border-primary focus:ring-2 focus:ring-primary/20 transition-colors duration-200" />
                <?php if (session('errors.first_name')): ?>
                    <p class="mt-1 text-xs text-red-500"><?= session('errors.first_name') ?></p>
                <?php endif; ?>
            </div>

            <!-- Last Name -->
            <div>
                <label for="last_name" class="block mb-2 text-sm font-medium text-gray-700">
                    <?= lang('Profile.lastName') ?> <span class="text-red-500">*</span>
                </label>
                <input type="text" id="last_name" name="last_name" required
                    value="<?= old('last_name', esc($profile->last_name)) ?>"
                    class="w-full px-3 py-2 border <?= session('errors.last_name') ? 'border-red-500' : 'border-gray-300' ?> rounded-lg focus:border-primary focus:ring-2 focus:ring-primary/20 transition-colors duration-200" />
                <?php if (session('errors.last_name')): ?>
                    <p class="mt-1 text-xs text-red-500"><?= session('errors.last_name') ?></p>
                <?php endif; ?>
            </div>

            <!-- Phone -->
            <div class="sm:col-span-2">
                <label for="phone" class="block mb-2 text-sm font-medium text-gray-700">
                    <?= lang('Profile.phone') ?> <span class="text-red-500">*</span>
                </label>
                <input type="text" id="phone" name="phone" required value="<?= old('phone', esc($profile->phone)) ?>"
                    class="w-full px-3 py-2 border <?= session('errors.phone') ? 'border-red-500' : 'border-gray-300' ?> rounded-lg focus:border-primary focus:ring-2 focus:ring-primary/20 transition-colors duration-200" />
                <?php if (session('errors.phone')): ?>
                    <p class="mt-1 text-xs text-red-500"><?= session('errors.phone') ?></p>
                <?php endif; ?>
            </div>

            <!-- Address -->
            <div class="sm:col-span-2">
                <label for="address" class="block mb-2 text-sm font-medium text-gray-700">
                    <?= lang('Profile.address') ?>
                </label>
                <input type="text" id="address" name="address" value="<?= old('address', esc($profile->address)) ?>"
                    class="w-full px-3 py-2 border <?= session('errors.address') ? 'border-red-500' : 'border-gray-300' ?> rounded-lg focus:border-primary focus:ring-2 focus:ring-primary/20 transition-colors duration-200" />
                <?php if (session('errors.address')): ?>
                    <p class="mt-1 text-xs text-red-500"><?= session('errors.address') ?></p>
                <?php endif; ?>
            </div>

            <!-- Postal Code -->
            <div>
                <label for="postal_code" class="block mb-2 text-sm font-medium text-gray-700">
                    <?= lang('Profile.postalCode') ?>
                </label>
                <input type="text" id="postal_code" name="postal_code"
                    value="<?= old('postal_code', esc($profile->postal_code)) ?>"
                    class="w-full px-3 py-2 border <?= session('errors.postal_code') ? 'border-red-500' : 'border-gray-300' ?> rounded-lg focus:border-primary focus:ring-2 focus:ring-primary/20 transition-colors duration-200" />
                <?php if (session('errors.postal_code')): ?>
                    <p class="mt-1 text-xs text-red-500"><?= session('errors.postal_code') ?></p>
                <?php endif; ?>
            </div>

            <!-- City -->
            <div>
                <label for="city" class="block mb-2 text-sm font-medium text-gray-700">
                    <?= lang('Profile.city') ?>
                </label>
                <input type="text" id="city" name="city" value="<?= old('city', esc($profile->city)) ?>"
                    class="w-full px-3 py-2 border <?= session('errors.city') ? 'border-red-500' : 'border-gray-300' ?> rounded-lg focus:border-primary focus:ring-2 focus:ring-primary/20 transition-colors duration-200" />
                <?php if (session('errors.city')): ?>
                    <p class="mt-1 text-xs text-red-500"><?= session('errors.city') ?></p>
                <?php endif; ?>
            </div>
        </div>
    </div>

    <!-- Form Actions -->
    <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
        <div class="flex flex-col sm:flex-row gap-3 justify-center">
            <a href="<?= site_url('profile') ?>"
                class="px-6 py-2 text-gray-700 border border-gray-300 rounded-lg hover:bg-gray-50 transition-colors duration-200 text-center">
                <?= lang('Profile.cancel') ?>
            </a>
            <button type="submit"
                class="px-6 py-2 text-white bg-primary rounded-lg hover:bg-primary/90 focus:ring-2 focus:ring-primary/20 transition-colors duration-200">
                <?= $isNew ? lang('Profile.createProfile') : lang('Profile.saveChanges') ?>
            </button>
        </div>
    </div>
</form>

<?= $this->endSection() ?>