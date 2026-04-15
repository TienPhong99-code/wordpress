<?php
defined('ABSPATH') || exit;

// =============================================
// SAMPLE DATA — dev tự kết nối ACF sau
// =============================================
$sample = [
   'title_1' => 'Đối tác',
   'title_2' => 'chiến lược',
   'items'   => [
      ['image' => 'home/partner-img-1.png', 'name' => 'Elie Saab'],
      ['image' => 'home/partner-img-2.png', 'name' => 'Marriott International'],
      ['image' => 'home/partner-img-3.png', 'name' => 'Druce'],
      ['image' => 'home/partner-img-4.png', 'name' => 'HBA'],
      ['image' => 'home/partner-img-5.png', 'name' => 'Techcombank'],
      ['image' => 'home/partner-img-6.png', 'name' => 'Nodale'],
      ['image' => 'home/partner-img-7.png', 'name' => 'Land Sculptor'],
   ],
];
$data = $sample;
?>

<section class="section-partner relative section-pd">
   <span class="absolute inset-0 bg-[#f4f5f8] z-[-1]"></span>

   <div class="container relative">
      <!-- Title -->
      <div class="text-center mb-8">
         <h2 class="title-main">
            <?php echo esc_html($data['title_1']); ?> <span><?php echo esc_html($data['title_2']); ?></span>
         </h2>
      </div>



   </div>
   <div class="max-w-375 mx-auto px-4">
      <!-- Partner slider -->
      <div class="slideSw">
         <div class="swiper-container overflow-hidden">
            <div class="swiper rows">
               <div class="swiper-wrapper">
                  <?php foreach ($data['items'] as $item) : ?>
                     <div class="swiper-slide col w-[calc(100%/7)]! max-xl:w-[calc(100%/5)]! max-md:w-[calc(100%/3)]!">
                        <div class="flex items-center justify-center h-20 max-sm:h-14">
                           <img src="<?php echo MONA_THEME_PATH_URI; ?>/assets/images/<?php echo esc_attr($item['image']); ?>"
                              class="block max-w-full h-full object-contain"
                              alt="<?php echo esc_attr($item['name']); ?>">
                        </div>
                     </div>
                  <?php endforeach; ?>
               </div>
            </div>
         </div>
      </div>
   </div>
</section>