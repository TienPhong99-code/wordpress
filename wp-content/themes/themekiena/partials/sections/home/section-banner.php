<?php
defined('ABSPATH') || exit;

$items = get_field('banners') ?: [];

if (empty($items)) return;
?>

<section class="section-banner"
style="clip-path: inset(0 0 0 0);"
>
   <div class="slideFade pagination-pri">
      <div class="swiper-container overflow-hidden relative">
         <div class="swiper rows">
            <div class="swiper-wrapper">
               <?php foreach ($items as $item) :
                  $video_url = ! empty($item['video']) ? esc_url($item['video']) : '';
                  $has_image = ! empty($item['image']);
               ?>
                  <div class="swiper-slide col col-12">
                     <div class="h-screen w-full relative ">
                        <span class="bg-linear-to-t pointer-events-none from-black/50 via-black/30 to-transparent absolute inset-0 z-1"></span>
                        <?php if ($video_url) : ?>
                           <video class="absolute inset-0 w-full h-full object-cover"
                              src="<?php echo $video_url; ?>"
                              autoplay muted loop playsinline
                              <?php if ($has_image) : ?>poster="<?php echo esc_url(wp_get_attachment_image_url($item['image'], 'full')); ?>" <?php endif; ?>>
                           </video>
                        <?php elseif ($has_image) : ?>
                           <?php echo mona_get_image_by_id($item['image'], 'full', false, ['class' => 'block w-full h-full object-cover', 'alt' => esc_attr($item['alt'] ?? '')]); ?>
                        <?php endif; ?>
                     </div>
                  </div>
               <?php endforeach; ?>
            </div>
         </div>
         <div class="frame-logo-wrap top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 absolute z-5 pointer-events-none w-[80vw] max-w-175">
            <div class="frame-logo">

               <!-- Logo SVG — single combined path, morphs from pill → KIÊNA logo -->
               <svg id="banner-logo-svg" class="w-full h-auto block" width="466" height="96" viewBox="0 0 466 96" fill="none" xmlns="http://www.w3.org/2000/svg" style="opacity:0">
                  <path id="banner-logo-path" d="M238.226 96H155.393V73.1328H238.226V96ZM464.64 89.417L426.719 0.0195312H405.657C401.309 0.0195312 397.392 2.625 395.69 6.60156L357.749 95.9785H379.734C383.446 95.9785 386.81 93.7637 388.266 90.3398L412.589 33.0391L429.611 73.1328H402.827L412.527 96H460.291C463.675 96 465.972 92.5332 464.64 89.417ZM320.137 13.6797V59.0645L283.837 13.6797H263.923C259.657 13.6797 256.191 17.1445 256.191 21.4102V95.9785H283.837V50.5938L320.137 95.9785H340.05C344.316 95.9785 347.782 92.5137 347.782 88.248V13.6797H320.137ZM163.124 13.6797C158.858 13.6797 155.393 17.1445 155.393 21.4102V63.9863H219.912V45.6719H183.038V36.5254H238.226V13.6797H163.124ZM99.8146 0.0195312H63.2275L27.6454 35.5V0H7.73169C3.46594 0 0 3.46582 0 7.73145V95.9785H27.6454V60.5L63.2275 95.9785H99.8146L51.7018 47.9883L99.8351 0L99.8146 0.0195312ZM114.355 13.6797H137.448V95.9785H109.802V18.2324C109.802 15.7305 111.833 13.6797 114.355 13.6797Z" fill="url(#paint0_linear_395_2885)" />
                  <defs>
                     <linearGradient id="paint0_linear_395_2885" x1="1.37406" y1="48" x2="467.798" y2="48" gradientUnits="userSpaceOnUse">
                        <stop stop-color="#E3C173" />
                        <stop offset="0.09" stop-color="#E8C879" />
                        <stop offset="0.3" stop-color="#F0D584" />
                        <stop offset="0.5" stop-color="#F3DA88" />
                        <stop offset="0.71" stop-color="#F4DE96" />
                        <stop offset="1" stop-color="#F7E6B2" />
                     </linearGradient>
                  </defs>
               </svg>
            </div>
         </div>
         <!-- Hero title overlay -->
         <div class="banner-hero-overlay absolute inset-0 z-5 flex items-center justify-center pointer-events-none">
            <div class="text-center px-4">
               <p class="banner-hero-title uppercase font-black">Nhà phát triển <br class="md:hidden"> bất động sản</p>
               <p class="banner-hero-title uppercase font-black">tốt nhất Việt Nam</p>
            </div>
         </div>

         <!-- Caption bottom-left -->
         <p class="banner-hero-caption absolute bottom-[2%] left-8 max-md:left-4 z-5 text-white text-[12px] italic tracking-[-0.48px] max-sm:hidden">* Được công nhận bởi PropertyGuru Vietnam Property Awards (VPA) 2019</p>

         <!-- Pagination — centered bottom -->
         <!-- <div class="absolute bottom-[9%] left-1/2 -translate-x-1/2 z-10">
            <div class="swiper-pagination"></div>
         </div> -->

         <!-- Prev: Dự án trước -->
         <!-- <button type="button" class="max-sm:hidden swiper-prev absolute left-8 cursor-pointer max-xl:left-4 max-md:left-2 top-1/2 -translate-y-1/2 z-10 flex items-center gap-2 max-md:gap-1 text-[16px] max-md:text-[13px] font-bold text-white hover:opacity-70 transition-opacity">
            <div class="w-11 h-11 max-md:w-3 max-md:h-3 shrink-0">
               <img src="<?php echo MONA_THEME_PATH_URI; ?>/assets/images/icons/ic-ar-left.svg"
                  class="block w-full h-full object-contain" alt="">
            </div>

         </button> -->

         <!-- Next: Dự án tiếp theo -->
         <!-- <button type="button" class="max-sm:hidden swiper-next absolute right-8 cursor-pointer max-xl:right-4 max-md:right-2 top-1/2 -translate-y-1/2 z-10 flex items-center gap-2 max-md:gap-1 text-[16px] max-md:text-[13px] font-bold text-white hover:opacity-70 transition-opacity">
            <div class="w-11 h-11 max-md:w-3 max-md:h-3 shrink-0">
               <img src="<?php echo MONA_THEME_PATH_URI; ?>/assets/images/icons/ic-ar-right.svg"
                  class="block w-full h-full object-contain" alt="">
            </div>
         </button> -->

         <!-- Clouds — 3 tầng, mỗi tầng 2 mây, không chồng nhau -->
         <div class="banner-clouds absolute bottom-0 left-0 right-0 z-3 pointer-events-none overflow-hidden h-full">

            <!-- Tầng 1 (sát đáy): bottom 0 → cao 18% — mây gần, rõ nhất -->
            <img src="<?php echo MONA_THEME_PATH_URI; ?>/assets/images/cloud-1.png"
                 alt="" aria-hidden="true"
                 class="absolute bottom-0 h-[18%] w-auto opacity-[0.55] blur-[2px] mix-blend-screen"
                 style="animation:cloudDrift 32s linear infinite -8s;">

            <div class="absolute bottom-0 h-[18%]" style="animation:cloudDrift 52s linear infinite -28s;">
               <img src="<?php echo MONA_THEME_PATH_URI; ?>/assets/images/cloud-1.png"
                    alt="" aria-hidden="true"
                    class="block h-full w-auto opacity-[0.40] blur-[3px] mix-blend-screen -scale-x-100">
            </div>

            <!-- Tầng 2 (giữa): bottom 22% → cao 15% — mây trung, mờ hơn -->
            <img src="<?php echo MONA_THEME_PATH_URI; ?>/assets/images/cloud-1.png"
                 alt="" aria-hidden="true"
                 class="absolute bottom-[22%] h-[15%] w-auto opacity-[0.25] blur-[5px] mix-blend-screen"
                 style="animation:cloudDrift 46s linear infinite -18s;">

            <div class="absolute bottom-[22%] h-[15%]" style="animation:cloudDrift 38s linear infinite -38s;">
               <img src="<?php echo MONA_THEME_PATH_URI; ?>/assets/images/cloud-1.png"
                    alt="" aria-hidden="true"
                    class="block h-full w-auto opacity-[0.18] blur-[6px] mix-blend-screen -scale-x-100">
            </div>

            <!-- Tầng 3 (cao): bottom 41% → cao 12% — mây xa, mờ nhất -->
            <img src="<?php echo MONA_THEME_PATH_URI; ?>/assets/images/cloud-1.png"
                 alt="" aria-hidden="true"
                 class="absolute bottom-[41%] h-[12%] w-auto opacity-[0.12] blur-sm mix-blend-screen"
                 style="animation:cloudDrift 60s linear infinite -5s;">

            <div class="absolute bottom-[41%] h-[12%]" style="animation:cloudDrift 44s linear infinite -32s;">
               <img src="<?php echo MONA_THEME_PATH_URI; ?>/assets/images/cloud-1.png"
                    alt="" aria-hidden="true"
                    class="block h-full w-auto opacity-[0.09] blur-[10px] mix-blend-screen -scale-x-100">
            </div>

         </div>

         <style>
            @keyframes cloudDrift {
               from { transform: translateX(100vw); }
               to   { transform: translateX(-100%); }
            }
         </style>

         <!-- Scroll down -->
         <div class="banner-scroll-down  cursor-pointer absolute bottom-8 left-1/2 -translate-x-1/2 z-5 flex flex-col items-center gap-2 select-none"
         
         >
            <p class="text-white text-[16px] tracking-[-0.64px]">Xem thêm</p>
            <svg width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
               <rect x="6" y="1" width="20" height="30" rx="10" stroke="white" stroke-width="1.73" />
               <path class="banner-scroll-chevron" d="M12.5 13L16 17L19.5 13" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
            </svg>
         </div>

      </div>
   </div>

</section>