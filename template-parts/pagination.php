<?php
$total_pages  = $GLOBALS['wp_query']->max_num_pages;
$current_page = max(1, get_query_var('paged'));

if ($total_pages <= 1) return;

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
