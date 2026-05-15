<?php
/*
 * Template Name: About
 */
get_header();
?>

<?php get_template_part('template-parts/breadcrumb'); ?>

<section class="p-page-fv">
  <h1 class="c-section-heading">
    <span class="c-section-heading__en">About us</span>
    <span class="c-section-heading__ja">私たちについて</span>
  </h1>
</section>

<main>

  <!-- Why Team 上部ウェーブ -->
  <div class="p-about-wave p-about-wave--why-top" aria-hidden="true">
    <svg class="p-about-wave__svg--sp" viewBox="0 0 375 32" preserveAspectRatio="none" fill="none" xmlns="http://www.w3.org/2000/svg">
      <path d="M375 14.2965C341.808 3.50803 256.6 -11.5959 181.309 14.2965C150.69 24.5506 71.5623 38.9064 0 14.2965V31.25H375V14.2965Z" fill="#D4E3E8"/>
    </svg>
    <svg class="p-about-wave__svg--pc" viewBox="0 0 1440 120" preserveAspectRatio="none" fill="none" xmlns="http://www.w3.org/2000/svg">
      <path d="M1440 54.8987C1312.54 13.4708 985.345 -44.5281 696.225 54.8987C578.65 94.2745 274.799 149.401 0 54.8987V120H1440V54.8987Z" fill="#D4E3E8"/>
    </svg>
  </div>

  <!-- Why Team セクション -->
  <section class="p-why-team">
    <div class="p-why-team__inner">
      <p class="p-why-team__lead">私たちのチームについて、大切にしている価値観や働き方をご紹介します。</p>
      <h2 class="p-why-team__title">Why Team</h2>
      <p class="p-why-team__body">Web制作には、企画、デザイン、実装、運用と多様なスキルが必要です。一人で全てを完璧にこなすことは難しく、それぞれの専門性を持ち寄ることで、より高い品質と柔軟な対応が可能になります。</p>
      <p class="p-why-team__body">私たちは、互いの得意分野を活かし合い、クライアントにとって最適な解決策を提供するためにチームとして活動しています。対話を重ね、異なる視点を持ち寄ることで、一人では気づけなかった価値を生み出せると考えています。</p>
    </div>
  </section>

  <!-- Why Team 下部ウェーブ -->
  <div class="p-about-wave p-about-wave--why-bottom" aria-hidden="true">
    <svg class="p-about-wave__svg--sp" viewBox="0 0 375 32" preserveAspectRatio="none" fill="none" xmlns="http://www.w3.org/2000/svg">
      <path d="M0 16.9535C33.1923 27.742 118.4 42.8459 193.691 16.9535C224.31 6.69936 303.438 -7.65641 375 16.9535V0H0V16.9535Z" fill="#D4E3E8"/>
    </svg>
    <svg class="p-about-wave__svg--pc" viewBox="0 0 1440 120" preserveAspectRatio="none" fill="none" xmlns="http://www.w3.org/2000/svg">
      <path d="M0 65.1013C127.458 106.529 454.655 164.528 743.775 65.1013C861.35 25.7255 1165.2 -29.4006 1440 65.1013V0H0V65.1013Z" fill="#D4E3E8"/>
    </svg>
  </div>

  <!-- Our Philosophy セクション -->
  <section class="p-philosophy">
    <div class="p-philosophy__inner">
      <h2 class="p-philosophy__title">Our Philosophy</h2>
      <div class="p-philosophy__items">
        <div class="p-philosophy__item">
          <h3 class="p-philosophy__item-title">本質的な価値を届ける</h3>
          <p class="p-philosophy__item-body">見た目の美しさだけでなく、ユーザーにとって本当に必要な体験を設計し、ビジネスの成果につながる制作を目指します。</p>
        </div>
        <div class="p-philosophy__item">
          <h3 class="p-philosophy__item-title">誠実なコミュニケーション</h3>
          <p class="p-philosophy__item-body">クライアントとの対話を大切にし、課題の本質を理解した上で、最適な提案を行います。納期や予算についても誠実に向き合います。</p>
        </div>
        <div class="p-philosophy__item">
          <h3 class="p-philosophy__item-title">継続的な改善</h3>
          <p class="p-philosophy__item-body">公開して終わりではなく、データや反応をもとに改善を重ね、より良い状態を目指します。長期的なパートナーとして伴走します。</p>
        </div>
      </div>
      <div class="p-philosophy__img">
        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/about-img.jpg" alt="" />
      </div>
    </div>
  </section>

  <!-- Philosophy 下部ウェーブ -->
  <div class="p-about-wave p-about-wave--phil-bottom" aria-hidden="true">
    <svg class="p-about-wave__svg--sp" viewBox="0 0 375 32" preserveAspectRatio="none" fill="none" xmlns="http://www.w3.org/2000/svg">
      <path d="M375 14.2965C341.808 3.50803 256.6 -11.5959 181.309 14.2965C150.69 24.5506 71.5623 38.9064 0 14.2965V31.25H375V14.2965Z" fill="#D4E3E8"/>
    </svg>
    <svg class="p-about-wave__svg--pc" viewBox="0 0 1440 100" preserveAspectRatio="none" fill="none" xmlns="http://www.w3.org/2000/svg">
      <path d="M1440 57.1792C1259.44 14.0304 800.602 -46.3778 409.685 57.1792C338.352 78.1792 156.55 107.579 0 57.1792V100H1440V57.1792Z" fill="#D4E3E8"/>
    </svg>
  </div>

  <!-- Member セクション -->
  <section class="p-member">
    <div class="p-member__inner">

      <h2 class="p-member__title">Member</h2>
      <p class="p-member__desc">それぞれの専門性を持ち寄り、協力しながらプロジェクトを進めています。</p>

      <?php
      $all_cats   = get_terms(['taxonomy' => 'member_category', 'hide_empty' => false]);
      $all_skills = get_terms(['taxonomy' => 'member_skill',    'hide_empty' => false]);
      ?>

      <!-- カテゴリ絞り込みパネル -->
      <div class="p-member__filter">
        <span class="p-member__filter-label">Category</span>
        <div class="p-member__filter-body">
          <div class="p-member__filter-cats">
            <button class="p-member__cat-btn is-active" type="button" data-cat="">すべて</button>
            <?php if ($all_cats && !is_wp_error($all_cats)) : ?>
              <?php foreach ($all_cats as $cat) : ?>
              <button class="p-member__cat-btn" type="button" data-cat="<?php echo esc_attr($cat->name); ?>">
                <?php echo esc_html($cat->name); ?>
              </button>
              <?php endforeach; ?>
            <?php endif; ?>
          </div>
          <?php if ($all_skills && !is_wp_error($all_skills)) : ?>
          <div class="p-member__filter-skills js-filter-skills">
            <?php foreach ($all_skills as $skill) : ?>
            <button class="p-member__skill-tag" type="button" data-skill="<?php echo esc_attr($skill->name); ?>">
              <?php echo esc_html($skill->name); ?>
            </button>
            <?php endforeach; ?>
          </div>
          <?php endif; ?>
          <button class="p-member__filter-toggle js-member-filter-toggle" type="button" aria-expanded="false" aria-label="フィルターを開閉"></button>
        </div>
      </div>

      <!-- メンバーカードグリッド -->
      <?php
      $member_query = new WP_Query([
        'post_type'      => 'member_post',
        'posts_per_page' => -1,
        'orderby'        => 'menu_order',
        'order'          => 'ASC',
      ]);
      ?>
      <div class="p-member__grid">
        <?php if ($member_query->have_posts()) : ?>
          <?php while ($member_query->have_posts()) : $member_query->the_post(); ?>
          <?php
          $post_id      = get_the_ID();
          $post_cats    = get_the_terms($post_id, 'member_category');
          $post_skills  = get_the_terms($post_id, 'member_skill');
          $cat_names    = ($post_cats   && !is_wp_error($post_cats))   ? array_map(fn($t) => $t->name, $post_cats)   : [];
          $skill_names  = ($post_skills && !is_wp_error($post_skills)) ? array_map(fn($t) => $t->name, $post_skills) : [];
          ?>
          <a class="c-member-card"
             href="<?php the_permalink(); ?>"
             data-cats="<?php echo esc_attr(implode(',', $cat_names)); ?>"
             data-skills="<?php echo esc_attr(implode(',', $skill_names)); ?>">
            <div class="c-member-card__photo">
              <?php if (has_post_thumbnail()) : ?>
                <?php the_post_thumbnail('medium', ['alt' => get_the_title()]); ?>
              <?php endif; ?>
            </div>
            <div class="c-member-card__info">
              <p class="c-member-card__name"><?php the_title(); ?></p>
              <div class="c-member-card__tag-group">
                <div class="c-member-card__cats">
                  <?php foreach ($cat_names as $name) : ?>
                  <span class="c-member-card__tag"><?php echo esc_html($name); ?></span>
                  <?php endforeach; ?>
                </div>
                <?php if (!empty($skill_names)) : ?>
                <button class="c-member-card__tag-toggle js-member-tag-toggle" type="button" aria-expanded="false" aria-label="スキルタグを展開する">
                  <svg class="c-member-card__tag-toggle-icon" width="26" height="12" viewBox="0 0 26 12" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                    <path d="M1 1L13 11L25 1" stroke="#7a9ba8" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"/>
                  </svg>
                </button>
                <div class="c-member-card__skills">
                  <?php foreach ($skill_names as $skill) : ?>
                  <span class="c-member-card__tag"><?php echo esc_html($skill); ?></span>
                  <?php endforeach; ?>
                </div>
                <?php endif; ?>
              </div>
              <?php $bio = get_the_excerpt(); ?>
              <?php if ($bio) : ?>
              <p class="c-member-card__bio"><?php echo esc_html($bio); ?></p>
              <?php endif; ?>
            </div>
          </a>
          <?php endwhile; ?>
          <?php wp_reset_postdata(); ?>
        <?php endif; ?>
      </div>

    </div>
  </section>

  <?php get_template_part('template-parts/section-contact'); ?>
  <?php get_template_part('template-parts/section-brochure'); ?>

</main>

<?php get_footer(); ?>
