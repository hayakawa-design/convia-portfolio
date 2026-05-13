<?php get_header(); ?>

<?php get_template_part('template-parts/breadcrumb'); ?>

<section class="p-page-fv">
  <h1 class="c-section-heading">
    <span class="c-section-heading__en">News</span>
    <span class="c-section-heading__ja">お知らせ</span>
  </h1>
</section>

<main>
  <?php get_template_part('template-parts/news-list'); ?>

  <?php get_template_part('template-parts/section-contact'); ?>
  <?php get_template_part('template-parts/section-brochure'); ?>
</main>

<?php get_footer(); ?>
