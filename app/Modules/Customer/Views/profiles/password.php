<?= $this->extend(config('Customer')->views['layout']) ?>

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
<div class="max-w-2xl mx-auto">
    <div class="bg-white rounded-xl shadow-sm border border-gray-200">
        <!-- Form Header -->
        <div class="px-6 py-4 border-b border-gray-200">
            <h2 class="text-lg font-semibold text-gray-900"><?= lang('Profile.passwordTitle') ?></h2>
            <p class="mt-1 text-sm text-gray-600">
                <?= lang('Profile.passwordDescription') ?>
            </p>
        </div>

        <!-- Form -->
        <form method="post" action="<?= site_url('profile/update-password') ?>" class="p-6">
            <?= csrf_field() ?>

            <div class="space-y-4">
                <!-- Current Password -->
                <div>
                    <label for="current_password" class="block mb-2 font-medium text-gray-700">
                        <?= lang('Profile.currentPassword') ?> <span class="text-red-500">*</span>
                    </label>
                    <div class="relative">
                        <input autocomplete="current-password" id="current_password" name="current_password"
                            type="password" required placeholder="<?= lang('Profile.currentPasswordPlaceholder') ?>"
                            class="w-full px-4 py-3 text-base border-2 rounded-lg appearance-none border-gray-300 bg-white 
                                   placeholder-gray-500 focus:border-primary focus:outline-none focus:ring-2 focus:ring-primary/20
                                   transition-colors duration-200 pr-12" />
                        <button type="button" id="toggle-current-password"
                            aria-label="<?= lang('Profile.toggleCurrentPassword') ?>" class="absolute inset-y-0 right-0 flex items-center pr-3 text-gray-500 hover:text-gray-700
                                   transition-colors duration-200">
                            <span class="material-symbols-outlined text-lg">
                                visibility_off
                            </span>
                        </button>
                    </div>
                </div>

                <!-- New Password -->
                <div>
                    <label for="password" class="block mb-2 font-medium text-gray-700">
                        <?= lang('Profile.newPassword') ?> <span class="text-red-500">*</span>
                    </label>
                    <div class="relative">
                        <input autocomplete="new-password" id="password" name="password" type="password" required
                            placeholder="<?= lang('Profile.newPasswordPlaceholder') ?>" class="w-full px-4 py-3 text-base border-2 rounded-lg appearance-none border-gray-300 bg-white 
                                   placeholder-gray-500 focus:border-primary focus:outline-none focus:ring-2 focus:ring-primary/20
                                   transition-colors duration-200 pr-12" />
                        <button type="button" id="toggle-password" aria-label="<?= lang('Profile.toggleNewPassword') ?>"
                            class="absolute inset-y-0 right-0 flex items-center pr-3 text-gray-500 hover:text-gray-700
                                   transition-colors duration-200">
                            <span class="material-symbols-outlined text-lg">
                                visibility_off
                            </span>
                        </button>
                    </div>

                    <!-- Password hints -->
                    <ul class="mt-3 grid grid-cols-1 gap-2 text-xs text-gray-600 sm:grid-cols-2">
                        <li id="length" class="flex items-center gap-2">
                            <span class="material-symbols-outlined text-red-500 text-sm">close</span>
                            <?= lang('Profile.passwordLength') ?>
                        </li>
                        <li id="uppercase" class="flex items-center gap-2">
                            <span class="material-symbols-outlined text-red-500 text-sm">close</span>
                            <?= lang('Profile.passwordUppercase') ?>
                        </li>
                        <li id="lowercase" class="flex items-center gap-2">
                            <span class="material-symbols-outlined text-red-500 text-sm">close</span>
                            <?= lang('Profile.passwordLowercase') ?>
                        </li>
                        <li id="number" class="flex items-center gap-2">
                            <span class="material-symbols-outlined text-red-500 text-sm">close</span>
                            <?= lang('Profile.passwordNumber') ?>
                        </li>
                        <li id="special" class="flex items-center gap-2">
                            <span class="material-symbols-outlined text-red-500 text-sm">close</span>
                            <?= lang('Profile.passwordSpecial') ?>
                        </li>
                    </ul>
                </div>

                <!-- Password confirmation -->
                <div>
                    <label for="password-confirm" class="block mb-2 font-medium text-gray-700">
                        <?= lang('Profile.confirmPassword') ?> <span class="text-red-500">*</span>
                    </label>
                    <div class="relative">
                        <input autocomplete="new-password" id="password-confirm" name="password_confirm" type="password"
                            required placeholder="<?= lang('Profile.confirmPasswordPlaceholder') ?>" class="w-full px-4 py-3 text-base border-2 rounded-lg appearance-none border-gray-300 bg-white 
                                   placeholder-gray-500 focus:border-primary focus:outline-none focus:ring-2 focus:ring-primary/20
                                   transition-colors duration-200 pr-12" />
                        <button type="button" id="toggle-password-confirm"
                            aria-label="<?= lang('Profile.toggleConfirmPassword') ?>" class="absolute inset-y-0 right-0 flex items-center pr-3 text-gray-500 hover:text-gray-700
                                   transition-colors duration-200">
                            <span class="material-symbols-outlined text-lg">
                                visibility_off
                            </span>
                        </button>
                    </div>
                    <p id="password-match-message" class="mt-2 text-sm text-red-500 hidden">
                        <?= lang('Profile.passwordMismatch') ?>
                    </p>
                </div>
            </div>

            <!-- Form Actions -->
            <div class="mt-6 flex gap-3">
                <a href="<?= site_url('profile') ?>"
                    class="px-6 py-2 text-gray-700 border border-gray-300 rounded-lg hover:bg-gray-50 transition-colors duration-200">
                    <?= lang('Profile.cancel') ?>
                </a>
                <button type="submit" id="submit-btn" class="px-6 py-2 text-white bg-primary rounded-lg hover:bg-primary/90 focus:ring-2 focus:ring-primary/20 
                           transition-colors duration-200 disabled:opacity-50 disabled:cursor-not-allowed">
                    <?= lang('Profile.updatePassword') ?>
                </button>
            </div>
        </form>
    </div>
</div>

<script>
    // ============== Password criteria check ==============
    const passwordInput = document.getElementById('password');
    const confirmInput = document.getElementById('password-confirm');
    const passwordMatchMessage = document.getElementById('password-match-message');
    const submitBtn = document.getElementById('submit-btn');

    const criteria = {
        length: document.getElementById('length'),
        uppercase: document.getElementById('uppercase'),
        lowercase: document.getElementById('lowercase'),
        number: document.getElementById('number'),
        special: document.getElementById('special'),
    };

    const updateCriteria = (element, isValid) => {
        const icon = element.querySelector('.material-symbols-outlined');
        if (isValid) {
            element.classList.remove('text-red-500', 'text-gray-600');
            element.classList.add('text-green-600');
            icon.classList.remove('text-red-500');
            icon.classList.add('text-green-600');
            icon.textContent = 'check_circle';
        } else {
            element.classList.remove('text-green-600');
            element.classList.add('text-gray-600');
            icon.classList.remove('text-green-600');
            icon.classList.add('text-red-500');
            icon.textContent = 'close';
        }
    };

    const validateAllCriteria = () => {
        const value = passwordInput.value;
        return value.length >= 8 &&
            /[A-Z]/.test(value) &&
            /[a-z]/.test(value) &&
            /\d/.test(value) &&
            /[^A-Za-z0-9]/.test(value);
    };

    passwordInput.addEventListener('input', () => {
        const value = passwordInput.value;
        updateCriteria(criteria.length, value.length >= 8);
        updateCriteria(criteria.uppercase, /[A-Z]/.test(value));
        updateCriteria(criteria.lowercase, /[a-z]/.test(value));
        updateCriteria(criteria.number, /\d/.test(value));
        updateCriteria(criteria.special, /[^A-Za-z0-9]/.test(value));

        validatePasswordMatch();
        updateSubmitButton();
    });

    // ============== Password confirmation validation ==============
    let confirmTouched = false;

    const validatePasswordMatch = () => {
        if (!confirmTouched && !confirmInput.value) return;

        if (passwordInput.value && confirmInput.value && passwordInput.value !== confirmInput.value) {
            confirmInput.classList.add('border-red-500');
            confirmInput.classList.remove('border-green-500', 'border-gray-300');
            passwordMatchMessage.classList.remove('hidden');
        } else if (passwordInput.value && confirmInput.value && passwordInput.value === confirmInput.value) {
            confirmInput.classList.remove('border-red-500', 'border-gray-300');
            confirmInput.classList.add('border-green-500');
            passwordMatchMessage.classList.add('hidden');
        } else {
            confirmInput.classList.remove('border-red-500', 'border-green-500');
            confirmInput.classList.add('border-gray-300');
            passwordMatchMessage.classList.add('hidden');
        }

        updateSubmitButton();
    };

    confirmInput.addEventListener('blur', () => {
        confirmTouched = true;
        validatePasswordMatch();
    });

    confirmInput.addEventListener('input', () => {
        if (!confirmTouched) confirmTouched = true;
        validatePasswordMatch();
    });

    // ============== Update submit button state ==============
    const updateSubmitButton = () => {
        const passwordsMatch = passwordInput.value === confirmInput.value;
        const allCriteriaMet = validateAllCriteria();
        const hasValues = passwordInput.value && confirmInput.value;
        const hasCurrentPassword = document.getElementById('current_password').value;

        submitBtn.disabled = !(passwordsMatch && allCriteriaMet && hasValues && hasCurrentPassword);
    };

    // ================= Password visibility toggle =================
    const setupToggle = (toggleButton, passwordField) => {
        toggleButton.addEventListener('click', () => {
            const icon = toggleButton.querySelector('.material-symbols-outlined');
            const isPassword = passwordField.type === 'password';
            passwordField.type = isPassword ? 'text' : 'password';
            icon.textContent = isPassword ? 'visibility' : 'visibility_off';
            icon.setAttribute('aria-label', isPassword ? '<?= lang('Profile.hidePassword') ?>' :
                '<?= lang('Profile.showPassword') ?>');
            passwordField.focus();
        });
    };

    // Setup toggles for all password fields
    setupToggle(document.getElementById('toggle-current-password'), document.getElementById('current_password'));
    setupToggle(document.getElementById('toggle-password'), passwordInput);
    setupToggle(document.getElementById('toggle-password-confirm'), confirmInput);

    // Validate current password field
    document.getElementById('current_password').addEventListener('input', updateSubmitButton);

    // Initial validation
    updateSubmitButton();
</script>
<?= $this->endSection() ?>