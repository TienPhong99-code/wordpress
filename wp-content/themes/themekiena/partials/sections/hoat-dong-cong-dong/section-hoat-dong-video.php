<?php
$title      = get_field('video_title')      ?: 'VIDEO';
$title_span = get_field('video_title_span') ?: '';
$videos = get_field('videos') ?: [];

/**
 * Trích video ID từ YouTube URL để lấy thumbnail tự động.
 */
function kiena_get_youtube_id(string $url): string
{
    preg_match('/(?:youtube\.com\/(?:watch\?v=|embed\/|shorts\/)|youtu\.be\/)([A-Za-z0-9_-]{11})/', $url, $m);
    return $m[1] ?? '';
}

/**
 * Trả về thumb URL: ưu tiên thumb tự nhập, fallback YouTube hqdefault.
 */
function kiena_get_video_thumb(string $thumb, string $video): string
{
    if ($thumb) return $thumb;
    $yt_id = kiena_get_youtube_id($video);
    if ($yt_id) return "https://img.youtube.com/vi/{$yt_id}/hqdefault.jpg";
    return '';
}
?>

<section class="section-hoat-dong-video relative py-(--pd-sc) slideSw">


    <div class="container">

        <!-- Header: tiêu đề + nav -->
        <div class="flex items-center justify-between mb-8">
            <h2 class="title-main">
                <?php echo esc_html($title); ?> <span><?php echo esc_html($title_span); ?></span>
            </h2>
            <div class="flex gap-1 shrink-0">
                <button class="swiper-prev tts-btn w-8 h-8 md:w-11! md:h-11! rounded-full flex items-center justify-center shrink-0 transition" aria-label="Trước">
                    <svg width="16" height="16" viewBox="0 0 16 16" fill="none">
                        <path d="M5 8c0 .128.049.256.146.354l5 5a.5.5 0 0 0 .708-.708L6.207 8l4.647-4.646a.5.5 0 1 0-.708-.708l-5 5A.497.497 0 0 0 5 8Z" fill="#283377" />
                    </svg>
                </button>
                <button class="swiper-next tts-btn w-8 h-8 md:w-11! md:h-11! rounded-full flex items-center justify-center shrink-0 transition" aria-label="Tiếp theo">
                    <svg width="16" height="16" viewBox="0 0 16 16" fill="none">
                        <path d="M11 8a.497.497 0 0 0-.146-.354l-5-5a.5.5 0 1 0-.708.708L9.793 8l-4.647 4.646a.5.5 0 0 0 .708.708l5-5A.497.497 0 0 0 11 8Z" fill="#283377" />
                    </svg>
                </button>
            </div>
        </div>

        <!-- Slider -->
        <div class="relative">
            <div class="swiper rows">
                <div class="swiper-wrapper">
                    <?php foreach ($videos as $index => $item) :
                        $item_title = $item['video_item_title'] ?? '';
                        $item_url   = $item['video_item_url']   ?? '';
                        $item_thumb = $item['video_item_thumb'] ?? '';
                        $thumb      = kiena_get_video_thumb($item_thumb, $item_url);

                    ?>
                        <div class="swiper-slide col col-4 max-md:w-1/2! max-sm:w-2/3!">
                            <div class="flex flex-col gap-2 relative text-pri hover:text-[#ED1C24] transition-colors">
                                <!-- FancyBox trigger -->
                                <a href="<?php echo esc_url($item_url); ?>"
                                    data-fancybox="videos"
                                    data-caption="<?php echo esc_attr($item_title); ?>"
                                    class="absolute inset-0 z-1"
                                    aria-label="<?php echo esc_attr($item_title); ?>"></a>
                                <!-- Thumbnail + play button -->
                                <div class="relative rounded-lg overflow-hidden bg-pri aspect-video">
                                    <?php if ($thumb) : ?>
                                        <img src="<?php echo esc_url($thumb); ?>"
                                            class="absolute inset-0 w-full h-full object-cover" alt="">
                                    <?php endif; ?>

                                    <!-- Play button overlay -->
                                    <div class="absolute inset-0 flex items-center justify-center">
                                        <div class="w-8 h-8 rounded-full flex items-center justify-center ring-8 ring-[rgba(255,255,255,0.2)]">
                                            <img src="<?php echo MONA_THEME_PATH_URI; ?>/assets/images/icons/ic-play.svg" alt="Play" class="w-full block">
                                        </div>
                                    </div>
                                </div>

                                <!-- Title -->
                                <p class="text-[20px] font-bold">
                                    <?php echo esc_html($item_title); ?>
                                </p>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>

    </div>
</section>