<?= $this->extend(config('Customer')->views['layout']) ?>

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
                        <?= strtoupper(substr($profile->first_name ?? auth()->user()->username ?? 'U', 0, 1)) ?><?= strtoupper(substr($profile->last_name ?? '', 0, 1)) ?>
                    </span>
                    <?php if ($profile->is_complete ?? false): ?>
                        <div
                            class="absolute -bottom-1 -right-1 w-6 h-6 bg-green-400 rounded-full border-2 border-white flex items-center justify-center">
                            <span class="material-symbols-outlined text-xs text-white">check</span>
                        </div>
                    <?php endif; ?>
                </div>

                <!-- Profile Info -->
                <div class="flex-1 text-white">
                    <h2 class="text-xl sm:text-2xl font-bold">
                        <?= esc($profile->getFullName() ?? lang('Profile.defaultUser')) ?>
                    </h2>
                    <p class="mt-1 text-green-100 text-sm sm:text-base">
                        @<?= esc(auth()->user()->username ?? lang('Profile.defaultUsername')) ?>
                    </p>
                    <div class="mt-3 flex items-center gap-2 text-green-100 text-sm">
                        <span class="material-symbols-outlined text-sm">calendar_today</span>
                        <span><?= lang('Profile.memberSince') ?>
                            <?= date('F Y', strtotime(auth()->user()->created_at ?? 'now')) ?></span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Card Content -->
        <div class="p-6 sm:p-8">
            <!-- Profile Status -->
            <?php if (!($profile->is_complete ?? false)): ?>
                <div class="mb-6 p-4 bg-yellow-50 border border-yellow-200 rounded-lg">
                    <div class="flex items-center">
                        <span class="material-symbols-outlined text-yellow-600 mr-3">info</span>
                        <div>
                            <p class="text-yellow-800 font-medium"><?= lang('Profile.incompleteProfile') ?></p>
                            <p class="text-yellow-700 text-sm mt-1"><?= lang('Profile.completeProfileMessage') ?></p>
                        </div>
                        <a href="<?= site_url('profile/edit') ?>"
                            class="ml-auto px-4 py-2 text-sm bg-yellow-600 text-white rounded-lg hover:bg-yellow-700 transition-colors">
                            <?= lang('Profile.completeNow') ?>
                        </a>
                    </div>
                </div>
            <?php endif; ?>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                <!-- Account Information -->
                <div class="space-y-4">
                    <h3 class="text-lg font-semibold text-gray-900 border-b border-gray-200 pb-2">
                        <?= lang('Profile.accountInfo') ?>
                    </h3>
                    <div>
                        <dt class="text-sm font-medium text-gray-500"><?= lang('Profile.username') ?></dt>
                        <dd class="mt-1 text-base text-gray-900 font-medium">
                            <?= esc(auth()->user()->username ?? lang('Profile.notDefined')) ?>
                        </dd>
                    </div>
                    <div>
                        <dt class="text-sm font-medium text-gray-500"><?= lang('Profile.email') ?></dt>
                        <dd class="mt-1 text-base text-gray-900 font-medium">
                            <?= esc(auth()->user()->getEmail() ?? lang('Profile.notDefined')) ?>
                        </dd>
                    </div>
                    <div>
                        <dt class="text-sm font-medium text-gray-500"><?= lang('Profile.accountStatus') ?></dt>
                        <dd class="mt-1">
                            <span
                                class="inline-flex items-center gap-1 px-2 py-1 text-xs font-medium <?= ($profile->is_complete ?? false) ? 'text-green-800 bg-green-100' : 'text-yellow-800 bg-yellow-100' ?> rounded-full">
                                <span
                                    class="material-symbols-outlined text-xs"><?= ($profile->is_complete ?? false) ? 'verified' : 'pending' ?></span>
                                <?= ($profile->is_complete ?? false) ? lang('Profile.accountActive') : lang('Profile.accountIncomplete') ?>
                            </span>
                        </dd>
                    </div>
                </div>

                <!-- Personal Information -->
                <div class="space-y-4">
                    <h3 class="text-lg font-semibold text-gray-900 border-b border-gray-200 pb-2">
                        <?= lang('Profile.personalInfo') ?>
                    </h3>
                    <div>
                        <dt class="text-sm font-medium text-gray-500"><?= lang('Profile.phone') ?></dt>
                        <dd class="mt-1 text-base text-gray-900 font-medium">
                            <?= esc($profile->phone ?? lang('Profile.notDefined')) ?>
                        </dd>
                    </div>
                    <div>
                        <dt class="text-sm font-medium text-gray-500"><?= lang('Profile.address') ?></dt>
                        <dd class="mt-1 text-base text-gray-900">
                            <?php if ($profile->address ?? false): ?>
                                <?= esc($profile->address) ?><br>
                                <?php if ($profile->postal_code ?? false): ?>
                                    <?= esc($profile->postal_code) ?>
                                <?php endif; ?>
                                <?php if ($profile->city ?? false): ?>
                                    <?= esc($profile->city) ?>
                                <?php endif; ?>
                            <?php else: ?>
                                <span class="text-gray-500"><?= lang('Profile.notDefined') ?></span>
                            <?php endif; ?>
                        </dd>
                    </div>
                    <div>
                        <dt class="text-sm font-medium text-gray-500"><?= lang('Profile.lastLogin') ?></dt>
                        <dd class="mt-1 text-base text-gray-900 font-medium">
                            <?= date('d/m/Y à H:i', strtotime(auth()->user()->last_active ?? auth()->user()->updated_at ?? 'now')) ?>
                        </dd>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Sidebar -->
    <div class="space-y-6">
        <!-- Quick Actions -->
        <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
            <h3 class="text-lg font-semibold text-gray-900 mb-4"><?= lang('Profile.quickActions') ?></h3>
            <div class="space-y-3">
                <a href="<?= site_url('profile/edit') ?>"
                    class="flex items-center gap-3 p-3 text-gray-700 hover:text-green-700 hover:bg-green-50 rounded-lg transition-colors duration-200 group">
                    <div class="p-2 bg-gray-100 group-hover:bg-green-100 rounded-lg transition-colors duration-200">
                        <span class="material-symbols-outlined text-lg group-hover:text-green-700">edit</span>
                    </div>
                    <span class="font-medium"><?= lang('Profile.editInfo') ?></span>
                </a>
                <a href="<?= site_url('profile/password') ?>"
                    class="flex items-center gap-3 p-3 text-gray-700 hover:text-green-700 hover:bg-green-50 rounded-lg transition-colors duration-200 group">
                    <div class="p-2 bg-gray-100 group-hover:bg-green-100 rounded-lg transition-colors duration-200">
                        <span class="material-symbols-outlined text-lg group-hover:text-green-700">lock</span>
                    </div>
                    <span class="font-medium"><?= lang('Profile.changePassword') ?></span>
                </a>
                <a href="<?= site_url('profile/history') ?>"
                    class="flex items-center gap-3 p-3 text-gray-700 hover:text-green-700 hover:bg-green-50 rounded-lg transition-colors duration-200 group">
                    <div class="p-2 bg-gray-100 group-hover:bg-green-100 rounded-lg transition-colors duration-200">
                        <span class="material-symbols-outlined text-lg group-hover:text-green-700">history</span>
                    </div>
                    <span class="font-medium"><?= lang('Profile.viewHistory') ?></span>
                </a>
            </div>
        </div>

        <!-- Profile Completion -->
        <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
            <div class="flex items-center justify-between mb-4">
                <h3 class="text-lg font-semibold text-gray-900"><?= lang('Profile.profileCompletion') ?></h3>
                <span class="material-symbols-outlined text-green-600">task_alt</span>
            </div>
            <div class="space-y-4">
                <!-- Progress Bar -->
                <div>
                    <div class="flex justify-between text-sm text-gray-600 mb-1">
                        <span><?= lang('Profile.completion') ?></span>
                        <span><?= $completionPercentage ?>%</span>
                    </div>
                    <div class="w-full bg-gray-200 rounded-full h-2">
                        <div class="bg-green-600 h-2 rounded-full transition-all duration-300"
                            style="width: <?= $completionPercentage ?>%"></div>
                    </div>
                </div>

                <!-- Completion Checklist -->
                <div class="space-y-2 text-sm">
                    <div
                        class="flex items-center justify-between <?= ($profile->first_name ?? false) ? 'text-green-600' : 'text-gray-400' ?>">
                        <span class="flex items-center gap-2">
                            <span class="material-symbols-outlined text-sm">
                                <?= ($profile->first_name ?? false) ? 'check_circle' : 'radio_button_unchecked' ?>
                            </span>
                            <?= lang('Profile.firstName') ?>
                        </span>
                    </div>
                    <div
                        class="flex items-center justify-between <?= ($profile->last_name ?? false) ? 'text-green-600' : 'text-gray-400' ?>">
                        <span class="flex items-center gap-2">
                            <span class="material-symbols-outlined text-sm">
                                <?= ($profile->last_name ?? false) ? 'check_circle' : 'radio_button_unchecked' ?>
                            </span>
                            <?= lang('Profile.lastName') ?>
                        </span>
                    </div>
                    <div
                        class="flex items-center justify-between <?= ($profile->phone ?? false) ? 'text-green-600' : 'text-gray-400' ?>">
                        <span class="flex items-center gap-2">
                            <span class="material-symbols-outlined text-sm">
                                <?= ($profile->phone ?? false) ? 'check_circle' : 'radio_button_unchecked' ?>
                            </span>
                            <?= lang('Profile.phone') ?>
                        </span>
                    </div>
                    <div
                        class="flex items-center justify-between <?= ($profile->address ?? false) ? 'text-green-600' : 'text-gray-400' ?>">
                        <span class="flex items-center gap-2">
                            <span class="material-symbols-outlined text-sm">
                                <?= ($profile->address ?? false) ? 'check_circle' : 'radio_button_unchecked' ?>
                            </span>
                            <?= lang('Profile.address') ?>
                        </span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Account Security Status -->
        <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
            <div class="flex items-center justify-between mb-4">
                <h3 class="text-lg font-semibold text-gray-900"><?= lang('Profile.security') ?></h3>
                <span class="material-symbols-outlined text-green-600">shield</span>
            </div>
            <div class="space-y-3">
                <div class="flex items-center justify-between">
                    <span class="text-sm text-gray-600"><?= lang('Profile.strongPassword') ?></span>
                    <span class="material-symbols-outlined text-green-600 text-lg">check_circle</span>
                </div>
                <div class="flex items-center justify-between">
                    <span class="text-sm text-gray-600"><?= lang('Profile.emailVerified') ?></span>
                    <span class="material-symbols-outlined text-green-600 text-lg">check_circle</span>
                </div>
                <div class="flex items-center justify-between">
                    <span class="text-sm text-gray-600"><?= lang('Profile.twoFactor') ?></span>
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