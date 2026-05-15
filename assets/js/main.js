document.addEventListener("DOMContentLoaded", () => {
  // =============================================
  // single-works.html のみ（PC）：
  // p-works-detail をビューポート下端に固定し、
  // p-works-related 以降が上に重なって来るアニメーションを実現
  // sticky; top: (vh - h) という負の値で「下端固定スティッキー」を実現
  // =============================================
  const worksDetail = document.querySelector(".p-works-detail");

  if (worksDetail) {
    const update = () => {
      const isMdNow = window.matchMedia("(min-width: 768px)").matches;
      const h = worksDetail.offsetHeight;
      const vh = window.innerHeight;

      if (isMdNow && h > vh) {
        // セクション下端がビューポート下端に固定されるよう top を設定
        worksDetail.style.position = "sticky";
        worksDetail.style.top = (vh - h) + "px"; // 負の値
      } else {
        // SP またはセクションがビューポートより短い場合はリセット
        worksDetail.style.position = "";
        worksDetail.style.top = "";
      }

      // 後続セクションを前面に（PC のみ）
      [".p-works-related", ".p-contact-section", ".p-brochure", ".l-footer"].forEach((sel) => {
        const el = document.querySelector(sel);
        if (el) {
          el.style.position = isMdNow ? "relative" : "";
          el.style.zIndex = isMdNow ? "2" : "";
        }
      });
    };

    update();
    window.addEventListener("resize", update);
  }

  // ハンバーガーメニュー
  const hamburger = document.querySelector(".c-hamburger");
  const modalMenu = document.querySelector(".c-modal-menu");

  if (hamburger && modalMenu) {
    hamburger.addEventListener("click", () => {
      const isActive = hamburger.classList.toggle("is-active");
      modalMenu.classList.toggle("is-active");

      // スクロール制御
      if (isActive) {
        document.body.classList.add("is-fixed");
      } else {
        document.body.classList.remove("is-fixed");
      }
    });

    // モーダルメニュー内のリンククリック時にメニューを閉じる
    const modalLinks = modalMenu.querySelectorAll("a");
    modalLinks.forEach((link) => {
      link.addEventListener("click", () => {
        hamburger.classList.remove("is-active");
        modalMenu.classList.remove("is-active");
        document.body.classList.remove("is-fixed");
      });
    });
  }
});

// メンバーカード スキルトグル（SPのみ）
document.addEventListener("DOMContentLoaded", () => {
  const mdQuery = window.matchMedia("(min-width: 768px)");
  const toggles = document.querySelectorAll(".js-member-tag-toggle");
  if (!toggles.length) return;

  const initSkills = () => {
    toggles.forEach((toggle) => {
      const tagGroup = toggle.closest(".c-member-card__tag-group");
      const skills = tagGroup.querySelector(".c-member-card__skills");
      if (!skills) return;

      if (mdQuery.matches) {
        gsap.set(skills, { clearProps: "height,overflow" });
        tagGroup.classList.remove("is-open");
        toggle.setAttribute("aria-expanded", "false");
      } else {
        if (!tagGroup.classList.contains("is-open")) {
          gsap.set(skills, { height: 0, overflow: "hidden" });
        }
      }
    });
  };

  initSkills();
  mdQuery.addEventListener("change", initSkills);

  toggles.forEach((toggle) => {
    toggle.addEventListener("click", (e) => {
      e.stopPropagation();
      if (mdQuery.matches) return;

      const tagGroup = toggle.closest(".c-member-card__tag-group");
      const skills = tagGroup.querySelector(".c-member-card__skills");
      if (!skills) return;

      const isOpen = tagGroup.classList.toggle("is-open");
      toggle.setAttribute("aria-expanded", String(isOpen));

      if (isOpen) {
        gsap.fromTo(skills,
          { height: 0, overflow: "hidden" },
          { height: "auto", duration: 0.35, ease: "power3.out", overwrite: true }
        );
      } else {
        gsap.to(skills, {
          height: 0,
          duration: 0.35,
          ease: "power3.out",
          overwrite: true,
        });
      }
    });
  });
});

// メンバーフィルター 開閉トグル
document.addEventListener("DOMContentLoaded", () => {
  const toggle = document.querySelector(".js-member-filter-toggle");
  const skills = document.querySelector(".js-filter-skills");
  if (!toggle || !skills) return;

  toggle.addEventListener("click", () => {
    const isOpen = toggle.classList.toggle("is-open");

    if (isOpen) {
      gsap.fromTo(skills,
        { height: 0 },
        { height: "auto", duration: 0.35, ease: "power3.out", overwrite: true }
      );
    } else {
      gsap.to(skills, {
        height: 0,
        duration: 0.35,
        ease: "power3.out",
        overwrite: true,
      });
    }
    toggle.setAttribute("aria-expanded", String(isOpen));
  });
});

// =============================================
// スクロール出現アニメーション（GSAP ScrollTrigger）
// =============================================
document.addEventListener("DOMContentLoaded", () => {
  if (typeof ScrollTrigger === "undefined") return;
  gsap.registerPlugin(ScrollTrigger);

  const stagger = (container, childSelector, staggerTime = 0.1) => {
    const parent = typeof container === "string"
      ? document.querySelector(container)
      : container;
    if (!parent) return;
    const children = parent.querySelectorAll(childSelector);
    if (!children.length) return;
    gsap.from(children, {
      y: 40,
      opacity: 0,
      duration: 0.6,
      stagger: staggerTime,
      ease: "power3.out",
      scrollTrigger: {
        trigger: parent,
        start: "top 88%",
        once: true,
      },
    });
  };

  // --- セクション見出し ---
  document.querySelectorAll(".c-section-heading").forEach(el => {
    gsap.from(el, {
      y: 30, opacity: 0, duration: 0.7, ease: "power3.out",
      scrollTrigger: { trigger: el, start: "top 88%", once: true },
    });
  });

  // --- Worksカード ---
  document.querySelectorAll(".p-works__list, .p-works-related__list").forEach(c => {
    stagger(c, ".c-works-card");
  });

  // --- Columnカード ---
  // immediateRender: false でページロード時の即時FROM適用を防ぎ、グリッド高さのズレを解消
  const columnGrid = document.querySelector(".p-column__grid");
  if (columnGrid) {
    const columnCards = columnGrid.querySelectorAll(".c-column-card");
    if (columnCards.length) {
      gsap.from(columnCards, {
        y: 40,
        opacity: 0,
        duration: 0.6,
        stagger: 0.1,
        ease: "power3.out",
        immediateRender: false,
        scrollTrigger: {
          trigger: columnGrid,
          start: "top 88%",
          once: true,
        },
      });
    }
  }

  // --- Memberカード ---
  document.querySelectorAll(".p-member__grid").forEach((grid) => {
    const memberCards = grid.querySelectorAll(".c-member-card");
    if (!memberCards.length) return;
    gsap.from(memberCards, {
      y: 40,
      opacity: 0,
      duration: 0.6,
      stagger: 0.1,
      ease: "power3.out",
      immediateRender: false,
      scrollTrigger: {
        trigger: grid,
        start: "top 88%",
        once: true,
      },
    });
  });

  // --- Flowカード ---
  stagger(".p-flow__list", ".c-flow-card", 0.15);

  // --- Priceカード（PC: 一括出現 / SP: stagger）---
  const isPC = window.innerWidth >= 1000;
  document.querySelectorAll(".p-price__cards, .p-service-price-cards__homepage-cards").forEach(c => {
    const cards = c.querySelectorAll(".c-price-card");
    if (!cards.length) return;
    gsap.from(cards, {
      y: 40,
      opacity: 0,
      duration: 0.6,
      stagger: isPC ? 0 : 0.1,
      ease: "power3.out",
      scrollTrigger: { trigger: c, start: "top 88%", once: true },
    });
  });

  // --- Service（その他）カード: opacityのみ（y移動はスライダー内で見えてしまうため）---
  const otherCards = document.querySelector(".p-service-price-cards__other-cards");
  if (otherCards) {
    gsap.from(otherCards.querySelectorAll(".c-service-card"), {
      opacity: 0,
      duration: 0.5,
      stagger: 0.06,
      ease: "power2.out",
      scrollTrigger: { trigger: otherCards, start: "top 90%", once: true },
    });
  }

  // --- テキストブロック ---
  document.querySelectorAll(
    ".p-about__body, .p-why-team__inner, .p-philosophy__items, " +
    ".p-contact-section__cta, .p-contact__form, .p-contact-info__inner, " +
    ".p-thanks__text, .p-member-detail__card, .p-column-detail__inner"
  ).forEach(el => {
    gsap.from(el, {
      y: 30, opacity: 0, duration: 0.7, ease: "power3.out",
      scrollTrigger: { trigger: el, start: "top 88%", once: true },
    });
  });
});

// メンバーカードフィルター（カテゴリ＋スキル）
document.addEventListener("DOMContentLoaded", () => {
  const catBtns   = document.querySelectorAll(".p-member__cat-btn");
  const skillTags = document.querySelectorAll(".p-member__skill-tag");
  const cards     = document.querySelectorAll(".c-member-card");

  if (!catBtns.length || !cards.length) return;

  let activeCat    = "";
  let activeSkills = new Set();

  const applyFilter = () => {
    cards.forEach((card) => {
      const cats   = (card.dataset.cats   || "").split(",").map((s) => s.trim()).filter(Boolean);
      const skills = (card.dataset.skills || "").split(",").map((s) => s.trim()).filter(Boolean);
      const catOk   = !activeCat || cats.includes(activeCat);
      const skillOk = activeSkills.size === 0 || [...activeSkills].every((s) => skills.includes(s));
      card.style.display = catOk && skillOk ? "" : "none";
    });
  };

  catBtns.forEach((btn) => {
    btn.addEventListener("click", () => {
      catBtns.forEach((b) => b.classList.remove("is-active"));
      btn.classList.add("is-active");
      activeCat = btn.dataset.cat || "";
      applyFilter();
    });
  });

  skillTags.forEach((tag) => {
    tag.addEventListener("click", () => {
      tag.classList.toggle("is-active");
      const skill = tag.dataset.skill || "";
      if (tag.classList.contains("is-active")) {
        activeSkills.add(skill);
      } else {
        activeSkills.delete(skill);
      }
      applyFilter();
    });
  });
});
