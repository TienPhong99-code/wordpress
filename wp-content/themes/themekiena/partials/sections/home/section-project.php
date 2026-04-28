<?php
defined('ABSPATH') || exit;

$items = get_field('projects') ?: [];

if (empty($items)) return;
?>

<section class="section-project">

   <!-- Title + desc -->
   <div class="container">
      <div class="mb-8 max-xl:mb-5 max-md:mb-4 text-center">
         <h2 class="title-main">
            Khám phá <br> <span>các dự án Mới nhất</span>
         </h2>
         <div class="max-w-175 mx-auto">
            <p class="text-[16px] max-md:text-[14px] text-pri">Tất cả lĩnh vực hoạt động của Tập đoàn đều hướng <span class="c-second font-bold">đến tầm nhìn dài hạn:
                  kiến tạo giá trị bền vững </span> và góp phần thúc đẩy sự <span class="c-second font-bold">phát triển</span> của các khu <span class="c-second font-bold">đô thị</span> hiện đại.</p>
         </div>
      </div>
   </div>

   <!-- Slider -->
   <div class="slideFade pagination-pri">
      <div class="swiper-container overflow-hidden relative">
         <!-- Controls: prev/next + pagination — ngoài swiper-wrapper -->
         <div class="container absolute bottom-0 left-1/2 -translate-x-1/2 w-full z-10 pointer-events-none">
            <div class="flex w-fit ml-auto max-md:w-full py-16 max-xl:py-10 max-md:py-6 pointer-events-auto">
               <div class="flex flex-col gap-4 max-md:gap-3 items-end max-md:items-center max-md:w-full">
                  <div class="flex items-center gap-8 max-xl:gap-5 max-md:gap-3 justify-between w-full">
                     <button class="swiper-prev flex items-center gap-2 text-[16px] max-md:text-[13px] font-bold cursor-pointer text-[#cbd3dd] hover:opacity-70 transition-opacity">
                        <div class="md:w-11! md:h-11! w-8 h-8 max-md:w-3 max-md:h-3">
                           <img src="<?php echo MONA_THEME_PATH_URI; ?>/assets/images/icons/ic-ar-left.svg"
                              class="block w-full h-full object-contain" alt="">
                        </div>

                     </button>
                     <button class="swiper-next flex items-center gap-2 text-[16px] max-md:text-[13px] font-bold cursor-pointer text-white hover:opacity-70 transition-opacity">
                        <div class="md:w-11! md:h-11! w-8 h-8 max-md:w-3 max-md:h-3">
                           <img src="<?php echo MONA_THEME_PATH_URI; ?>/assets/images/icons/ic-ar-right.svg"
                              class="block w-full h-full object-contain" alt="">
                        </div>
                     </button>
                  </div>
                  <div class="swiper-pagination flex-wrap"></div>
               </div>
            </div>
         </div>
         <div class="relative">
            <div class="swiper rows">
               <div class="swiper-wrapper">
                  <?php foreach ($items as $item) :
                     $link = $item['link'] ?? [];
                     $link_url = $link['url'] ?? '#';
                  ?>
                     <div class="swiper-slide col col-12">
                        <div class="relative">

                           <!-- Background image -->
                           <div class="parallax-img-wrap overflow-hidden block min-h-120 max-xl:min-h-80 max-md:h-70 max-md:min-h-unset">
                              <?php echo mona_get_image_by_id($item['image'], 'full', false, [
                                 'class' => 'block w-full h-full object-cover',
                              ]); ?>
                           </div>

                           <!-- Gradient overlay -->
                           <div class="absolute bg-linear"></div>

                           <!-- Bottom-left: title + button -->
                           <div class="container absolute bottom-0 left-1/2 -translate-x-1/2 w-full">
                              <div class="flex flex-col gap-4 max-md:gap-3 py-16 max-xl:py-10 max-md:py-6 max-md:pb-20">
                                 <?php if (!empty($item['type'])) : ?>
                                    <span class="font-bold text-white"><?php echo esc_html($item['type']); ?></span>
                                 <?php endif; ?>
                                 <p class="font-bold text-[36px] max-xl:text-[28px] max-md:text-[20px] text-white">
                                    <?php echo esc_html($item['title']); ?>
                                 </p>
                                 <a href="<?php echo esc_url($link_url); ?>"
                                    class="btn btn-outline-white w-fit!">
                                    Chi tiết dự án
                                    <div class="w-4 h-4">
                                       <img src="<?php echo MONA_THEME_PATH_URI; ?>/assets/images/icons/ic-ar-pri.svg"
                                          class="block w-full h-full object-contain" alt="">
                                    </div>
                                 </a>
                              </div>
                           </div>

                        </div>
                     </div>
                  <?php endforeach; ?>
               </div>
            </div>
         </div>
      </div>
   </div>

</section>