<?php
// map.php - Google Maps embed that loads only after cookie consent (or a click on "Show map").
// Expects: $map_embed_src (Google Maps embed URL). js/main.js swaps the placeholder for the iframe.
?>
<div class="map-consent absolute inset-0 flex items-end justify-center pb-16 md:items-center md:justify-start md:pb-6 md:pl-[8%] bg-[#1a1a1a] p-6"
     data-map-src="<?php echo htmlspecialchars($map_embed_src); ?>"
     data-map-title="<?php echo htmlspecialchars(t('map_title', $lang)); ?>">
    <div class="max-w-sm text-center">
        <p class="text-white mb-4"><?php echo t('map_placeholder', $lang); ?></p>
        <button type="button" class="map-consent-show bg-e5 hover:bg-white hover:text-black text-white font-display uppercase px-5 py-2 transition-colors">
            <?php echo t('map_show', $lang); ?>
        </button>
        <p class="mt-4">
            <a href="https://maps.app.goo.gl/ZodRCzAtwRG8pqNd9" target="_blank" rel="noopener noreferrer" class="text-white underline hover:text-e5">
                <?php echo t('map_open', $lang); ?>
            </a>
        </p>
    </div>
</div>
