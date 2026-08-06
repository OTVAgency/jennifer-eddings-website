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

  function spawnCursorGlitter(x, y) {
    var bit = document.createElement("span");
    bit.className = "cursor-glitter" + (Math.random() > 0.65 ? " is-star" : "");
    bit.style.left = x + "px";
    bit.style.top = y + "px";
    document.body.appendChild(bit);
    window.setTimeout(function () {
      bit.remove();
    }, 700);
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

    var lastSparkle = 0;
    document.addEventListener(
      "pointermove",
      function (event) {
        var now = Date.now();
        if (now - lastSparkle < 45) return;
        lastSparkle = now;
        spawnCursorGlitter(event.clientX - 3, event.clientY - 3);
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
