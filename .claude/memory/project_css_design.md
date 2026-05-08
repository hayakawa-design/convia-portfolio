---
name: CSS設計：Flocss
description: このプロジェクトはBEMではなくFlocssを使用する
type: feedback
---

このプロジェクトのCSS設計はFlocssを使用する（BEMではない）。

**Why:** ユーザーからの指摘。当初BEMで実装してしまったが、プロジェクト仕様はFlocss。

**How to apply:**
- Layout層（l-）: `.l-header`, `.l-header__inner`, `.l-inner` など
- Component層（c-）: `.c-btn`, `.c-global-menu`, `.c-hamburger`, `.c-modal-menu`, `.c-section-heading`, `.c-works-card` など（再利用可能な小パーツ）
- Project層（p-）: `.p-fv`, `.p-cta`, `.p-works` など（セクション固有のスタイル）
- Utility層（u-）: `.u-hidden-md`, `.u-show-md` など

新規セクションを追加するときも必ずFlocssの命名規則に従う。
