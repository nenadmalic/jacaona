<?php
require_once __DIR__ . '/includes/config.php';

$current_page = '';
$noindex = true;
$page_title = t('404_title', $lang);

require_once __DIR__ . '/includes/header.php';
?>

<section class="min-h-[60vh] flex items-center justify-center" style="margin-top: 6rem;">
    <div class="container mx-auto px-4 text-center">
        <p class="text-7xl md:text-9xl font-bold font-display text-e5 mb-6">404</p>
        <h1 class="text-2xl md:text-4xl font-bold font-display uppercase mb-8"><?php echo t('404_text', $lang); ?></h1>
        <a href="<?php echo url('', $lang); ?>" class="inline-block bg-e5 hover:bg-red-700 text-white font-semibold px-8 py-3 rounded transition-colors uppercase">
            <?php echo t('404_back', $lang); ?>
        </a>
    </div>
</section>

<?php require_once __DIR__ . '/includes/footer.php'; ?>
