<?php get_header(); ?>

<?php while (have_posts()) : the_post(); ?>

<?php get_template_part('template-parts/breadcrumb'); ?>

<div class="p-news-detail__fv" aria-hidden="true"></div>

<div class="p-news-detail__wave" aria-hidden="true">
  <svg class="p-news-detail__wave-svg--sp" viewBox="0 0 375 32" preserveAspectRatio="none" fill="none" xmlns="http://www.w3.org/2000/svg">
    <path d="M0 16.9535C33.1923 27.742 118.4 42.8459 193.691 16.9535C224.31 6.69936 303.438 -7.65641 375 16.9535V0H0V16.9535Z" fill="#D4E3E8"/>
  </svg>
  <svg class="p-news-detail__wave-svg--pc" viewBox="0 0 1440 100" preserveAspectRatio="none" fill="none" xmlns="http://www.w3.org/2000/svg">
    <path d="M0 42.8208C180.556 85.9696 639.398 146.378 1030.32 42.8208C1101.65 21.8208 1283.45 -7.57934 1440 42.8208V0H0V42.8208Z" fill="#D4E3E8"/>
  </svg>
</div>

<main>
  <section class="p-news-detail">
    <div class="p-news-detail__inner">
      <article class="p-news-detail__card">

        <header class="p-news-detail__header">
          <div class="p-news-detail__meta">
            <time class="p-news-detail__date" datetime="<?php echo get_the_date('Y-m-d'); ?>">
              <?php echo get_the_date('Y.m.d'); ?>
            </time>
            <?php
            $cats = get_the_category();
            if ($cats) :
            ?>
              <span class="p-news-detail__tag"><?php echo esc_html($cats[0]->name); ?></span>
            <?php endif; ?>
          </div>
          <h1 class="p-news-detail__title"><?php the_title(); ?></h1>
        </header>

        <?php if (has_post_thumbnail()) : ?>
        <div class="p-news-detail__img">
          <?php the_post_thumbnail('large', ['alt' => get_the_title()]); ?>
        </div>
        <?php endif; ?>

        <div class="p-news-detail__body">
          <?php the_content(); ?>
        </div>

      </article>

      <a href="<?php echo get_permalink(get_option('page_for_posts')); ?>" class="c-btn">
        <span class="c-btn__text">一覧に戻る</span>
        <span class="c-btn__icon" aria-hidden="true"></span>
      </a>

    </div>
  </section>
</main>

<?php endwhile; ?>

<?php get_footer(); ?>
