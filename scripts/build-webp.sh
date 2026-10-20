#!/bin/bash
# Build WebP copies of every photo in img/ (same name, .webp, same dimensions).
# img_url() serves the .webp when it exists and Cloudinary is off.
# Re-run after adding or replacing a photo:  ./scripts/build-webp.sh
# Needs cwebp (brew install webp). Only rebuilds copies older than their original.
set -euo pipefail
cd "$(dirname "$0")/.."
find img -type f \( -iname '*.jpg' -o -iname '*.jpeg' -o -iname '*.png' \) -not -path 'img/favicon/*' -not -name 'jacaona-share-*' |
while read -r src; do
    out="${src%.*}.webp"
    if [ ! -f "$out" ] || [ "$src" -nt "$out" ]; then
        cwebp -quiet -q 80 -metadata none "$src" -o "$out"
        echo "$out"
    fi
done
