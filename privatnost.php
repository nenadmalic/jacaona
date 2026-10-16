<?php
// privatnost.php - Privacy and cookies page (DRAFT: noindex and out of sitemap.xml until approved)
require_once __DIR__ . '/includes/config.php';

$current_page = 'privatnost';
$noindex = true;
$page_title = t('privacy_title', $lang);
$page_description = t('privacy_meta_description', $lang);

$updated = '16. 10. 2026.';
$controller = 'Sportsko rekreativno društvo Jačaona, Pierottijeva 11, 10000 Zagreb, OIB ' . t('contact_oib', $lang)
    . ', <a href="mailto:info@jacaona.com" class="text-e5 hover:underline">info@jacaona.com</a>';

$sections = $lang === 'en' ? [
    ['Who we are', [
        'This website is run by ' . $controller . '. We are the controller of the personal data described on this page.',
    ]],
    ['What we collect', [
        'The site has no forms and no user accounts. If you contact us by WhatsApp, email or phone, we use what you send us only to answer you and to organise training, and we do not pass it on.',
        'Like every web server, our hosting provider records technical data about each visit (IP address, time, requested page, browser) in server logs, which are used for security and troubleshooting.',
    ]],
    ['Cookies', [
        '<strong>jacaona_consent</strong> (necessary, 180 days): remembers whether you accepted or declined cookies. It contains no personal data and needs no consent.',
        '<strong>Google Analytics</strong> (statistics, only if you accept): counts visits and shows which pages are read, so we can improve the site. Cookies <code>_ga</code> and <code>_ga_*</code>, up to 2 years. Provider: Google Ireland Ltd.',
        '<strong>Google Maps</strong> (only if you accept or click "Show map"): the map of our hall is loaded from Google, which sets its own cookies. Provider: Google Ireland Ltd.',
        'Without your consent none of the Google services load and no Google cookies are set.',
    ]],
    ['Changing your choice', [
        'Click <button type="button" data-consent-open class="text-e5 hover:underline">Cookie settings</button> (also at the bottom of every page) to accept or decline again. If you decline after accepting, we delete the Google Analytics cookies.',
    ]],
    ['Your rights', [
        'Under the GDPR you have the right to access, correct and erase your data, to restrict or object to its processing, and to withdraw consent at any time. Write to <a href="mailto:info@jacaona.com" class="text-e5 hover:underline">info@jacaona.com</a>.',
        'You can also file a complaint with the Croatian Personal Data Protection Agency (AZOP, <a href="https://azop.hr" target="_blank" rel="noopener noreferrer" class="text-e5 hover:underline">azop.hr</a>).',
    ]],
] : [
    ['Tko smo', [
        'Ovu stranicu vodi ' . $controller . '. Mi smo voditelj obrade osobnih podataka opisanih na ovoj stranici.',
    ]],
    ['Koje podatke prikupljamo', [
        'Stranica nema obrazaca ni korisničkih računa. Ako nam se javite WhatsAppom, e-poštom ili telefonom, ono što nam pošaljete koristimo samo da vam odgovorimo i dogovorimo trening te to ne prosljeđujemo dalje.',
        'Kao i svaki web poslužitelj, naš pružatelj hostinga bilježi tehničke podatke o svakom posjetu (IP adresa, vrijeme, tražena stranica, preglednik) u zapisnike poslužitelja, koji služe za sigurnost i otklanjanje grešaka.',
    ]],
    ['Kolačići', [
        '<strong>jacaona_consent</strong> (nužan, 180 dana): pamti jeste li kolačiće prihvatili ili odbili. Ne sadrži osobne podatke i za njega nije potrebna privola.',
        '<strong>Google Analytics</strong> (statistika, samo ako prihvatite): broji posjete i pokazuje koje se stranice čitaju, kako bismo mogli poboljšati stranicu. Kolačići <code>_ga</code> i <code>_ga_*</code>, do 2 godine. Pružatelj: Google Ireland Ltd.',
        '<strong>Google karta</strong> (samo ako prihvatite ili kliknete „Prikaži kartu”): karta naše dvorane učitava se s Googlea, koji pritom postavlja svoje kolačiće. Pružatelj: Google Ireland Ltd.',
        'Bez vaše privole ne učitava se nijedna Googleova usluga i ne postavlja se nijedan Googleov kolačić.',
    ]],
    ['Promjena odluke', [
        'Kliknite <button type="button" data-consent-open class="text-e5 hover:underline">Postavke kolačića</button> (i na dnu svake stranice) da biste ponovno prihvatili ili odbili kolačiće. Ako odbijete nakon što ste prihvatili, brišemo kolačiće Google Analyticsa.',
    ]],
    ['Vaša prava', [
        'Prema Općoj uredbi o zaštiti podataka (GDPR) imate pravo na pristup, ispravak i brisanje svojih podataka, na ograničenje obrade i prigovor te pravo da privolu povučete u bilo kojem trenutku. Pišite nam na <a href="mailto:info@jacaona.com" class="text-e5 hover:underline">info@jacaona.com</a>.',
        'Pritužbu možete podnijeti i Agenciji za zaštitu osobnih podataka (AZOP, <a href="https://azop.hr" target="_blank" rel="noopener noreferrer" class="text-e5 hover:underline">azop.hr</a>).',
    ]],
];

require_once __DIR__ . '/includes/header.php';
?>

<section class="pt-28 md:pt-36 pb-16">
    <div class="container mx-auto px-4 max-w-3xl">
        <h1 class="text-4xl md:text-5xl font-bold font-display uppercase mb-4"><?php echo t('privacy_h1', $lang); ?></h1>
        <p class="text-sm text-[#afb4bf] mb-10"><?php echo $lang === 'en' ? 'Last updated: ' : 'Zadnja izmjena: '; ?><?php echo $updated; ?></p>
<?php foreach ($sections as [$heading, $paragraphs]): ?>
        <h2 class="text-2xl font-bold font-display uppercase mt-10 mb-4"><?php echo $heading; ?></h2>
<?php foreach ($paragraphs as $p): ?>
        <p class="text-gray-300 mb-4"><?php echo $p; ?></p>
<?php endforeach; ?>
<?php endforeach; ?>
    </div>
</section>

<?php require_once __DIR__ . '/includes/footer.php'; ?>
