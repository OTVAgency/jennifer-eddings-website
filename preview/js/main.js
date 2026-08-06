(function () {
  document.documentElement.classList.add("js");

  var reduceMotion = window.matchMedia("(prefers-reduced-motion: reduce)").matches;

  var header = document.querySelector(".site-header");
  var toggle = document.querySelector(".nav-toggle");
  var nav = document.getElementById("site-nav");

  if (header && toggle && nav) {
    function setNavOpen(open) {
      header.classList.toggle("is-nav-open", open);
      toggle.setAttribute("aria-expanded", open ? "true" : "false");
      toggle.setAttribute("aria-label", open ? "Close menu" : "Open menu");
      document.body.classList.toggle("nav-open", open);
    }

    toggle.addEventListener("click", function () {
      setNavOpen(!header.classList.contains("is-nav-open"));
    });

    nav.querySelectorAll("a").forEach(function (link) {
      link.addEventListener("click", function () {
        setNavOpen(false);
      });
    });

    document.addEventListener("keydown", function (event) {
      if (event.key === "Escape") setNavOpen(false);
    });
  }

  function seedSparkles(field) {
    var count = Number(field.getAttribute("data-sparkles") || 40);
    var frag = document.createDocumentFragment();
    for (var i = 0; i < count; i += 1) {
      var spark = document.createElement("span");
      var kind = i % 4 === 0 ? " is-star" : i % 5 === 0 ? " is-diamond" : "";
      var drift = i % 3 === 0 ? " is-drift" : "";
      spark.className = "sparkle" + kind + drift;
      spark.style.left = Math.random() * 100 + "%";
      spark.style.top = Math.random() * 100 + "%";
      spark.style.setProperty("--twinkle-duration", 1.6 + Math.random() * 2.8 + "s");
      spark.style.setProperty("--twinkle-delay", Math.random() * 3.5 + "s");
      spark.style.setProperty("--fall-duration", 5 + Math.random() * 7 + "s");
      spark.style.setProperty("--fall-delay", Math.random() * 6 + "s");
      frag.appendChild(spark);
    }
    field.appendChild(frag);
  }

  function ensureFoil(el) {
    if (!el || el.querySelector(".foil-sheen")) return;
    var foil = document.createElement("div");
    foil.className = "foil-sheen";
    foil.setAttribute("aria-hidden", "true");
    el.insertBefore(foil, el.firstChild);
  }

  function spawnCursorGlitter(x, y, dx, dy) {
    var bit = document.createElement("span");
    var roll = Math.random();
    var kind = roll > 0.72 ? " is-star" : roll > 0.5 ? " is-diamond" : "";
    var size = 6 + Math.random() * 10;
    var life = 700 + Math.random() * 500;
    bit.className = "cursor-glitter" + kind;
    bit.style.setProperty("--x", x - size / 2 + "px");
    bit.style.setProperty("--y", y - size / 2 + "px");
    bit.style.setProperty("--dx", (dx || 0) + (Math.random() * 18 - 9) + "px");
    bit.style.setProperty("--dy", (dy || 14) + Math.random() * 18 + "px");
    bit.style.setProperty("--size", size + "px");
    bit.style.setProperty("--life", life + "ms");
    document.body.appendChild(bit);
    window.setTimeout(function () {
      bit.remove();
    }, life + 40);
  }

  if (!reduceMotion) {
    document.querySelectorAll(".sparkle-field").forEach(seedSparkles);

    document.querySelectorAll(".hero-copy, .hero-media, .band-plum, .page-hero").forEach(ensureFoil);

    document.querySelectorAll(".hero-media, .speak-banner, .video-frame, .about-mosaic figure").forEach(function (el) {
      el.classList.add("glam-frame");
    });

    document.querySelectorAll(".hero-copy, .hero-media").forEach(function (el) {
      el.classList.add("hero-entrance");
    });

    if ("IntersectionObserver" in window) {
      var observer = new IntersectionObserver(
        function (entries) {
          entries.forEach(function (entry) {
            if (entry.isIntersecting) {
              entry.target.classList.add("is-in");
              observer.unobserve(entry.target);
            }
          });
        },
        { threshold: 0.14, rootMargin: "0px 0px -6% 0px" }
      );

      document.querySelectorAll(".reveal").forEach(function (el) {
        observer.observe(el);
      });
    } else {
      document.querySelectorAll(".reveal").forEach(function (el) {
        el.classList.add("is-in");
      });
    }

    var heroImg = document.querySelector(".hero-media img");
    if (heroImg) {
      var ticking = false;
      window.addEventListener(
        "scroll",
        function () {
          if (ticking) return;
          ticking = true;
          window.requestAnimationFrame(function () {
            var y = Math.min(window.scrollY, 420);
            heroImg.style.transform = "translate3d(0, " + y * 0.14 + "px, 0) scale(1.05)";
            ticking = false;
          });
        },
        { passive: true }
      );
    }

    var lastX = null;
    var lastY = null;
    var lastSparkle = 0;
    document.addEventListener(
      "pointermove",
      function (event) {
        if (event.pointerType === "touch") return;
        var now = Date.now();
        var x = event.clientX;
        var y = event.clientY;
        if (lastX === null) {
          lastX = x;
          lastY = y;
        }
        var dist = Math.hypot(x - lastX, y - lastY);
        if (dist < 6 && now - lastSparkle < 20) return;
        if (now - lastSparkle < 16) return;
        lastSparkle = now;

        var moveX = x - lastX;
        var moveY = y - lastY;
        lastX = x;
        lastY = y;

        var trailX = -moveX * 0.35;
        var trailY = -moveY * 0.35 + 8;
        var burst = dist > 28 ? 3 : 2;
        for (var i = 0; i < burst; i += 1) {
          spawnCursorGlitter(
            x - moveX * (i * 0.18) + (Math.random() * 10 - 5),
            y - moveY * (i * 0.18) + (Math.random() * 10 - 5),
            trailX,
            trailY
          );
        }
      },
      { passive: true }
    );
  } else {
    document.querySelectorAll(".reveal").forEach(function (el) {
      el.classList.add("is-in");
    });
  }

  var filters = document.querySelector(".appearance-filters");
  if (!filters) return;

  var chips = filters.querySelectorAll("[data-filter]");
  var cards = document.querySelectorAll(".appearance-card[data-category]");
  var empty = document.querySelector(".appearance-empty");

  function applyFilter(value) {
    var visible = 0;
    cards.forEach(function (card) {
      var match = value === "all" || card.getAttribute("data-category") === value;
      card.hidden = !match;
      if (match) visible += 1;
    });
    chips.forEach(function (chip) {
      var active = chip.getAttribute("data-filter") === value;
      chip.classList.toggle("is-active", active);
      chip.setAttribute("aria-pressed", active ? "true" : "false");
    });
    if (empty) empty.hidden = visible > 0;
  }

  filters.addEventListener("click", function (event) {
    var chip = event.target.closest("[data-filter]");
    if (!chip || !filters.contains(chip)) return;
    applyFilter(chip.getAttribute("data-filter"));
  });
})();
