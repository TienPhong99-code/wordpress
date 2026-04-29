<?php
defined('ABSPATH') || exit;

$items = get_field('banners') ?: [];

if (empty($items)) return;
?>

<section class="section-banner">

   <div class="slideFade pagination-pri">
      <div class="swiper-container overflow-hidden relative">

         <div class="swiper rows">
            <div class="swiper-wrapper">
               <?php foreach ($items as $item) :
                  $video_url = ! empty($item['video']) ? esc_url($item['video']) : '';
               ?>
                  <div class="swiper-slide col col-12">
                     <div class="h-screen w-full relative max-md:h-[60vh]">
                        <span class="bg-[#1A1A1A] opacity-60 absolute inset-0 z-1"></span>
                        <?php if ($video_url) : ?>
                           <video class="absolute inset-0 w-full h-full object-cover"
                              src="<?php echo $video_url; ?>"
                              autoplay muted loop playsinline
                              poster="<?php echo esc_url(wp_get_attachment_image_url($item['image'], 'full')); ?>">
                           </video>
                        <?php else : ?>
                           <?php echo mona_get_image_by_id($item['image'], 'full', false, ['class' => 'block w-full h-full object-cover', 'alt' => esc_attr($item['alt'])]); ?>
                        <?php endif; ?>
                     </div>
                  </div>
               <?php endforeach; ?>
            </div>
         </div>

         <!-- Hero title overlay -->
         <div class="banner-hero-overlay absolute inset-0 z-5 flex items-center justify-center pointer-events-none">
            <div class="text-center px-4">
               <p class="banner-hero-title uppercase font-black leading-normal tracking-[-0.04em]">Nhà phát triển bất động sản</p>
               <p class="banner-hero-title uppercase font-black leading-normal tracking-[-0.04em]">tốt nhất Việt Nam</p>
            </div>
         </div>

         <!-- Caption bottom-left -->
         <p class="banner-hero-caption absolute bottom-8 left-8 max-md:left-4 z-5 text-white text-[12px] italic tracking-[-0.48px] max-sm:hidden">* Được công nhận bởi PropertyGuru Vietnam Property Awards (VPA) 2019</p>

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

      </div>
   </div>

</section>