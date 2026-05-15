<?php

function convia_lab_setup() {
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    register_nav_menus([
        'global-menu' => 'グローバルメニュー',
        'footer-menu' => 'フッターメニュー',
    ]);
}
add_action('after_setup_theme', 'convia_lab_setup');

function convia_lab_scripts() {
    wp_enqueue_style(
        'convia-lab-style',
        get_template_directory_uri() . '/assets/css/style.css',
        [],
        '1.0.0'
    );

    wp_enqueue_script(
        'gsap',
        'https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js',
        [],
        '3.12.2',
        true
    );

    wp_enqueue_script(
        'gsap-scroll-trigger',
        'https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/ScrollTrigger.min.js',
        ['gsap'],
        '3.12.2',
        true
    );

    wp_enqueue_script(
        'convia-lab-main',
        get_template_directory_uri() . '/assets/js/main.js',
        ['gsap', 'gsap-scroll-trigger'],
        '1.0.0',
        true
    );
}
add_action('wp_enqueue_scripts', 'convia_lab_scripts');

function convia_lab_dequeue_block_styles() {
    // column詳細ページはブロックエディターのスタイルをそのまま使用
    if (is_singular('column_post')) return;

    wp_dequeue_style('wp-block-library');
    wp_dequeue_style('wp-block-library-theme');
    wp_dequeue_style('global-styles');
    wp_dequeue_style('classic-theme-styles');
}
add_action('wp_enqueue_scripts', 'convia_lab_dequeue_block_styles', 100);

function convia_lab_register_post_types() {
    // 実績
    register_post_type('works_post', [
        'labels' => [
            'name'          => '実績',
            'singular_name' => '実績',
            'add_new_item'  => '実績を追加',
            'edit_item'     => '実績を編集',
        ],
        'public'        => true,
        'has_archive'   => true,
        'show_in_rest'  => true,
        'menu_icon'     => 'dashicons-portfolio',
        'supports'      => ['title', 'editor', 'thumbnail', 'excerpt'],
        'rewrite'       => ['slug' => 'works'],
    ]);

    // コラム
    register_post_type('column_post', [
        'labels' => [
            'name'          => 'コラム',
            'singular_name' => 'コラム',
            'add_new_item'  => 'コラムを追加',
            'edit_item'     => 'コラムを編集',
        ],
        'public'        => true,
        'has_archive'   => true,
        'show_in_rest'  => true,
        'menu_icon'     => 'dashicons-edit-page',
        'supports'      => ['title', 'editor', 'thumbnail', 'excerpt'],
        'rewrite'       => ['slug' => 'column'],
    ]);

    // メンバー
    register_post_type('member_post', [
        'labels' => [
            'name'          => 'メンバー',
            'singular_name' => 'メンバー',
            'add_new_item'  => 'メンバーを追加',
            'edit_item'     => 'メンバーを編集',
        ],
        'public'        => true,
        'has_archive'   => true,
        'show_in_rest'  => true,
        'menu_icon'     => 'dashicons-groups',
        'supports'      => ['title', 'editor', 'thumbnail', 'excerpt'],
        'rewrite'       => ['slug' => 'member'],
    ]);

}
add_action('init', 'convia_lab_register_post_types');

function convia_lab_generate_toc($content) {
    $headings = [];
    $h2_count = 0;
    $h3_count = 0;
    $idx      = 0;

    $modified = preg_replace_callback(
        '/<(h[23])([^>]*)>(.*?)<\/\1>/is',
        function ($m) use (&$headings, &$h2_count, &$h3_count, &$idx) {
            $tag   = strtolower($m[1]);
            $attrs = $m[2];
            $inner = $m[3];
            $text  = wp_strip_all_tags($inner);
            $idx++;
            $id    = 'toc-' . $idx;

            if ($tag === 'h2') {
                $h2_count++;
                $h3_count = 0;
                $num = (string) $h2_count;
            } else {
                $h3_count++;
                $num = $h2_count . '-' . $h3_count;
            }

            $headings[] = [
                'level'  => (int) substr($tag, 1),
                'id'     => $id,
                'text'   => $text,
                'number' => $num,
            ];

            if (strpos($attrs, 'id=') === false) {
                $attrs .= ' id="' . esc_attr($id) . '"';
            }

            return "<{$tag}{$attrs}>{$inner}</{$tag}>";
        },
        $content
    );

    if (count($headings) < 2) {
        return ['toc' => '', 'content' => $content];
    }

    $toc  = '<nav class="p-column-toc" aria-label="目次">';
    $toc .= '<p class="p-column-toc__title">目次</p>';
    $toc .= '<ol class="p-column-toc__list">';
    foreach ($headings as $h) {
        $sub  = $h['level'] === 3 ? ' p-column-toc__item--sub' : '';
        $toc .= '<li class="p-column-toc__item' . $sub . '">';
        $toc .= '<a href="#' . esc_attr($h['id']) . '" class="p-column-toc__link">';
        $toc .= '<span class="p-column-toc__num">' . esc_html($h['number']) . '</span>';
        $toc .= '<span class="p-column-toc__text">' . esc_html($h['text']) . '</span>';
        $toc .= '</a></li>';
    }
    $toc .= '</ol></nav>';

    return ['toc' => $toc, 'content' => $modified];
}

function convia_lab_posts_per_page($query) {
    if (is_admin() || !$query->is_main_query()) return;
    if ($query->is_post_type_archive('works_post')) {
        $query->set('posts_per_page', 9);
    }
    if ($query->is_post_type_archive('column_post') || $query->is_tax('column_category')) {
        $query->set('posts_per_page', 9);
    }
    if ($query->is_home() || $query->is_category() || $query->is_date()) {
        $query->set('posts_per_page', 10);
    }
}
add_action('pre_get_posts', 'convia_lab_posts_per_page');
