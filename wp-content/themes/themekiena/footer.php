<?php

/**
 * The template for displaying footer.
 *
 * @package MONA.Media / Website
 */

if (!defined('ABSPATH')) {
    die();
}

?>
</main>

<?php get_template_part('partials/sections/footer'); ?>

<?php
// Modals — render ở body level, trên mọi z-index
if (is_singular('tuyen_dung')) {
    get_template_part('partials/modals/modal-ung-tuyen');
}
?>

<?php wp_footer(); ?>
</body>

</html>