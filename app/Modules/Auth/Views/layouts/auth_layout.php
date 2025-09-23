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

    <!-- ================= Header ================= -->
    <header class="bg-white shadow-sm">
        <div class="container mx-auto px-4 py-3 sm:max-w-6xl sm:py-4 flex justify-between items-center">
            <h1 class="text-xl font-bold text-green-700 sm:text-2xl">
                GAC de PAC
            </h1>
            <a class="text-sm font-medium text-gray-700 hover:text-primary transition-colors duration-200" href="/">
                ← <?= lang('Auth.backToSite') ?>
            </a>
        </div>
    </header>

    <!-- ================= Main Content ================= -->
    <main class="flex flex-1 items-center justify-center py-6 px-4 sm:px-6 lg:px-8">
        <div class="w-full max-w-md mx-auto">
            <?= $this->renderSection('main') ?>
        </div>
    </main>

    <!-- ================= Footer ================= -->
    <footer class="bg-white shadow-sm mt-auto">
        <div class="container mx-auto px-4 py-3 text-xs text-gray-500 text-center sm:text-sm">
            © <?= date('Y') ?>
        </div>
    </footer>

    <!-- ================= Scripts ================= -->
    <?= $this->renderSection('script') ?>
</body>

</html>