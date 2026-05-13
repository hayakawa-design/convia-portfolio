<?php get_header(); ?>

<?php get_template_part('template-parts/breadcrumb'); ?>

<?php while (have_posts()) : the_post(); ?>

<?php
$categories = get_the_terms(get_the_ID(), 'column_category');
?>

<main>
  <article class="p-column-detail">
    <div class="p-column-detail__inner">

      <h1 class="p-column-detail__title"><?php the_title(); ?></h1>

      <?php if (has_post_thumbnail()) : ?>
      <div class="p-column-detail__img">
        <?php the_post_thumbnail('large', ['alt' => get_the_title()]); ?>
      </div>
      <?php endif; ?>

      <div class="p-column-detail__meta">
        <span class="p-column-detail__date"><?php echo get_the_date('Y.m.d'); ?></span>
        <?php if ($categories && !is_wp_error($categories)) : ?>
          <span class="c-column-card__tag"><?php echo esc_html($categories[0]->name); ?></span>
        <?php endif; ?>
      </div>

      <?php
      $toc_data = convia_lab_generate_toc(apply_filters('the_content', get_the_content()));
      ?>
      <div class="p-column-detail__body">
        <?php echo $toc_data['toc']; ?>
        <?php echo $toc_data['content']; ?>
      </div>

      <div class="p-column-detail__back">
        <a href="<?php echo esc_url(get_post_type_archive_link('column_post')); ?>" class="c-btn">
          <span class="c-btn__text">一覧に戻る</span>
          <span class="c-btn__icon" aria-hidden="true"></span>
        </a>
      </div>

    </div>
  </article>
</main>

<?php endwhile; ?>

<?php get_footer(); ?>
