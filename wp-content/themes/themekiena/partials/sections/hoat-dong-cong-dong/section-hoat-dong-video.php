<?php
$title      = get_field('video_title')      ?: 'Các';
$title_span = get_field('video_title_span') ?: 'Tư liệu';
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

<section class="section-hoat-dong-video relative py-(--pd-sc)">
    <span class="absolute inset-0 bg-[#f4f5f8] z-[-1]"></span>

    <div class="container">

        <h2 class="title-main text-center mb-16">
            <?php echo esc_html($title); ?> <span><?php echo esc_html($title_span); ?></span>
        </h2>

        <div class="relative">
            <div class="row">
                <?php foreach ($videos as $index => $item) :
                    $item_title = $item['video_item_title'] ?? '';
                    $item_url   = $item['video_item_url']   ?? '';
                    $item_thumb = $item['video_item_thumb'] ?? '';
                    $thumb      = kiena_get_video_thumb($item_thumb, $item_url);
                    $title_cls  = 'text-pri hover:text-sec transition-colors';
                ?>
                    <div class="col col-4 max-md:w-1/2!">
                        <div class="flex flex-col gap-2 relative">
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
                            <p class="<?php echo $title_cls; ?> text-[20px] font-bold">
                                <?php echo esc_html($item_title); ?>
                            </p>

                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>

    </div>
</section>