# プロジェクト概要

HTML / Sass(SCSS) / Vanilla JS による静的Webサイト制作。フロックスでコーディング。
WordPress実装予定（静的コーディング完了後にPHP化）。
フレームワークは使用しない。

## ページ構成

| ファイル名 | ページ名 |
|---|---|
| index.html | TOP |
| works.html | Works（実績） |
| works-detail.html | 実績詳細 |
| news.html | News（お知らせ） |
| news-detail.html | News詳細 |
| about.html | About（概要） |
| about-detail.html | 概要詳細 |
| price.html | Price（料金） |
| contact.html | Contact（お問い合わせ） |
| thanks.html | サンクスページ |
| privacy.html | プライバシーポリシー |
| 404.html | 404 |

## ファイル構成

```
convia-ポートフォリオ/
├── index.html
└── assets/
    ├── css/style.css        # Sassのコンパイル先（直接編集しない）
    ├── sass/style.scss      # スタイルの編集はここだけ
    ├── js/main.js
    └── img/
```

## CSS設計：BEM

クラス命名はBEMに従う。

```
Block: .block
Element: .block__element
Modifier: .block--modifier または .block__element--modifier
```

- Block名はセクション名や機能名をケバブケースで付ける（例: `.hero`, `.features-card`）
- JSで操作する状態クラスは `.is-active`, `.is-open`, `.is-fixed` などのstateクラスを使う
- JSフックが必要な要素には `.js-` プレフィックスを付ける（例: `.js-accordion`）

## Sass変数（style.scssで定義済み）

### ブレークポイント（モバイルファースト）

```scss
sm: 600px
md: 768px   // スマホ・PCの主な分岐点
lg: 900px
xl: 1230px
```

使い方: `@include mq(md) { ... }`

### レイアウト

```scss
$pc-inner: 1000px
$pc-sidePadding: 120px
$pc-narrow-inner: 960px
$sp-sidePadding: 15px
$sp-inner: 345px
$header-height-sp: 80px
$header-height-pc: 80px
```

### カラー

```scss
$color-text: #2C3E4C
$color-main: #2C5F8D
$color-bg: #F5F7F8
$accent-color: #C85A54
```

### フォント

```scss
$ff-ja: "Zen Maru Gothic", Arial, sans-serif
$ff-m: 500
```

## Figmaデザインをコードに変換する際のルール

- Figmaで確認した色・サイズはできる限り既存の変数に対応させる
- 既存変数にない値は新しい変数として `style.scss` の変数セクションに追加してから使う
- FigmaのレイヤーやコンポーネントのNameをBEMのBlock名の参考にする
- スペーシングはFigmaの実測値をそのまま使う（remではなくpxで記述）
- フォントサイズはSP値をベースに記述し、PC値を `@include mq(md)` 内に書く

## JavaScript

- ライブラリ: GSAP（CDN読み込み済み）
- アニメーション・DOM操作はすべて `main.js` に記述
- `DOMContentLoaded` イベント内で処理を書く
- jQuery は使用しない

## コーディング規則

- CSSは `style.scss` の末尾「本題のCSS」コメント以降に追記する
- コンパイルコマンド: `npm run sass:watch`
- HTMLは日本語（lang="ja"）
- 新規セクションを追加する場合はHTMLとSassを同時に作成する
