<?php
defined('ABSPATH') || exit;

// =============================================
// SAMPLE DATA — dev tự kết nối ACF sau
// =============================================
$sample = [
   'title_image' => 'home/title-bg-ab2.jpeg',
   'image'       => 'about/building-citigrand.jpg',
   'paragraphs'  => [
      [
         'class'   => 'text-pri mb-4',
         'content' => '<strong class="text-sec font-bold">KIẾN Á GROUP (KAG) được thành lập hơn 30 năm,</strong> KIẾN Á GROUP phát triển đa ngành với trọng tâm là <strong class="text-sec font-bold">bất động sản, giáo dục và xây dựng - dịch vụ</strong>, theo đuổi triết lý phát triển bền vững lấy con người làm trung tâm. Tập đoàn hướng đến kiến tạo những công trình không chỉ đáp ứng nhu cầu an cư - đầu tư mà còn góp phần hình thành chuẩn mực sống văn minh, lâu dài cho cộng đồng.',
      ],
      [
         'class'   => 'text-pri mb-4',
         'content' => 'Trong lĩnh vực bất động sản và xây dựng - dịch vụ, Tập đoàn sở hữu <strong class="text-sec font-bold">năng lực phát triển dự án toàn diện</strong> từ quy hoạch, thiết kế, thi công, pháp lý đến vận hành, bảo đảm tính thẩm mỹ, minh bạch và hiệu quả khai thác cho khách hàng và nhà đầu tư.',
      ],
      [
         'class'   => 'text-pri mb-4',
         'content' => 'Ở lĩnh vực giáo dục, KIẾN Á GROUP đầu tư <strong class="text-sec font-bold">phát triển hệ thống trường học từ tiểu học đến trung cấp, đại học hướng đến tiêu chuẩn quốc tế,</strong> thể hiện cam kết dài hạn trong việc nuôi dưỡng tri thức, con người và tương lai xã hội.',
      ],
      [
         'class'   => 'text-pri',
         'content' => 'Xuyên suốt các hoạt động là văn hóa doanh nghiệp đề cao sự <strong class="text-sec font-bold">tận tâm, chuẩn mực, sáng tạo và trách nhiệm,</strong> với mục tiêu tạo nên những giá trị bền vững cho cộng đồng và xã hội.',
      ],
   ],
];
$data = $sample;
?>

<section class="section-about-info relative section-pd-t z-1">

   <!-- Top: content group -->
   <div class="container">
      <div class="relative z-1">
         <div class="about-info-content max-w-160 mx-auto text-center">
            <!-- KIENA SVG logo (draw animation) -->
            <span class="max-w-175 mx-auto mb-6 block">
               <svg class="svg-title-about w-full" width="795" height="165" viewBox="0 0 795 165" fill="none" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                  <mask id="mask0_about_info" style="mask-type:alpha" maskUnits="userSpaceOnUse" x="0" y="0" width="796" height="165">
                     <path d="M200.954 23.371H235.001V164.055H187.739V36.5862C187.739 29.3023 193.649 23.371 200.954 23.371Z" fill="#283377" />
                     <path d="M170.632 0.000244141H108.073L47.2416 60.6652V0.000244141H13.2152C5.91041 0.000244141 0 5.91065 0 13.2154V164.076H47.2624V103.432L108.073 164.076H170.632L88.3856 82.0592L170.632 0.000244141Z" fill="#283377" />
                     <path d="M407.277 124.993H265.677V164.076H407.277V124.993Z" fill="#283377" />
                     <path d="M278.872 23.371C271.567 23.371 265.656 29.2814 265.656 36.5862V109.363H360.223L373.5 78.0631H312.898V62.4546H407.236V23.371H278.851H278.872Z" fill="#283377" />
                     <path d="M729.478 0H693.495C686.066 0 679.364 4.43281 676.471 11.2589L611.624 164.055H649.209C655.577 164.055 661.321 160.247 663.797 154.399L705.378 56.461L734.473 124.972H688.667L705.254 164.055H786.896C792.703 164.055 796.615 158.145 794.347 152.797L729.478 0Z" fill="#283377" />
                     <path d="M547.254 23.371V100.935L485.195 23.371H451.147C443.843 23.371 437.932 29.2814 437.932 36.5862V164.076H485.195V86.5125L547.254 164.076H581.301C588.606 164.076 594.516 158.166 594.516 150.861V23.371H547.254Z" fill="#283377" />
                  </mask>
                  <g class="svg-draw-layer" fill="none" stroke="#283377" stroke-width="1.5" stroke-linejoin="round" stroke-linecap="round">
                     <path d="M170.632 0.000244141H108.073L47.2416 60.6652V0.000244141H13.2152C5.91041 0.000244141 0 5.91065 0 13.2154V164.076H47.2624V103.432L108.073 164.076H170.632L88.3856 82.0592L170.632 0.000244141Z" />
                     <path d="M200.954 23.371H235.001V164.055H187.739V36.5862C187.739 29.3023 193.649 23.371 200.954 23.371Z" />
                     <path d="M278.872 23.371C271.567 23.371 265.656 29.2814 265.656 36.5862V109.363H360.223L373.5 78.0631H312.898V62.4546H407.236V23.371H278.851H278.872Z" />
                     <path d="M407.277 124.993H265.677V164.076H407.277V124.993Z" />
                     <path d="M547.254 23.371V100.935L485.195 23.371H451.147C443.843 23.371 437.932 29.2814 437.932 36.5862V164.076H485.195V86.5125L547.254 164.076H581.301C588.606 164.076 594.516 158.166 594.516 150.861V23.371H547.254Z" />
                     <path d="M729.478 0H693.495C686.066 0 679.364 4.43281 676.471 11.2589L611.624 164.055H649.209C655.577 164.055 661.321 160.247 663.797 154.399L705.378 56.461L734.473 124.972H688.667L705.254 164.055H786.896C792.703 164.055 796.615 158.145 794.347 152.797L729.478 0Z" />
                  </g>
                  <g class="svg-fill-layer" mask="url(#mask0_about_info)">
                     <rect x="0" y="0" width="795" height="165" fill="#283377" />
                  </g>
               </svg>
            </span>
            <div class="pb-8">
               <!-- Paragraphs -->
               <div class="text-[16px] text-pri">
                  <p class="mb-4">
                     Được thành lập từ năm 1994, KIẾN Á GROUP phát triển đa ngành với
                     trọng tâm là <span class="c-second font-bold">là bất động sản, giáo dục và xây dựng - dịch vụ,</span> Tập đoàn theo đuổi <span class="c-second font-bold">triết lý phát triển bền vững</span> lấy con người làm trung tâm, hướng đến kiến tạo những công trình không chỉ đáp ứng nhu cầu an cư - đầu tư mà còn góp phần hình thành chuẩn mực sống văn minh, lâu dài cho cộng đồng.
                  </p>
                  <p class="mb-4">
                     Trong lĩnh vực bất động sản và xây dựng - dịch vụ, Tập đoàn sở hữu <span class="c-second font-bold">năng lực phát triển dự án toàn diện</span> từ quy hoạch, thiết kế, thi công, pháp lý đến vận hành, bảo đảm tính thẩm mỹ, minh bạch và hiệu quả khai thác cho khách hàng và nhà đầu tư.
                  </p>
                  <p class="mb-4">
                     Ở lĩnh vực giáo dục, KIẾN Á GROUP đầu tư <span>phát triển hệ thống trường học từ tiểu học đến trung cấp, đại học hướng đến tiêu chuẩn quốc tế,</span> thể hiện cam kết dài hạn trong việc nuôi dưỡng tri thức, con người và tương lai xã hội.
                  </p>
                  <p>
                     Xuyên suốt các hoạt động là văn hóa doanh nghiệp đề cao sự <span class="c-second font-bold">tận tâm, chuẩn mực, sáng tạo và trách nhiệm,</span> với mục tiêu tạo nên những giá trị bền vững cho cộng đồng và xã hội.
                  </p>
               </div>
            </div>
         </div>
      </div>
   </div>

   <!-- Bottom: building image full-width -->
   <div class="overflow-hidden">
      <img src="<?php echo MONA_THEME_PATH_URI; ?>/assets/images/<?php echo esc_attr($data['image']); ?>"
         class="about-info-img block w-full" alt="">
   </div>

</section>