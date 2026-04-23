<?php

/**
 * Template Name: Tin tức
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

<?php get_template_part('partials/sections/tin-tuc/tin-tuc-moi-cap-nhat'); ?>

<?php
get_footer();
