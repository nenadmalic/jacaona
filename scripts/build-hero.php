<?php
// Build hero slider images from the originals in img/hero-slider/:
//   <name>-light.jpg   brightened copy (gamma) for photos that are too dark
//   <name>-mobile.jpg  portrait crop for phones (smaller download, subject kept in frame)
// Then run ./scripts/build-webp.sh to make the WebP copies that the site serves.
// Usage: php scripts/build-hero.php

$dir = __DIR__ . '/../img/hero-slider/';

// name => [gamma (1 = unchanged), horizontal focus 0..1 for the mobile crop]
$heroes = [
    'jacaona-smjena-sekcija-jiu-jitsu-i-dizanje-utega-2d' => [1.0, 0.5],
    'hero-1b' => [2.0, 0.45],
    'hero-3b' => [2.0, 0.62],
];
$mobile_aspect = 0.6; // width / height of the mobile crop

foreach ($heroes as $name => [$gamma, $focus]) {
    $im = imagecreatefromjpeg($dir . $name . '.jpg');
    $base = $name;
    if ($gamma != 1.0) {
        imagegammacorrect($im, 1.0, $gamma);
        $base = $name . '-light';
        imagejpeg($im, $dir . $base . '.jpg', 90);
        echo "$base.jpg\n";
    }
    $w = imagesx($im);
    $h = imagesy($im);
    $cw = (int) round($h * $mobile_aspect);
    $x = (int) max(0, min($w - $cw, round($w * $focus - $cw / 2)));
    $crop = imagecrop($im, ['x' => $x, 'y' => 0, 'width' => $cw, 'height' => $h]);
    imagejpeg($crop, $dir . $base . '-mobile.jpg', 88);
    echo "$base-mobile.jpg ({$cw}x{$h})\n";
}
