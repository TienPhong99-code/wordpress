<?php

/**
 * Template Name: Dự án
 *
 * @author MONA.Retail / Website
 */
defined('ABSPATH') || exit;

get_header();

get_template_part('partials/sections/projects/section-hero', null, [
    'title'    => 'DỰ ÁN',
    'desc_red' => 'Tất cả lĩnh vực hoạt động của Tập đoàn đều hướng đến tầm nhìn dài hạn:',
    'desc'     => 'kiến tạo giá trị bền vững và góp phần thúc đẩy sự phát triển của các khu đô thị hiện đại.',
    'image_id' => get_field('hero_image') ?: 0,
]);

get_template_part('partials/sections/projects/section-categories');

get_footer();
