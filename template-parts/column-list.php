<?php
$column_categorys = get_terms(['taxonomy' => 'column_category', 'hide_empty' => false]);
?>
<section class="p-column">
  <div class="p-column__inner">

    <div class="p-column__filter">
      <span class="p-column__filter-label">Category</span>
      <div class="p-column__filter-cats">
        <a href="<?php echo esc_url(get_post_type_archive_link('column_post')); ?>"
           class="p-column__filter-btn<?php echo is_post_type_archive('column_post') ? ' is-active' : ''; ?>">すべて</a>
        <?php if ($column_categorys && !is_wp_error($column_categorys)) : ?>
          <?php foreach ($column_categorys as $cat) : ?>
          <a href="<?php echo esc_url(get_term_link($cat)); ?>"
             class="p-column__filter-btn<?php echo is_tax('column_category', $cat->slug) ? ' is-active' : ''; ?>">
            <?php echo esc_html($cat->name); ?>
          </a>
          <?php endforeach; ?>
        <?php endif; ?>
      </div>
    </div>

    <div class="p-column__grid">
      <?php if (have_posts()) : ?>
        <?php while (have_posts()) : the_post(); ?>
        <a href="<?php the_permalink(); ?>" class="c-column-card">
          <div class="c-column-card__img">
            <?php if (has_post_thumbnail()) : ?>
              <?php the_post_thumbnail('large', ['alt' => get_the_title()]); ?>
            <?php endif; ?>
          </div>
          <div class="c-column-card__body">
            <div class="c-column-card__meta">
              <?php
              $terms = get_the_terms(get_the_ID(), 'column_category');
              if ($terms && !is_wp_error($terms)) :
              ?>
              <span class="c-column-card__tag"><?php echo esc_html($terms[0]->name); ?></span>
              <?php endif; ?>
              <span class="c-column-card__date"><?php echo get_the_date('Y.m.d'); ?></span>
            </div>
            <p class="c-column-card__title"><?php the_title(); ?></p>
          </div>
        </a>
        <?php endwhile; ?>
      <?php else : ?>
        <p class="p-column__empty">記事がありません。</p>
      <?php endif; ?>
    </div>

    <?php get_template_part('template-parts/pagination'); ?>

  </div>
</section>
