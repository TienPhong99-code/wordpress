<?php

/**
 * Template Name: Hoạt động cộng đồng
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

<?php get_template_part('partials/sections/hoat-dong-cong-dong/section-about-hoat-dong'); ?>
<?php get_template_part('partials/sections/hoat-dong-cong-dong/section-hoat-dong'); ?>
<?php get_template_part('partials/sections/hoat-dong-cong-dong/section-hoat-dong-video'); ?>

<?php
get_footer();
