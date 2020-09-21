

favicon() {
   magick $1 -strip -filter Triangle -define filter:support=2 -thumbnail $2x$2^ -unsharp 0.25x0.08+8.3+0.045 -dither None -posterize 136 -quality 82 -define jpeg:fancy-upsampling=off -define png:compression-filter=5 -define png:compression-level=9 -define png:compression-strategy=1 -define png:exclude-chunk=all -interlace none -colorspace sRGB $3
}

favicon favicon_orig.png 32 favicon32.png
favicon favicon_orig.png 57 favicon57.png
favicon favicon_orig.png 76 favicon76.png
favicon favicon_orig.png 96 favicon96.png
favicon favicon_orig.png 120 favicon120.png
favicon favicon_orig.png 128 favicon128.png
favicon favicon_orig.png 152 favicon152.png
favicon favicon_orig.png 180 favicon180.png
favicon favicon_orig.png 192 favicon192.png
favicon favicon_orig.png 228 favicon228.png

