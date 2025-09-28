<!DOCTYPE html>
<html lang="fr">

<head>
    <!-- Meta and viewport -->
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />

    <!-- Title -->
    <title><?= esc($title ?? 'GAC de PAC') ?></title>

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com" rel="preconnect" />
    <link crossorigin="" href="https://fonts.gstatic.com" rel="preconnect" />
    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@300;400;500;600;700;800&display=swap"
        rel="stylesheet" />

    <!-- Material Icons -->
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" rel="stylesheet" />

    <!-- Tailwind CSS -->
    <link rel="stylesheet" href="<?= base_url('assets/app.css') ?>">
</head>

<body class="bg-background-light font-display text-gray-800 flex min-h-screen w-full flex-col">

    <!-- Header -->
    <header class="bg-white shadow-sm sticky top-0 z-50 h-20">
        <div class="container mx-auto px-4 py-3 sm:max-w-6xl sm:py-4">
            <div class="flex justify-between items-center">
                <!-- Logo -->
                <a href="<?= site_url('/') ?>" class="flex items-center space-x-2">
                    <h1 class="text-xl font-bold text-green-700 sm:text-2xl">
                        <?= lang('App.appName') ?>
                    </h1>
                </a>

                <!-- Desktop Navigation - Toujours visible sur desktop -->
                <nav class="hidden md:flex items-center space-x-4">
                    <?php if (!auth()->loggedIn()): ?>
                        <a href="<?= url_to('login') ?>"
                            class="px-4 py-2 text-sm font-medium text-gray-700 hover:text-green-700 transition-colors duration-200 rounded-lg hover:bg-gray-50">
                            <?= lang('Auth.login') ?>
                        </a>
                        <a href="<?= url_to('register') ?>"
                            class="px-4 py-2 text-sm font-medium text-white bg-green-600 rounded-lg hover:bg-green-700 transition-colors duration-200 shadow-sm">
                            <?= lang('Auth.register') ?>
                        </a>
                    <?php else: ?>
                        <a href="<?= site_url('profile') ?>"
                            class="px-4 py-2 text-sm font-medium text-gray-700 hover:text-green-700 transition-colors duration-200 rounded-lg hover:bg-gray-50 flex items-center space-x-1">
                            <span class="material-symbols-outlined text-base">person</span>
                            <span><?= lang('App.profile') ?></span>
                        </a>
                        <span class="text-sm text-gray-600 px-3 py-1 bg-gray-50 rounded-lg">
                            👋 <?= lang('App.greetings') ?>, <strong><?= esc(auth()->user()->username) ?></strong>
                        </span>
                        <a href="<?= url_to('logout') ?>"
                            class="px-4 py-2 text-sm font-medium text-gray-700 hover:text-red-600 transition-colors duration-200 flex items-center space-x-1 rounded-lg hover:bg-gray-50">
                            <span class="material-symbols-outlined text-base">logout</span>
                            <span><?= lang('Auth.logout') ?></span>
                        </a>
                    <?php endif; ?>
                </nav>


                <!-- Mobile Menu Button - Uniquement visible sur mobile -->
                <button id="mobile-menu-button"
                    class="md:hidden p-2 rounded-lg text-gray-600 hover:text-green-700 hover:bg-gray-100 transition-colors duration-200"
                    aria-label="Menu" aria-expanded="false">
                    <span class="material-symbols-outlined text-xl">
                        menu
                    </span>
                </button>
            </div>

            <!-- Mobile Navigation - Uniquement visible sur mobile -->
            <div id="mobile-menu" class="hidden md:hidden mt-3 pb-2 border-t border-gray-200">
                <?php if (!auth()->loggedIn()): ?>
                    <div class="flex flex-col space-y-2 pt-3">
                        <a href="<?= url_to('login') ?>"
                            class="px-4 py-3 text-base font-medium text-gray-700 hover:text-green-700 hover:bg-gray-50 rounded-lg transition-colors duration-200 flex items-center space-x-3 justify-center">
                            <span class="material-symbols-outlined text-lg">login</span>
                            <span><?= lang('Auth.login') ?></span>
                        </a>
                        <a href="<?= url_to('register') ?>"
                            class="px-4 py-3 text-base font-medium text-white bg-green-600 rounded-lg hover:bg-green-700 transition-colors duration-200 shadow-sm flex items-center space-x-3 justify-center">
                            <span class="material-symbols-outlined text-lg">person_add</span>
                            <span><?= lang('Auth.register') ?></span>
                        </a>
                    </div>
                <?php else: ?>
                    <div class="flex flex-col space-y-2 pt-3">
                        <div class="px-4 py-3 text-sm text-gray-600 bg-gray-50 rounded-lg">
                            <div class="font-medium"><?= lang('App.connectedAs') ?></div>
                            <div class="font-bold text-green-700"><?= esc(auth()->user()->username) ?></div>
                        </div>

                        <a href="<?= site_url('profile') ?>"
                            class="px-4 py-3 text-base font-medium text-gray-700 hover:text-green-700 hover:bg-gray-50 rounded-lg transition-colors duration-200 flex items-center space-x-3">
                            <span class="material-symbols-outlined text-lg">person</span>
                            <span><?= lang('App.profile') ?></span>
                        </a>

                        <a href="<?= url_to('logout') ?>"
                            class="px-4 py-3 text-base font-medium text-gray-700 hover:text-red-600 hover:bg-gray-50 rounded-lg transition-colors duration-200 flex items-center space-x-3">
                            <span class="material-symbols-outlined text-lg">logout</span>
                            <span><?= lang('Auth.logout') ?></span>
                        </a>
                    </div>
                <?php endif; ?>

            </div>
        </div>
    </header>

    <!-- Floating Alerts Container -->
    <div class="relative z-40">
        <div class="absolute right-4 top-4 md:top-6 space-y-3 w-full max-w-sm md:max-w-md">
            <?php if (session('success')): ?>
                <div class="alert-auto-hide transition duration-500 ease-in-out opacity-100 translate-y-0 p-4 bg-green-50 border border-green-200 rounded-lg shadow-lg"
                    role="status" aria-live="polite">
                    <div class="flex items-center">
                        <span class="material-symbols-outlined text-green-600 mr-3">check_circle</span>
                        <p class="text-green-800 font-medium"><?= session('success') ?></p>
                    </div>
                </div>
            <?php endif; ?>

            <?php if (session('error')): ?>
                <div class="alert-auto-hide transition duration-500 ease-in-out opacity-100 translate-y-0 p-4 bg-red-50 border border-red-200 rounded-lg shadow-lg"
                    role="alert" aria-live="assertive">
                    <div class="flex items-center">
                        <span class="material-symbols-outlined text-red-600 mr-3">error</span>
                        <p class="text-red-800 font-medium"><?= session('error') ?></p>
                    </div>
                </div>
            <?php endif; ?>

            <?php if (session('info')): ?>
                <div class="alert-auto-hide transition duration-500 ease-in-out opacity-100 translate-y-0 p-4 bg-blue-50 border border-blue-200 rounded-lg shadow-lg"
                    role="status" aria-live="polite">
                    <div class="flex items-center">
                        <span class="material-symbols-outlined text-blue-600 mr-3">info</span>
                        <p class="text-blue-800 font-medium"><?= session('info') ?></p>
                    </div>
                </div>
            <?php endif; ?>

            <?php if (session('errors')) : ?>
                <div class="transition duration-500 ease-in-out opacity-100 translate-y-0 p-4 bg-red-50 border border-red-200 rounded-lg shadow-lg"
                    role="alert" aria-live="assertive">
                    <div class="flex items-center mb-2">
                        <span class="material-symbols-outlined text-red-600 mr-3">error</span>
                        <h4 class="text-lg font-semibold text-red-800">Veuillez corriger les erreurs ci-dessous</h4>
                    </div>
                    <ul class="list-disc list-inside text-red-700 space-y-1">
                        <?php foreach (session('errors') as $error) : ?>
                            <li><?= esc($error) ?></li>
                        <?php endforeach ?>
                    </ul>
                </div>
            <?php endif ?>
        </div>
    </div>

    <!-- Main Content -->
    <main class="flex-1">
        <?= $this->renderSection('main') ?>
    </main>

    <!-- Footer -->
    <footer class="bg-white shadow-sm mt-auto">
        <div class="container mx-auto px-4 py-4 text-center">
            <p class="text-sm text-gray-500">
                © <?= date('Y') ?> <?= lang('App.appName') ?>. <?= lang('App.allRightsReserved') ?>.
            </p>
        </div>
    </footer>

    <!-- Scripts Section -->
    <?= $this->renderSection('script') ?>

    <!-- Mobile Menu Script -->
    <script>
        // Mobile menu functionality - seulement nécessaire sur mobile
        const mobileMenuButton = document.getElementById('mobile-menu-button');
        const mobileMenu = document.getElementById('mobile-menu');

        if (mobileMenuButton && mobileMenu) {
            const menuIcon = mobileMenuButton.querySelector('.material-symbols-outlined');

            mobileMenuButton.addEventListener('click', () => {
                const isExpanded = mobileMenuButton.getAttribute('aria-expanded') === 'true';

                // Toggle menu visibility
                mobileMenu.classList.toggle('hidden');
                mobileMenuButton.setAttribute('aria-expanded', !isExpanded);

                // Update icon
                menuIcon.textContent = isExpanded ? 'menu' : 'close';

                // Prevent body scroll when menu is open on mobile
                document.body.style.overflow = isExpanded ? '' : 'hidden';
            });

            // Close menu when clicking on a link
            mobileMenu.querySelectorAll('a').forEach(link => {
                link.addEventListener('click', () => {
                    mobileMenu.classList.add('hidden');
                    mobileMenuButton.setAttribute('aria-expanded', 'false');
                    menuIcon.textContent = 'menu';
                    document.body.style.overflow = '';
                });
            });

            // Close menu when clicking outside (mobile seulement)
            document.addEventListener('click', (event) => {
                if (window.innerWidth < 768 &&
                    !mobileMenuButton.contains(event.target) &&
                    !mobileMenu.contains(event.target)) {
                    mobileMenu.classList.add('hidden');
                    mobileMenuButton.setAttribute('aria-expanded', 'false');
                    menuIcon.textContent = 'menu';
                    document.body.style.overflow = '';
                }
            });

            // Close menu on escape key
            document.addEventListener('keydown', (event) => {
                if (event.key === 'Escape' && !mobileMenu.classList.contains('hidden')) {
                    mobileMenu.classList.add('hidden');
                    mobileMenuButton.setAttribute('aria-expanded', 'false');
                    menuIcon.textContent = 'menu';
                    document.body.style.overflow = '';
                }
            });

            // Fermer le menu si on passe en mode desktop
            window.addEventListener('resize', () => {
                if (window.innerWidth >= 768) {
                    mobileMenu.classList.add('hidden');
                    mobileMenuButton.setAttribute('aria-expanded', 'false');
                    menuIcon.textContent = 'menu';
                    document.body.style.overflow = '';
                }
            });
        }
    </script>
</body>

</html>