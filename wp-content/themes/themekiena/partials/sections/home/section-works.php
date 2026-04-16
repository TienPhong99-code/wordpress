<?php
defined('ABSPATH') || exit;

$items = get_field('works') ?: [];

if (empty($items)) return;
?>
<section class="sec-works section-pd-t relative">

   <img src="<?php echo get_template_directory_uri(); ?>/assets/images/home/dcor-work.png" alt="Works background" class="block w-[80%] absolute left-1/2 top-8 -translate-x-1/2 z-[-1]">

   <div class="container">
      <div class="relative">
         <h2 class="title-main text-center mb-6 max-xl:mb-4 max-md:mb-3">
            LĨNH VỰC <span>HOẠT ĐỘNG</span>
         </h2>
         <div class="relative">
            <div class="row">
               <?php foreach ($items as $item) : ?>
                  <div class="col col-6 max-md:w-full!">
                     <div class="flex flex-col gap-4 max-xl:gap-3 max-md:gap-2 items-center">
                        <div class="w-full aspect-600/389 rounded-lg overflow-hidden">
                           <?php echo mona_get_image_by_id($item['image'], 'large', false, [
                              'class'   => 'block w-full h-full object-cover',
                              'alt'     => esc_attr($item['title']),
                              'loading' => 'lazy',
                           ]); ?>
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