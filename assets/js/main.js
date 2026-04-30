document.addEventListener("DOMContentLoaded", () => {
  // ハンバーガーメニュー
  const hamburger = document.querySelector(".hamburger");
  const modalMenu = document.querySelector(".modal-menu");

  if (hamburger && modalMenu) {
    hamburger.addEventListener("click", () => {
      const isActive = hamburger.classList.toggle("is-active");
      modalMenu.classList.toggle("is-active");

      // スクロール制御
      if (isActive) {
        document.body.style.overflow = "hidden";
      } else {
        document.body.style.overflow = "";
      }
    });

    // モーダルメニュー内のリンククリック時にメニューを閉じる
    const modalLinks = modalMenu.querySelectorAll("a");
    modalLinks.forEach((link) => {
      link.addEventListener("click", () => {
        hamburger.classList.remove("is-active");
        modalMenu.classList.remove("is-active");
        document.body.style.overflow = "";
      });
    });
  }
});

document.addEventListener("DOMContentLoaded", () => {
  const accordions = document.querySelectorAll(".js-accordion");

  accordions.forEach((trigger, index) => {
    const box = trigger.closest(".qa-box");
    const answer = box.querySelector(".qa-box__answer");
    const icon = box.querySelector(".qa-box__question-icon svg");

    let isOpen = index === 0; // 1つ目はtrue、それ以外はfalse

    if (index === 0) {
      gsap.set(answer, {
        height: "auto",
        opacity: 1,
        overflow: "hidden",
        borderTopWidth: 1,
      });
      gsap.set(icon, { rotation: 45 });
    } else {
      gsap.set(answer, {
        height: 0,
        opacity: 0,
        overflow: "hidden",
        borderTopWidth: 0,
      });
    }

    trigger.addEventListener("click", () => {
      if (isOpen) {
        gsap.to(answer, {
          height: 0,
          opacity: 0,
          borderTopWidth: 0,
          duration: 0.4,
          ease: "power3.out",
          overwrite: true,
        });
        gsap.to(icon, { rotation: 0, duration: 0.3 });
        isOpen = false;
      } else {
        gsap.fromTo(
          answer,
          { height: 0, opacity: 0, borderTopWidth: 0 },
          {
            height: "auto",
            opacity: 1,
            borderTopWidth: 1,
            duration: 0.4,
            ease: "power3.out",
            overwrite: true,
          },
        );
        gsap.to(icon, { rotation: 45, duration: 0.3 });
        isOpen = true;
      }
    });
  });
});

// カードレイアウト
document.addEventListener("DOMContentLoaded", () => {
  const sliders = [
    { container: ".features-cards", card: ".features-card" },
    { container: ".reputation-cards", card: ".reputation-card" },
  ];

  sliders.forEach(({ container: containerSelector, card: cardSelector }) => {
    const container = document.querySelector(containerSelector);
    const cards = document.querySelectorAll(cardSelector);
    if (!container || !cards.length) return;
    const card = cards[1];
    const containerCenter = container.offsetWidth / 2;
    const cardCenter = card.offsetLeft + card.offsetWidth / 2;
    container.scrollLeft = cardCenter - containerCenter;
  });
});

// ページネーション

document.addEventListener("DOMContentLoaded", () => {
  const navConfigs = [
    {
      wrapper: ".features-cards-wrapper",
      container: ".features-cards",
      card: ".features-card",
      prev: ".features-cards__prev",
      next: ".features-cards__next",
    },
    {
      wrapper: ".reputation-cards-wrapper",
      container: ".reputation-cards",
      card: ".reputation-card",
      prev: ".reputation-cards__prev",
      next: ".reputation-cards__next",
    },
  ];

  navConfigs.forEach(({ wrapper, container, card, prev, next }) => {
    const wrapperEl = document.querySelector(wrapper);
    if (!wrapperEl) return;
    const containerEl = wrapperEl.querySelector(container);
    const cardEl = wrapperEl.querySelector(card);
    if (!containerEl || !cardEl) return;
    const cardWidth = cardEl.offsetWidth + 20;

    wrapperEl.querySelector(prev).addEventListener("click", () => {
      containerEl.scrollBy({ left: -cardWidth, behavior: "smooth" });
    });
    wrapperEl.querySelector(next).addEventListener("click", () => {
      containerEl.scrollBy({ left: cardWidth, behavior: "smooth" });
    });
  });
});

document.addEventListener("DOMContentLoaded", () => {
  const serviceWrappers = document.querySelectorAll(".service__cards-wrapper");
  serviceWrappers.forEach((wrapperEl) => {
    const containerEl = wrapperEl.querySelector(".service__cards");
    const cardEl = wrapperEl.querySelector(".service-card");
    if (!containerEl || !cardEl) return;

    wrapperEl.querySelector(".service-cards__prev").addEventListener("click", () => {
      const cardWidth = cardEl.offsetWidth + 20;
      containerEl.scrollBy({ left: -cardWidth, behavior: "smooth" });
    });
    wrapperEl.querySelector(".service-cards__next").addEventListener("click", () => {
      const cardWidth = cardEl.offsetWidth + 20;
      containerEl.scrollBy({ left: cardWidth, behavior: "smooth" });
    });
  });
});
