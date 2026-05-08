<?php
defined('ABSPATH') || exit;

// =============================================
// SAMPLE DATA — dev tự kết nối ACF sau
// =============================================
$sample = [
   'title'   => 'KIENA',
   'tagline' => 'CREATING VALUES FOR LIFE',
   'desc_1'  => [
      'text' => 'KIẾN Á GROUP (KAG) được thành lập ',
      'blod' => 'hơn 30 năm,',
      'text' => 'là Tập đoàn phát triển đa ngành với ba lĩnh vực trọng tâm: Bất động sản, Giáo dục, và Xây dựng - dịch vụ.'
   ],
   'desc_2'  => [
      'text' => 'KAG theo đuổi  ',
      'bold' => 'triết lý phát triển bền vững: ',
      'text' => 'Lấy con người làm trung tâm, hướng đến kiến tạo các công trình và hệ sinh thái có giá trị lâu dài cho cộng đồng.'
   ],
   'image'   => 'home/about-citigrand7.png',
   'title-image' => 'about-citigrand6.png',
];
$data = $sample;
?>

<section class="section-abouts max-md:py-8 relative section-pd-t z-1 max-md:bg-white">
   <span class="bg-linear-to-b from-transparent to-white absolute bottom-full w-full h-[6%] z-1 pointer-events-none"></span>
   <span class="absolute bottom-full left-0 w-full translate-y-1/2 pointer-events-none mix-blend-screen">
      <img src="<?php echo MONA_THEME_PATH_URI; ?>/assets/images/home/may-dc4.png" class="block w-full" alt="">
   </span>
   <span class="absolute inset-0 md:bg-linear-to-b from-[#ffffff] to-[#e0f6ff] z-[-1] "></span>

   <!-- Top: content group -->
   <div class="md:absolute md:top-[30%] md:-translate-y-1/2 md:left-1/2 md:-translate-x-1/2 md:w-full md:z-10">
      <div class="container">
         <div class="relative z-1">
            <div class="about-content max-w-200 flex flex-col gap-4 mx-auto text-center pointer-events-none">
               <!-- <span class="header-logo-pos md:h-px">
                  <svg class="svg-title-about md:hidden! block w-full h-auto" width="592" height="122" viewBox="0 0 592 122" fill="none" xmlns="http://www.w3.org/2000/svg">
                     <path d="M152.158 17.3837H174.729V121.974H139.596V29.9459C139.596 23.0132 145.226 17.3837 152.158 17.3837Z" fill="#F4DE96" />
                     <path d="M126.904 0.0260628H80.4075L35.1885 45.1147V0H9.85543C4.43437 0 0.0297546 4.40461 0.0297546 9.82568V121.974H35.1624V76.8853L80.3814 121.974H126.877L65.7341 60.987L126.904 0.0260628Z" fill="#F4DE96" />
                     <path d="M302.827 92.9395V122H197.56V92.9395H302.827ZM302.827 17.3574V46.417H232.693V58.041H279.553V81.3154H197.56V27.209C197.56 21.7882 201.964 17.384 207.385 17.3838V17.3574H302.827Z" fill="#F4DE96" />
                     <path d="M542.371 0.026123H515.604C510.079 0.026123 505.101 3.3361 502.938 8.39229L454.721 121.974H482.661C487.378 121.974 491.652 119.159 493.503 114.807L524.413 41.9872L546.045 92.94H512.007L524.335 122H585.035C589.336 122 592.255 117.595 590.561 113.634L542.371 0.026123Z" fill="#F4DE96" />
                     <path d="M406.896 17.3837V75.0607L360.765 17.3837H335.458C330.037 17.3837 325.632 21.7883 325.632 27.2093V121.974H360.765V64.2967L406.896 121.974H432.203C437.624 121.974 442.029 117.569 442.029 112.148V17.3837H406.896Z" fill="#F4DE96" />
                  </svg>
               </span> -->
               <div class="max-w-190 mx-auto">
                  <div class="text-[18px] text-pri mona-content">
                     <p>
                        Tại KIẾN Á, chúng tôi xem sự <span class="c-second font-semibold">hòa hợp</span> là nền tảng để kết nối cộng đồng và xây dựng những mối quan hệ đồng hành lâu dài.
                     </p>
                     <p>
                        Chúng tôi nuôi dưỡng sự <span class="c-second font-semibold">sáng tạo</span> như động lực để liên tục đổi mới và liên tục mang lại những giá trị khác nhau trong từng dự án.
                     </p>
                     <p>
                        Và trên tất cả, sự <span class="c-second font-semibold">bền vững</span> luôn hiện diện trong mỗi đô thị, công trình <br class="md:hidden"> và môi trường sống mà KIẾN Á kiến tạo.
                     </p>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>

   <!-- Bottom: 1 image — full-width, sát đáy -->
   <div class="overflow-hidden pointer-events-none max-md:absolute max-md:inset-0 max-md:z-0">
      <img src="<?php echo MONA_THEME_PATH_URI; ?>/assets/images/<?php echo esc_attr($data['image']); ?>"
         class="about-img-bot block w-full max-md:h-full" alt="">
   </div>

</section>