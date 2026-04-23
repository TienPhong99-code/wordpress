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
   'nav'     => get_field('footer_nav', 'option') ?: [],
   'map_url' => get_field('footer_map_url', 'option') ?: '',
];
?>

<footer class="site-footer relative section-pd">
   <span class="absolute inset-0 bg-pri z-[-1]"></span>
   <div class="container">
      <div class="relative">
         <div class="row justify-between">
            <!-- Col trái: Logo + Thông tin + Social -->
            <div class="col col-4 max-md:w-full!">
               <div class="flex flex-col gap-8 max-md:gap-6 h-full">

                  <!-- Logo + Info -->
                  <div class="flex flex-col gap-4 max-md:gap-3">

                     <!-- Logo -->
                     <a href="<?php echo esc_url(home_url('/')); ?>">
                        <div class="w-57.5 max-md:w-44">
                           <?php echo mona_get_image_by_id($data['logo'], 'full', false, ['class' => 'block w-full', 'alt' => esc_attr($data['name'])]); ?>
                        </div>
                     </a>

                     <!-- Company info -->
                     <div class="flex flex-col gap-2">
                        <p class="font-bold text-[20px] max-md:text-[17px] text-white">
                           <?php echo esc_html($data['name']); ?>
                        </p>
                        <p class="text-[14px] max-md:text-[13px] text-white">
                           <span class="font-bold">Mã số thuế:</span>
                           <span><?php echo esc_html($data['tax']); ?></span>
                        </p>
                        <p class="text-[14px] max-md:text-[13px] text-white">
                           <span class="font-bold">Email:</span><br>
                           <span><?php echo esc_html($data['email']); ?></span>
                        </p>
                        <p class="text-[14px] max-md:text-[13px] text-white">
                           <span class="font-bold">Địa chỉ:</span><br>
                           <span><?php echo wp_kses_post($data['address']); ?></span>
                        </p>
                        <div>
                           <p class="font-bold text-[14px] text-white">Hotline:</p>
                           <p class="font-bold text-[48px] max-xl:text-[36px] max-md:text-[28px] text-[#f4de96]">
                              <?php echo esc_html($data['hotline']); ?>
                           </p>
                        </div>
                     </div>
                  </div>

                  <!-- Social icons -->
                  <?php if (! empty($data['socials'])) : ?>
                     <div class="flex gap-2 items-center">
                        <?php foreach ($data['socials'] as $social) : ?>
                           <a href="<?php echo esc_url($social['url']); ?>"
                              class="block w-6 h-6 hover:opacity-75 transition-opacity"
                              aria-label="<?php echo esc_attr($social['label']); ?>">
                              <?php echo mona_get_image_by_id($social['icon'], 'full', false, ['class' => 'block w-full h-full object-contain', 'alt' => esc_attr($social['label'])]); ?>
                           </a>
                        <?php endforeach; ?>
                     </div>
                  <?php endif; ?>

                  <!-- MONA branding -->
                  <p class="text-[14px] text-white font-light mt-auto max-md:mt-0">
                     Thiết kế bởi <strong>MONA.Software</strong>
                  </p>

               </div>
            </div>

            <!-- Col phải: Nav + Map -->
            <div class="col col-7 max-md:w-full!">
               <div class="flex flex-col gap-8 max-md:gap-6 h-full">

                  <!-- Nav columns -->
                  <div class="relative">
                     <div class="row">
                        <?php foreach ($data['nav'] as $col) : ?>
                           <div class="col col-3 max-md:w-1/2!">
                              <p class="text-[12px] text-[#9ca1c0] uppercase mb-2">
                                 <?php echo nl2br(esc_html($col['heading'])); ?>
                              </p>
                              <ul class="flex flex-col gap-2">
                                 <?php foreach (($col['links'] ?? []) as $link) :
                                    $path       = '/' . ltrim($link['path'] ?? '', '/');
                                    $anchor     = ! empty($link['section_id']) ? '#' . ltrim($link['section_id'], '#') : '';
                                    $href       = home_url($path) . $anchor;
                                    $is_active  = rtrim(home_url($path), '/') === rtrim(home_url(parse_url(add_query_arg(null, null), PHP_URL_PATH) ?: '/'), '/');
                                 ?>
                                    <li>
                                       <a href="<?php echo esc_url($href); ?>"
                                          class="font-bold text-[14px] max-md:text-[13px] <?php echo $is_active ? 'text-[#f4de96]' : 'text-white hover:text-[#f4de96]'; ?> transition-colors">
                                          <?php echo esc_html($link['label']); ?>
                                       </a>
                                    </li>
                                 <?php endforeach; ?>
                              </ul>
                           </div>
                        <?php endforeach; ?>
                     </div>
                  </div>

                  <!-- Google Map -->
                  <?php if (! empty($data['map_url'])) : ?>
                     <div class="flex-1 rounded-lg overflow-hidden min-h-50 max-md:min-h-40">
                        <iframe
                           src="<?php echo esc_url($data['map_url']); ?>"
                           class="block w-full h-full"
                           allowfullscreen=""
                           loading="lazy"
                           referrerpolicy="no-referrer-when-downgrade">
                        </iframe>
                     </div>
                  <?php endif; ?>

               </div>
            </div>

         </div>
      </div>
   </div>
</footer>