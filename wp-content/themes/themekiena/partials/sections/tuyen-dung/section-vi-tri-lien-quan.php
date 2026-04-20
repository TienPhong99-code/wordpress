<?php
defined('ABSPATH') || exit;

$jobs = $args['jobs'] ?? [];
if (empty($jobs)) return;
?>

<section class="section-vi-tri-lien-quan py-(--pd-sc) bg-[#f4f5f8]">
    <div class="container">

        <h2 class="text-[48px] max-lg:text-[32px] max-md:text-[24px] font-black uppercase tracking-[-0.04em] leading-normal mb-8">
            <span class="text-pri">Vị trí</span> <span class="text-sec">liên quan</span>
        </h2>

        <div class="slideSw slide-vi-tri-lq">
            <div class="swiper rows">
                <div class="swiper-wrapper">
                    <?php foreach ($jobs as $job) : ?>
                        <div class="swiper-slide col col-4 max-xl:w-1/2! max-sm:w-3/4!">
                            <?php get_template_part('partials/components/card-tuyen-dung', null, $job); ?>
                        </div>
                    <?php endforeach; ?>
                </div>

                <div class="swiper-pagination mt-6"></div>
            </div>
        </div>

    </div>
</section>