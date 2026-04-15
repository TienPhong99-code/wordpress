<?php
defined('ABSPATH') || exit;

// =============================================
// SAMPLE DATA — dev tự kết nối ACF sau
// =============================================
$sample = [
   'logo'    => 'icons/footer-logo.png',
   'name'    => 'CÔNG TY CỔ PHẦN KIẾN Á',
   'tax'     => '0302443907',
   'email'   => 'info@kiena.vn',
   'address' => 'Phòng 311A-312 & 301 Tầng 3, Tòa nhà Saigon Trade Center, Số 37 Đường Tôn Đức Thắng, Phường Sài Gòn, Thành phố Hồ Chí Minh, Việt Nam',
   'hotline' => '028 3911 6599',
   'socials' => [
      ['icon' => 'icons/ic-facebook.svg',  'label' => 'Facebook',  'url' => '#'],
      ['icon' => 'icons/ic-linkedin.svg',  'label' => 'LinkedIn',  'url' => '#'],
      ['icon' => 'icons/ic-youtube.svg',   'label' => 'YouTube',   'url' => '#'],
   ],
   'nav' => [
      [
         'heading' => 'Thông tin thêm',
         'links'   => [
            ['label' => 'Về Kiên Á',              'url' => '#', 'active' => true],
            ['label' => 'Tầm nhìn - sứ mệnh',    'url' => '#', 'active' => false],
            ['label' => 'Hành trình phát triển',  'url' => '#', 'active' => false],
            ['label' => 'Giải thưởng',            'url' => '#', 'active' => false],
         ],
      ],
      [
         'heading' => 'Lĩnh vực hoạt động',
         'links'   => [
            ['label' => 'Bất động sản', 'url' => '#', 'active' => false],
            ['label' => 'Giáo dục',     'url' => '#', 'active' => false],
            ['label' => 'Xây dựng',     'url' => '#', 'active' => false],
            ['label' => 'Dịch vụ',      'url' => '#', 'active' => false],
         ],
      ],
      [
         'heading' => "Hoạt động\ncộng đồng",
         'links'   => [
            ['label' => 'Giới thiệu', 'url' => '#', 'active' => false],
            ['label' => 'Hoạt động',  'url' => '#', 'active' => false],
         ],
      ],
      [
         'heading' => 'Tuyển dụng',
         'links'   => [
            ['label' => 'Môi trường làm việc', 'url' => '#', 'active' => false],
            ['label' => 'Vị trí tuyển dụng',   'url' => '#', 'active' => false],
         ],
      ],
   ],
   'map_img' => 'home/footer-map.jpg',
   'map_url' => 'https://maps.google.com/?q=Saigon+Trade+Center,+37+Ton+Duc+Thang,+Ho+Chi+Minh',
];
$data = $sample;
?>

<footer class="site-footer relative section-pd">
   <span class="absolute inset-0 bg-pri z-[-1]"></span>
   <div class="container">
      <div class="relative">
         <div class="row">
            <!-- Col trái: Logo + Thông tin + Social -->
            <div class="col col-5 max-md:w-full!">
               <div class="flex flex-col gap-8 max-md:gap-6 h-full">

                  <!-- Logo + Info -->
                  <div class="flex flex-col gap-4 max-md:gap-3">

                     <!-- Logo -->
                     <a href="<?php echo esc_url(home_url('/')); ?>">
                        <div class="w-57.5 max-md:w-44">
                           <img src="<?php echo MONA_THEME_PATH_URI; ?>/assets/images/<?php echo esc_attr($data['logo']); ?>"
                              class="block w-full" alt="<?php echo esc_attr($data['name']); ?>">
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
                           <span><?php echo esc_html($data['address']); ?></span>
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
                  <div class="flex gap-2 items-center">
                     <?php foreach ($data['socials'] as $social) : ?>
                        <a href="<?php echo esc_url($social['url']); ?>"
                           class="block w-6 h-6 hover:opacity-75 transition-opacity"
                           aria-label="<?php echo esc_attr($social['label']); ?>">
                           <img src="<?php echo MONA_THEME_PATH_URI; ?>/assets/images/<?php echo esc_attr($social['icon']); ?>"
                              class="block w-full h-full object-contain" alt="<?php echo esc_attr($social['label']); ?>">
                        </a>
                     <?php endforeach; ?>
                  </div>

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
                                 <?php foreach ($col['links'] as $link) : ?>
                                    <li>
                                       <a href="<?php echo esc_url($link['url']); ?>"
                                          class="font-bold text-[14px] max-md:text-[13px] <?php echo $link['active'] ? 'text-[#f4de96]' : 'text-white hover:text-[#f4de96]'; ?> transition-colors">
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
                  <div class="flex-1 rounded-lg overflow-hidden min-h-50 max-md:min-h-40">
                     <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3919.359982478732!2d106.70201362555727!3d10.783716609058223!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31752f4bc8ad1f21%3A0x1c31b41801cfac6c!2sSaigon%20Trade%20Center!5e0!3m2!1svi!2s!4v1776247044415!5m2!1svi!2s"
                        class="block w-full h-full"
                        allowfullscreen=""
                        loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade">
                     </iframe>
                  </div>

               </div>
            </div>

         </div>
      </div>
   </div>
</footer>