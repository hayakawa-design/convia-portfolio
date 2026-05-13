<?php
$active_cat   = is_category() ? get_queried_object() : null;
$news_page_url = get_permalink(get_option('page_for_posts')) ?: home_url('/news/');
?>

<div class="p-news-list__wave" aria-hidden="true">
  <svg class="p-news-list__wave-svg--sp" viewBox="0 0 395 27" preserveAspectRatio="none" fill="none" xmlns="http://www.w3.org/2000/svg">
    <path d="M385 14.8904C337.98 3.65376 218.49 -12.0776 116.689 14.8904C98.1126 20.3592 50.7682 28.0155 10 14.8904V26.0417H385V14.8904Z" fill="#D4E3E8"/>
  </svg>
  <svg class="p-news-list__wave-svg--pc" viewBox="0 0 1440 100" preserveAspectRatio="none" fill="none" xmlns="http://www.w3.org/2000/svg">
    <path d="M1440 57.1792C1259.44 14.0304 800.602 -46.3778 409.685 57.1792C338.352 78.1792 156.55 107.579 0 57.1792V100H1440V57.1792Z" fill="#D4E3E8"/>
  </svg>
</div>

<section class="p-news-list">
  <div class="p-news-list__inner">

    <div class="p-news-list__filter">

      <!-- カテゴリフィルター（WordPressのカテゴリーに連動） -->
      <div class="p-news-list__filter-group">
        <span class="p-news-list__filter-label">Category</span>
        <div class="p-news-list__cat-buttons">
          <a href="<?php echo esc_url($news_page_url); ?>"
             class="p-news-list__cat-btn<?php echo (!$active_cat && !is_date()) ? ' is-active' : ''; ?>">
            すべて
          </a>
          <?php
          $categories = get_categories(['hide_empty' => true, 'orderby' => 'name', 'order' => 'ASC']);
          foreach ($categories as $cat) :
          ?>
            <a href="<?php echo esc_url(get_category_link($cat->term_id)); ?>"
               class="p-news-list__cat-btn<?php echo ($active_cat && $active_cat->term_id == $cat->term_id) ? ' is-active' : ''; ?>">
              <?php echo esc_html($cat->name); ?>
            </a>
          <?php endforeach; ?>
        </div>
      </div>

      <!-- 年月アーカイブフィルター -->
      <div class="p-news-list__filter-group">
        <span class="p-news-list__filter-label">Archive</span>
        <div class="p-news-list__archive">
          <select class="p-news-list__archive-select" aria-label="年月日から選択"
                  onchange="if(this.value) window.location.href=this.value;">
            <option value=""<?php echo !is_date() ? ' selected' : ''; ?> disabled>年月日から選択</option>
            <?php wp_get_archives(['type' => 'monthly', 'format' => 'option']); ?>
          </select>
        </div>
      </div>

    </div>

    <!-- ニュースカードリスト -->
    <ul class="p-news-list__cards">
      <?php if (have_posts()) : ?>
        <?php while (have_posts()) : the_post(); ?>
          <?php $cats = get_the_category(); ?>
          <li>
            <a href="<?php the_permalink(); ?>" class="c-news-card">
              <div class="c-news-card__img">
                <?php if (has_post_thumbnail()) : ?>
                  <?php the_post_thumbnail('large', ['alt' => get_the_title()]); ?>
                <?php endif; ?>
              </div>
              <div class="c-news-card__body">
                <?php if ($cats) : ?>
                  <span class="c-news-card__tag"><?php echo esc_html($cats[0]->name); ?></span>
                <?php endif; ?>
                <p class="c-news-card__title"><?php the_title(); ?></p>
                <p class="c-news-card__date"><?php echo get_the_date('Y.m.d'); ?></p>
                <p class="c-news-card__text"><?php echo wp_trim_words(wp_strip_all_tags(get_the_content()), 40); ?></p>
              </div>
            </a>
          </li>
        <?php endwhile; ?>
      <?php else : ?>
        <li class="p-news-list__empty">該当する記事がありません。</li>
      <?php endif; ?>
    </ul>

    <?php get_template_part('template-parts/pagination'); ?>

  </div>
</section>
