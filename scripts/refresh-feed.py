#!/usr/bin/env python3
"""Refresh preview/docs feed.json from Buzzsprout (+ optional YouTube) RSS."""

from __future__ import annotations

import argparse
import html
import json
import re
import urllib.parse
import urllib.request
from datetime import datetime
from pathlib import Path

ROOT = Path(__file__).resolve().parents[1]
DEFAULT_PODCAST = "https://feeds.buzzsprout.com/2539726.rss"
DEFAULT_YOUTUBE = "https://www.youtube.com/feeds/videos.xml?playlist_id=PL-4T6LUTX9bmv0SdZEaJEWEPFSuGzuqQJ"
DEFAULT_YOUTUBE_SHORTS = "https://www.youtube.com/feeds/videos.xml?playlist_id=PL-4T6LUTX9bkXpBY-e8Hq4v3UJICjuvGu"
CLC_PLAYLIST_URL = "https://www.youtube.com/playlist?list=PL-4T6LUTX9bmv0SdZEaJEWEPFSuGzuqQJ"


def strip_html(value: str) -> str:
    value = re.sub(r"<[^>]+>", " ", value or "")
    value = html.unescape(value)
    return re.sub(r"\s+", " ", value).strip()


def short(value: str, n: int = 180) -> str:
    value = strip_html(value)
    if len(value) <= n:
        return value
    return value[: n - 1].rsplit(" ", 1)[0] + "…"


def slugify(value: str) -> str:
    return re.sub(r"[^a-z0-9]+", "-", value.lower()).strip("-")


def rss2json(rss_url: str) -> dict:
    endpoint = "https://api.rss2json.com/v1/api.json?rss_url=" + urllib.parse.quote(rss_url, safe="")
    with urllib.request.urlopen(endpoint, timeout=45) as res:
        data = json.load(res)
    if data.get("status") != "ok":
        raise RuntimeError(f"rss2json failed for {rss_url}: {data}")
    return data


def map_podcast(items: list, feed_image: str) -> list:
    out = []
    for item in items:
        title = (item.get("title") or "").strip()
        guid = item.get("guid") or ""
        link = (item.get("link") or "").strip()
        if not link and str(guid).startswith("Buzzsprout-"):
            ep = str(guid).split("-", 1)[1]
            link = f"https://www.buzzsprout.com/2539726/episodes/{ep}-{slugify(title)}"
        if not link:
            link = "https://thecalllightco.buzzsprout.com"
        pub = item.get("pubDate") or ""
        try:
            dt = datetime.strptime(pub[:19], "%Y-%m-%d %H:%M:%S")
            date_iso = dt.date().isoformat()
            date_label = dt.strftime("%b %-d, %Y")
        except Exception:
            date_iso, date_label = pub[:10], pub
        out.append(
            {
                "id": guid or link,
                "category": "podcast",
                "title": title,
                "excerpt": short(item.get("description") or ""),
                "url": link,
                "date": date_iso,
                "dateLabel": date_label,
                "image": item.get("thumbnail") or feed_image or "images/jen-speak.jpg",
                "cta": "Listen",
                "source": "buzzsprout",
            }
        )
    return out


def map_youtube(items: list, fallback: str) -> list:
    out = []
    for item in items:
        title = (item.get("title") or "").strip()
        pub = item.get("pubDate") or ""
        try:
            dt = datetime.strptime(pub[:19], "%Y-%m-%d %H:%M:%S")
            date_iso = dt.date().isoformat()
            date_label = dt.strftime("%b %-d, %Y")
        except Exception:
            date_iso, date_label = pub[:10], pub
        out.append(
            {
                "id": item.get("guid") or item.get("link") or title,
                "category": "video",
                "title": title,
                "excerpt": short(item.get("description") or ""),
                "url": item.get("link") or CLC_PLAYLIST_URL,
                "date": date_iso,
                "dateLabel": date_label,
                "image": item.get("thumbnail") or fallback,
                "cta": "Watch",
                "source": "youtube",
            }
        )
    return out


def main() -> None:
    parser = argparse.ArgumentParser()
    parser.add_argument("--podcast-rss", default=DEFAULT_PODCAST)
    parser.add_argument("--youtube-rss", default=DEFAULT_YOUTUBE)
    parser.add_argument("--youtube-shorts-rss", default=DEFAULT_YOUTUBE_SHORTS)
    args = parser.parse_args()

    podcast = rss2json(args.podcast_rss)
    items = map_podcast(podcast.get("items") or [], (podcast.get("feed") or {}).get("image") or "")

    youtube_rss = ""
    for label, rss in (("episodes", args.youtube_rss), ("shorts", args.youtube_shorts_rss)):
        if not rss:
            continue
        try:
            youtube = rss2json(rss)
            items.extend(map_youtube(youtube.get("items") or [], "images/jen-stage.jpg"))
            if label == "episodes":
                youtube_rss = rss
        except Exception as exc:
            print(f"YouTube {label} feed skipped: {exc}")

    items.append(
        {
            "id": "speaking-evolutionary-2025",
            "category": "speaking",
            "title": "Evolutionary Healthcare — live conversation",
            "excerpt": "Jennifer on stage with Comfort Measures Media — storytelling, leadership, and culture in the room.",
            "url": "index.html#collaborate",
            "date": "2025-09-01",
            "dateLabel": "2025 · Stage",
            "image": "images/jen-stage.jpg",
            "cta": "Collaborate",
            "source": "manual",
        }
    )
    items.sort(key=lambda x: x["date"], reverse=True)

    payload = {
        "updated": datetime.utcnow().strftime("%Y-%m-%dT%H:%M:%SZ"),
        "sources": {
            "podcastRss": args.podcast_rss,
            "podcastUrl": "https://thecalllightco.buzzsprout.com",
            "youtubeUrl": CLC_PLAYLIST_URL,
            "youtubeRss": youtube_rss,
            "youtubeShortsRss": args.youtube_shorts_rss or "",
            "instagramUrl": "https://www.instagram.com/jen_the_rn_82",
            "tiktokUrl": "https://www.tiktok.com/@jen_the_rn_82",
        },
        "items": items,
    }

    for rel in ("preview/data/feed.json", "docs/data/feed.json"):
        path = ROOT / rel
        path.parent.mkdir(parents=True, exist_ok=True)
        path.write_text(json.dumps(payload, indent=2) + "\n", encoding="utf-8")
        print(f"Wrote {path} ({len(items)} items)")


if __name__ == "__main__":
    main()
