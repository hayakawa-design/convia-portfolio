<?php get_header(); ?>

<?php get_template_part('template-parts/breadcrumb'); ?>

<section class="p-page-fv">
  <h1 class="c-section-heading">
    <span class="c-section-heading__en">WORKS</span>
    <span class="c-section-heading__ja">実績</span>
  </h1>
</section>

<main>
  <section class="p-works-list">
    <div class="p-works-list__inner">

      <div class="p-works-list__grid">
        <?php if (have_posts()) : ?>
          <?php
          $count = 0;
          while (have_posts()) : the_post();
            if ($count % 3 === 0) echo '<div class="p-works-list__row">';
          ?>
          <a href="<?php the_permalink(); ?>" class="c-works-card">
            <div class="c-works-card__img">
              <?php if (has_post_thumbnail()) : ?>
                <?php the_post_thumbnail('large', ['alt' => get_the_title()]); ?>
              <?php endif; ?>
            </div>
            <div class="c-works-card__body">
              <p class="c-works-card__title"><?php the_title(); ?></p>
              <p class="c-works-card__text"><?php echo wp_trim_words(wp_strip_all_tags(get_the_content()), 40); ?></p>
            </div>
          </a>
          <?php
            $count++;
            if ($count % 3 === 0) echo '</div>';
          endwhile;
          if ($count % 3 !== 0) echo '</div>';
          ?>
        <?php endif; ?>
      </div>

      <?php get_template_part('template-parts/pagination'); ?>

      <a href="<?php echo home_url('/'); ?>" class="c-btn">
        <span class="c-btn__text">戻る</span>
        <span class="c-btn__icon" aria-hidden="true"></span>
      </a>

    </div>
  </section>
</main>

<?php get_footer(); ?>
