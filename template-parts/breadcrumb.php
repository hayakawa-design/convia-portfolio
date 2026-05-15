<?php
$label_map = [
    'works_post'  => ['label' => 'Works',  'url' => get_post_type_archive_link('works_post')],
    'column_post' => ['label' => 'Column', 'url' => get_post_type_archive_link('column_post')],
    'member_post' => ['label' => 'About',  'url' => get_permalink(get_page_by_path('about-us')) ?: home_url('/about-us/')],
    'post'        => ['label' => 'News',   'url' => get_post_type_archive_link('post') ?: home_url('/news/')],
];

$items = [];

if (is_post_type_archive()) {
    $post_type = get_queried_object()->name;
    if (isset($label_map[$post_type])) {
        $items[] = ['label' => $label_map[$post_type]['label'], 'url' => ''];
    }
} elseif (is_tax()) {
    $term    = get_queried_object();
    $tax_map = ['column_category' => 'column_post'];
    if (isset($tax_map[$term->taxonomy], $label_map[$tax_map[$term->taxonomy]])) {
        $items[] = $label_map[$tax_map[$term->taxonomy]];
    }
    $items[] = ['label' => $term->name, 'url' => ''];
} elseif (is_home()) {
    $items[] = ['label' => 'News', 'url' => ''];
} elseif (is_single()) {
    $post_type = get_post_type();
    if (isset($label_map[$post_type])) {
        $items[] = $label_map[$post_type];
    }
    $items[] = ['label' => get_the_title(), 'url' => ''];
} elseif (is_page()) {
    $items[] = ['label' => get_the_title(), 'url' => ''];
}

if (empty($items)) return;

// 通常投稿（News）シングルページは背景色あり
$modifier = (is_single() && get_post_type() === 'post') ? ' c-breadcrumb--cta-bg' : '';
?>
<nav class="c-breadcrumb<?php echo $modifier; ?>" aria-label="パンくずリスト">
  <ol class="c-breadcrumb__list">
    <li class="c-breadcrumb__item">
      <a href="<?php echo home_url('/'); ?>" class="c-breadcrumb__link">TOP</a>
    </li>
    <?php foreach ($items as $item) : ?>
      <li class="c-breadcrumb__sep" aria-hidden="true">｜</li>
      <li class="c-breadcrumb__item"<?php echo empty($item['url']) ? ' aria-current="page"' : ''; ?>>
        <?php if (!empty($item['url'])) : ?>
          <a href="<?php echo esc_url($item['url']); ?>" class="c-breadcrumb__link"><?php echo esc_html($item['label']); ?></a>
        <?php else : ?>
          <?php echo esc_html($item['label']); ?>
        <?php endif; ?>
      </li>
    <?php endforeach; ?>
  </ol>
</nav>
