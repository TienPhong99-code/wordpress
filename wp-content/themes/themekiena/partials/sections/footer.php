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
               <div class="flex flex-col gap-1 max-w-110">
                  <p class="font-bold text-[20px]  text-white tracking-[-0.04em] leading-normal">
                     <?php echo esc_html($data['name']); ?>
                  </p>
                  <!-- <p class="text-[14px] max-md:text-[13px] text-white">
                     <span class="font-bold">Mã số thuế:</span>
                     <span class="font-normal"> <?php echo esc_html($data['tax']); ?></span>
                  </p> -->
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
                           class="block w-6 h-6 icon-link"
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
         <p class="text-[14px] text-white font-light flex items-center gap-2">
            Thiết kế bởi <img src="<?php echo MONA_THEME_PATH_URI; ?>/assets/images/icons/mona-soft.svg" class="block h-4" alt="MONA Media">
         </p>
      </div>

   </div>
</footer>

<!-- Back to top -->
<button id="backToTop" aria-label="Về đầu trang">
   <svg width="44" height="44" viewBox="0 0 44 44" fill="none" xmlns="http://www.w3.org/2000/svg">
      <rect width="44" height="44" rx="8" fill="#F4DE96" />
      <g clip-path="url(#clip0_btt)">
         <path d="M29.3098 16.9692L22.3659 10.1715C22.1983 9.96971 21.8987 9.942 21.6969 10.1096C21.6745 10.1283 21.6537 10.149 21.635 10.1715L14.6911 16.9692C14.4691 17.175 14.456 17.5219 14.6618 17.744C14.7638 17.8541 14.9065 17.9175 15.0567 17.9195H18.3458V26.7272C18.4082 27.0953 18.7059 27.3781 19.0768 27.4216H24.9242C25.2167 27.4216 25.2897 27.0562 25.2897 26.7272V17.9195H28.9444C29.2471 17.9155 29.4893 17.6669 29.4853 17.3641C29.4833 17.214 29.4199 17.0713 29.3098 16.9692Z" fill="#283377" />
         <path d="M24.924 28.5176H19.0765C18.7738 28.5176 18.5283 28.763 18.5283 29.0658C18.5283 29.3686 18.7738 29.614 19.0765 29.614H24.924C25.2268 29.614 25.4722 29.3686 25.4722 29.0658C25.4722 28.763 25.2269 28.5176 24.924 28.5176Z" fill="#283377" />
         <path d="M24.924 30.7109H19.0765C18.7738 30.7109 18.5283 30.9564 18.5283 31.2592C18.5283 31.5619 18.7738 31.8074 19.0765 31.8074H24.924C25.2268 31.8074 25.4722 31.5619 25.4722 31.2592C25.4722 30.9564 25.2269 30.7109 24.924 30.7109Z" fill="#283377" />
         <path d="M24.924 32.9033H19.0765C18.7738 32.9033 18.5283 33.1488 18.5283 33.4515C18.5283 33.7543 18.7738 33.9998 19.0765 33.9998H24.924C25.2268 33.9998 25.4722 33.7543 25.4722 33.4515C25.4722 33.1488 25.2269 32.9033 24.924 32.9033Z" fill="#283377" />
      </g>
      <defs>
         <clipPath id="clip0_btt">
            <rect width="24" height="24" fill="white" transform="translate(10 10)" />
         </clipPath>
      </defs>
   </svg>
</button>