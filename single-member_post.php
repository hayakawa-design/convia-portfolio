<?php get_header(); ?>

<?php get_template_part('template-parts/breadcrumb'); ?>

<?php while (have_posts()) : the_post(); ?>
<?php
$post_id       = get_the_ID();
$categories    = get_the_terms($post_id, 'member_category');
$skills        = get_the_terms($post_id, 'member_skill');
$portfolio_url = get_field('member_portfolio_url');
$other_url     = get_field('member_other_url');
$cover_image   = get_field('member_cover_image');
$about_url     = get_permalink(get_page_by_path('about-us')) ?: home_url('/about-us/');
?>

<main>
  <div class="p-member-detail-page">

    <!-- カバー画像 -->
    <?php if ($cover_image) : ?>
    <div class="p-member-detail-cover">
      <?php if (is_array($cover_image)) : ?>
        <img src="<?php echo esc_url($cover_image['url']); ?>" alt="" class="p-member-detail-cover__img" />
      <?php else : ?>
        <img src="<?php echo esc_url(wp_get_attachment_url($cover_image)); ?>" alt="" class="p-member-detail-cover__img" />
      <?php endif; ?>
    </div>
    <?php endif; ?>

    <section class="p-member-detail">
      <div class="p-member-detail__inner">

        <article class="p-member-detail__card">

          <!-- プロフィール上部（写真 + 情報） -->
          <div class="p-member-detail__profile">
            <div class="p-member-detail__photo">
              <?php if (has_post_thumbnail()) : ?>
                <?php the_post_thumbnail('large', ['alt' => get_the_title()]); ?>
              <?php endif; ?>
            </div>
            <div class="p-member-detail__info">
              <p class="p-member-detail__name"><?php the_title(); ?></p>
              <div class="p-member-detail__tags">
                <?php if ($categories && !is_wp_error($categories)) : ?>
                <div class="p-member-detail__cats">
                  <?php foreach ($categories as $cat) : ?>
                  <span class="p-member-detail__cat"><?php echo esc_html($cat->name); ?></span>
                  <?php endforeach; ?>
                </div>
                <?php endif; ?>
                <?php if ($skills && !is_wp_error($skills)) : ?>
                <div class="p-member-detail__skills">
                  <?php foreach ($skills as $skill) : ?>
                  <span class="p-member-detail__skill"><?php echo esc_html($skill->name); ?></span>
                  <?php endforeach; ?>
                </div>
                <?php endif; ?>
              </div>
              <?php if ($portfolio_url || $other_url) : ?>
              <div class="p-member-detail__links">
                <?php if ($portfolio_url) : ?>
                <a href="<?php echo esc_url($portfolio_url); ?>" class="p-member-detail__link" target="_blank" rel="noopener noreferrer">ポートフォリオ</a>
                <?php endif; ?>
                <?php if ($other_url) : ?>
                <a href="<?php echo esc_url($other_url); ?>" class="p-member-detail__link" target="_blank" rel="noopener noreferrer">URL</a>
                <?php endif; ?>
              </div>
              <?php endif; ?>
            </div>
          </div>

          <!-- 本文 -->
          <?php if (get_the_content()) : ?>
          <div class="p-member-detail__body">
            <?php the_content(); ?>
          </div>
          <?php endif; ?>

        </article>

        <div class="p-member-detail__back">
          <a href="<?php echo esc_url($about_url); ?>" class="c-btn">
            <span class="c-btn__text">一覧に戻る</span>
            <span class="c-btn__icon" aria-hidden="true"></span>
          </a>
        </div>

      </div>
    </section>

  </div>

  <?php get_template_part('template-parts/section-contact'); ?>
  <?php get_template_part('template-parts/section-brochure'); ?>
</main>

<?php endwhile; ?>

<?php get_footer(); ?>
