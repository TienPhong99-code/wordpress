<?php
defined('ABSPATH') || exit;

// =============================================
// SAMPLE DATA — dev tự kết nối ACF sau
// =============================================
$_base  = MONA_THEME_PATH_URI . '/assets/images/';
$_img   = fn($path) => $path ? $_base . $path : '';
$sample = [
   'title'           => 'Hành trình',
   'title_highlight' => 'Phát triển',
   'milestones'      => [
      ['year' => '1994', 'image' => $_img('about/journey/img-1994-1.jpg'), 'items' => ['Thành lập Công ty TNHH – TM – DV KIẾN Á', 'Nhân sự: <span class="text-sec">18 nhân viên</span>']],
      ['year' => '1998', 'image' => $_img('about/journey/img-1998-1.jpg'), 'items' => ['Tham gia lĩnh vực phát triển Bất động sản']],
      ['year' => '1999', 'image' => $_img('about/journey/img-1999-1.jpg'), 'items' => ['Các dự án tại Quận 9']],
      ['year' => '2001', 'image' => $_img('about/journey/img-2001-1.jpg'), 'items' => ['Đổi tên thành Công ty Cổ phần KIẾN Á', 'Các dự án tại Quận 8']],
      ['year' => '2002', 'image' => $_img('about/journey/img-2002-1.jpg'), 'items' => ['Trường Phổ thông DUY TÂN (Phú Yên cũ)']],
      ['year' => '2007', 'image' => '',                                    'items' => ['Trường Đại học KINH TẾ - TÀI CHÍNH TP.HCM (UEF)']],
      ['year' => '2008', 'image' => $_img('about/journey/img-2008-1.jpg'), 'items' => ['Khu căn hộ cao cấp IMPERIA AN PHÚ']],
      ['year' => '2010', 'image' => $_img('about/journey/img-2010-1.jpg'), 'items' => ['Khu biệt thự cao cấp GALLERIA']],
      ['year' => '2012', 'image' => $_img('about/journey/img-2012-1.jpg'), 'items' => ['Khu biệt thự vườn VENTURA']],
      ['year' => '2014', 'image' => $_img('about/journey/img-2014-1.jpg'), 'items' => ['Khu căn hộ CITIHOME']],
      ['year' => '2015', 'image' => $_img('about/journey/img-2015-1.jpg'), 'items' => ['Khu nhà phố CITIBELLA']],
      ['year' => '2016', 'image' => $_img('about/journey/img-2016-1.jpg'), 'items' => ['Khu biệt thự LAVILA NAM SÀI GÒN', 'Khu căn hộ CITISOHO']],
      ['year' => '2017', 'image' => $_img('about/journey/img-2017-1.jpg'), 'items' => ['Khu biệt thự LAVILA NAM SÀI GÒN', 'Khu căn hộ CITIESTO', 'Dự án LE MÉRIDIEN CAM RANH BAY RESORT &amp; SPA (Khánh Hòa)']],
      ['year' => '2018', 'image' => $_img('about/journey/img-2018-1.jpg'), 'items' => ['Vốn điều lệ: 1,368 tỷ đồng', 'Nhân sự: 285 nhân viên', 'Khu biệt thự LAVILA DE RIO', 'Khu căn hộ CITIALTO', 'Dự án LAVILA MARINA CAM RANH BAY (Khánh Hòa)']],
      ['year' => '2020', 'image' => $_img('about/journey/img-2020-1.jpg'), 'items' => ['Dự án Khu căn hộ CITIGRAND', 'Khởi công TRƯỜNG ĐẠI HỌC QUẢN LÝ VÀ CÔNG NGHỆ TP.HCM (UMT)']],
      ['year' => '2021', 'image' => $_img('about/journey/img-2021-1.jpg'), 'items' => ['Vốn điều lệ: 3,000 tỷ đồng', 'Dự án ALILA BÃI ÔM (Phú Yên cũ)']],
      ['year' => '2024', 'image' => '',                                    'items' => ['Dự án Khu căn hộ cao cấp ARCADIA AT LAVILA']],
      ['year' => '2025', 'image' => $_img('about/journey/img-2025-1.jpg'), 'items' => ['Dự án Khu biệt thự biệt lập LAVILA ISLAND']],
      ['year' => '2026', 'image' => $_img('about/journey/img-2026-1.jpg'), 'items' => ['Dự án Khu biệt thự biệt lập LAVILA ISLAND']],
   ],
];
$group = get_field('section_journey') ?: [];

$data = [
   'title'           => $group['title'] ?? '',
   'title_highlight' => $group['title_highlight'] ?? '',
   'milestones'      => array_map(fn($m) => [
      'year'  => $m['year'] ?? '',
      'items' => array_column($m['items'] ?? [], 'content'),
      'image' => $m['image'] ? wp_get_attachment_image_url($m['image'], 'large') : '',
   ], $group['milestones'] ?? []),
];

// Fallback sample nếu ACF chưa có dữ liệu
if (empty($data['milestones'])) {
   $data['milestones'] = $sample['milestones'];
}
if (empty($data['title']))           $data['title']           = $sample['title'];
if (empty($data['title_highlight'])) $data['title_highlight'] = $sample['title_highlight'];

$total       = count($data['milestones']);
$highlighted = ['1994', '2001', '2016', '2018', '2021'];
?>

<section class="section-about-journey relative overflow-hidden" id="secJourney">
   <span class="absolute inset-0 bg-[#f4f5f8] z-[-1]"></span>

   <div class="pt-(--pd-sc) pb-0">

      <!-- Title -->
      <div class="container">
         <div class="pb-10 max-lg:pb-6">
            <div class="flex flex-col text-center">
               <h2 class="title-main ">
                  <?php echo esc_html($data['title']); ?>
                  <span><?php echo esc_html($data['title_highlight']); ?></span>
               </h2>
               <p>
                  Từ chỉ 18 nhân viên đầu tiên vào năm 1994, KIẾN Á đã đi qua một hành trình không ngừng mở rộng và phát triển.
               </p>
            </div>
         </div>
      </div>

      <!-- Swiper -->
      <div class="journey-swiper-wrap relative container">

         <!-- Nav -->

         <div class="absolute z-10 left-1/2 w-[105%] -translate-x-1/2 top-1/2 -translate-y-1/2 flex justify-between px-0 max-lg:px-4">
            <button class="pointer-events-auto swiper-prev tts-btn w-10 h-10 rounded-full flex items-center justify-center shrink-0 transition" aria-label="Trước">
               <svg width="16" height="16" viewBox="0 0 16 16" fill="none">
                  <path d="M5 8c0 .128.049.256.146.354l5 5a.5.5 0 0 0 .708-.708L6.207 8l4.647-4.646a.5.5 0 1 0-.708-.708l-5 5A.497.497 0 0 0 5 8Z" fill="currentColor" />
               </svg>
            </button>
            <button class="pointer-events-auto swiper-next tts-btn w-10 h-10 rounded-full flex items-center justify-center shrink-0 transition" aria-label="Tiếp theo">
               <svg width="16" height="16" viewBox="0 0 16 16" fill="none">
                  <path d="M11 8a.497.497 0 0 0-.146-.354l-5-5a.5.5 0 1 0-.708.708L9.793 8l-4.647 4.646a.5.5 0 0 0 .708.708l5-5A.497.497 0 0 0 11 8Z" fill="currentColor" />
               </svg>
            </button>
         </div>

         <div class="swiper-container overflow-hidden">
            <div class="swiper journey-swiper rows">
               <div class="swiper-wrapper">
                  <?php foreach ($data['milestones'] as $i => $m) : ?>
                     <div class="swiper-slide col journey-slide">
                        <div class="relative overflow-hidden">
                           <div class="row min-h-120 max-lg:min-h-0 py-6 max-lg:py-4 max-md:flex-col max-md:gap-6">

                              <!-- Content col -->
                              <div class="col col-6 md:mb-0! max-md:w-full!">
                                 <div class="flex flex-col gap-3 b-content">
                                    <p class="text-[64px] max-lg:text-[40px] max-md:text-[24px] font-extrabold text-sec uppercase leading-none">
                                       <?php echo esc_html($m['year']); ?>
                                    </p>
                                    <div class="flex flex-col gap-2">
                                       <?php foreach ($m['items'] as $item) : ?>
                                          <div class="text-[18px] md:text-[22px] font-bold text-pri">
                                             <?php echo wp_kses_post($item); ?>
                                          </div>
                                       <?php endforeach; ?>
                                    </div>
                                 </div>
                              </div>

                              <!-- Image col -->
                              <div class="col col-6 md:mb-0! max-md:w-full!">
                                 <div class="relative aspect-4/3 max-md:aspect-3/2">

                                    <?php if (!empty($m['image'])) : ?>
                                       <div class="w-full h-full overflow-hidden rounded-lg">
                                          <img src="<?php echo esc_url($m['image']); ?>" alt="" class="block w-full h-full object-cover">
                                       </div>
                                    <?php else : ?>
                                       <div class="absolute top-0 left-0 w-3/5 aspect-3/4 bg-[#b5b5b5] rounded-lg -rotate-[4deg] origin-top-left"></div>
                                       <div class="absolute bottom-0 right-0 w-3/5 aspect-3/4 bg-[#b5b5b5] rounded-lg rotate-[4deg] origin-bottom-right"></div>
                                    <?php endif; ?>

                                 </div>
                              </div>

                           </div>
                        </div>
                     </div>
                  <?php endforeach; ?>
               </div>
            </div>
         </div>
      </div>

      <!-- Timeline pagination — desktop -->
      <div class="w-full max-md:hidden mt-8">
         <div class="container">
            <div class="journey-timeline<?php echo $total > 20 ? ' has-tl-nav' : ''; ?> relative">

               <?php if ($total > 20) : ?>
                  <button class="journey-tl-nav-prev absolute right-full top-1/2 -translate-y-1/2 z-10 tts-btn w-8 h-8 rounded-full flex items-center justify-center shrink-0 transition" aria-label="Trước">
                     <svg width="14" height="14" viewBox="0 0 16 16" fill="none">
                        <path d="M5 8c0 .128.049.256.146.354l5 5a.5.5 0 0 0 .708-.708L6.207 8l4.647-4.646a.5.5 0 1 0-.708-.708l-5 5A.497.497 0 0 0 5 8Z" fill="currentColor" />
                     </svg>
                  </button>
               <?php endif; ?>

               <div class="journey-tl-inner overflow-hidden">
                  <div class="flex items-end border-b border-[#cecfd2]<?php echo $total > 20 ? ' gap-0' : ' justify-between'; ?>">
                     <?php foreach ($data['milestones'] as $i => $m) :
                        $is_key = in_array($m['year'], $highlighted);
                     ?>
                        <button class="journey-tl-item flex flex-col items-center cursor-pointer group<?php echo $total > 20 ? ' shrink-0 px-3' : ''; ?>" data-index="<?php echo $i; ?>" aria-label="<?php echo esc_attr($m['year']); ?>">

                           <?php if ($is_key) : ?>
                              <span class="journey-tl-icon text-[#cecfd2] transition-colors duration-300 mb-0.5">
                                 <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                                    <polyline points="23 6 13.5 15.5 8.5 10.5 1 18" />
                                    <polyline points="17 6 23 6 23 12" />
                                 </svg>
                              </span>
                              <span class="journey-tl-year text-[20px] font-bold text-pri py-2 block transition-all duration-300 group-[.is-active]:text-sec">
                                 <?php echo esc_html($m['year']); ?>
                              </span>
                           <?php else : ?>
                              <span class="journey-tl-year text-[16px] text-[#9e9e9e] py-2 pb-1.5 block transition-all duration-300 group-[.is-active]:text-sec group-[.is-active]:font-bold">
                                 <?php echo esc_html($m['year']); ?>
                              </span>
                           <?php endif; ?>

                        </button>
                     <?php endforeach; ?>
                  </div>
               </div>

               <?php if ($total > 20) : ?>
                  <button class="journey-tl-nav-next absolute left-full top-1/2 -translate-y-1/2 z-10 tts-btn w-8 h-8 rounded-full flex items-center justify-center shrink-0 transition" aria-label="Tiếp theo">
                     <svg width="14" height="14" viewBox="0 0 16 16" fill="none">
                        <path d="M11 8a.497.497 0 0 0-.146-.354l-5-5a.5.5 0 1 0-.708.708L9.793 8l-4.647 4.646a.5.5 0 0 0 .708.708l5-5A.497.497 0 0 0 11 8Z" fill="currentColor" />
                     </svg>
                  </button>
               <?php endif; ?>

            </div>
         </div>
      </div>

      <!-- Progress line -->
      <div class="absolute z-1 bottom-0 left-0 w-full h-[3px] bg-[#cecfd2] max-md:hidden">
         <div class="journey-progress-fill h-full bg-sec transition-[width] duration-500 ease-in-out w-0"></div>
      </div>

      <!-- Mobile pagination dots -->
      <div class="journey-mobile-pagi flex justify-center gap-2 py-4 md:hidden!">
         <?php foreach ($data['milestones'] as $i => $m) : ?>
            <button class="journey-tl-item w-2 h-2 rounded-full bg-[#cecfd2] transition-all duration-300 cursor-pointer" data-index="<?php echo $i; ?>" aria-label="<?php echo esc_attr($m['year']); ?>"></button>
         <?php endforeach; ?>
      </div>

   </div>
</section>