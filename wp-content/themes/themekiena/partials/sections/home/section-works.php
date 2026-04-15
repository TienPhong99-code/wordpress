<?php
defined('ABSPATH') || exit;

$sample = [
   [
      'image' => MONA_THEME_PATH_URI . '/assets/images/home/works-bat-dong-san.jpg',
      'title' => 'Bất động sản',
   ],
   [
      'image' => MONA_THEME_PATH_URI . '/assets/images/home/works-giao-duc.jpg',
      'title' => 'Giáo dục',
   ],
   [
      'image' => MONA_THEME_PATH_URI . '/assets/images/home/works-xay-dung.jpg',
      'title' => 'Xây dựng',
   ],
   [
      'image' => MONA_THEME_PATH_URI . '/assets/images/home/works-dich-vu.jpg',
      'title' => 'Dịch vụ',
   ],
];
?>
<section class="sec-works py-16 max-xl:py-10 max-md:py-8">
   <div class="container">
      <div class="relative">
         <h2 class="title-main text-center mb-6 max-xl:mb-4 max-md:mb-3">
            LĨNH VỰC <span>HOẠT ĐỘNG</span>
         </h2>
         <div class="relative">
            <div class="row">
               <?php foreach ($sample as $item) : ?>
                  <div class="col col-6 max-md:w-full!">
                     <div class="flex flex-col gap-4 max-xl:gap-3 max-md:gap-2 items-center">
                        <div class="w-full aspect-600/389 rounded-lg overflow-hidden">
                           <img
                              src="<?php echo esc_url($item['image']); ?>"
                              alt="<?php echo esc_attr($item['title']); ?>"
                              class="block w-full h-full object-cover"
                              loading="lazy">
                        </div>
                        <p class="font-bold text-[28px] max-xl:text-[22px] max-md:text-[18px] text-center px-2 text-pri hover:text-sec">
                           <?php echo esc_html($item['title']); ?>
                        </p>
                     </div>
                  </div>
               <?php endforeach; ?>
            </div>
         </div>
      </div>
   </div>
</section>