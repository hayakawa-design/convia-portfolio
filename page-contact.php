<?php
/*
 * Template Name: Contact
 */
get_header();
$cf7_id = get_option('convia_cf7_contact_id');
if (!$cf7_id) {
    $forms = get_posts([
        'post_type'      => 'wpcf7_contact_form',
        'post_status'    => 'publish',
        'posts_per_page' => 1,
        'title'          => 'Contact',
    ]);
    if (!empty($forms)) {
        $cf7_id = $forms[0]->ID;
        update_option('convia_cf7_contact_id', $cf7_id);
    }
}
?>

<?php get_template_part('template-parts/breadcrumb'); ?>

<section class="p-page-fv">
  <h1 class="c-section-heading">
    <span class="c-section-heading__en">Contact</span>
    <span class="c-section-heading__ja">お問い合わせ</span>
  </h1>
</section>

<main>
  <section class="p-contact">
    <div class="p-contact__inner">

      <p class="p-contact__lead">
        制作や協業に関するご相談は、こちらのフォームからお気軽にお問い合わせください。<br />
        内容を確認の上、2〜3営業日以内にご返信いたします。
      </p>

      <?php if ($cf7_id) : ?>
        <?php echo do_shortcode('[contact-form-7 id="' . esc_attr($cf7_id) . '" title="Contact"]'); ?>
      <?php else : ?>
        <p style="color:#999;font-size:14px;">（管理画面をリロードするとフォームが自動生成されます）</p>
      <?php endif; ?>

    </div>
  </section>

  <section class="p-contact-info">
    <div class="p-contact-info__inner">

      <div>
        <h2 class="p-contact-info__title">こんなご相談をお待ちしています</h2>
        <ul class="p-contact-info__list">
          <li class="p-contact-info__item">
            <span class="p-contact-info__dot" aria-hidden="true"></span>
            <span class="p-contact-info__item-text">Webサイトの新規制作やリニューアルについて</span>
          </li>
          <li class="p-contact-info__item">
            <span class="p-contact-info__dot" aria-hidden="true"></span>
            <span class="p-contact-info__item-text">デザインのみ、実装のみなど部分的なサポート</span>
          </li>
          <li class="p-contact-info__item">
            <span class="p-contact-info__dot" aria-hidden="true"></span>
            <span class="p-contact-info__item-text">チームでの協業や長期的なパートナーシップ</span>
          </li>
          <li class="p-contact-info__item">
            <span class="p-contact-info__dot" aria-hidden="true"></span>
            <span class="p-contact-info__item-text">既存サイトの改善提案や運用サポート</span>
          </li>
        </ul>
      </div>

      <div class="p-contact-info__note">
        <h2 class="p-contact-info__title">対応できないこと</h2>
        <p class="p-contact-info__note-text">
          申し訳ございませんが、納期が極端に短い案件や、予算が明らかに不足している場合は対応が難しい場合があります。まずはお気軽にご相談ください。
        </p>
      </div>

    </div>
  </section>
</main>

<?php get_footer(); ?>
