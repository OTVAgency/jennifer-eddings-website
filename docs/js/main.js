(function () {
  document.documentElement.classList.add("js");

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
