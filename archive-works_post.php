<?php get_header(); ?>

<nav class="c-breadcrumb" aria-label="パンくずリスト">
  <ol class="c-breadcrumb__list">
    <li class="c-breadcrumb__item">
      <a href="<?php echo home_url('/'); ?>" class="c-breadcrumb__link">TOP</a>
    </li>
    <li class="c-breadcrumb__sep" aria-hidden="true">｜</li>
    <li class="c-breadcrumb__item" aria-current="page">Works</li>
  </ol>
</nav>

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

      <?php
      $total_pages   = $GLOBALS['wp_query']->max_num_pages;
      $current_page  = max(1, get_query_var('paged'));

      if ($total_pages > 1) :
        $window = 5;
        $start  = max(1, $current_page - 2);
        $end    = min($total_pages, $start + $window - 1);
        if ($end - $start < $window - 1) {
          $start = max(1, $end - $window + 1);
        }
      ?>
      <nav class="c-pagination" aria-label="ページネーション">

        <?php if ($current_page > 1) : ?>
          <a href="<?php echo get_pagenum_link($current_page - 1); ?>" class="c-pagination__prev" aria-label="前のページ"></a>
        <?php endif; ?>

        <ul class="c-pagination__list">
          <?php for ($i = $start; $i <= $end; $i++) : ?>
            <li>
              <a
                href="<?php echo get_pagenum_link($i); ?>"
                class="c-pagination__item<?php echo $i === $current_page ? ' is-active' : ''; ?>"
                <?php echo $i === $current_page ? 'aria-current="page"' : ''; ?>
              ><?php echo $i; ?></a>
            </li>
          <?php endfor; ?>
        </ul>

        <?php if ($current_page < $total_pages) : ?>
          <a href="<?php echo get_pagenum_link($current_page + 1); ?>" class="c-pagination__next" aria-label="次のページ"></a>
        <?php endif; ?>

      </nav>
      <?php endif; ?>

      <a href="<?php echo home_url('/'); ?>" class="c-btn">
        <span class="c-btn__text">戻る</span>
        <span class="c-btn__icon" aria-hidden="true"></span>
      </a>

    </div>
  </section>
</main>

<?php get_footer(); ?>
