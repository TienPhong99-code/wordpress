<?php

/**
 * Template Name: Giới thiệu
 *
 * @author MONA.Retail / Website
 */

defined('ABSPATH') || exit;

get_header();
?>

<?php get_template_part('partials/sections/about/section-about-info'); ?>
<?php get_template_part('partials/sections/about/section-about-number'); ?>
<?php get_template_part('partials/sections/about/section-about-mission'); ?>
<?php get_template_part('partials/sections/home/section', 'works'); ?>
<?php get_template_part('partials/sections/about/section-about-journey'); ?>
<?php get_template_part('partials/sections/about/section-about-awards'); ?>
<?php get_template_part('partials/sections/home/section', 'partner'); ?>

<?php
get_footer();
