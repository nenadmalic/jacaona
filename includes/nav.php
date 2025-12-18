<?php
// Navigation menu
$current_path = $current_page ?? '';
?>
<ul class="flex flex-col md:flex-row md:space-x-6 space-y-2 md:space-y-0">
    <li>
        <a href="<?php echo url('', $lang); ?>" 
           class="block px-3 py-2 rounded-md uppercase <?php echo $current_path === '' ? 'text-white font-semibold underline' : 'text-white hover:underline'; ?>">
            <?php echo t('nav_home', $lang); ?>
        </a>
    </li>
    <li>
        <a href="<?php echo url('o-nama', $lang); ?>" 
           class="block px-3 py-2 rounded-md uppercase <?php echo $current_path === 'o-nama' ? 'text-white font-semibold underline' : 'text-white hover:underline'; ?>">
            <?php echo t('nav_about', $lang); ?>
        </a>
    </li>
    <li>
        <a href="<?php echo url('galerija', $lang); ?>" 
           class="block px-3 py-2 rounded-md uppercase <?php echo $current_path === 'galerija' ? 'text-white font-semibold underline' : 'text-white hover:underline'; ?>">
            <?php echo t('nav_gallery', $lang); ?>
        </a>
    </li>
    <li>
        <a href="<?php echo url('kontakt', $lang); ?>" 
           class="block px-3 py-2 rounded-md uppercase <?php echo $current_path === 'kontakt' ? 'text-white font-semibold underline' : 'text-white hover:underline'; ?>">
            <?php echo t('nav_contact', $lang); ?>
        </a>
    </li>
</ul>

