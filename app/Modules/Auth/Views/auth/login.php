<?= $this->extend(config('Auth')->views['layout']) ?>

<?= $this->section('main') ?>
<!-- ================= Login Container ================= -->
<div class="w-full space-y-6">

    <!-- Title & subtitle -->
    <div class="text-center">
        <h2 class="text-2xl font-extrabold text-gray-900 sm:text-3xl"><?= lang('Auth.loginHeader') ?></h2>
        <p class="mt-2 text-sm text-gray-600">
            <?= lang('Auth.loginSubtitle') ?>
        </p>
    </div>

    <!-- Error messages -->
    <?php if (session('error') !== null) : ?>
        <div class="p-4 rounded-lg bg-red-50 border-l-4 border-red-400">
            <div class="flex">
                <div class="flex-shrink-0">
                    <span class="material-symbols-outlined text-red-400">
                        error
                    </span>
                </div>
                <div class="ml-3">
                    <p class="text-sm text-red-700"><?= esc(session('error')) ?></p>
                </div>
            </div>
        </div>
    <?php elseif (session('errors') !== null) : ?>
        <div class="p-4 rounded-lg bg-red-50 border-l-4 border-red-400">
            <div class="flex">
                <div class="flex-shrink-0">
                    <span class="material-symbols-outlined text-red-400">
                        error
                    </span>
                </div>
                <div class="ml-3">
                    <div class="text-sm text-red-700">
                        <?php if (is_array(session('errors'))) : ?>
                            <?php foreach (session('errors') as $error) : ?>
                                <p><?= esc($error) ?></p>
                            <?php endforeach ?>
                        <?php else : ?>
                            <p><?= esc(session('errors')) ?></p>
                        <?php endif ?>
                    </div>
                </div>
            </div>
        </div>
    <?php endif ?>

    <!-- ================= Login Form ================= -->
    <form class="space-y-4" method="post" action="<?= url_to('login') ?>">
        <!-- CSRF Token Field -->
        <?= csrf_field() ?>

        <!-- Email field -->
        <div>
            <label for="email" class="block mb-2 font-medium text-gray-700">
                <?= lang('Auth.emailLabel') ?> <span class="text-red-500">*</span>
            </label>
            <input autocomplete="email" id="email" name="email" type="email" required
                placeholder="<?= lang('Auth.emailPlaceholder') ?>" value="<?= old('email') ?>" class="w-full px-4 py-3 text-base border-2 rounded-lg appearance-none border-gray-300 bg-white 
                          placeholder-gray-500 focus:border-primary focus:outline-none focus:ring-2 focus:ring-primary/20
                          transition-colors duration-200" />
        </div>

        <!-- Password field with toggle and forgot password link -->
        <div>
            <div class="flex items-center justify-between mb-2">
                <label for="password" class="font-medium text-gray-700">
                    <?= lang('Auth.passwordLabel') ?> <span class="text-red-500">*</span>
                </label>
                <a href="<?= url_to('magic-link') ?>" class="text-sm font-medium text-primary/80 hover:text-primary 
                       transition-colors duration-200">
                    <?= lang('Auth.forgotPassword') ?>
                </a>
            </div>
            <div class="relative">
                <input autocomplete="current-password" id="password" name="password" type="password" required
                    placeholder="<?= lang('Auth.passwordPlaceholder') ?>" class="w-full px-4 py-3 text-base border-2 rounded-lg appearance-none border-gray-300 bg-white
                           placeholder-gray-500 focus:border-primary focus:outline-none focus:ring-2 focus:ring-primary/20
                           transition-colors duration-200 pr-12" />
                <button type="button" aria-label="<?= lang('Auth.togglePasswordVisibility') ?>" class="absolute inset-y-0 right-0 flex items-center pr-3 text-gray-500 hover:text-gray-700
                           transition-colors duration-200"
                    onclick="const p=document.getElementById('password');p.type=p.type==='password'?'text':'password';
                             this.querySelector('span').textContent = p.type==='password'?'visibility':'visibility_off'">
                    <span class="material-symbols-outlined text-lg">
                        visibility
                    </span>
                </button>
            </div>
        </div>

        <!-- Remember me checkbox -->
        <div class="flex items-center">
            <input id="remember-me" name="remember-me" type="checkbox"
                class="h-4 w-4 rounded border-gray-300 text-primary focus:ring-primary" />
            <label for="remember-me" class="ml-2 block text-sm text-gray-900">
                <?= lang('Auth.rememberMe') ?>
            </label>
        </div>

        <!-- Submit button -->
        <div>
            <button type="submit" class="flex justify-center w-full px-4 py-3 text-base font-semibold text-white 
                           bg-primary hover:bg-primary/90 focus:outline-none focus:ring-2 focus:ring-offset-2 
                           focus:ring-primary rounded-lg shadow-sm transition-colors duration-200
                           active:scale-95 transform">
                <?= lang('Auth.signIn') ?>
            </button>
        </div>
    </form>

    <!-- ================= Signup link ================= -->
    <p class="mt-8 text-center text-sm text-gray-600">
        <?= lang('Auth.notRegistered') ?>
        <a href="<?= url_to('register') ?>" class="font-medium text-primary/80 hover:text-primary 
               transition-colors duration-200">
            <?= lang('Auth.signUp') ?>
        </a>
    </p>
</div>
<?= $this->endSection() ?>