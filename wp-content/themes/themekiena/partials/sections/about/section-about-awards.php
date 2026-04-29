<?php
defined('ABSPATH') || exit;

$acf     = get_field('section_awards') ?: [];
$banners = $acf['banners'] ?? [];
$cards   = $acf['cards']   ?? [];
$img     = MONA_THEME_PATH_URI . '/assets/images/';
?>

<section class="section-about-awards section-pd relative overflow-hidden" id="giai-thuong">
   <span class="absolute bottom-0 right-0 w-[12%] mix-blend-screen">
      <img src="<?php echo $img . 'about/awards/dc-right2.png'; ?>" alt="Awards Banner" class="block w-full">
   </span>
   <span class="absolute bottom-0 left-0 w-[12%] mix-blend-screen">
      <img src="<?php echo $img . 'about/awards/dc-left2.png'; ?>" alt="Awards Banner" class="block w-full">
   </span>
   <span class="block absolute left-0 w-full bottom-0 z-[-1]">
      <img src="<?php echo $img . 'about/awards/bg-dc.png'; ?>" alt="Background Banner" class="block w-full">
   </span>
   <span class="absolute inset-0 bg-[#1a1a1a] z-[-2]"></span>

   <div class="container">

      <h2 class="title-main text-white! text-center mb-10 max-lg:mb-6">
         Thành tựu và Giải thưởng
      </h2>

      <!-- 4 banner ngang -->
      <?php if ($banners) : ?>
         <div class="relative mb-4">
            <div class="row">
               <?php foreach ($banners as $item) : ?>
                  <div class="col col-3 max-sm:w-full!">
                     <div class="w-full">
                        <?php echo wp_get_attachment_image($item['image'], 'full', false, ['class' => 'block w-full']); ?>
                     </div>
                  </div>
               <?php endforeach; ?>
            </div>
         </div>
      <?php endif; ?>

      <!-- Slide award cards -->
      <?php if ($cards) : ?>
         <div class="slideSw relative">
            <div class="flex gap-1 max-md:pb-2 max-md:w-fit max-md:mx-auto items-center shrink-0 mt-2 md:absolute md:w-[110%] pointer-events-none md:justify-between md:top-1/2 md:left-1/2 md:-translate-x-1/2 md:-translate-y-1/2 z-10">
               <button class="pointer-events-auto swiper-prev tts-btn w-8 h-8 md:w-11! md:h-11! rounded-full flex items-center justify-center shrink-0 transition" aria-label="Trước">
                  <svg width="16" height="16" viewBox="0 0 16 16" fill="none">
                     <path d="M5 8c0 .128.049.256.146.354l5 5a.5.5 0 0 0 .708-.708L6.207 8l4.647-4.646a.5.5 0 1 0-.708-.708l-5 5A.497.497 0 0 0 5 8Z" fill="#F4DE96" />
                  </svg>
               </button>
               <button class="pointer-events-auto swiper-next tts-btn w-8 h-8 md:w-11! md:h-11! rounded-full flex items-center justify-center shrink-0 transition" aria-label="Tiếp theo">
                  <svg width="16" height="16" viewBox="0 0 16 16" fill="none">
                     <path d="M11 8a.497.497 0 0 0-.146-.354l-5-5a.5.5 0 1 0-.708.708L9.793 8l-4.647 4.646a.5.5 0 0 0 .708.708l5-5A.497.497 0 0 0 11 8Z" fill="#F4DE96" />
                  </svg>
               </button>
            </div>
            <div class="swiper-container overflow-hidden">
               <div class="swiper rows">
                  <div class="swiper-wrapper">
                     <?php foreach ($cards as $card) : ?>
                        <div class="swiper-slide col col-3  max-md:w-full! ">
                           <div class="w-full flex flex-col gap-2 text-center">
                              <div class="max-w-34.5 mx-auto">
                                 <?php echo wp_get_attachment_image($card['image'], 'full', false, [
                                    'class' => 'block w-full h-full object-cover',
                                    'alt'   => esc_attr($card['alt'] ?? ''),
                                 ]); ?>
                              </div>
                              <?php if (!empty($card['name'])) : ?>
                                 <span class="text-[20px] font-bold text-white"><?php echo esc_html($card['name']); ?></span>
                              <?php endif; ?>
                           </div>
                        </div>
                     <?php endforeach; ?>
                  </div>
               </div>
            </div>

         </div>
      <?php endif; ?>

   </div>
</section>