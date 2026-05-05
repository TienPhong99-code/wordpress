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
                  <mask id="mask0_about_info" style="mask-type:alpha" maskUnits="userSpaceOnUse" x="0" y="0" width="795" height="165">
                     <path d="M204.686 23.3794H235.04V164.041H187.791V40.2742C187.791 30.9505 195.362 23.3794 204.686 23.3794Z" fill="#283377" />
                     <path d="M170.686 0.0350515H108.154L47.3394 60.6742V0H13.3044C6.01371 0 0.0900421 5.92371 0.0900421 13.2144V164.041H47.3394V103.402L108.154 164.041H170.686L88.4549 82.0206L170.721 0L170.686 0.0350515Z" fill="#283377" />
                     <path d="M407.283 124.994H265.71V164.076H407.283V124.994Z" fill="#283377" />
                     <path d="M278.925 23.3794C271.634 23.3794 265.71 29.3031 265.71 36.5938V109.361H375.982V78.0598H312.96V62.4268H407.283V23.3443H278.925V23.3794Z" fill="#283377" />
                     <path d="M729.442 0.0350342H693.444C686.014 0.0350342 679.319 4.48658 676.409 11.2866L611.564 164.041H649.139C655.484 164.041 661.232 160.256 663.721 154.402L705.292 56.468L734.385 124.994H688.607L705.187 164.076H786.822C792.605 164.076 796.531 158.152 794.253 152.825L729.407 0.0350342H729.442Z" fill="#283377" />
                     <path d="M547.244 23.3794V100.948L485.203 23.3794H451.168C443.877 23.3794 437.954 29.3031 437.954 36.5938V164.041H485.203V86.4721L547.244 164.041H581.279C588.57 164.041 594.494 158.117 594.494 150.827V23.3794H547.244Z" fill="#283377" />
                  </mask>
                  <g class="svg-draw-layer" fill="none" stroke="#283377" stroke-width="1.5" stroke-linejoin="round" stroke-linecap="round">
                     <path d="M170.686 0.0350515H108.154L47.3394 60.6742V0H13.3044C6.01371 0 0.0900421 5.92371 0.0900421 13.2144V164.041H47.3394V103.402L108.154 164.041H170.686L88.4549 82.0206L170.721 0L170.686 0.0350515Z" />
                     <path d="M204.686 23.3794H235.04V164.041H187.791V40.2742C187.791 30.9505 195.362 23.3794 204.686 23.3794Z" />
                     <path d="M278.925 23.3794C271.634 23.3794 265.71 29.3031 265.71 36.5938V109.361H375.982V78.0598H312.96V62.4268H407.283V23.3443H278.925V23.3794Z" />
                     <path d="M407.283 124.994H265.71V164.076H407.283V124.994Z" />
                     <path d="M547.244 23.3794V100.948L485.203 23.3794H451.168C443.877 23.3794 437.954 29.3031 437.954 36.5938V164.041H485.203V86.4721L547.244 164.041H581.279C588.57 164.041 594.494 158.117 594.494 150.827V23.3794H547.244Z" />
                     <path d="M729.442 0.0350342H693.444C686.014 0.0350342 679.319 4.48658 676.409 11.2866L611.564 164.041H649.139C655.484 164.041 661.232 160.256 663.721 154.402L705.292 56.468L734.385 124.994H688.607L705.187 164.076H786.822C792.605 164.076 796.531 158.152 794.253 152.825L729.407 0.0350342H729.442Z" />
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