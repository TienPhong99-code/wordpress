<?php
// ── Title từ ACF page ──
$title      = get_field('td_title')      ?: 'Vị trí';
$title_span = get_field('td_title_span') ?: 'TUYỂN DỤNG';

// ── Lấy term filter từ URL ──
$current_term = isset($_GET['danh-muc']) ? sanitize_text_field($_GET['danh-muc']) : '';
$sort         = isset($_GET['sort'])     ? sanitize_text_field($_GET['sort'])      : 'newest';
$search       = isset($_GET['keyword'])  ? sanitize_text_field($_GET['keyword'])   : '';
$paged        = isset($_GET['td_page'])  ? max(1, intval($_GET['td_page']))        : 1;

// ── Taxonomy sidebar ──
$terms      = get_terms(['taxonomy' => 'danh_muc_tuyen_dung', 'hide_empty' => false]);
$total      = wp_count_posts('tuyen_dung')->publish ?? 0;
$page_url   = get_permalink();
$categories = [];
$anchor = '#tuyen-dung-list';
$categories[] = [
    'name'   => 'Tất cả vị trí',
    'count'  => $total,
    'active' => $current_term === '',
    'url'    => remove_query_arg('danh-muc', $page_url) . $anchor,
];
if (! is_wp_error($terms)) {
    foreach ($terms as $term) {
        $categories[] = [
            'name'   => $term->name,
            'count'  => $term->count,
            'active' => $current_term === $term->slug,
            'url'    => add_query_arg('danh-muc', $term->slug, $page_url) . $anchor,
        ];
    }
}

// ── Query jobs ──
$args = [
    'post_type'      => 'tuyen_dung',
    'posts_per_page' => 8,
    'paged'          => $paged,
    'orderby'        => 'date',
    'order'          => $sort === 'oldest' ? 'ASC' : 'DESC',
];
if ($current_term) {
    $args['tax_query'] = [[
        'taxonomy' => 'danh_muc_tuyen_dung',
        'field'    => 'slug',
        'terms'    => $current_term,
    ]];
}
if ($search) {
    $args['s'] = $search;
}

$time_ago_vi = function ($timestamp) {
    $diff = current_time('timestamp') - $timestamp;
    if ($diff < 60)       return 'vừa xong';
    if ($diff < 3600)     return floor($diff / 60) . ' phút trước';
    if ($diff < 86400)    return floor($diff / 3600) . ' giờ trước';
    if ($diff < 2592000)  return floor($diff / 86400) . ' ngày trước';
    if ($diff < 31536000) return floor($diff / 2592000) . ' tháng trước';
    return floor($diff / 31536000) . ' năm trước';
};

$query = new WP_Query($args);
$jobs = [];
while ($query->have_posts()) {
    $query->the_post();
    $jobs[] = [
        'status'   => get_field('td_status')    ?: 'open',
        'title'    => get_the_title(),
        'salary'   => get_field('td_salary')    ?: '',
        'type'     => get_field('td_work_type') ?: 'Toàn thời gian',
        'location' => get_field('td_location')  ?: '',
        'posted'   => 'Đã đăng ' . $time_ago_vi(get_the_time('U')),
        'url'      => get_permalink(),
    ];
}
wp_reset_postdata();

$data = compact('title', 'title_span', 'categories', 'jobs');

?>

<section id="tuyen-dung-list" class="section-tuyen-dung-list py-(--pd-sc) bg-[#f4f5f8]">
    <div class="container">

        <h2 class="title-main text-center mb-16 max-md:mb-10">
            <?php echo esc_html($data['title']); ?> <span><?php echo esc_html($data['title_span']); ?></span>
        </h2>

        <div class="flex gap-8 items-start max-lg:flex-col">

            <!-- Sidebar danh mục -->
            <div class="w-70 shrink-0 max-lg:w-full max-lg:flex max-lg:flex-wrap max-lg:gap-2">
                <?php foreach ($data['categories'] as $cat) :
                    $active = !empty($cat['active']);
                ?>
                    <a href="<?php echo esc_url($cat['url']); ?>"
                        class="flex items-center justify-between py-3 border-b border-[#d9d9d9] last:border-b-0 group max-lg:border max-lg:px-3 max-lg:py-2 max-lg:rounded-sm max-lg:last:border max-sm:px-2.5 <?php echo $active ? 'max-lg:border-pri!' : ''; ?>">
                        <span class="text-[16px] max-sm:text-[13px] leading-normal transition-colors <?php echo $active ? 'font-bold text-pri' : 'font-normal text-[#121214] group-hover:text-pri'; ?>">
                            <?php echo esc_html($cat['name']); ?>
                        </span>
                        <span class="text-[16px] max-sm:text-[13px] leading-normal ml-1 transition-colors <?php echo $active ? 'font-bold text-pri' : 'font-normal text-[#121214] group-hover:text-pri'; ?>">
                            (<?php echo esc_html($cat['count']); ?>)
                        </span>
                    </a>
                <?php endforeach; ?>
            </div>

            <!-- Nội dung bên phải -->
            <div class="flex-1 min-w-0 flex flex-col gap-6">

                <!-- Thanh lọc -->
                <form method="GET" action="<?php echo esc_url($page_url); ?>"
                    class="flex items-center justify-between gap-4 max-sm:flex-col max-sm:items-start">
                    <?php if ($current_term) : ?>
                        <input type="hidden" name="danh-muc" value="<?php echo esc_attr($current_term); ?>">
                    <?php endif; ?>
                    <div class="flex items-center gap-2">
                        <span class="text-[16px] text-[#121214] shrink-0">Lọc theo:</span>
                        <div class="relative">
                            <select name="sort" onchange="this.form.submit()"
                                class="appearance-none h-9 pl-3 pr-8 text-[16px] font-bold text-pri bg-transparent border-0 outline-none cursor-pointer">
                                <option value="newest" <?php selected($sort, 'newest'); ?>>Mới nhất trước</option>
                                <option value="oldest" <?php selected($sort, 'oldest'); ?>>Cũ nhất trước</option>
                            </select>
                            <img src="<?php echo MONA_THEME_PATH_URI; ?>/assets/images/icons/ic-chevron-right.svg"
                                class="w-4 h-4 absolute rotate-90 right-0 top-1/2 -translate-y-1/2 pointer-events-none" alt="">
                        </div>
                    </div>
                    <div class="flex items-center rounded-lg bg-white h-11 overflow-hidden w-63.5 max-sm:w-full">
                        <input type="text" name="keyword"
                            value="<?php echo esc_attr($search); ?>"
                            placeholder="Tên vị trí bạn muốn tìm"
                            class="flex-1 px-3 pr-0 border-none text-[16px] placeholder:text-[#bcbcbc] outline-none bg-transparent min-w-0">
                        <button type="submit" class="w-11 h-11 flex items-center justify-center bg-white shrink-0">
                            <img src="<?php echo MONA_THEME_PATH_URI; ?>/assets/images/icons/ic-search.svg"
                                class="w-4 h-4" alt="">
                        </button>
                    </div>
                </form>

                <!-- Lưới job cards -->
                <?php if (empty($data['jobs'])) : ?>
                    <div class="flex items-center justify-center py-16 bg-white">
                        <p class="text-[16px] text-[#808080]">Hiện chưa có vị trí tuyển dụng nào.</p>
                    </div>
                <?php else : ?>
                    <div class="grid grid-cols-2 gap-4 max-md:grid-cols-1">
                        <?php foreach ($data['jobs'] as $job) : ?>
                            <?php get_template_part('partials/components/card-tuyen-dung', null, $job); ?>
                        <?php endforeach; ?>
                    </div>

                    <?php
                    // ── Pagination ──
                    if ($query->max_num_pages > 1) :
                        $pagi_base = add_query_arg(array_filter([
                            'danh-muc' => $current_term ?: false,
                            'sort'     => $sort !== 'newest' ? $sort : false,
                            'keyword'  => $search ?: false,
                            'td_page'  => '%#%',
                        ]), $page_url);

                        $pagination = paginate_links([
                            'base'      => $pagi_base,
                            'format'    => '',
                            'current'   => $paged,
                            'total'     => $query->max_num_pages,
                            'prev_text' => '<svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M15 18l-6-6 6-6"/></svg>',
                            'next_text' => '<svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M9 18l6-6-6-6"/></svg>',
                            'type'      => 'list',
                            'end_size'  => 1,
                            'mid_size'  => 2,
                        ]);
                    ?>
                        <div class="pagination-tin-tuc mt-2">
                            <?php echo $pagination; ?>
                        </div>
                    <?php endif; ?>

                <?php endif; ?>

            </div>
        </div>

    </div>
</section>

<?php if ($current_term || $search || $sort !== 'newest' || $paged > 1) : ?>
    <script>
        (function() {
            var el = document.getElementById('tuyen-dung-list');
            if (!el) return;

            function doScroll() {
                if (window.lenis) {
                    window.lenis.scrollTo(el, {
                        offset: -80,
                        immediate: false
                    });
                } else {
                    var top = el.getBoundingClientRect().top + window.scrollY - 80;
                    window.scrollTo({
                        top: top,
                        behavior: 'smooth'
                    });
                }
            }

            if (document.readyState === 'complete') {
                doScroll();
            } else {
                window.addEventListener('load', doScroll, {
                    once: true
                });
            }
        })();
    </script>
<?php endif; ?>