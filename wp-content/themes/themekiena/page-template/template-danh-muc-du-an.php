<?php

/**
 * Template Name: Danh mục dự án
 *
 * @author MONA.Retail / Website
 */

defined('ABSPATH') || exit;

get_header();
?>

<div class="relative z-2">
    <?php get_template_part('partials/components/breadcrumb', null, [
        'links' => [
            ['title' => 'Trang chủ', 'url' => home_url('/'), 'is-active' => false],
            ['title' => get_the_title(), 'url' => '', 'is-active' => true],
        ],
    ]); ?>
</div>

<?php get_template_part('partials/sections/danh-muc-du-an/section', 'hero'); ?>
<?php get_template_part('partials/sections/danh-muc-du-an/section', 'categories'); ?>

<?php
get_footer();
