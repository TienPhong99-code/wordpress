<?php
defined('ABSPATH') || exit;

$items = get_field('partners', get_option('page_on_front')) ?: [];

if (empty($items)) return;
?>

<section class="section-partner relative section-pd">
   <span class="absolute inset-0 bg-[#f4f5f8] z-[-1]"></span>

   <div class="container relative">
      <!-- Title -->
      <div class="text-center mb-8">
         <h2 class="title-main">
            Đối tác <span>chiến lược</span>
         </h2>
         <p class="mt-2">Đồng hành cùng chúng tôi là những đối tác cùng chia sẻ một
            tiêu chuẩn về chất lượng, minh bạch và tầm nhìn dài hạn.</p>
      </div>



   </div>
   <div class="max-w-375 mx-auto px-4">
      <!-- Partner slider -->
      <div class="slideSw mix-blend-darken">
         <div class="swiper-container overflow-hidden">
            <div class="swiper rows">
               <div class="swiper-wrapper">
                  <?php foreach ($items as $item) : ?>
                     <div class="swiper-slide col w-[calc(100%/7)]! max-xl:w-[calc(100%/5)]! max-md:w-[calc(100%/3)]!">
                        <div class="flex items-center justify-center h-20 max-sm:h-14">
                           <?php echo mona_get_image_by_id($item['image'], 'medium', false, [
                              'class' => 'block max-w-full h-full object-contain',
                              'alt'   => esc_attr($item['name']),
                           ]); ?>
                        </div>
                     </div>
                  <?php endforeach; ?>
               </div>
            </div>
         </div>
      </div>
   </div>
</section>