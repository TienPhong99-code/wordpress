<?php
defined('ABSPATH') || exit;

$acf     = get_field('section_awards') ?: [];
$banners = $acf['banners'] ?? [];
$cards   = $acf['cards']   ?? [];
$img     = MONA_THEME_PATH_URI . '/assets/images/';
?>

<section class="section-about-awards section-pd relative overflow-hidden">
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
         GIẢI THƯỞNG <span class="text-white!">VÀ VINH DANH</span>
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

      <!-- Grid award cards: 8 cột desktop -->
      <?php if ($cards) : ?>
         <div class="grid grid-cols-3 sm:grid-cols-6 lg:grid-cols-8 gap-2 lg:gap-4!">
            <?php foreach ($cards as $card) : ?>
               <div class="w-full">
                  <?php echo wp_get_attachment_image($card['image'], 'full', false, [
                     'class' => 'block w-full h-full object-cover',
                     'alt'   => esc_attr($card['alt'] ?? ''),
                  ]); ?>
               </div>
            <?php endforeach; ?>
         </div>
      <?php endif; ?>

   </div>
</section>