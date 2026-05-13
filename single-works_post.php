<?php get_header(); ?>

<?php get_template_part('template-parts/breadcrumb'); ?>

<?php while (have_posts()) : the_post(); ?>

<?php
$works_url       = get_field('works_url');
$works_direction = get_field('works_direction');
$works_design    = get_field('works_design');
$works_coding    = get_field('works_coding');
$categories      = get_the_terms(get_the_ID(), 'works_category');

$raw_images = [
    get_field('works_images1'),
    get_field('works_images2'),
    get_field('works_images3'),
];
$works_images = array_filter($raw_images);
?>

<main>
  <section class="p-works-detail">

    <!-- 左パネル：テキスト -->
    <div class="p-works-detail__text">
      <div class="p-works-detail__inner">
        <div class="p-works-detail__header">
          <?php if ($categories && !is_wp_error($categories)) : ?>
            <span class="p-works-detail__tag"><?php echo esc_html($categories[0]->name); ?></span>
          <?php endif; ?>
          <h1 class="p-works-detail__title"><?php the_title(); ?></h1>
        </div>

        <div class="p-works-detail__desc"><?php the_content(); ?></div>

        <?php if ($works_url) : ?>
        <div class="p-works-detail__url">
          <span class="p-works-detail__url-label">URL</span>
          <a href="<?php echo esc_url($works_url); ?>" class="p-works-detail__url-link" target="_blank" rel="noopener noreferrer"><?php echo esc_html($works_url); ?></a>
        </div>
        <?php endif; ?>

        <?php if ($works_direction || $works_design || $works_coding) : ?>
        <div class="p-works-detail__members">
          <p class="p-works-detail__members-title">制作メンバー</p>
          <?php if ($works_direction) : ?>
            <p class="p-works-detail__member">ディレクション：<?php echo esc_html($works_direction); ?></p>
          <?php endif; ?>
          <?php if ($works_design) : ?>
            <p class="p-works-detail__member">デザイン：<?php echo esc_html($works_design); ?></p>
          <?php endif; ?>
          <?php if ($works_coding) : ?>
            <p class="p-works-detail__member">コーディング：<?php echo esc_html($works_coding); ?></p>
          <?php endif; ?>
        </div>
        <?php endif; ?>
      </div>
    </div>

    <!-- 右パネル：画像スライダー -->
    <?php if (!empty($works_images)) : ?>
    <div class="p-works-detail__images">
      <div class="p-works-detail__slider">
        <?php foreach ($works_images as $image) : ?>
          <div class="p-works-detail__slide">
            <?php if (is_array($image)) : ?>
              <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt'] ?: get_the_title()); ?>" />
            <?php elseif (is_numeric($image)) : ?>
              <?php echo wp_get_attachment_image($image, 'large'); ?>
            <?php else : ?>
              <img src="<?php echo esc_url($image); ?>" alt="<?php echo esc_attr(get_the_title()); ?>" />
            <?php endif; ?>
          </div>
        <?php endforeach; ?>
      </div>
    </div>
    <?php endif; ?>

  </section>

  <!-- 関連実績 -->
  <section class="p-works-related">
    <div class="p-works-related__inner">
      <h2 class="c-section-heading">
        <span class="c-section-heading__en">WORKS</span>
        <span class="c-section-heading__ja">実績</span>
      </h2>
      <div class="p-works-related__list">
        <?php
        $related_query = new WP_Query([
          'post_type'      => 'works_post',
          'posts_per_page' => 3,
          'post__not_in'   => [get_the_ID()],
          'orderby'        => 'rand',
        ]);
        if ($related_query->have_posts()) :
          while ($related_query->have_posts()) : $related_query->the_post();
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
          endwhile;
          wp_reset_postdata();
        endif;
        ?>
      </div>
      <a href="<?php echo get_post_type_archive_link('works_post'); ?>" class="c-btn">
        <span class="c-btn__text">他の制作実績を見る</span>
        <span class="c-btn__icon" aria-hidden="true"></span>
      </a>
    </div>
  </section>

  <?php get_template_part('template-parts/section-contact'); ?>
  <?php get_template_part('template-parts/section-brochure'); ?>
</main>

<?php endwhile; ?>

<?php get_footer(); ?>
