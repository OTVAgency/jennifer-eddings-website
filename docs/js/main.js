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

  /* —— Blog feed (Buzzsprout + YouTube + cached feed.json) —— */
  function stripHtml(value) {
    var tmp = document.createElement("div");
    tmp.innerHTML = value || "";
    return (tmp.textContent || tmp.innerText || "").replace(/\s+/g, " ").trim();
  }

  function truncate(text, max) {
    if (!text) return "";
    if (text.length <= max) return text;
    return text.slice(0, max - 1).replace(/\s+\S*$/, "") + "…";
  }

  function slugify(text) {
    return String(text || "")
      .toLowerCase()
      .replace(/[^a-z0-9]+/g, "-")
      .replace(/^-|-$/g, "");
  }

  function formatDateLabel(value) {
    var date = new Date(value);
    if (Number.isNaN(date.getTime())) return value || "";
    return date.toLocaleDateString("en-US", { month: "short", day: "numeric", year: "numeric" });
  }

  function toIsoDate(value) {
    var date = new Date(value);
    if (Number.isNaN(date.getTime())) return String(value || "").slice(0, 10);
    return date.toISOString().slice(0, 10);
  }

  function escapeHtml(value) {
    return String(value || "")
      .replace(/&/g, "&amp;")
      .replace(/</g, "&lt;")
      .replace(/>/g, "&gt;")
      .replace(/"/g, "&quot;");
  }

  function podcastLink(item, title) {
    var link = (item.link || "").trim();
    if (link) return link;
    var guid = item.guid || "";
    if (String(guid).indexOf("Buzzsprout-") === 0) {
      var ep = String(guid).split("-")[1];
      return "https://www.buzzsprout.com/2539726/episodes/" + ep + "-" + slugify(title);
    }
    return "https://thecalllightco.buzzsprout.com";
  }

  function mapPodcastItems(apiItems, fallbackImage) {
    return (apiItems || []).map(function (item) {
      var title = item.title || "Podcast episode";
      return {
        id: item.guid || item.link || title,
        category: "podcast",
        title: title,
        excerpt: truncate(stripHtml(item.description || item.content || ""), 180),
        url: podcastLink(item, title),
        date: toIsoDate(item.pubDate),
        dateLabel: formatDateLabel(item.pubDate),
        image: item.thumbnail || fallbackImage,
        cta: "Listen",
        source: "buzzsprout",
      };
    });
  }

  function mapYoutubeItems(apiItems, fallbackImage) {
    return (apiItems || []).map(function (item) {
      var title = item.title || "Video";
      return {
        id: item.guid || item.link || title,
        category: "video",
        title: title,
        excerpt: truncate(stripHtml(item.description || item.content || ""), 180),
        url: item.link || "https://www.instagram.com/jen_the_rn_82",
        date: toIsoDate(item.pubDate),
        dateLabel: formatDateLabel(item.pubDate),
        image: item.thumbnail || fallbackImage,
        cta: "Watch",
        source: "youtube",
      };
    });
  }

  function fetchRssJson(rssUrl) {
    var endpoint =
      "https://api.rss2json.com/v1/api.json?rss_url=" + encodeURIComponent(rssUrl);
    return fetch(endpoint)
      .then(function (res) {
        if (!res.ok) throw new Error("RSS fetch failed");
        return res.json();
      })
      .then(function (data) {
        if (!data || data.status !== "ok") throw new Error("RSS parse failed");
        return data;
      });
  }

  function mergeItems(lists) {
    var seen = {};
    var merged = [];
    lists.forEach(function (list) {
      (list || []).forEach(function (item) {
        var key = item.id || item.url || item.title;
        if (!key || seen[key]) return;
        seen[key] = true;
        merged.push(item);
      });
    });
    merged.sort(function (a, b) {
      return String(b.date).localeCompare(String(a.date));
    });
    return merged;
  }

  function renderBlogCards(grid, items, fallbackImage) {
    if (!items.length) {
      grid.innerHTML = '<p class="blog-loading">No posts yet — check back soon.</p>';
      return;
    }
    grid.innerHTML = items
      .map(function (item) {
        var img = item.image || fallbackImage;
        var label = (item.category || "story").replace(/^\w/, function (c) {
          return c.toUpperCase();
        });
        var external = /^https?:\/\//.test(item.url || "");
        var rel = external ? ' target="_blank" rel="noopener noreferrer"' : "";
        return (
          '<article class="appearance-card reveal" data-category="' +
          escapeHtml(item.category || "feature") +
          '">' +
          '<a class="appearance-media" href="' +
          escapeHtml(item.url) +
          '"' +
          rel +
          ">" +
          '<img src="' +
          escapeHtml(img) +
          '" alt="" width="1200" height="1600" loading="lazy">' +
          '<span class="appearance-tag">' +
          escapeHtml(label) +
          "</span>" +
          "</a>" +
          '<div class="appearance-body">' +
          '<p class="appearance-meta">' +
          escapeHtml(item.dateLabel || item.date || "") +
          "</p>" +
          "<h2><a href=\"" +
          escapeHtml(item.url) +
          '"' +
          rel +
          ">" +
          escapeHtml(item.title) +
          "</a></h2>" +
          "<p>" +
          escapeHtml(item.excerpt || "") +
          "</p>" +
          '<a class="link-arrow" href="' +
          escapeHtml(item.url) +
          '"' +
          rel +
          ">" +
          escapeHtml(item.cta || "Read more") +
          "</a>" +
          "</div>" +
          "</article>"
        );
      })
      .join("");

    if (!reduceMotion && "IntersectionObserver" in window) {
      var cardObserver = new IntersectionObserver(
        function (entries) {
          entries.forEach(function (entry) {
            if (entry.isIntersecting) {
              entry.target.classList.add("is-in");
              cardObserver.unobserve(entry.target);
            }
          });
        },
        { threshold: 0.12 }
      );
      grid.querySelectorAll(".reveal").forEach(function (el) {
        cardObserver.observe(el);
      });
    } else {
      grid.querySelectorAll(".reveal").forEach(function (el) {
        el.classList.add("is-in");
      });
    }
  }

  function bindFilters() {
    var filters = document.querySelector(".appearance-filters");
    if (!filters) return;
    var chips = filters.querySelectorAll("[data-filter]");
    var empty = document.querySelector(".appearance-empty");

    function applyFilter(value) {
      var cards = document.querySelectorAll(".appearance-card[data-category]");
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
  }

  function loadBlogFeed() {
    var grid = document.getElementById("blog-feed");
    if (!grid) {
      bindFilters();
      return;
    }

    var status = document.getElementById("feed-status");
    var feedUrl = grid.getAttribute("data-feed") || "data/feed.json";
    var podcastRss = grid.getAttribute("data-podcast-rss");
    var youtubeRss = grid.getAttribute("data-youtube-rss");
    var fallbackImage = grid.getAttribute("data-fallback-image") || "images/jen-speak.jpg";

    grid.innerHTML = '<p class="blog-loading">Loading stories…</p>';

    fetch(feedUrl)
      .then(function (res) {
        if (!res.ok) throw new Error("Cached feed missing");
        return res.json();
      })
      .catch(function () {
        return { items: [], sources: {} };
      })
      .then(function (cached) {
        var manual = (cached.items || []).filter(function (item) {
          return item.source === "manual" || item.category === "speaking" || item.category === "feature";
        });
        var cachedPodcast = (cached.items || []).filter(function (item) {
          return item.category === "podcast";
        });
        var cachedVideo = (cached.items || []).filter(function (item) {
          return item.category === "video";
        });

        var livePromises = [];
        if (podcastRss) {
          livePromises.push(
            fetchRssJson(podcastRss)
              .then(function (data) {
                return mapPodcastItems(data.items, data.feed && data.feed.image ? data.feed.image : fallbackImage);
              })
              .catch(function () {
                return null;
              })
          );
        } else {
          livePromises.push(Promise.resolve(null));
        }

        if (youtubeRss) {
          livePromises.push(
            fetchRssJson(youtubeRss)
              .then(function (data) {
                return mapYoutubeItems(data.items, fallbackImage);
              })
              .catch(function () {
                return null;
              })
          );
        } else {
          livePromises.push(Promise.resolve(null));
        }

        return Promise.all(livePromises).then(function (results) {
          var livePodcast = results[0];
          var liveVideo = results[1];
          var podcastItems = livePodcast && livePodcast.length ? livePodcast : cachedPodcast;
          var videoItems = liveVideo && liveVideo.length ? liveVideo : cachedVideo;
          var items = mergeItems([podcastItems, videoItems, manual]);
          renderBlogCards(grid, items, fallbackImage);
          bindFilters();

          if (status) {
            var liveBits = [];
            if (livePodcast && livePodcast.length) liveBits.push("podcast");
            if (liveVideo && liveVideo.length) liveBits.push("YouTube");
            if (liveBits.length) {
              status.textContent = "Updated live from " + liveBits.join(" + ") + ".";
            } else if (items.length) {
              status.textContent =
                "Showing saved feed" +
                (cached.updated ? " · refreshed " + formatDateLabel(cached.updated) : "") +
                ".";
            } else {
              status.textContent = "Feed unavailable right now.";
            }
          }
        });
      });
  }

  loadBlogFeed();
})();
