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
   ],
];
$group = get_field('section_journey') ?: [];

$data = [
   'milestones' => array_map(fn($m) => [
      'year'  => $m['year'] ?? '',
      'items' => array_column($m['items'] ?? [], 'content'),
      'image' => $m['image'] ? wp_get_attachment_image_url($m['image'], 'large') : '',
   ], $group['milestones'] ?? []),
];

?>

<section class="section-about-journey relative overflow-hidden max-md:mt-8" id="secJourney">
   <span class="absolute inset-0 bg-[#f4f5f8] z-[-1]"></span>

   <div class="journey-pin w-full min-h-screen section-pd flex flex-col">

      <!-- Title -->
      <div class="container ">
         <div class="pt-(--pd-sc) pb-10 max-lg:pb-6">
            <h2 class="title-main text-center">
               Hành trình
               <span>Phát triển</span>
            </h2>
         </div>
      </div>

      <!-- Horizontal track — GSAP x-translate on lg+ -->
      <div class="journey-track flex flex-1 flex-col lg:flex-row! lg:items-center gap-10 lg:gap-[120px] px-4 lg:px-0">
         <div class="journey-spacer shrink-0 hidden lg:block"></div>

         <?php foreach ($data['milestones'] as $i => $m) : ?>
            <div class="journey-slide w-full lg:shrink-0 lg:pl-[5%] lg:w-334.25! <?php echo $i === 0 ? 'active' : ''; ?>" data-index="<?php echo $i; ?>">
               <div class="relative">
                  <div class="row">

                     <!-- Content col: ~40% -->
                     <div class="col col-5 max-md:w-full!">
                        <div class="flex flex-col gap-3">
                           <p class="text-[64px] max-lg:text-[32px] font-extrabold text-pri t-titlte uppercase transition-colors duration-300 leading-none">
                              <?php echo esc_html($m['year']); ?>:
                           </p>
                           <div class="flex flex-col gap-2 list-disc">
                              <?php foreach ($m['items'] as $item) : ?>
                                 <div class="text-[28px] max-lg:text-[18px]! font-bold text-pri">
                                    <?php echo wp_kses_post($item); ?>
                                 </div>
                              <?php endforeach; ?>
                           </div>
                        </div>
                     </div>

                     <!-- Image col: ~60% -->
                     <div class="col col-7 max-md:w-full!">
                        <div class="relative">

                           <?php if (!empty($m['image'])) : ?>
                              <div class="w-full h-full overflow-hidden">
                                 <img src="<?php echo esc_url($m['image']); ?>" alt="" class="block w-full h-full object-cover">
                              </div>
                           <?php else : ?>
                              <div class="absolute top-0 left-0 w-3/5 aspect-3/4 bg-[#b5b5b5] rounded-[8px] -rotate-[4deg] origin-top-left"></div>
                              <div class="absolute bottom-0 right-0 w-3/5 aspect-3/4 bg-[#b5b5b5] rounded-[8px] rotate-[4deg] origin-bottom-right"></div>
                           <?php endif; ?>

                        </div>
                     </div>

                  </div>
               </div>
            </div>
         <?php endforeach; ?>

         <div class="journey-spacer shrink-0 hidden lg:block"></div>
      </div>

      <!-- Timeline bar — desktop only -->
      <span class="absolute left-0 bottom-0 w-full z-1 max-md:hidden">
         <span class="bg-line-sm"></span>
         <div class="container">
            <div class="journey-timeline relative">

               <!-- Tick marks row -->
               <div class="journey-tl-ticks flex justify-between items-end border-b border-[#cecfd2]">
                  <?php foreach ($data['milestones'] as $i => $m) : ?>
                     <div class="journey-tl-item flex flex-col items-center" data-index="<?php echo $i; ?>">
                        <div class="journey-tl-tick bg-[#cecfd2] w-0.75 h-11"></div>
                     </div>
                  <?php endforeach; ?>
               </div>
               <!-- Year labels row -->
               <div class="journey-tl-years flex justify-between absolute left-0 w-full bottom-full translate-x-[1%] translate-y-[35%]">
                  <?php foreach ($data['milestones'] as $i => $m) : ?>
                     <div class="journey-tl-item" data-index="<?php echo $i; ?>">
                        <span class="journey-tl-year text-[16px] text-pri py-3 block"><?php echo esc_html($m['year']); ?></span>
                     </div>
                  <?php endforeach; ?>
               </div>

            </div>
         </div>
      </span>

      <!-- Progress line -->
      <div class="absolute z-1 bottom-0 left-0 w-full h-[3px] bg-[#cecfd2] lg:block">
         <div class="journey-progress-fill h-full bg-sec w-0"></div>
      </div>

   </div>
</section>