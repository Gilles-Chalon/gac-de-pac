<?= $this->extend(config('Customer')->views['layout']) ?>

<?= $this->section('profile_content') ?>
<div class="max-w-2xl mx-auto">
    <h2 class="text-2xl"><?= lang('Profile.comingSoon') ?></h2>
</div>
<?= $this->endSection() ?>