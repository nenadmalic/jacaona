<?php
// galerija.php - Gallery page template
require_once __DIR__ . '/includes/config.php';

$current_page = 'galerija';
$page_title = t('gallery_title', $lang);
$page_description = t('gallery_meta_description', $lang);

require_once __DIR__ . '/includes/header.php';

// Gallery items
$gallery_items = [
    // Jiu-Jitsu
    ['img' => 'img/gallery/jiu-jitsu-2-kraj-treninga-2020.jpeg', 'title' => 'Gostovanje Judo crnih pojaseva', 'categories' => 'jiujitsu'],
    ['img' => 'img/gallery/jiu-jitsu-4-clanovi-jacaone-na-natjecanju.jpg', 'title' => 'Članovi Jačaone na natjecanju', 'categories' => 'jiujitsu'],
    ['img' => 'img/gallery/jiu-jitsu-26-sparing.jpg', 'title' => 'Jiu-Jitsu sparing', 'categories' => 'jiujitsu'],
    ['img' => 'img/gallery/jiu-jitsu-14-pocetak-treninga-2022.jpg', 'title' => 'Početak treninga pod vodstvo Luke Laneščaka', 'categories' => 'jiujitsu'],
    ['img' => 'img/gallery/jiu-jitsu-17-zagrijavanje-trener-luka-lanscak.jpg', 'title' => 'Zagrijavanje', 'categories' => 'jiujitsu'],
    ['img' => 'img/gallery/jiu-jitsu-2-trening.jpg', 'title' => 'Sparing', 'categories' => 'jiujitsu'],
    ['img' => 'img/gallery/jiu-jitsu-7-trener-darijo-juricic-na-natjecanju.jpg', 'title' => 'Pobjeda Darija Juričića na natjecanju', 'categories' => 'jiujitsu'],
    ['img' => 'img/gallery/jiu-jitsu-8-dodjela-pojaseva-clanovima-jacaone.jpg', 'title' => 'Dodjela pojaseva članovima Jačaone', 'categories' => 'jiujitsu'],
    ['img' => 'img/gallery/jiuu-jitsu-5-trener-darijo-juricic-zlatna-medalja.jpg', 'title' => 'Zlatna medalja trenera Jačaone', 'categories' => 'jiujitsu jacaona'],
    ['img' => 'img/gallery/jiu-jitsu-6-clanovi-jacaone-na-natjecanju.jpg', 'title' => 'Članovi Jačaone na natjecanju', 'categories' => 'jiujitsu jacaona'],
    ['img' => 'img/gallery/jiu-jitsu-22.jpg', 'title' => 'Jiu-Jitsu trening', 'categories' => 'jiujitsu'],
    
    // Joga
    ['img' => 'img/gallery/jacaona-joga-trening.jpeg', 'title' => 'Fotografija nakon završenog joga seminara', 'categories' => 'joga'],
    ['img' => 'img/gallery/jacaona-joga-trening-2.jpeg', 'title' => 'Pozdrav suncu slijed joga položaja (asana)', 'categories' => 'joga'],
    ['img' => 'img/gallery/joga-3.jpg', 'title' => 'Ratnika dva asana', 'categories' => 'joga'],
    ['img' => 'img/gallery/joga-4.jpg', 'title' => 'Poza kobre', 'categories' => 'joga'],
    
    // Jačaona
    ['img' => 'img/gallery/jacaona-dvorana-4.jpg', 'title' => 'Fotografija Jačaone iz lipnja, 2024.', 'categories' => 'jacaona'],
    ['img' => 'img/gallery/jacaona-dvorana-5.jpg', 'title' => 'Pogled kroz prozore Jačaone', 'categories' => 'jacaona'],
    ['img' => 'img/gallery/jacaona-dvorana-6.jpg', 'title' => 'Fotografija Jačaone iz lipnja, 2024.', 'categories' => 'jacaona'],
    ['img' => 'img/gallery/jacaona-dvorana-7.jpg', 'title' => 'Tatamiji i power rack', 'categories' => 'jacaona'],
    ['img' => 'img/gallery/jacaona-na-ljeto-2011.jpg', 'title' => 'Otvaranje Jačaone na ljeto 2011.', 'categories' => 'jacaona'],
    ['img' => 'img/gallery/jacaona-na-ljeto-2011-otvaranje-dvorane.jpg', 'title' => 'Otvaranje Jačaone na ljeto 2011.', 'categories' => 'jacaona'],
    ['img' => 'img/gallery/jacaona-radovi-pred-otvaranje-dvorane-2011.jpg', 'title' => 'Radovi pred otvaranje dvorane 2011.', 'categories' => 'jacaona'],
    ['img' => 'img/gallery/jacaona-smjena sekcija.jpg', 'title' => 'Smjena sekcija Jiu-Jitsu i Snaga i kondicija', 'categories' => 'jacaona snaga-i-kondicija jiujitsu'],
    ['img' => 'img/gallery/jacaona-smjena sekcija Ju-Jitsu i dizanje utega-1.jpg', 'title' => 'Smjena sekcija Jiu-Jitsu i dizanje utega', 'categories' => 'jacaona jiujitsu dizanje-utega'],
    ['img' => 'img/gallery/dizanje-utega-2-custom-napravljen-rack-za-dizanje-utega.jpg', 'title' => 'Custom napravljen rack za dizanje utega', 'categories' => 'jacaona dizanje-utega'],
    
    // JačaONA
    ['img' => 'img/gallery/jacaona-seminar-dan-zena-2025-2.jpeg', 'title' => '"OsnaŽENA" seminar JačaONA sekcije na Dan žena 2025.', 'categories' => 'jacaONA'],
    ['img' => 'img/gallery/jacaona-seminar-dan-zena-2025.jpeg', 'title' => 'Trenerica Lucija Matanović održava "OsnaŽENA" seminar JačaONA sekcije na Dan žena 2025.', 'categories' => 'jacaONA'],
    
    // Grappling
    ['img' => 'img/gallery/grappling-12.jpg', 'title' => 'Grappling sekcija', 'categories' => 'grappling'],
    ['img' => 'img/gallery/grappling-10.jpg', 'title' => 'Tehnike na parteru', 'categories' => 'grappling'],
    ['img' => 'img/gallery/grappling-17-trener-luka-skoric.jpg', 'title' => 'Škorić vs. Juričić sparing', 'categories' => 'grappling'],
    ['img' => 'img/gallery/grappling-6.jpg', 'title' => 'Trening tehnika i sparing', 'categories' => 'grappling'],
    ['img' => 'img/gallery/grappling-8.jpg', 'title' => 'Grappling sparing', 'categories' => 'grappling'],
    
    // Dizanje utega
    ['img' => 'img/gallery/dizanje-utega-5.jpg', 'title' => 'Veslanje u pretklonu iliti Barbell Row', 'categories' => 'dizanje-utega'],
    ['img' => 'img/gallery/dizanje-utega-13.jpeg', 'title' => 'Trener Josip Barbača', 'categories' => 'snaga-i-kondicija'],
    ['img' => 'img/gallery/dizanje-utega-6-trener-marko-domgjoni.jpg', 'title' => 'Trener Marko Domgjoni', 'categories' => 'dizanje-utega'],
    
    // Kvir kolektiv
    ['img' => 'img/gallery/kvir-kolektiv-6-priprema-za-trening.jpg', 'title' => 'Priprema dvorane za trening', 'categories' => 'kvir-kolektiv'],
    ['img' => 'img/gallery/kvir-kolektiv-9.jpeg', 'title' => 'Kružni trening', 'categories' => 'kvir-kolektiv'],
    ['img' => 'img/gallery/kvir-kolektiv-3.jpg', 'title' => 'Kvir Kolektiv zagrijavanje', 'categories' => 'kvir-kolektiv'],
    
    // Wing Chun
    ['img' => 'img/gallery/wing-chun-4.jpeg', 'title' => 'Trening s drvenom lutkom', 'categories' => 'wing-chun'],
    ['img' => 'img/gallery/wing-chun-5.jpeg', 'title' => 'Drvena lutka na power racku', 'categories' => 'wing-chun'],
    ['img' => 'img/gallery/wing-chun-6.jpeg', 'title' => 'Montiranje drvene lutke i trening', 'categories' => 'wing-chun'],
    
    // Capoeira
    ['img' => 'img/gallery/skola-capoeire-2.jpg', 'title' => 'Capoeiristi usred treninga', 'categories' => 'capoeira'],
    ['img' => 'img/gallery/skola-capoeire-1.jpg', 'title' => 'Škola Filhos de Bimba Escola de Capoeira Zagreb - Croatia', 'categories' => 'capoeira'],
    
    // Snaga i kondicija
    ['img' => 'img/gallery/snaga-i-kondicija-11.jpg', 'title' => 'Trening s maljom i traktorskom gumom', 'categories' => 'snaga-i-kondicija jacaona'],
    ['img' => 'img/gallery/kruzni-treninzi-8.jpg', 'title' => 'Snaga i izdržljivost treninzi', 'categories' => 'snaga-i-kondicija'],
    ['img' => 'img/gallery/snaga-i-izdrzljivost-9.jpg', 'title' => 'Mrtvo dizanje', 'categories' => 'snaga-i-kondicija'],
    
    // Kickboxing
    ['img' => 'img/gallery/kickboxing-treninzi-1.jpg', 'title' => 'Kickboxing treninzi', 'categories' => 'kickboxing'],
    
    // Krav Maga
    ['img' => 'img/gallery/krav-maga-seminar-3.jpeg', 'title' => 'Krav Maga seminar pod vodstvom Andreje Jelić', 'categories' => 'kravmaga'],
    ['img' => 'img/gallery/krav-maga-jacaona-2.jpg', 'title' => 'Krav Maga seminar', 'categories' => 'kravmaga'],
    ['img' => 'img/gallery/krav-maga-seminar-2.jpeg', 'title' => 'Krav Maga seminar pod vodstvom Andreje Jelić', 'categories' => 'kravmaga'],
    
    // Mini Football
    ['img' => 'img/gallery/jacaona-mini-nogomet-1.jpg', 'title' => 'Neformalna mini football sekcija', 'categories' => 'mini-football jacaona'],
];
?>

<!-- Breadcrumb Section -->
<section class="breadcrumb-section bg-cover bg-center bg-no-repeat relative flex items-center justify-center"
         style="background-image: url('<?php echo img_url('img/galerija-jiu-jitsu-pocetak-treninga.jpg', 'w_1920'); ?>'); height: 300px;">
    <div class="absolute inset-0 bg-black/50" aria-hidden="true"></div>
    <div class="container mx-auto px-4 relative z-10">
        <div class="text-white text-center">
            <h1 class="text-4xl md:text-5xl font-bold mb-4 font-display"><?php echo t('gallery_breadcrumb', $lang); ?></h1>
            <div class="flex items-center justify-center space-x-2 text-sm">
                <a href="<?php echo url('', $lang); ?>" class="hover:underline">
                    <svg class="w-4 h-4 inline mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
                    </svg>
                    <?php echo t('nav_home', $lang); ?>
                </a>
                <span>/</span>
                <span><?php echo t('gallery_breadcrumb', $lang); ?></span>
            </div>
        </div>
    </div>
</section>

<!-- Gallery Section -->
<section class="py-16">
    <div class="container mx-auto px-4">
        <!-- Gallery Filters -->
        <div class="flex flex-wrap justify-center gap-2 mb-8">
            <button class="gallery-filter-btn px-4 py-2 rounded-md bg-e5 text-white font-bold" data-filter="all">
                <?php echo t('gallery_all', $lang); ?>
            </button>
            <button class="gallery-filter-btn px-4 py-2 rounded-md hover:bg-e5 font-bold text-white" data-filter="jacaona">
                <?php echo t('gallery_filter_jacaona', $lang); ?>
            </button>
            <button class="gallery-filter-btn px-4 py-2 rounded-md hover:bg-e5 font-bold text-white" data-filter="dizanje-utega">
                <?php echo t('gallery_filter_dizanje', $lang); ?>
            </button>
            <button class="gallery-filter-btn px-4 py-2 rounded-md hover:bg-e5 font-bold text-white" data-filter="capoeira">
                <?php echo t('gallery_filter_capoeira', $lang); ?>
            </button>
            <button class="gallery-filter-btn px-4 py-2 rounded-md hover:bg-e5 font-bold text-white" data-filter="jiujitsu">
                <?php echo t('gallery_filter_jiujitsu', $lang); ?>
            </button>
            <button class="gallery-filter-btn px-4 py-2 rounded-md hover:bg-e5 font-bold text-white" data-filter="joga">
                <?php echo t('gallery_filter_joga', $lang); ?>
            </button>
            <button class="gallery-filter-btn px-4 py-2 rounded-md hover:bg-e5 font-bold text-white" data-filter="grappling">
                <?php echo t('gallery_filter_grappling', $lang); ?>
            </button>
            <button class="gallery-filter-btn px-4 py-2 rounded-md hover:bg-e5 font-bold text-white" data-filter="kickboxing">
                <?php echo t('gallery_filter_kickboxing', $lang); ?>
            </button>
            <button class="gallery-filter-btn px-4 py-2 rounded-md hover:bg-e5 font-bold text-white" data-filter="kvir-kolektiv">
                <?php echo t('gallery_filter_kvir', $lang); ?>
            </button>
            <button class="gallery-filter-btn px-4 py-2 rounded-md hover:bg-e5 font-bold text-white" data-filter="snaga-i-kondicija">
                <?php echo t('gallery_filter_snaga', $lang); ?>
            </button>
            <button class="gallery-filter-btn px-4 py-2 rounded-md hover:bg-e5 font-bold text-white" data-filter="wing-chun">
                <?php echo t('gallery_filter_wingchun', $lang); ?>
            </button>
            <button class="gallery-filter-btn px-4 py-2 rounded-md hover:bg-e5 font-bold text-white" data-filter="kravmaga">
                <?php echo t('gallery_filter_kravmaga', $lang); ?>
            </button>
            <button class="gallery-filter-btn px-4 py-2 rounded-md hover:bg-e5 font-bold text-white" data-filter="mini-football">
                <?php echo t('gallery_filter_minifootball', $lang); ?>
            </button>
            <button class="gallery-filter-btn px-4 py-2 rounded-md hover:bg-e5 font-bold text-white" data-filter="jacaONA">
                <?php echo t('gallery_filter_jacaONA', $lang); ?>
            </button>
        </div>
        
        <!-- Gallery Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            <?php foreach ($gallery_items as $item): ?>
                <div class="gallery-item bg-141414 rounded-lg shadow-md overflow-hidden" data-categories="<?php echo htmlspecialchars($item['categories']); ?>">
                    <a href="<?php echo img_url($item['img'], 'w_1600,c_limit'); ?>" class="gallery-lightbox-trigger block cursor-pointer">
                        <img src="<?php echo img_url($item['img'], 'w_800'); ?>"
                             alt="<?php echo htmlspecialchars($item['title']); ?>"
                             loading="lazy" decoding="async"
                             class="w-full h-64 object-cover">
                    </a>
                    <div class="p-4">
                        <p class="font-semibold text-white"><?php echo htmlspecialchars($item['title']); ?></p>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<?php require_once __DIR__ . '/includes/footer.php'; ?>

