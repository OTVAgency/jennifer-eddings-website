import Image from "next/image";

export default function Home() {
  const featuredLinks = [
    {
      label: "About Jennifer",
      href: "#story",
    },
    {
      label: "The Collective",
      href: "#collective",
    },
    {
      label: "Connect",
      href: "#connect",
    },
  ];

  const spotlightCards = [
    {
      title: "Personal brand home base",
      body: "A clear first impression for listeners, collaborators, and media contacts who want to understand Jennifer's voice and mission.",
    },
    {
      title: "Media-ready foundation",
      body: "Room for future guest features, interviews, episode links, and a downloadable media kit without rebuilding the site later.",
    },
    {
      title: "Booking and collaboration path",
      body: "A more professional flow for speaking requests, partnerships, and meaningful conversations tied to the brand.",
    },
  ];

  const promisePoints = [
    "Rooted in Jennifer's voice, healing perspective, and lived experience",
    "Structured for podcast growth, guest features, and future press outreach",
    "Simple, mobile-friendly, and easier to trust at first glance",
  ];

  return (
    <main className="page-shell">
      <header className="topbar">
        <div className="brand-lockup">
          <span className="brand-dot" aria-hidden="true" />
          <div>
            <p className="topbar-label">Jennifer Eddings</p>
            <p className="topbar-subtitle">The Call Light Collective</p>
          </div>
        </div>

        <nav className="topnav" aria-label="Primary">
          {featuredLinks.map((item) => (
            <a key={item.href} href={item.href}>
              {item.label}
            </a>
          ))}
        </nav>
      </header>

      <section className="hero-section">
        <div className="hero-copy">
          <p className="eyebrow">Personal brand website</p>
          <h1>
            A grounded, professional home for Jennifer&apos;s story, voice, and
            growing platform.
          </h1>
          <p className="hero-text">
            Built as the front door to Jennifer Eddings and The Call Light
            Collective, this site is meant to introduce the mission, support
            future media visibility, and make collaboration feel easy.
          </p>
          <div className="hero-actions">
            <a className="button button-primary" href="#connect">
              Booking and media
            </a>
            <a className="button button-secondary" href="#collective">
              Explore the brand
            </a>
          </div>
        </div>

        <aside className="hero-side">
          <div className="feature-panel">
            <p className="feature-kicker">Current focus</p>
            <h2 className="feature-title">The Call Light Collective</h2>
            <p className="feature-text">
              A thoughtful, story-led brand space designed to hold podcast
              growth, featured appearances, and future audience trust.
            </p>
          </div>

          <div className="monogram-panel">
            <Image
              className="monogram"
              src="/clc-monogram.png"
              alt="CLC monogram graphic"
              width={438}
              height={438}
            />
          </div>
        </aside>
      </section>

      <section className="content-section" id="story">
        <div className="section-heading">
          <p className="eyebrow">About Jennifer</p>
          <h2>Designed to feel more like a trusted profile than a generated splash page.</h2>
        </div>

        <div className="story-grid">
          <article className="story-card story-card-wide">
            <p>
              This version centers clarity first. Instead of leaning on heavy
              effects, it gives Jennifer a cleaner digital presence: a strong
              introduction, an anchored brand section, and obvious places for
              future media, podcast, and booking content.
            </p>
            <p>
              The goal is for visitors to immediately understand who Jennifer
              is, what The Call Light Collective represents, and why they might
              want to keep listening, collaborate, or reach out.
            </p>
          </article>

          <aside className="story-card quote-card">
            <p className="quote-mark">&ldquo;</p>
            <p className="quote-text">
              A better first impression for podcast listeners, partners, and
              media opportunities.
            </p>
          </aside>
        </div>
      </section>

      <section className="content-section" id="collective">
        <div className="section-heading">
          <p className="eyebrow">The Call Light Collective</p>
          <h2>A cleaner section for the show, the mission, and future media visibility.</h2>
        </div>

        <div className="collective-grid">
          <div className="video-frame">
            <video
              controls
              playsInline
              preload="metadata"
              poster="/call-light-watermark.png"
            >
              <source src="/call-light-intro.mp4" type="video/mp4" />
              Your browser does not support embedded video playback.
            </video>
          </div>

          <div className="collective-copy">
            <p>
              The structure still follows the original project brief: one
              polished place for Jennifer&apos;s bio, featured appearances,
              important links, and a media-ready foundation that can expand as
              the brand grows.
            </p>

            <ul className="promise-list">
              {promisePoints.map((point) => (
                <li key={point}>{point}</li>
              ))}
            </ul>
          </div>
        </div>
      </section>

      <section className="content-section">
        <div className="section-heading">
          <p className="eyebrow">What this site supports</p>
          <h2>Built to grow without feeling overdesigned.</h2>
        </div>

        <div className="spotlight-grid">
          {spotlightCards.map((card) => (
            <article key={card.title} className="spotlight-card">
              <h3>{card.title}</h3>
              <p>{card.body}</p>
            </article>
          ))}
        </div>
      </section>

      <section className="content-section connect-section" id="connect">
        <div className="section-heading">
          <p className="eyebrow">Connect</p>
          <h2>Ready for final public contact details when you have them.</h2>
        </div>

        <div className="connect-panel">
          <div>
            <p>
              The layout is intentionally ready for Jennifer&apos;s final public
              contact details, media kit link, and real appearance URLs so we
              can wire those in cleanly once they&apos;re confirmed.
            </p>
          </div>

          <div className="status-stack">
            <div className="status-card">
              <span className="status-label">Next content to add</span>
              <strong>Public contact email or booking link</strong>
            </div>
            <div className="status-card">
              <span className="status-label">Recommended next update</span>
              <strong>Media kit PDF and first featured appearance links</strong>
            </div>
          </div>
        </div>
      </section>
    </main>
  );
}
