<?= $this->extend('layouts/app') ?>

<?= $this->section('main') ?>
<!-- ================= Profile Layout Container ================= -->
<div class="min-h-screen bg-gray-50">

    <!-- Profile Navigation -->
    <div class="bg-white border-b border-gray-200 sticky" style="top: var(--main-header-height)">
        <div class="container mx-auto px-4 sm:max-w-6xl">
            <nav class="flex space-x-8 overflow-x-auto scrollbar-hide" role="tablist">
                <?php foreach ($navItems as $key => $item): ?>
                    <a href="<?= site_url('profile/' . $item['url']) ?>" role="tab"
                        aria-selected="<?= $currentPage === $key ? 'true' : 'false' ?>"
                        class="flex items-center gap-2 py-4 px-1 border-b-2 <?= $currentPage === $key ? 'border-green-600 text-green-700' : 'border-transparent text-gray-600 hover:text-gray-900 hover:border-gray-300' ?> font-medium text-sm whitespace-nowrap transition-colors duration-200">
                        <span class="material-symbols-outlined text-lg"><?= $item['icon'] ?></span>
                        <?= $item['title'] ?>
                    </a>
                <?php endforeach; ?>
            </nav>
        </div>
    </div>

    <!-- Profile Content -->
    <div class="container mx-auto px-4 py-8 sm:max-w-6xl">
        <?= $this->renderSection('profile_content') ?>
    </div>
</div>
<?= $this->endSection() ?>

<?= $this->section('script') ?>
<!-- Profile Layout Scripts -->
<script>
    // Navigation active state management
    const navTabs = document.querySelectorAll('nav[role="tablist"] a[role="tab"]');

    navTabs.forEach(tab => {
        tab.addEventListener('click', function(e) {
            if (this.getAttribute('href').startsWith('#')) {
                e.preventDefault();
            }
            navTabs.forEach(t => {
                t.setAttribute('aria-selected', 'false');
                t.classList.remove('border-green-600', 'text-green-700');
                t.classList.add('border-transparent', 'text-gray-600');
            });
            this.setAttribute('aria-selected', 'true');
            this.classList.remove('border-transparent', 'text-gray-600');
            this.classList.add('border-green-600', 'text-green-700');
        });
    });

    // Auto-hide success/error messages with smooth transition
    const alerts = document.querySelectorAll('.alert-auto-hide');
    alerts.forEach(alert => {
        setTimeout(() => {
            alert.classList.add('opacity-0', '-translate-y-2');
            setTimeout(() => alert.remove(), 500); // match transition duration
        }, 5000);
    });
</script>

<?= $this->endSection() ?>