<?php get_header(); ?>

<div class="main">
    <div class="container">
        <div class="row">
            <div class="col-10">
                <?php get_template_part('partials/balance-table'); ?>
            </div>
            <div class="col-2">
                <?php get_template_part('partials/sidebar'); ?>
            </div>
        </div>
        <?php get_template_part('partials/summary'); ?>
    </div>
</div>

<?php get_footer(); ?>