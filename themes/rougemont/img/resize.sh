

reduce() {
  # -interlace none (?)
  # -unsharp 0.25x0.08+8.3+0.045 (?)
  # -filter Triangle -define filter:support=2 -thumbnail $2 -dither None -posterize 136
  magick $1 -strip +dither -geometry $2 -define jpeg:fancy-upsampling=off -define png:compression-filter=5 -define png:compression-level=9 -define png:compression-strategy=1 -define png:exclude-chunk=all -colorspace sRGB -interlace Plane -quality 90% $3
}

reduce ddr1972mip_couv.jpg x250 ddr1972mip_250.png


exit

reduce ddr_paraphe.png 48x48^ ddr_paraphe48.png
reduce ddr.png x175 ddr_portrait.png
reduce ddr.png x175 ddr_portrait.webp

reduce favicon_orig.png 32x32^ favicon32.png
reduce favicon_orig.png 57x57^ favicon57.png
reduce favicon_orig.png 76x76^ favicon76.png
reduce favicon_orig.png 96x96^ favicon96.png
reduce favicon_orig.png 120x120^ favicon120.png
reduce favicon_orig.png 128x128^ favicon128.png
reduce favicon_orig.png 152x152^ favicon152.png
reduce favicon_orig.png 180x180^ favicon180.png
reduce favicon_orig.png 192x192^ favicon192.png
reduce favicon_orig.png 228x228^ favicon228.png

