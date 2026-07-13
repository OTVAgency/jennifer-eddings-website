import Image from "next/image";

export default function Home() {
  const featuredLinks = [
    {
      label: "Start with Jennifer's story",
      href: "#story",
    },
    {
      label: "Explore the show vision",
      href: "#collective",
    },
    {
      label: "Plan a collaboration",
      href: "#connect",
    },
  ];

  const spotlightCards = [
    {
      title: "Personal brand introduction",
      body: "A warm, polished home base for Jennifer's message, background, and evolving body of work.",
    },
    {
      title: "Featured appearances",
      body: "Dedicated space for podcast episodes, interviews, and media moments as her public presence grows.",
    },
    {
      title: "Media and booking path",
      body: "A clear destination for future press materials, brand links, and collaboration requests.",
    },
  ];

  const promisePoints = [
    "Rooted in Jennifer's voice, healing perspective, and lived experience",
    "Built to support podcast growth, guest features, and future media outreach",
    "Designed mobile-first so listeners and collaborators can connect from anywhere",
  ];

  return (
    <main className="page-shell">
      <section className="hero-section">
        <div className="hero-copy">
          <p className="eyebrow">Jennifer Eddings</p>
          <h1>
            A personal brand home for a voice that turns hard stories into hope,
            honesty, and healing.
          </h1>
          <p className="hero-text">
            Jennifer&apos;s site is designed as a welcoming front door to The
            Call Light Collective, her story, and the collaborations still to
            come.
          </p>
          <div className="hero-actions">
            <a className="button button-primary" href="#connect">
              Inquire about booking
            </a>
            <a className="button button-secondary" href="#collective">
              Meet the brand
            </a>
          </div>
        </div>

        <div className="hero-mark">
          <div className="logo-card">
            <Image
              src="/call-light-watermark.png"
              alt="The Call Light Collective brand mark hosted by Jennifer Eddings"
              width={657}
              height={605}
            />
          </div>
        </div>
      </section>

      <section className="quick-links">
        {featuredLinks.map((item) => (
          <a key={item.href} className="quick-link-card" href={item.href}>
            <span>{item.label}</span>
            <span aria-hidden="true">→</span>
          </a>
        ))}
      </section>

      <section className="content-section" id="story">
        <div className="section-heading">
          <p className="eyebrow">About Jennifer</p>
          <h2>Built to hold both her story and her next chapter.</h2>
        </div>

        <div className="story-grid">
          <article className="story-card story-card-wide">
            <p>
              This first version of Jennifer&apos;s website centers her personal
              brand with clarity and care. It gives visitors one place to learn
              who she is, understand the heart behind The Call Light
              Collective, and follow the work as new interviews, features, and
              collaborations are added.
            </p>
            <p>
              The tone is intentionally warm and human instead of overly
              corporate, matching the expressive visual language already present
              in her brand assets.
            </p>
          </article>

          <aside className="story-card accent-card">
            <Image
              className="monogram"
              src="/clc-monogram.png"
              alt="CLC monogram graphic"
              width={438}
              height={438}
            />
            <p>
              Jennifer&apos;s visual identity already carries a sense of joy,
              softness, and resilience. This site extends that feeling into a
              digital home.
            </p>
          </aside>
        </div>
      </section>

      <section className="content-section" id="collective">
        <div className="section-heading">
          <p className="eyebrow">The Call Light Collective</p>
          <h2>A featured home for the show, the mission, and future media.</h2>
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
              The site structure follows the original project goal: one elegant
              place for Jennifer&apos;s bio, featured podcast appearances,
              media-ready positioning, and meaningful next steps for listeners
              or collaborators.
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
          <p className="eyebrow">What this site is ready for</p>
          <h2>Designed to grow with Jennifer&apos;s platform.</h2>
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
          <h2>Ready for booking, media, and collaboration details.</h2>
        </div>

        <div className="connect-panel">
          <div>
            <p>
              This build intentionally leaves room for Jennifer&apos;s final
              public contact details, media kit link, and featured appearance
              URLs so the site can be updated with the right public-facing
              information instead of placeholders.
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
