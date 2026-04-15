<?php
defined('ABSPATH') || exit;

// =============================================
// SAMPLE DATA — dev tự kết nối ACF sau
// =============================================
$sample = [
   'items' => [
      ['image' => 'home/banner-img6.jpg', 'alt' => 'ALILA BAI OM RESORT 2'],
      ['image' => 'home/banner-img1.jpg', 'alt' => 'Khu đô thị Cát Lái'],
      ['image' => 'home/banner-img2.jpg', 'alt' => 'Khu nghỉ dưỡng Cam Ranh'],
      ['image' => 'home/banner-img3.jpg', 'alt' => 'Khu đô thị Nam Sài Gòn (LAVILA NSG Township)'],
      ['image' => 'home/banner-img4.jpg', 'alt' => 'Khu đô thị Tuy Hoà (Citi Ville)']
   ],
];
$data = $sample;
?>

<section class="section-banner">

   <div class="slideFade pagination-pri">
      <div class="swiper-container overflow-hidden relative">

         <div class="swiper rows">
            <div class="swiper-wrapper">
               <?php foreach ($data['items'] as $item) : ?>
                  <div class="swiper-slide col col-12">
                     <div class="h-screen w-full relative">
                        <img src="<?php echo MONA_THEME_PATH_URI; ?>/assets/images/<?php echo esc_attr($item['image']); ?>"
                           class="block w-full h-full object-cover" alt="<?php echo esc_attr($item['alt']); ?>">
                     </div>
                  </div>
               <?php endforeach; ?>
            </div>
         </div>

         <!-- Pagination — centered bottom -->
         <div class="absolute bottom-8 left-1/2 -translate-x-1/2 z-10">
            <div class="swiper-pagination"></div>
         </div>

      </div>
   </div>

</section>