<?php

/**
 * Template Name: Liên hệ
 */

defined('ABSPATH') || exit;

get_header();

the_title('<h1 class="hide-sitename">', '</h1>');
?>

<?php get_template_part('partials/components/breadcrumb', null, [
    'links' => [
        ['title' => 'Trang chủ', 'url' => home_url('/'), 'is-active' => false],
        ['title' => get_the_title(), 'url' => '', 'is-active' => true],
    ],
]); ?>

<?php get_template_part('partials/sections/lien-he/section-lien-he'); ?>

<?php
get_footer();
