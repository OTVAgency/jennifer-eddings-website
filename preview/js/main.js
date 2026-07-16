(function () {
  document.documentElement.classList.add("js");

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
