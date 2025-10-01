<?= $this->extend(config('Customer')->views['layout']) ?>

<?= $this->section('profile_content') ?>
<div class="bg-white rounded-2xl shadow border border-gray-200 overflow-hidden max-w-4xl mx-auto">
    <div class="grid grid-cols-1 md:grid-cols-3">

        <!-- Header Section -->
        <div
            class="md:col-span-1 bg-gradient-to-r from-green-500 to-green-600 p-8 flex flex-col items-center justify-center text-center">

            <!-- Profile Image -->
            <div
                class="relative w-28 h-28 sm:w-32 sm:h-32 bg-white rounded-full flex items-center justify-center shadow-lg">
                <span class="text-3xl sm:text-4xl font-bold text-green-600">
                    <?= strtoupper(substr($profile->first_name ?? $user->username ?? 'U', 0, 1)) ?><?= strtoupper(substr($profile->last_name ?? '', 0, 1)) ?>
                </span>
                <?php if ($profile->is_complete ?? false): ?>
                    <div
                        class="absolute -bottom-1 -right-1 w-7 h-7 sm:w-8 sm:h-8 bg-green-400 rounded-full border-4 border-green-500 flex items-center justify-center">
                        <span class="material-symbols-outlined text-sm sm:text-base text-white">check</span>
                    </div>
                <?php endif; ?>
            </div>

            <!-- Profile Info -->
            <div class="mt-6 text-white">
                <h2 class="text-xl sm:text-2xl font-bold">
                    <?= esc($profile->getFullName() ?? lang('Profile.defaultUser')) ?>
                </h2>
                <p class="mt-1 text-green-100 text-sm sm:text-base">
                    @<?= esc($user->username ?? lang('Profile.defaultUsername')) ?>
                </p>
                <div class="mt-4 flex items-center justify-center gap-2 text-green-100 text-sm">
                    <span class="material-symbols-outlined text-sm sm:text-base">calendar_today</span>
                    <span><?= lang('Profile.memberSince') ?>
                        <?= date('F Y', strtotime($user->created_at ?? 'now')) ?></span>
                </div>
            </div>
        </div>

        <!-- Body Section -->
        <div class="md:col-span-2 p-6 sm:p-8">
            <h3 class="text-lg sm:text-xl font-bold text-gray-800 mb-6"><?= lang('Profile.yourInformation') ?></h3>
            <dl class="grid grid-cols-1 sm:grid-cols-2 gap-x-8 gap-y-6">
                <div>
                    <dt class="text-sm font-medium text-gray-500"><?= lang('Profile.username') ?></dt>
                    <dd class="mt-1 text-base text-gray-900 font-medium">
                        <?= esc($user->username ?? lang('Profile.notDefined')) ?>
                    </dd>
                </div>

                <div>
                    <dt class="text-sm font-medium text-gray-500"><?= lang('Profile.email') ?></dt>
                    <dd class="mt-1 text-base text-gray-900 font-medium">
                        <?= esc($user->getEmail() ?? lang('Profile.notDefined')) ?>
                    </dd>
                </div>

                <div>
                    <dt class="text-sm font-medium text-gray-500"><?= lang('Profile.phone') ?></dt>
                    <dd class="mt-1 text-base text-gray-900 font-medium">
                        <?= esc($profile->phone ?? lang('Profile.notDefined')) ?>
                    </dd>
                </div>

                <div>
                    <dt class="text-sm font-medium text-gray-500"><?= lang('Profile.address') ?></dt>
                    <dd class="mt-1 text-base text-gray-900 font-medium">
                        <?= esc($profile->address ?? '') ?><br>
                        <?= esc($profile->postal_code ?? '') ?>, <?= esc($profile->city ?? '') ?><br>
                        <?= esc($profile->country ?? '') ?>
                    </dd>
                </div>
            </dl>
        </div>
    </div>
</div>
<?= $this->endSection() ?>