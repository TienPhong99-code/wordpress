<?php
defined('ABSPATH') || exit;

$sample = [
    [
        'image'       => MONA_THEME_PATH_URI . '/assets/images/home/works-bat-dong-san.jpg',
        'title'       => 'Bất động sản',
        'title_class' => 'text-[#ED1C24]',
    ],
    [
        'image'       => MONA_THEME_PATH_URI . '/assets/images/home/works-giao-duc.jpg',
        'title'       => 'Giáo dục',
        'title_class' => 'text-[#283377]',
    ],
    [
        'image'       => MONA_THEME_PATH_URI . '/assets/images/home/works-xay-dung.jpg',
        'title'       => 'Xây dựng',
        'title_class' => 'text-[#283377]',
    ],
    [
        'image'       => MONA_THEME_PATH_URI . '/assets/images/home/works-dich-vu.jpg',
        'title'       => 'Dịch vụ',
        'title_class' => 'text-[#283377]',
    ],
];
?>
<section class="sec-works py-16">
    <div class="container">
    <div class="relative">
        <h2 class="text-[#283377] font-black text-[48px] uppercase text-center">
            Lĩnh vực <span class="text-[#ED1C24]">HOẠT ĐỘNG</span>
        </h2>
        <div class="relative">
            <div class="row">
                <?php foreach ($sample as $item) : ?>
                    <div class="col col-6">
                        <div class="flex flex-col gap-4 items-center">
                            <div class="w-full aspect-600/389 rounded-lg overflow-hidden">
                                <img
                                    src="<?php echo esc_url($item['image']); ?>"
                                    alt="<?php echo esc_attr($item['title']); ?>"
                                    class="block w-full h-full object-cover"
                                    loading="lazy"
                                >
                            </div>
                            <p class="<?php echo esc_attr($item['title_class']); ?> font-bold text-[28px] text-center px-[8px]">
                                <?php echo esc_html($item['title']); ?>
                            </p>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>

    </div>
    </div>
</section>
