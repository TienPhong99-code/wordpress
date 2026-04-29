<?php
defined('ABSPATH') || exit;

$tpl = get_template_directory_uri();

$items = [
    [
        'icon'  => $tpl . '/assets/images/about/mission-icon-1.svg',
        'title' => 'Giá trị cốt lõi',
        'bg'    => $tpl . '/assets/images/about/mission-bg-1.jpg',
        'desc'  => '<p class="text-[16px] font-semibold text-center text-white">Chuyên nghiệp - Sáng tạo - Hòa hợp</p>',
    ],
    [
        'icon'  => $tpl . '/assets/images/about/mission-icon-2.svg',
        'title' => 'Sứ mệnh',
        'bg'    => $tpl . '/assets/images/about/mission-bg-2.jpg',
        'desc'  => '
            <div class="text-center text-white text-[16px]">
                <p class="font-semibold">Đối với Nhân viên:</p>
                <p class="font-normal">Hòa hợp, chia sẻ, tạo điều kiện để phát huy sáng tạo và phát triển sự nghiệp</p>
            </div>
            <div class="text-center text-white text-[16px]">
                <p class="font-semibold">Đối với đối tác, Cổ đông:</p>
                <p class="font-normal">Chuyên nghiệp, tôn trọng - Tin tưởng, đồng hành</p>
            </div>
            <div class="text-center text-white text-[16px]">
                <p class="font-semibold">Đối với Khách hàng:</p>
                <p class="font-normal">Tạo sản phẩm có giá trị bền vững</p>
            </div>
        ',
    ],
    [
        'icon'  => $tpl . '/assets/images/about/mission-icon-3.svg',
        'title' => 'Tầm nhìn',
        'bg'    => $tpl . '/assets/images/about/mission-bg-3.jpg',
        'desc'  => '<p class="text-[16px] font-normal text-center text-white">Trở thành tập đoàn đẳng cấp quốc tế</p>',
    ],
];
?>
<section class="sec-about-mission" id="secMission">
    <div class="container">
        <h2 class="title-main text-center mb-6 max-xl:mb-4 max-md:mb-3">
            Thông điệp <span>thương hiệu</span>
        </h2>
    </div>
    <div class="relative h-200 max-xl:h-162.5 max-md:h-auto overflow-hidden">
        <?php foreach ($items as $i => $item) : ?>
            <div class="mission-bg absolute inset-0 transition-opacity duration-700 ease-in-out <?= $i === 0 ? 'opacity-100' : 'opacity-0' ?>" data-index="<?= $i ?>">
                <img
                    src="<?= esc_url($item['bg']) ?>"
                    alt=""
                    class="block w-full h-full object-cover"
                    loading="<?= $i === 0 ? 'eager' : 'lazy' ?>">
            </div>
        <?php endforeach; ?>

        <div class="absolute inset-0 bg-[#1a1a1a]/40 z-1 pointer-events-none"></div>

        <div class="relative z-2 flex h-full max-md:flex-col">
            <?php foreach ($items as $i => $item) : ?>
                <div
                    class="mission-col flex-1 flex flex-col justify-end p-12 max-xl:p-6 max-md:p-5 relative cursor-pointer<?= $i < count($items) - 1 ? ' border-r border-white/20 max-md:border-r-0 max-md:border-b' : '' ?>"
                    data-index="<?= $i ?>">

                    <div class="mission-col-overlay absolute inset-0 bg-[#1a1a1a]/40 pointer-events-none transition-opacity duration-500 <?= $i === 0 ? 'opacity-100' : 'opacity-0' ?>"></div>

                    <div class="relative z-1 flex flex-col gap-3 items-center">
                        <div class="size-11 max-md:size-8">
                            <img
                                src="<?= esc_url($item['icon']) ?>"
                                alt="<?= esc_attr($item['title']) ?>"
                                class="block w-full h-full object-contain">
                        </div>
                        <h3 class="font-black text-[36px] max-xl:text-[26px] max-md:text-[20px] text-white uppercase text-center m-0">
                            <?= esc_html($item['title']) ?>
                        </h3>
                        <div class="mission-col-desc flex flex-col gap-2 w-full md:max-h-0 overflow-hidden md:opacity-0 transition-[max-height,opacity] duration-500 ease-in-out <?= $i === 0 ? 'is-active' : '' ?>">
                            <?= $item['desc'] ?>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>