<?php
defined('ABSPATH') || exit;

$company = get_field('footer_company', 'option') ?: [];
$data = [
   'logo'    => $company['logo'] ?? null,
   'name'    => $company['name'] ?? '',
   'tax'     => $company['tax'] ?? '',
   'email'   => $company['email'] ?? '',
   'address' => $company['address'] ?? '',
   'hotline' => $company['hotline'] ?? '',
   'socials' => get_field('footer_socials', 'option') ?: [],
   'map_url' => get_field('footer_map_url', 'option') ?: '',
];
?>

<footer class="site-footer relative bg-pri pt-24 max-xl:pt-16 max-md:pt-10 pb-8">
   <div class="container">

      <!-- Top row: 3 cột -->
      <div class="row justify-between">

         <!-- Col 1: Logo + Tên + MST -->
         <div class="col col-5 max-md:w-full!">
            <div class="flex flex-col gap-4">
               <a href="<?php echo esc_url(home_url('/')); ?>">
                  <div class="w-57.5 max-md:w-44">
                     <?php echo mona_get_image_by_id($data['logo'], 'full', false, ['class' => 'block w-full', 'alt' => esc_attr($data['name'])]); ?>
                  </div>
               </a>
               <div class="flex flex-col gap-1">
                  <p class="font-bold text-[28px] max-xl:text-[22px] max-md:text-[20px] text-white tracking-[-0.04em] leading-normal">
                     <?php echo esc_html($data['name']); ?>
                  </p>
                  <p class="text-[14px] max-md:text-[13px] text-white">
                     <span class="font-bold">Mã số thuế:</span>
                     <span class="font-normal"> <?php echo esc_html($data['tax']); ?></span>
                  </p>
               </div>
            </div>
         </div>

         <!-- Col 2: Email + Hotline + Địa chỉ -->
         <div class="col col-4 max-md:w-full!">
            <div class="flex flex-col gap-2">
               <?php if ($data['email']) : ?>
                  <p class="font-bold text-[14px] max-md:text-[13px] text-white tracking-[-0.04em]">
                     <?php echo esc_html($data['email']); ?>
                  </p>
               <?php endif; ?>
               <?php if ($data['hotline']) : ?>
                  <p class="font-bold text-[28px] max-xl:text-[22px] max-md:text-[22px] text-[#f4de96] tracking-[-0.04em] leading-normal">
                     <?php echo esc_html($data['hotline']); ?>
                  </p>
               <?php endif; ?>
               <?php if ($data['address']) : ?>
                  <p class="text-[14px] max-md:text-[13px] text-white font-normal leading-relaxed tracking-[-0.04em]">
                     <?php echo wp_kses_post($data['address']); ?>
                  </p>
               <?php endif; ?>
            </div>
         </div>

         <!-- Col 3: Mạng xã hội -->
         <?php if (!empty($data['socials'])) : ?>
            <div class="col col-3 max-md:w-full!">
               <div class="flex flex-col gap-2 md:ml-auto w-fit">
                  <p class="font-bold text-[20px] max-md:text-[16px] text-white tracking-[-0.04em]">
                     THEO DÕI CHÚNG TÔI
                  </p>
                  <div class="flex gap-2 items-center">
                     <?php foreach ($data['socials'] as $social) : ?>
                        <a href="<?php echo esc_url($social['url']); ?>"
                           class="block w-6 h-6 hover:opacity-75 transition-opacity"
                           aria-label="<?php echo esc_attr($social['label']); ?>">
                           <?php echo mona_get_image_by_id($social['icon'], 'full', false, ['class' => 'block w-full h-full object-contain', 'alt' => esc_attr($social['label'])]); ?>
                        </a>
                     <?php endforeach; ?>
                  </div>
               </div>
            </div>
         <?php endif; ?>

      </div>

      <!-- Map -->
      <?php if (!empty($data['map_url'])) : ?>
         <div class="mt-8  max-md:mt-6 h-80 max-md:h-52 rounded-lg overflow-hidden">
            <iframe
               src="<?php echo esc_url($data['map_url']); ?>"
               class="block w-full h-full"
               allowfullscreen=""
               loading="lazy"
               referrerpolicy="no-referrer-when-downgrade">
            </iframe>
         </div>
      <?php endif; ?>

      <!-- MONA branding -->
      <div class="mt-8 max-md:mt-6 flex gap-1 items-center justify-center">
         <p class="text-[14px] text-white font-light">
            Thiết kế bởi <strong>MONA.Software</strong>
         </p>
      </div>

   </div>
</footer>