<?= $this->extend('layouts/app') ?>

<?= $this->section('main') ?>
<div class="min-h-screen bg-gray-50 flex flex-col">

    <!-- Profile Navigation -->
    <div class="bg-white border-b border-gray-200 sticky top-[var(--main-header-height)] z-10 shadow-sm">
        <div class="container mx-auto px-4 sm:max-w-6xl">

            <!-- Desktop Navigation (Tabs) -->
            <nav class="hidden md:flex space-x-8" role="tablist">
                <?php foreach ($navItems as $key => $item): ?>
                    <a href="<?= site_url('profile/' . $item['url']) ?>" role="tab"
                        aria-selected="<?= $currentPage === $key ? 'true' : 'false' ?>" class="flex items-center gap-2 py-4 px-1 border-b-2 transition-colors duration-200 font-medium text-sm whitespace-nowrap
                          <?= $currentPage === $key
                                ? 'border-green-600 text-green-700'
                                : 'border-transparent text-gray-600 hover:text-gray-900 hover:border-gray-300' ?>">
                        <span class="material-symbols-outlined text-base"><?= $item['icon'] ?></span>
                        <?= $item['title'] ?>
                    </a>
                <?php endforeach; ?>
            </nav>

            <!-- Mobile Bottom Nav -->
            <nav class="fixed bottom-0 left-0 right-0 bg-white border-t border-gray-200 shadow-md md:hidden z-50">
                <div class="flex justify-around">
                    <?php foreach ($navItems as $key => $item): ?>
                        <a href="<?= site_url('profile/' . $item['url']) ?>"
                            class="flex flex-col items-center justify-center py-2 px-3 text-sm <?= $currentPage === $key ? 'text-green-600' : 'text-gray-500' ?>">
                            <span class="material-symbols-outlined text-2xl"><?= $item['icon'] ?></span>
                            <span class="block text-center text-xs mt-1 leading-tight"><?= $item['title'] ?></span>
                        </a>
                    <?php endforeach; ?>
                </div>
            </nav>
        </div>
    </div>

    <!-- Profile Content -->
    <main class="flex-1 container mx-auto px-4 py-8 sm:max-w-6xl">
        <?= $this->renderSection('profile_content') ?>
    </main>
</div>
<?= $this->endSection() ?>

<?= $this->section('script') ?>
<script>
    // Mobile navigation handler
    const navSelect = document.getElementById('profile-nav-select');
    if (navSelect) {
        navSelect.addEventListener('change', function() {
            window.location.href = this.value;
        });
    }

    // Auto-hide success/error messages with smooth transition
    const alerts = document.querySelectorAll('.alert-auto-hide');
    alerts.forEach(alert => {
        setTimeout(() => {
            alert.classList.add('opacity-0', '-translate-y-2');
            setTimeout(() => alert.remove(), 500);
        }, 5000);
    });
</script>
<?= $this->endSection() ?>