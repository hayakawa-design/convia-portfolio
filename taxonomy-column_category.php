<?php get_header(); ?>

<?php get_template_part('template-parts/breadcrumb'); ?>

<section class="p-page-fv">
  <h1 class="c-section-heading">
    <span class="c-section-heading__en">Column</span>
    <span class="c-section-heading__ja">コラム</span>
  </h1>
</section>

<main>
  <?php get_template_part('template-parts/column-list'); ?>
</main>

<?php get_footer(); ?>
