<?php

/**
 * Template Name: Tuyển dụng
 *
 * @author MONA.Retail / Website
 */

defined('ABSPATH') || exit;

get_header();
?>

<?php get_template_part('partials/components/breadcrumb', null, [
    'links' => [
        ['title' => 'Trang chủ', 'url' => home_url('/'), 'is-active' => false],
        ['title' => get_the_title(), 'url' => '', 'is-active' => true],
    ],
]); ?>

<?php get_template_part('partials/sections/tuyen-dung/section-tuyen-dung-info'); ?>
<?php get_template_part('partials/sections/tuyen-dung/section-tuyen-dung-list'); ?>

<?php
get_footer();
