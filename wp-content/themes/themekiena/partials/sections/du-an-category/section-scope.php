<?php
defined('ABSPATH') || exit;

$img = MONA_THEME_PATH_URI . '/assets/images/';

$sample = [
    [
        'title' => 'Thi công hạ tầng kỹ thuật',
        'image' => $img . 'du-an/xay-dung/scope-building.jpg',
        'items' => [
            ['icon' => $img . 'icons/ic-road.png',    'text' => 'San nền, đường giao thông'],
            ['icon' => $img . 'icons/ic-water.png',   'text' => 'Hệ thống cấp – thoát nước'],
            ['icon' => $img . 'icons/ic-house.png',   'text' => 'Hệ thống kỹ thuật ngoài nhà'],
            ['icon' => $img . 'icons/ic-complex.png', 'text' => 'Dự án phức hợp'],
        ],
    ],
    [
        'title' => 'Thi công công trình dân dụng & công nghiệp',
        'image' => $img . 'du-an/xay-dung/scope-building.jpg',
        'items' => [],
    ],
    [
        'title' => 'Thi công cảnh quan & cây xanh',
        'image' => $img . 'du-an/xay-dung/scope-building.jpg',
        'items' => [],
    ],
];
?>

<section class="section-scope section-pd">
    <div class="container">
        <div class="flex gap-8 items-start max-lg:flex-col">

            <!-- Left: Image Panel -->
            <div class="scope-image-panel shrink-0 w-[45%] max-lg:w-full bg-pri rounded-lg overflow-hidden relative" style="aspect-ratio:696/522">
                <?php foreach ($sample as $idx => $tab) : ?>
                    <img
                        src="<?php echo esc_url($tab['image']); ?>"
                        alt="<?php echo esc_attr($tab['title']); ?>"
                        class="scope-tab-img absolute inset-0 w-full h-full object-cover transition-opacity duration-500 <?php echo $idx === 0 ? 'opacity-100' : 'opacity-0 pointer-events-none'; ?>"
                        data-index="<?php echo $idx; ?>"
                    >
                <?php endforeach; ?>
            </div>

            <!-- Right: Content -->
            <div class="flex-1 min-w-0 flex flex-col gap-8">
                <h2 class="title-main">
                    <span>phạm vi</span>
                    hoạt động
                </h2>

                <!-- Accordion -->
                <div class="flex flex-col">
                    <?php foreach ($sample as $idx => $tab) : ?>
                        <div class="scope-item <?php echo $idx === 0 ? 'is-active' : ''; ?>" data-index="<?php echo $idx; ?>">

                            <!-- Header -->
                            <button type="button" class="scope-item-header w-full flex items-center justify-between py-4 gap-4 cursor-pointer text-left">
                                <span class="scope-item-title font-bold text-[20px] tracking-[-0.04em] leading-[1.5] transition-colors duration-300 <?php echo $idx === 0 ? 'text-sec' : 'text-pri'; ?>">
                                    <?php echo esc_html($tab['title']); ?>
                                </span>
                                <span class="scope-item-chevron shrink-0 flex items-center justify-center transition-transform duration-300 <?php echo $idx === 0 ? 'text-sec rotate-180' : 'text-pri'; ?>">
                                    <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M3 6L8 11L13 6" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                    </svg>
                                </span>
                            </button>

                            <!-- Sub-items -->
                            <?php if (!empty($tab['items'])) : ?>
                                <div class="scope-item-body pb-4 <?php echo $idx === 0 ? '' : 'hidden'; ?>">
                                    <div class="flex flex-col gap-3">
                                        <?php foreach ($tab['items'] as $item) : ?>
                                            <div class="flex gap-2 items-start">
                                                <span class="shrink-0 mt-1 w-4 h-4">
                                                    <img src="<?php echo esc_url($item['icon']); ?>" alt="" class="w-full h-full object-contain">
                                                </span>
                                                <span class="text-pri text-[16px] tracking-[-0.04em] leading-[1.5]">
                                                    <?php echo esc_html($item['text']); ?>
                                                </span>
                                            </div>
                                        <?php endforeach; ?>
                                    </div>
                                </div>
                            <?php endif; ?>

                            <!-- Divider -->
                            <?php if ($idx < count($sample) - 1) : ?>
                                <div class="border-b border-[#d9d9d9]"></div>
                            <?php endif; ?>

                        </div>
                    <?php endforeach; ?>
                </div>
            </div>

        </div>
    </div>
</section>

<script>
(function () {
    var section = document.querySelector('.section-scope');
    if (!section) return;

    var items   = section.querySelectorAll('.scope-item');
    var tabImgs = section.querySelectorAll('.scope-tab-img');

    items.forEach(function (item) {
        item.querySelector('.scope-item-header').addEventListener('click', function () {
            var idx = parseInt(item.dataset.index, 10);

            items.forEach(function (el) {
                var isTarget = parseInt(el.dataset.index, 10) === idx;
                el.classList.toggle('is-active', isTarget);

                var title   = el.querySelector('.scope-item-title');
                var chevron = el.querySelector('.scope-item-chevron');
                var body    = el.querySelector('.scope-item-body');

                if (isTarget) {
                    title.classList.remove('text-pri');
                    title.classList.add('text-sec');
                    chevron.classList.remove('text-pri');
                    chevron.classList.add('text-sec', 'rotate-180');
                    if (body) body.classList.remove('hidden');
                } else {
                    title.classList.remove('text-sec');
                    title.classList.add('text-pri');
                    chevron.classList.remove('text-sec', 'rotate-180');
                    chevron.classList.add('text-pri');
                    if (body) body.classList.add('hidden');
                }
            });

            tabImgs.forEach(function (img) {
                var active = parseInt(img.dataset.index, 10) === idx;
                img.classList.toggle('opacity-100', active);
                img.classList.toggle('opacity-0', !active);
                img.classList.toggle('pointer-events-none', !active);
            });
        });
    });
})();
</script>
