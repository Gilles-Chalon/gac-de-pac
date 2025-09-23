<?= $this->extend(config('Auth')->views['layout']) ?>

<?= $this->section('main') ?>
<!-- ================= Magic Link Container ================= -->
<div class="w-full space-y-6">

    <!-- Title & subtitle with info icon -->
    <div class="text-center">
        <h2 class=" text-2xl font-extrabold text-gray-900 sm:text-3xl"><?= lang('Auth.useMagicLink') ?></h2>
        <div class="mt-2 flex items-center justify-center gap-2">
            <p class="text-sm text-gray-600">
                <?= lang('Auth.magicLinkSubtitle') ?>
            </p>
        </div>
    </div>

    <!-- Error messages -->
    <?php if (session('error') !== null) : ?>
        <div class="p-4 rounded-lg bg-red-50 border-l-4 border-red-400">
            <div class="flex">
                <div class="flex-shrink-0 pt-0.5">
                    <span class="material-symbols-outlined text-red-400 text-lg">
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
                <div class="flex-shrink-0 pt-0.5">
                    <span class="material-symbols-outlined text-red-400 text-lg">
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

    <!-- ================= Magic Link Form ================= -->
    <form class="space-y-4" method="post" action="<?= url_to('magic-link') ?>">
        <!-- CSRF Token Field -->
        <?= csrf_field() ?>

        <!-- Email field -->
        <div>
            <label for="email" class="block mb-2 font-medium text-gray-700">
                <?= lang('Auth.emailLabel') ?> <span class="text-red-500">*</span>
            </label>
            <input autocomplete="email" id="email" name="email" type="email" required
                placeholder="<?= lang('Auth.emailPlaceholder') ?>"
                value="<?= old('email', auth()->user()->email ?? null) ?>" class="w-full px-4 py-3 text-base border-2 rounded-lg appearance-none border-gray-300 bg-white 
                       placeholder-gray-500 focus:border-primary focus:outline-none focus:ring-2 focus:ring-primary/20
                       transition-colors duration-200" />
        </div>

        <!-- Submit button -->
        <div>
            <button type="submit" class="flex justify-center w-full px-4 py-3 text-base font-semibold text-white 
                           bg-primary hover:bg-primary/90 focus:outline-none focus:ring-2 focus:ring-offset-2 
                           focus:ring-primary rounded-lg shadow-sm transition-colors duration-200
                           active:scale-95 transform">
                <span class="flex items-center">
                    <span class="material-symbols-outlined mr-2 text-lg">
                        send
                    </span>
                    <?= lang('Auth.send') ?>
                </span>
            </button>
        </div>
    </form>

    <!-- ================= Back to login link ================= -->
    <p class="mt-8 text-center text-sm text-gray-600">
        <?= lang('Auth.rememberPassword') ?>
        <a href="<?= url_to('login') ?>" class="font-medium text-primary/80 hover:text-primary 
               transition-colors duration-200">
            <?= lang('Auth.backToLogin') ?>
        </a>
    </p>
</div>
<?= $this->endSection() ?>