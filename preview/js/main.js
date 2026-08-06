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
    var count = Number(field.getAttribute("data-sparkles") || 22);
    var frag = document.createDocumentFragment();
    for (var i = 0; i < count; i += 1) {
      var spark = document.createElement("span");
      spark.className = "sparkle" + (i % 5 === 0 ? " is-star" : "");
      spark.style.left = Math.random() * 100 + "%";
      spark.style.top = Math.random() * 100 + "%";
      spark.style.setProperty("--twinkle-duration", 2.4 + Math.random() * 3.2 + "s");
      spark.style.setProperty("--twinkle-delay", Math.random() * 4 + "s");
      frag.appendChild(spark);
    }
    field.appendChild(frag);
  }

  if (!reduceMotion) {
    document.querySelectorAll(".sparkle-field").forEach(seedSparkles);

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
        { threshold: 0.16, rootMargin: "0px 0px -8% 0px" }
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
            heroImg.style.transform = "translate3d(0, " + y * 0.12 + "px, 0) scale(1.04)";
            ticking = false;
          });
        },
        { passive: true }
      );
    }
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
