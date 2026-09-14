<!doctype html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="theme-color" content="#11110f" />
    <title>Page not found | Cafeo</title>
    <style>
      :root {
        color-scheme: dark;
        font-family: Inter, ui-sans-serif, system-ui, -apple-system, BlinkMacSystemFont, "Segoe UI", sans-serif;
        color: #f6f1e8;
        background: #11110f;
        font-synthesis: none;
        text-rendering: optimizeLegibility;
        -webkit-font-smoothing: antialiased;
        --canvas: #11110f;
        --panel: #181815;
        --line: #393832;
        --muted: #a8a49b;
        --soft: #d8d1c5;
        --cream: #f2eadc;
        --coffee: #a77a4f;
        --coffee-dark: #8c603b;
      }

      * { box-sizing: border-box; }

      html, body { min-width: 320px; min-height: 100%; }

      body {
        margin: 0;
        min-height: 100vh;
        background:
          radial-gradient(circle at 50% 42%, rgba(107, 79, 51, 0.12), transparent 29rem),
          var(--canvas);
      }

      a { color: inherit; text-decoration: none; }

      main {
        flex: 1;
        display: grid;
        place-items: center;
        padding: 78px 24px 96px;
      }

      .error-content {
        width: min(100%, 720px);
        display: flex;
        flex-direction: column;
        align-items: center;
        text-align: center;
        animation: rise-in 700ms cubic-bezier(.2,.8,.2,1) both;
      }

      .eyebrow {
        margin: 0 0 28px;
        color: var(--coffee);
        font-size: 11px;
        font-weight: 700;
        letter-spacing: 0.24em;
        text-transform: uppercase;
      }

      .error-art {
        position: relative;
        width: min(100%, 620px);
        min-height: 244px;
        display: grid;
        place-items: center;
        margin-bottom: 14px;
      }

      .error-number {
        margin: 0;
        color: var(--soft);
        font-family: Georgia, "Times New Roman", serif;
        font-size: clamp(180px, 29vw, 310px);
        font-weight: 400;
        letter-spacing: -0.13em;
        line-height: 0.7;
        transform: translateX(-12px);
        user-select: none;
      }

      .zero-slot {
        position: absolute;
        width: clamp(102px, 15vw, 156px);
        aspect-ratio: 1;
        top: 50%;
        left: 50%;
        display: grid;
        place-items: center;
        border: 1px dashed rgba(242, 234, 220, 0.38);
        border-radius: 50%;
        background: linear-gradient(145deg, rgba(62, 58, 51, 0.98), rgba(24, 24, 21, 0.94));
        box-shadow: 0 18px 45px rgba(0, 0, 0, 0.36), inset 0 0 0 10px rgba(242, 234, 220, 0.04);
        transform: translate(-50%, -50%) rotate(-9deg);
      }

      .zero-slot span {
        max-width: 78px;
        color: var(--muted);
        font-size: 8px;
        font-weight: 700;
        letter-spacing: 0.13em;
        line-height: 1.45;
        text-transform: uppercase;
      }

      .image-note {
        position: absolute;
        right: 6%;
        bottom: 4%;
        padding: 8px 12px;
        border: 1px solid rgba(242, 234, 220, 0.18);
        border-radius: 99px;
        color: #8e8a81;
        background: rgba(17, 17, 15, 0.7);
        font-size: 9px;
        letter-spacing: 0.1em;
        text-transform: uppercase;
      }

      h1 {
        max-width: 500px;
        margin: 0;
        color: var(--cream);
        font-family: Georgia, "Times New Roman", serif;
        font-size: clamp(25px, 4vw, 35px);
        font-weight: 400;
        letter-spacing: -0.035em;
        line-height: 1.15;
      }

      .message {
        max-width: 390px;
        margin: 15px 0 28px;
        color: var(--muted);
        font-size: 13px;
        line-height: 1.7;
      }

      .actions { display: flex; align-items: center; gap: 10px; }

      .button {
        min-width: 112px;
        padding: 12px 18px;
        border: 1px solid var(--line);
        border-radius: 3px;
        color: var(--soft);
        background: transparent;
        font: inherit;
        font-size: 11px;
        font-weight: 700;
        cursor: pointer;
        transition: transform 180ms ease, border-color 180ms ease, background 180ms ease, color 180ms ease;
      }

      .button:hover, .button:focus-visible { transform: translateY(-2px); border-color: var(--coffee); color: var(--cream); }

      .button-primary { border-color: var(--coffee); color: #fff7ec; background: var(--coffee-dark); }
      .button-primary:hover, .button-primary:focus-visible { background: var(--coffee); }

      .footer-note {
        position: absolute;
        bottom: 22px;
        left: 50%;
        width: 100%;
        transform: translateX(-50%);
        color: #625f58;
        font-size: 10px;
        letter-spacing: 0.14em;
        text-align: center;
        text-transform: uppercase;
      }

      @keyframes rise-in { from { opacity: 0; transform: translateY(18px); } to { opacity: 1; transform: translateY(0); } }

      @media (max-width: 640px) {
        .header-inner { width: min(100% - 32px, 1160px); min-height: 64px; }
        .main-nav { display: none; }
        .header-tools { margin-left: auto; }
        main { padding: 64px 16px 76px; }
        .error-art { min-height: 180px; }
        .error-number { transform: translateX(-6px); }
        .image-note { right: 0; bottom: 0; }
        .footer-note { bottom: 16px; font-size: 8px; }
      }
    </style>
</head>
  <body>

      <main>
        <section class="error-content" aria-labelledby="page-title">
          <p class="eyebrow">A little off the menu</p>
          <div class="error-art" aria-label="404 illustration placeholder">
            <p class="error-number" aria-hidden="true">404</p>
            <div class="zero-slot"><span>Replace with your image</span></div>
            <span class="image-note"></span>
          </div>
          <h1 id="page-title">Looks like this page took a coffee break.</h1>
          <p class="message">We couldn't find the page you're looking for. Let's get you back to something warm and familiar.</p>
          <div class="actions">
            <a class="button button-primary" href="/">Explore Menu</a>
            <a class="button" href="/">Go to Home</a>
          </div>
        </section>
      </main>

      <p class="footer-note">Slow down · Stay awhile · Enjoy the good stuff</p>
    </div>
  </body>
</html>
