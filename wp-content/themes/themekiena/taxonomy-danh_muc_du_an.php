<?php

/**
 * Template: Taxonomy - Danh mục dự án
 * URL pattern: /du-an/{term-slug}
 *
 * @author MONA.Retail / Website
 */

defined('ABSPATH') || exit;

get_header();
?>

<?php get_template_part('partials/sections/du-an-category/section', 'hero'); ?>
<?php get_template_part('partials/sections/du-an-category/section', 'projects'); ?>

<?php
get_footer();
