<?= $this->extend(config('Auth')->views['layout']) ?>

<?= $this->section('main') ?>
<!-- ================= Register Container ================= -->
<div class="w-full space-y-6">

    <!-- Title & subtitle -->
    <div class="text-center">
        <h2 class="text-2xl font-extrabold text-gray-900 sm:text-3xl">Create your account</h2>
        <p class="mt-2 text-sm text-gray-600">
            Join us and start your journey today
        </p>
    </div>

    <!-- ================= Register Form ================= -->
    <form class="space-y-4" method="post" action="<?= url_to('register') ?>">
        <!-- CSRF Token Field -->
        <?= csrf_field() ?>

        <!-- Email field -->
        <div>
            <label for="email" class="block mb-2 font-medium text-gray-700">
                Email <span class="text-red-500">*</span>
            </label>
            <input autocomplete="email" id="email" name="email" type="email" required placeholder="Email address" class="w-full px-4 py-3 text-base border-2 rounded-lg appearance-none border-gray-300 bg-white 
                       placeholder-gray-500 focus:border-primary focus:outline-none focus:ring-2 focus:ring-primary/20
                       transition-colors duration-200" />
        </div>

        <!-- Username field -->
        <div>
            <label for="username" class="block mb-2 font-medium text-gray-700">
                Username <span class="text-red-500">*</span>
            </label>
            <input autocomplete="username" id="username" name="username" type="text" required placeholder="Username"
                class="w-full px-4 py-3 text-base border-2 rounded-lg appearance-none border-gray-300 bg-white 
                       placeholder-gray-500 focus:border-primary focus:outline-none focus:ring-2 focus:ring-primary/20
                       transition-colors duration-200" />
            <p class="mt-2 text-xs text-gray-500">
                Only letters, numbers, and dots are allowed.
            </p>
        </div>

        <!-- Password field with toggle -->
        <div>
            <label for="password" class="block mb-2 font-medium text-gray-700">
                Password <span class="text-red-500">*</span>
            </label>
            <div class="relative">
                <input autocomplete="new-password" id="password" name="password" type="password" required
                    placeholder="Password" class="w-full px-4 py-3 text-base border-2 rounded-lg appearance-none border-gray-300 bg-white 
                           placeholder-gray-500 focus:border-primary focus:outline-none focus:ring-2 focus:ring-primary/20
                           transition-colors duration-200 pr-12" />
                <button type="button" id="toggle-password" aria-label="Toggle password visibility" class="absolute inset-y-0 right-0 flex items-center pr-3 text-gray-500 hover:text-gray-700
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
                    At least 8 characters
                </li>
                <li id="uppercase" class="flex items-center gap-2">
                    <span class="material-symbols-outlined text-red-500 text-sm">close</span>
                    One uppercase letter
                </li>
                <li id="lowercase" class="flex items-center gap-2">
                    <span class="material-symbols-outlined text-red-500 text-sm">close</span>
                    One lowercase letter
                </li>
                <li id="number" class="flex items-center gap-2">
                    <span class="material-symbols-outlined text-red-500 text-sm">close</span>
                    One number
                </li>
                <li id="special" class="flex items-center gap-2">
                    <span class="material-symbols-outlined text-red-500 text-sm">close</span>
                    One special character
                </li>
            </ul>
        </div>

        <!-- Password confirmation field -->
        <div>
            <label for="password-confirm" class="block mb-2 font-medium text-gray-700">
                Confirm Password <span class="text-red-500">*</span>
            </label>
            <div class="relative">
                <input autocomplete="new-password" id="password-confirm" name="password_confirm" type="password"
                    required placeholder="Confirm Password" class="w-full px-4 py-3 text-base border-2 rounded-lg appearance-none border-gray-300 bg-white 
                           placeholder-gray-500 focus:border-primary focus:outline-none focus:ring-2 focus:ring-primary/20
                           transition-colors duration-200 pr-12" />
                <button type="button" id="toggle-password-confirm" aria-label="Toggle password visibility" class="absolute inset-y-0 right-0 flex items-center pr-3 text-gray-500 hover:text-gray-700
                           transition-colors duration-200">
                    <span class="material-symbols-outlined text-lg">
                        visibility_off
                    </span>
                </button>
            </div>
            <p id="password-match-message" class="mt-2 text-sm text-red-500 hidden">
                Passwords do not match
            </p>
        </div>

        <!-- Submit button -->
        <div>
            <button type="submit" id="submit-btn" class="flex justify-center w-full px-4 py-3 text-base font-semibold text-white 
                       bg-primary hover:bg-primary/90 focus:outline-none focus:ring-2 focus:ring-offset-2 
                       focus:ring-primary rounded-lg shadow-sm transition-colors duration-200
                       active:scale-95 transform disabled:opacity-50 disabled:cursor-not-allowed">
                Sign Up
            </button>
        </div>
    </form>

    <!-- ================= Login link ================= -->
    <p class="mt-6 text-center text-sm text-gray-600">
        Already have an account?
        <a href="<?= url_to('login') ?>" class="font-medium text-primary/80 hover:text-primary 
               transition-colors duration-200">
            Log in
        </a>
    </p>
</div>
<?= $this->endSection() ?>

<?= $this->section('script') ?>
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

        submitBtn.disabled = !(passwordsMatch && allCriteriaMet && hasValues);
    };

    // ============== Username Autocompletion ==============
    const emailInput = document.getElementById('email');
    const usernameInput = document.getElementById('username');

    emailInput.addEventListener('input', () => {
        const local = emailInput.value.split('@')[0] || '';
        // Only autocomplete if username is empty or matches previous email local part
        if (!usernameInput.value || usernameInput.value === emailInput.previousLocalPart) {
            usernameInput.value = local.replace(/[^a-zA-Z0-9.]/g, '');
            emailInput.previousLocalPart = local;
        }
    });

    // ================= Password visibility toggle =================
    const togglePassword = document.getElementById('toggle-password');
    const togglePasswordConfirm = document.getElementById('toggle-password-confirm');

    const setupToggle = (toggleButton, passwordField) => {
        toggleButton.addEventListener('click', () => {
            const icon = toggleButton.querySelector('.material-symbols-outlined');
            const isPassword = passwordField.type === 'password';
            passwordField.type = isPassword ? 'text' : 'password';
            icon.textContent = isPassword ? 'visibility' : 'visibility_off';
            icon.setAttribute('aria-label', isPassword ? 'Hide password' : 'Show password');

            // Re-focus the password field for better UX
            passwordField.focus();
        });
    };

    setupToggle(togglePassword, passwordInput);
    setupToggle(togglePasswordConfirm, confirmInput);

    // Initial validation
    updateSubmitButton();
</script>
<?= $this->endSection() ?>