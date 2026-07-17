<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Coffee &amp; Bean — Our Signature</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,500;0,700;1,500&family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
  <style>
    *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }
    html { scroll-behavior: smooth; }

    body {
      font-family: 'Poppins', sans-serif;
      background: #1e0f07;
      color: #f0ddbf;
      min-height: 100vh;
      background-image: url("https://urbanasuperfoods.com/cdn/shop/files/4bfb1b99-57a2-41a2-83c7-2645123f7d77.webp?v=1779263609");
      background-size: cover;
      background-position: center;
      background-repeat: no-repeat;
      background-attachment: fixed;
      min-height: 100vh;
    }

    /* ===== TOP BAR ===== */
    .top-brand {
      text-align: center;
      padding: .45rem 0 .2rem;
      background: #2a150b;
      font-family: 'Playfair Display', serif;
      font-style: italic;
      font-size: .85rem;
      color: #c9924a;
      letter-spacing: 2px;
      border-bottom: 1px solid rgba(201,146,74,.18);
    }

    /* ===== DESKTOP NAV ===== */
    .main-nav {
      background: #2a150b;
      display: flex;
      align-items: center;
      justify-content: center;
      gap: 2.5rem;
      padding: .7rem 2rem;
      border-bottom: 1px solid rgba(201,146,74,.18);
    }
    .main-nav a {
      color: #e8cfa0;
      text-decoration: none;
      font-size: .88rem;
      font-weight: 400;
      letter-spacing: .5px;
      transition: color .2s;
    }
    .main-nav a:hover { color: #c9924a; }

    /* ===== MOBILE NAV BAR (hidden on desktop) ===== */
    .mobile-nav-bar {
      display: none;
      align-items: center;
      justify-content: space-between;
      padding: .6rem 1.2rem;
      background: #2a150b;
      border-bottom: 1px solid rgba(201,146,74,.18);
    }
    .hamburger {
      display: flex;
      flex-direction: column;
      gap: 5px;
      cursor: pointer;
      padding: .4rem;
      background: none;
      border: none;
    }
    .hamburger span {
      display: block;
      width: 22px; height: 2px;
      background: #c9924a;
      border-radius: 2px;
      transition: all .3s ease;
    }
    .hamburger.open span:nth-child(1) { transform: translateY(7px) rotate(45deg); }
    .hamburger.open span:nth-child(2) { opacity: 0; }
    .hamburger.open span:nth-child(3) { transform: translateY(-7px) rotate(-45deg); }

    .mobile-menu {
      display: none;
      flex-direction: column;
      background: #2a150b;
      border-bottom: 1px solid rgba(201,146,74,.2);
    }
    .mobile-menu.open { display: flex; }
    .mobile-menu a {
      padding: .75rem 1.5rem;
      color: #e8cfa0;
      text-decoration: none;
      font-size: .9rem;
      border-bottom: 1px solid rgba(201,146,74,.08);
      transition: background .2s, color .2s;
    }
    .mobile-menu a:hover { background: rgba(201,146,74,.1); color: #c9924a; }

    /* ===== FILTER BAR ===== */
    .filter-bar {
      background: #2a150b;
      display: flex;
      align-items: center;
      flex-wrap: nowrap;
      gap: .6rem;
      padding: .65rem 1.2rem;
      border-bottom: 2px solid #1e0f07;
      overflow-x: auto;
      -webkit-overflow-scrolling: touch;
      scrollbar-width: none;
    }
    .filter-bar::-webkit-scrollbar { display: none; }

    .filter-label {
      font-size: .82rem;
      color: #c9924a;
      font-weight: 600;
      white-space: nowrap;
      flex-shrink: 0;
    }
    .filter-bar select {
      appearance: none;
      flex-shrink: 0;
      background: #3a200f;
      border: 1px solid rgba(201,146,74,.35);
      color: #e8cfa0;
      padding: .42rem .9rem .42rem .65rem;
      border-radius: 6px;
      font-size: .8rem;
      font-family: inherit;
      cursor: pointer;
      background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='10' height='6'%3E%3Cpath d='M0 0l5 6 5-6z' fill='%23c9924a'/%3E%3C/svg%3E");
      background-repeat: no-repeat;
      background-position: right 8px center;
      padding-right: 24px;
    }
    .filter-bar select:focus { outline: none; border-color: #c9924a; }

    .clear-btn {
      flex-shrink: 0;
      background: #c9924a;
      color: #1e0f07;
      border: none;
      padding: .42rem 1.1rem;
      border-radius: 6px;
      font-size: .8rem;
      font-weight: 600;
      font-family: inherit;
      cursor: pointer;
      white-space: nowrap;
      transition: background .2s;
    }
    .clear-btn:hover { background: #e0a85e; }

    /* Account & Cart */
    .nav-right {
      display: flex;
      align-items: center;
      gap: .5rem;
      flex-shrink: 0;
      margin-left: auto;
    }
    .acct-wrap, .cart-wrap { position: relative; }
    .icon-pill {
      display: flex;
      align-items: center;
      gap: .4rem;
      background: #3a200f;
      border: 1px solid rgba(201,146,74,.35);
      border-radius: 6px;
      padding: .38rem .7rem;
      cursor: pointer;
      font-size: .8rem;
      color: #e8cfa0;
      transition: border-color .2s;
      user-select: none;
      white-space: nowrap;
    }
    .icon-pill:hover { border-color: #c9924a; }
    .icon-pill svg { width: 15px; height: 15px; fill: none; stroke: #c9924a; stroke-width: 1.8; }
    .cart-badge {
      background: #c9924a;
      color: #1e0f07;
      font-size: .68rem;
      font-weight: 700;
      padding: .1rem .4rem;
      border-radius: 999px;
      line-height: 1.4;
    }
    .dropdown {
      display: none;
      position: absolute;
      right: 0; top: calc(100% + 6px);
      background: #2d1708;
      border: 1px solid rgba(201,146,74,.3);
      border-radius: 8px;
      padding: .5rem 0;
      min-width: 150px;
      box-shadow: 0 12px 28px rgba(0,0,0,.5);
      z-index: 200;
    }
    .dropdown.open { display: block; }
    .dropdown a, .dropdown p {
      display: block;
      padding: .55rem 1rem;
      font-size: .82rem;
      color: #e8cfa0;
      text-decoration: none;
      transition: background .15s;
    }
    .dropdown a:hover { background: rgba(201,146,74,.15); color: #c9924a; }
    .dropdown .cart-header {
      padding: .55rem 1rem;
      font-size: .8rem;
      color: #c9924a;
      font-weight: 600;
      border-bottom: 1px solid rgba(201,146,74,.2);
      display: flex;
      justify-content: space-between;
    }

    /* ===== HERO ===== */
    .hero {
      text-align: center;
      padding: 2rem 1rem .5rem;
    }
    .hero h1 {
      font-family: 'Playfair Display', serif;
      font-size: 2.1rem;
      color: #c9924a;
      font-weight: 700;
    }

    /* ===== SECTION TITLE ===== */
    .section-title {
      font-family: 'Playfair Display', serif;
      font-size: 1.75rem;
      color: #c9924a;
      font-weight: 700;
      padding: .5rem 2.5rem 1rem;
    }

    /* ===== SHELF CABINET (3D stage) ===== */
    .shelf-cabinet {
      max-width: 1000px;
      margin: 0 auto 2.5rem;
      padding: 0 1.5rem;
      perspective: 1800px;
    }
    .shelf-unit {
      background: linear-gradient(180deg, #2c1508 0%, #1e0e07 100%);
      border-radius: 10px;
      overflow: hidden;
      border: 1px solid rgba(120,70,30,.4);
      box-shadow: 0 20px 50px rgba(0,0,0,.6);
      position: relative;
      transform-style: preserve-3d;
      animation: cabinetRise 1.1s cubic-bezier(.2,.8,.2,1) both;
    }
    @keyframes cabinetRise {
      0%   { opacity: 0; transform: rotateX(-22deg) translateY(40px); transform-origin: 50% 0%; }
      100% { opacity: 1; transform: rotateX(0deg) translateY(0); }
    }

    /* Gold side poles — desktop only */
    .shelf-unit::before,
    .shelf-unit::after {
      content: "";
      position: absolute;
      top: 0; bottom: 0;
      width: 14px;
      background: linear-gradient(90deg, #7a5a20, #c9a04a 40%, #e8c870 60%, #c9a04a 80%, #7a5a20);
      z-index: 5;
      border-radius: 4px;
      box-shadow: inset 0 0 6px rgba(0,0,0,.4);
    }
    .shelf-unit::before { left: 18px; }
    .shelf-unit::after  { right: 18px; }

    /* ===== CABINET DOORS (3D swing open) ===== */
    .cabinet-doors {
      position: absolute;
      inset: 0;
      z-index: 30;
      pointer-events: none;
      display: flex;
      perspective: 1400px;
    }
    .door {
      position: absolute;
      top: 0; bottom: 0;
      width: 50%;
      background:
        linear-gradient(90deg, rgba(0,0,0,.35), rgba(0,0,0,0) 40%, rgba(0,0,0,0) 60%, rgba(0,0,0,.35)),
        linear-gradient(180deg, #3a1d0c 0%, #240f06 100%);
      border: 1px solid rgba(120,70,30,.55);
      box-shadow: inset 0 0 30px rgba(0,0,0,.55);
      transform-style: preserve-3d;
      backface-visibility: hidden;
      pointer-events: auto;
    }
    .door.left  { left: 0;  transform-origin: left center;  animation: doorLeftOpen 1s cubic-bezier(.6,.05,.2,1) .35s both; }
    .door.right { right: 0; transform-origin: right center; animation: doorRightOpen 1s cubic-bezier(.6,.05,.2,1) .35s both; }
    @keyframes doorLeftOpen  { 0% { transform: rotateY(0deg); } 100% { transform: rotateY(-105deg); } }
    @keyframes doorRightOpen { 0% { transform: rotateY(0deg); } 100% { transform: rotateY(105deg); } }

    /* Door handle */
    .door::after {
      content: "";
      position: absolute;
      top: 50%;
      width: 6px; height: 60px;
      background: linear-gradient(180deg, #e8c870, #c9a04a 50%, #7a5a20);
      border-radius: 3px;
      box-shadow: 0 0 6px rgba(0,0,0,.5);
      transform: translateY(-50%);
    }
    .door.left::after  { right: 10px; }
    .door.right::after { left: 10px; }

    /* Door panels (decorative inset) */
    .door::before {
      content: "";
      position: absolute;
      inset: 18px 14px;
      border: 1px solid rgba(201,146,74,.25);
      border-radius: 6px;
      box-shadow: inset 0 0 18px rgba(0,0,0,.4);
    }

    .shelf-row {
      position: relative;
      padding: 0 52px;
    }
    .shelf-row:not(:last-child) {
      border-bottom: 1px solid rgba(90,50,20,.4);
    }

    /* ===== SHELF INNER (desktop) ===== */
    .shelf-inner {
      position: relative;
      padding: 2.5rem 0 0;
    }

    /* ===== PRODUCTS ROW (desktop: horizontal) ===== */
    .shelf-products {
      display: flex;
      justify-content: center;
      align-items: flex-end;
      gap: 0;
    }

    /* ===== SINGLE PRODUCT SLOT ===== */
    .product-slot {
      display: flex;
      flex-direction: column;
      align-items: center;
      flex: 1;
      max-width: 160px;
      position: relative;
      opacity: 0;
      transform: translateZ(-120px) rotateX(-25deg);
      transform-style: preserve-3d;
      animation: slotIn .8s cubic-bezier(.2,.8,.2,1) forwards;
    }
    @keyframes slotIn {
      0%   { opacity: 0; transform: translateZ(-120px) rotateX(-25deg); }
      100% { opacity: 1; transform: translateZ(0) rotateX(0); }
    }
    .shelf-row:nth-child(1) .product-slot:nth-child(1) { animation-delay: 1.15s; }
    .shelf-row:nth-child(1) .product-slot:nth-child(2) { animation-delay: 1.25s; }
    .shelf-row:nth-child(1) .product-slot:nth-child(3) { animation-delay: 1.35s; }
    .shelf-row:nth-child(1) .product-slot:nth-child(4) { animation-delay: 1.45s; }
    .shelf-row:nth-child(1) .product-slot:nth-child(5) { animation-delay: 1.55s; }
    .shelf-row:nth-child(2) .product-slot:nth-child(1) { animation-delay: 1.30s; }
    .shelf-row:nth-child(2) .product-slot:nth-child(2) { animation-delay: 1.40s; }
    .shelf-row:nth-child(2) .product-slot:nth-child(3) { animation-delay: 1.50s; }
    .shelf-row:nth-child(2) .product-slot:nth-child(4) { animation-delay: 1.60s; }
    .shelf-row:nth-child(2) .product-slot:nth-child(5) { animation-delay: 1.70s; }
    .shelf-row:nth-child(3) .product-slot:nth-child(1) { animation-delay: 1.45s; }
    .shelf-row:nth-child(3) .product-slot:nth-child(2) { animation-delay: 1.55s; }
    .shelf-row:nth-child(3) .product-slot:nth-child(3) { animation-delay: 1.65s; }
    .shelf-row:nth-child(3) .product-slot:nth-child(4) { animation-delay: 1.75s; }

    /* Lamp hotspot dot */
    .product-slot::before {
      content: "";
      position: absolute;
      top: 2px;
      left: 50%;
      transform: translateX(-50%);
      width: 10px; height: 6px;
      background: #fff9e0;
      border-radius: 50%;
      box-shadow:
        0 0 5px  4px  rgba(255,235,130,.95),
        0 0 14px 9px  rgba(255,215,80,.75),
        0 0 28px 16px rgba(255,195,50,.5),
        0 0 50px 28px rgba(255,175,30,.2);
      z-index: 4;
      pointer-events: none;
    }

    /* Light cone spreading down */
    .product-slot::after {
      content: "";
      position: absolute;
      top: 2px;
      left: 50%;
      transform: translateX(-50%);
      width: 140px;
      height: 210px;
      background: radial-gradient(ellipse 52% 100% at 50% 0%,
        rgba(255,225,110,.42) 0%,
        rgba(255,205,75,.22) 22%,
        rgba(255,185,50,.09) 52%,
        transparent 100%
      );
      pointer-events: none;
      z-index: 1;
    }

    .product-slot img {
      width: 100px;
      height: 155px;
      object-fit: cover;
      border-radius: 4px;
      display: block;
      position: relative;
      z-index: 2;
      filter: drop-shadow(0 8px 14px rgba(0,0,0,.6));
      transition: transform .3s ease;
    }
    .product-slot:hover img {
      transform: translateY(-6px) scale(1.03);
    }

    /* Cart button embedded inside slot — hidden on desktop, shown on mobile */
    .slot-cart-btn {
      display: none;
      width: 46px; height: 46px;
      border-radius: 50%;
      background: radial-gradient(circle at 40% 35%, #f0e0c0, #d4b87a 60%, #b8955a);
      border: none;
      cursor: pointer;
      place-items: center;
      box-shadow:
        0 4px 12px rgba(0,0,0,.5),
        inset 0 1px 2px rgba(255,255,255,.3),
        inset 0 -1px 2px rgba(0,0,0,.2);
      transition: transform .2s ease, box-shadow .2s ease;
      position: relative;
      z-index: 3;
      margin-top: .6rem;
    }
    .slot-cart-btn:hover { transform: scale(1.1); }
    .slot-cart-btn:active { transform: scale(.95); }
    .slot-cart-btn svg {
      width: 20px; height: 20px;
      fill: none;
      stroke: #3a1f08;
      stroke-width: 1.8;
      stroke-linecap: round;
      stroke-linejoin: round;
    }

    /* ===== SHELF PLANK ===== */
    .shelf-plank {
      width: 100%;
      height: 22px;
      margin-top: .2rem;
      background: linear-gradient(180deg,
        #7a4e2a 0%,
        #5c3518 35%,
        #3f2210 60%,
        #2c1508 100%
      );
      box-shadow:
        0 6px 16px rgba(0,0,0,.6),
        inset 0 2px 4px rgba(180,120,60,.25),
        inset 0 -2px 4px rgba(0,0,0,.4);
      position: relative;
      opacity: 0;
      transform: translateZ(-80px);
      animation: plankIn .7s cubic-bezier(.2,.8,.2,1) forwards;
    }
    .shelf-row:nth-child(1) .shelf-plank { animation-delay: 1.05s; }
    .shelf-row:nth-child(2) .shelf-plank { animation-delay: 1.20s; }
    .shelf-row:nth-child(3) .shelf-plank { animation-delay: 1.35s; }
    @keyframes plankIn {
      0%   { opacity: 0; transform: translateZ(-80px); }
      100% { opacity: 1; transform: translateZ(0); }
    }
    .shelf-plank::before {
      content: "";
      position: absolute;
      top: 0; left: 0; right: 0;
      height: 4px;
      background: linear-gradient(90deg,
        rgba(200,160,80,.15),
        rgba(200,160,80,.45) 20%,
        rgba(200,160,80,.6) 50%,
        rgba(200,160,80,.45) 80%,
        rgba(200,160,80,.15)
      );
    }

    /* ===== CART BUTTONS ROW (desktop) ===== */
    .shelf-carts {
      display: flex;
      justify-content: center;
      padding: .7rem 0 1rem;
      gap: 0;
      opacity: 0;
      animation: cartsIn .6s ease forwards;
    }
    .shelf-row:nth-child(1) .shelf-carts { animation-delay: 1.7s; }
    .shelf-row:nth-child(2) .shelf-carts { animation-delay: 1.85s; }
    .shelf-row:nth-child(3) .shelf-carts { animation-delay: 2.0s; }
    @keyframes cartsIn { to { opacity: 1; } }
    .cart-slot {
      flex: 1;
      max-width: 160px;
      display: flex;
      justify-content: center;
    }
    .shelf-cart-btn {
      width: 46px; height: 46px;
      border-radius: 50%;
      background: radial-gradient(circle at 40% 35%, #f0e0c0, #d4b87a 60%, #b8955a);
      border: none;
      cursor: pointer;
      display: grid;
      place-items: center;
      box-shadow:
        0 4px 12px rgba(0,0,0,.5),
        inset 0 1px 2px rgba(255,255,255,.3),
        inset 0 -1px 2px rgba(0,0,0,.2);
      transition: transform .2s ease, box-shadow .2s ease;
    }
    .shelf-cart-btn:hover { transform: scale(1.12); box-shadow: 0 6px 18px rgba(0,0,0,.6); }
    .shelf-cart-btn:active { transform: scale(.96); }
    .shelf-cart-btn svg {
      width: 20px; height: 20px;
      fill: none;
      stroke: #3a1f08;
      stroke-width: 1.8;
      stroke-linecap: round;
      stroke-linejoin: round;
    }

    /* ===== PASTRIES ===== */
    .pastries-section {
      max-width: 1000px;
      margin: 1.5rem auto 2.5rem;
      padding: 0 1.5rem;
    }
    .pastry-grid {
      display: grid;
      grid-template-columns: repeat(3, 1fr);
      gap: 1.2rem;
      perspective: 1200px;
    }
    .pastry-card {
      background: #2a1509;
      border-radius: 10px;
      overflow: hidden;
      border: 1px solid rgba(120,70,30,.3);
      transition: transform .3s ease, box-shadow .3s ease;
      box-shadow: 0 8px 24px rgba(0,0,0,.4);
      opacity: 0;
      transform: translateY(40px) rotateX(-15deg);
      transform-style: preserve-3d;
      animation: cardIn .8s cubic-bezier(.2,.8,.2,1) forwards;
    }
    .pastry-card:nth-child(1) { animation-delay: .1s; }
    .pastry-card:nth-child(2) { animation-delay: .25s; }
    .pastry-card:nth-child(3) { animation-delay: .4s; }
    @keyframes cardIn {
      to { opacity: 1; transform: translateY(0) rotateX(0); }
    }
    .pastry-card:hover { transform: translateY(-5px); box-shadow: 0 14px 32px rgba(0,0,0,.55); }
    .pastry-card img { width: 100%; height: 160px; object-fit: cover; display: block; }
    .pastry-card p {
      text-align: center;
      padding: .7rem .5rem .8rem;
      font-size: .9rem;
      color: #e0c8a0;
    }

    /* ===== FEATURES ===== */
    .features {
      max-width: 1000px;
      margin: 0 auto 2.5rem;
      padding: 0 1.5rem;
      display: grid;
      grid-template-columns: repeat(4, 1fr);
      gap: 1rem;
    }
    .feat {
      display: flex;
      align-items: center;
      gap: .75rem;
      padding: .9rem 1rem;
      background: #231108;
      border: 1px solid rgba(120,70,30,.3);
      border-radius: 10px;
    }
    .feat-icon {
      width: 40px; height: 40px;
      display: grid; place-items: center;
      font-size: 1.2rem;
      background: rgba(201,146,74,.12);
      border-radius: 50%;
      flex-shrink: 0;
    }
    .feat h4 { font-size: .85rem; color: #e0c8a0; margin-bottom: .1rem; }
    .feat p { font-size: .72rem; color: rgba(224,200,160,.6); font-weight: 300; }

    /* ===== FOOTER ===== */
    footer {
      background: #1a0b04;
      border-top: 1px solid rgba(120,70,30,.3);
      padding: 2rem 1.5rem 1.2rem;
    }
    .footer-top {
      max-width: 1000px;
      margin: 0 auto;
      display: grid;
      grid-template-columns: 1.4fr 1fr 1fr 1fr;
      gap: 2rem;
      padding-bottom: 1.5rem;
      border-bottom: 1px solid rgba(120,70,30,.25);
    }
    .footer-col h4 {
      font-family: 'Playfair Display', serif;
      color: #c9924a;
      font-size: 1rem;
      margin-bottom: .75rem;
      font-weight: 700;
    }
    .footer-col p, .footer-col a {
      display: block;
      font-size: .8rem;
      color: rgba(224,200,160,.7);
      margin-bottom: .4rem;
      text-decoration: none;
      transition: color .2s;
    }
    .footer-col a:hover { color: #c9924a; }
    .newsletter-row {
      display: flex;
      gap: .5rem;
      margin-top: .75rem;
    }
    .newsletter-row input {
      flex: 1;
      background: #2a1509;
      border: 1px solid rgba(201,146,74,.35);
      color: #e8cfa0;
      padding: .5rem .75rem;
      border-radius: 6px;
      font-size: .8rem;
      font-family: inherit;
    }
    .newsletter-row input::placeholder { color: rgba(224,200,160,.4); }
    .newsletter-row input:focus { outline: none; border-color: #c9924a; }
    .newsletter-row button {
      background: #c9924a;
      color: #1e0f07;
      border: none;
      padding: .5rem .85rem;
      border-radius: 6px;
      font-size: .8rem;
      font-weight: 600;
      font-family: inherit;
      cursor: pointer;
    }
    .newsletter-row button:hover { background: #e0a85e; }
    .socials {
      display: flex;
      gap: .5rem;
      margin-top: .75rem;
      align-items: center;
    }
    .socials span { font-size: .78rem; color: rgba(224,200,160,.6); }
    .social-link {
      width: 30px; height: 30px;
      display: grid; place-items: center;
      background: rgba(201,146,74,.12);
      border: 1px solid rgba(201,146,74,.3);
      border-radius: 50%;
      font-size: .75rem;
      color: #c9924a;
      text-decoration: none;
      transition: background .2s;
    }
    .social-link:hover { background: rgba(201,146,74,.3); }
    .footer-bottom {
      max-width: 1000px;
      margin: 1rem auto 0;
      text-align: center;
      font-size: .75rem;
      color: rgba(224,200,160,.4);
    }

    /* ===== TOAST ===== */
    .toast {
      position: fixed;
      bottom: 1.5rem; left: 50%;
      transform: translateX(-50%) translateY(120%);
      background: #2a1509;
      border: 1px solid #c9924a;
      color: #e8cfa0;
      padding: .75rem 1.4rem;
      border-radius: 999px;
      font-size: .85rem;
      font-weight: 500;
      box-shadow: 0 10px 28px rgba(0,0,0,.5);
      z-index: 300;
      transition: transform .35s cubic-bezier(.34,1.56,.64,1);
      white-space: nowrap;
    }
    .toast.show { transform: translateX(-50%) translateY(0); }

    /* ===========================
       RESPONSIVE
    =========================== */

    /* Tablet landscape */
    @media (max-width: 900px) {
      .product-slot img { width: 84px; height: 130px; }
      .product-slot::after { width: 110px; height: 175px; }
    }

    /* Tablet portrait — switch to mobile shelf layout */
    @media (max-width: 768px) {
      /* Hide desktop nav, show mobile bar */
      .main-nav   { display: none; }
      .top-brand  { display: none; }
      .mobile-nav-bar { display: flex; }

      .hero h1 { font-size: 1.7rem; }
      .section-title { padding: .5rem 1.2rem .75rem; font-size: 1.4rem; }

      /* ---- Shelf: vertical mobile layout ---- */
      .shelf-cabinet { padding: 0 .75rem; }

      /* Remove gold side poles on mobile */
      .shelf-unit::before,
      .shelf-unit::after { display: none; }

      .shelf-row { padding: 0 1rem; }
      .shelf-row:not(:last-child) { border-bottom: 2px solid rgba(90,50,20,.5); }

      /* Stack products vertically */
      .shelf-inner { padding: 1.2rem 0 .5rem; }
      .shelf-products {
        flex-direction: column;
        align-items: center;
        gap: 1.4rem;
        padding-bottom: .75rem;
      }

      /* Each slot: image + cart button inline */
      .product-slot {
        flex-direction: row;
        align-items: center;
        gap: 1.2rem;
        width: 100%;
        max-width: 320px;
        background: rgba(255,255,255,.03);
        border: 1px solid rgba(201,146,74,.15);
        border-radius: 12px;
        padding: .85rem 1.2rem;
      }

      /* Reposition spotlight for row layout */
      .product-slot::before {
        top: 50%;
        left: 2px;
        transform: translateY(-50%);
        width: 6px; height: 10px;
      }
      .product-slot::after {
        top: 50%;
        left: 2px;
        transform: translateY(-50%);
        width: 200px;
        height: 90px;
        background: radial-gradient(ellipse 100% 52% at 0% 50%,
          rgba(255,225,110,.38) 0%,
          rgba(255,205,75,.18) 30%,
          rgba(255,185,50,.07) 60%,
          transparent 100%
        );
      }

      /* Image sizing */
      .product-slot img {
        width: 70px;
        height: 100px;
        flex-shrink: 0;
      }
      .product-slot:hover img { transform: scale(1.05); }

      /* Show the embedded cart button */
      .slot-cart-btn { display: grid; }

      /* Cart button label next to it */
      .product-slot .slot-label {
        flex: 1;
        font-size: .85rem;
        color: #e0c8a0;
        font-weight: 500;
      }

      /* Hide desktop plank + cart row */
      .shelf-plank  { display: none; }
      .shelf-carts  { display: none; }

      /* Pastries */
      .pastry-grid { grid-template-columns: repeat(2, 1fr); }
      .pastry-card img { height: 130px; }

      /* Features */
      .features { grid-template-columns: repeat(2, 1fr); padding: 0 .75rem; }

      /* Footer */
      .footer-top { grid-template-columns: 1fr 1fr; gap: 1.5rem; }
    }

    /* Mobile small */
    @media (max-width: 480px) {
      .product-slot { max-width: 280px; }
      .pastry-grid { grid-template-columns: 1fr; }
      .pastry-card img { height: 180px; }
      .features { grid-template-columns: 1fr 1fr; }
      .footer-top { grid-template-columns: 1fr; gap: 1.25rem; }
      .hero h1 { font-size: 1.45rem; }
    }

    @media (max-width: 360px) {
      .features { grid-template-columns: 1fr; }
      .product-slot { max-width: 240px; }
      .product-slot img { width: 60px; height: 88px; }
    }
  </style>
</head>
<body>

  <!-- ===== TOP BAR ===== -->
  <div class="top-brand">Our Signature</div>

  <!-- ===== DESKTOP NAV ===== -->
  <nav class="main-nav">
    <a href="#">Our Story</a>
    <a href="#">All Brews</a>
    <a href="#">Gear</a>
    <a href="#">Subscriptions</a>
    <a href="#">Locations</a>
  </nav>

  <!-- ===== MOBILE NAV BAR ===== -->
  <div class="mobile-nav-bar">
    <span style="font-family:'Playfair Display',serif;font-size:.95rem;color:#c9924a;font-style:italic;">Our Signature</span>
    <button class="hamburger" id="hamburger" aria-label="Menu">
      <span></span><span></span><span></span>
    </button>
  </div>
  <div class="mobile-menu" id="mobileMenu">
    <a href="#">Our Story</a>
    <a href="#">All Brews</a>
    <a href="#">Gear</a>
    <a href="#">Subscriptions</a>
    <a href="#">Locations</a>
  </div>

  <!-- ===== FILTER BAR ===== -->
  <div class="filter-bar">
    <span class="filter-label">Filter By:</span>
    <select id="sel-category">
      <option>Category</option>
      <option>Hot Coffee</option>
      <option>Cold Brew</option>
      <option>Pastries</option>
    </select>
    <select id="sel-roast">
      <option>Roast Level</option>
      <option>Light</option>
      <option>Medium</option>
      <option>Dark</option>
      <option>Espresso</option>
    </select>
    <select id="sel-price">
      <option>Below Rating</option>
      <option>Below &#8377;150</option>
      <option>&#8377;150 – &#8377;200</option>
      <option>Above &#8377;200</option>
    </select>
    <select id="sel-avail">
      <option>Availability</option>
      <option>In Stock</option>
      <option>Best Sellers</option>
    </select>
    <select id="sel-sort">
      <option>Best Sellers</option>
      <option>Newest</option>
      <option>Price: Low-High</option>
      <option>Price: High-Low</option>
    </select>
    <button class="clear-btn" onclick="clearFilters()">Clear Filters</button>
    <div class="nav-right">
      <div class="acct-wrap">
        <div class="icon-pill" id="acctBtn">
          <svg viewBox="0 0 24 24"><circle cx="12" cy="8" r="4"/><path d="M4 20c0-4 3.6-7 8-7s8 3 8 7"/></svg>
          Account
        </div>
        <div class="dropdown" id="acctDropdown">
          <a href="#">&#43; Sign in</a>
          <a href="#">Create Account</a>
          <a href="#">Orders</a>
        </div>
      </div>
      <div class="cart-wrap">
        <div class="icon-pill" id="cartBtn">
          <svg viewBox="0 0 24 24"><path d="M6 2L3 6v14a2 2 0 002 2h14a2 2 0 002-2V6l-3-4z"/><line x1="3" y1="6" x2="21" y2="6"/><path d="M16 10a4 4 0 01-8 0"/></svg>
          Cart <span class="cart-badge" id="cartBadge">0</span>
        </div>
        <div class="dropdown" id="cartDropdown">
          <div class="cart-header">
            <span>Cart</span>
            <span id="cartItemsLabel">0 items</span>
          </div>
          <p id="cartEmpty" style="color:rgba(224,200,160,.5);padding:.8rem 1rem;font-size:.8rem;">Your cart is empty.</p>
        </div>
      </div>
    </div>
  </div>

  <!-- ===== HERO ===== -->
  <div class="hero"><h1>Popular Picks</h1></div>

  <!-- ===== COFFEE BLENDS ===== -->
  <div class="section-title">Coffee Blends</div>

  <div class="shelf-cabinet">
    <div class="shelf-unit">

      <!-- 3D cabinet doors that swing open -->
      <div class="cabinet-doors">
        <div class="door left"></div>
        <div class="door right"></div>
      </div>

      <!-- ── Shelf Row 1 ── -->
      <div class="shelf-row">
        <div class="shelf-inner">
          <div class="shelf-products">

            <div class="product-slot">
              <img src="https://images.pexels.com/photos/2226458/pexels-photo-2226458.jpeg?auto=compress&cs=tinysrgb&w=200&h=300&fit=crop" alt="Dark Roast">
              <span class="slot-label">Dark Roast</span>
              <button class="slot-cart-btn" onclick="addToCart('Dark Roast')"><svg viewBox="0 0 24 24"><circle cx="9" cy="21" r="1"/><circle cx="20" cy="21" r="1"/><path d="M1 1h4l2.68 13.39a2 2 0 002 1.61H19a2 2 0 001.95-1.57l1.54-7.42H6"/></svg></button>
            </div>

            <div class="product-slot">
              <img src="https://images.pexels.com/photos/1695052/pexels-photo-1695052.jpeg?auto=compress&cs=tinysrgb&w=200&h=300&fit=crop" alt="House Blend">
              <span class="slot-label">House Blend</span>
              <button class="slot-cart-btn" onclick="addToCart('House Blend')"><svg viewBox="0 0 24 24"><circle cx="9" cy="21" r="1"/><circle cx="20" cy="21" r="1"/><path d="M1 1h4l2.68 13.39a2 2 0 002 1.61H19a2 2 0 001.95-1.57l1.54-7.42H6"/></svg></button>
            </div>

            <div class="product-slot">
              <img src="https://images.pexels.com/photos/894695/pexels-photo-894695.jpeg?auto=compress&cs=tinysrgb&w=200&h=300&fit=crop" alt="Arabica">
              <span class="slot-label">Arabica</span>
              <button class="slot-cart-btn" onclick="addToCart('Arabica')"><svg viewBox="0 0 24 24"><circle cx="9" cy="21" r="1"/><circle cx="20" cy="21" r="1"/><path d="M1 1h4l2.68 13.39a2 2 0 002 1.61H19a2 2 0 001.95-1.57l1.54-7.42H6"/></svg></button>
            </div>

            <div class="product-slot">
              <img src="https://images.pexels.com/photos/312418/pexels-photo-312418.jpeg?auto=compress&cs=tinysrgb&w=200&h=300&fit=crop" alt="Single Origin">
              <span class="slot-label">Single Origin</span>
              <button class="slot-cart-btn" onclick="addToCart('Single Origin')"><svg viewBox="0 0 24 24"><circle cx="9" cy="21" r="1"/><circle cx="20" cy="21" r="1"/><path d="M1 1h4l2.68 13.39a2 2 0 002 1.61H19a2 2 0 001.95-1.57l1.54-7.42H6"/></svg></button>
            </div>

            <div class="product-slot">
              <img src="https://images.pexels.com/photos/585753/pexels-photo-585753.jpeg?auto=compress&cs=tinysrgb&w=200&h=300&fit=crop" alt="Gold Reserve">
              <span class="slot-label">Gold Reserve</span>
              <button class="slot-cart-btn" onclick="addToCart('Gold Reserve')"><svg viewBox="0 0 24 24"><circle cx="9" cy="21" r="1"/><circle cx="20" cy="21" r="1"/><path d="M1 1h4l2.68 13.39a2 2 0 002 1.61H19a2 2 0 001.95-1.57l1.54-7.42H6"/></svg></button>
            </div>

          </div>
        </div>
        <div class="shelf-plank"></div>
        <div class="shelf-carts">
          <div class="cart-slot"><button class="shelf-cart-btn" onclick="addToCart('Dark Roast')"><svg viewBox="0 0 24 24"><circle cx="9" cy="21" r="1"/><circle cx="20" cy="21" r="1"/><path d="M1 1h4l2.68 13.39a2 2 0 002 1.61H19a2 2 0 001.95-1.57l1.54-7.42H6"/></svg></button></div>
          <div class="cart-slot"><button class="shelf-cart-btn" onclick="addToCart('House Blend')"><svg viewBox="0 0 24 24"><circle cx="9" cy="21" r="1"/><circle cx="20" cy="21" r="1"/><path d="M1 1h4l2.68 13.39a2 2 0 002 1.61H19a2 2 0 001.95-1.57l1.54-7.42H6"/></svg></button></div>
          <div class="cart-slot"><button class="shelf-cart-btn" onclick="addToCart('Arabica')"><svg viewBox="0 0 24 24"><circle cx="9" cy="21" r="1"/><circle cx="20" cy="21" r="1"/><path d="M1 1h4l2.68 13.39a2 2 0 002 1.61H19a2 2 0 001.95-1.57l1.54-7.42H6"/></svg></button></div>
          <div class="cart-slot"><button class="shelf-cart-btn" onclick="addToCart('Single Origin')"><svg viewBox="0 0 24 24"><circle cx="9" cy="21" r="1"/><circle cx="20" cy="21" r="1"/><path d="M1 1h4l2.68 13.39a2 2 0 002 1.61H19a2 2 0 001.95-1.57l1.54-7.42H6"/></svg></button></div>
          <div class="cart-slot"><button class="shelf-cart-btn" onclick="addToCart('Gold Reserve')"><svg viewBox="0 0 24 24"><circle cx="9" cy="21" r="1"/><circle cx="20" cy="21" r="1"/><path d="M1 1h4l2.68 13.39a2 2 0 002 1.61H19a2 2 0 001.95-1.57l1.54-7.42H6"/></svg></button></div>
        </div>
      </div>

      <!-- ── Shelf Row 2 ── -->
      <div class="shelf-row">
        <div class="shelf-inner">
          <div class="shelf-products">

            <div class="product-slot">
              <img src="https://images.pexels.com/photos/2267873/pexels-photo-2267873.jpeg?auto=compress&cs=tinysrgb&w=200&h=300&fit=crop" alt="Dark Blend">
              <span class="slot-label">Dark Blend</span>
              <button class="slot-cart-btn" onclick="addToCart('Dark Blend')"><svg viewBox="0 0 24 24"><circle cx="9" cy="21" r="1"/><circle cx="20" cy="21" r="1"/><path d="M1 1h4l2.68 13.39a2 2 0 002 1.61H19a2 2 0 001.95-1.57l1.54-7.42H6"/></svg></button>
            </div>

            <div class="product-slot">
              <img src="https://images.pexels.com/photos/2267874/pexels-photo-2267874.jpeg?auto=compress&cs=tinysrgb&w=200&h=300&fit=crop" alt="Robusta">
              <span class="slot-label">Robusta</span>
              <button class="slot-cart-btn" onclick="addToCart('Robusta')"><svg viewBox="0 0 24 24"><circle cx="9" cy="21" r="1"/><circle cx="20" cy="21" r="1"/><path d="M1 1h4l2.68 13.39a2 2 0 002 1.61H19a2 2 0 001.95-1.57l1.54-7.42H6"/></svg></button>
            </div>

            <div class="product-slot">
              <img src="https://images.pexels.com/photos/1640777/pexels-photo-1640777.jpeg?auto=compress&cs=tinysrgb&w=200&h=300&fit=crop" alt="Morning Blend">
              <span class="slot-label">Morning Blend</span>
              <button class="slot-cart-btn" onclick="addToCart('Morning Blend')"><svg viewBox="0 0 24 24"><circle cx="9" cy="21" r="1"/><circle cx="20" cy="21" r="1"/><path d="M1 1h4l2.68 13.39a2 2 0 002 1.61H19a2 2 0 001.95-1.57l1.54-7.42H6"/></svg></button>
            </div>

            <div class="product-slot">
              <img src="https://images.pexels.com/photos/1251175/pexels-photo-1251175.jpeg?auto=compress&cs=tinysrgb&w=200&h=300&fit=crop" alt="Cold Brew">
              <span class="slot-label">Cold Brew</span>
              <button class="slot-cart-btn" onclick="addToCart('Cold Brew')"><svg viewBox="0 0 24 24"><circle cx="9" cy="21" r="1"/><circle cx="20" cy="21" r="1"/><path d="M1 1h4l2.68 13.39a2 2 0 002 1.61H19a2 2 0 001.95-1.57l1.54-7.42H6"/></svg></button>
            </div>

            <div class="product-slot">
              <img src="https://images.pexels.com/photos/302899/pexels-photo-302899.jpeg?auto=compress&cs=tinysrgb&w=200&h=300&fit=crop" alt="Ethiopian">
              <span class="slot-label">Ethiopian</span>
              <button class="slot-cart-btn" onclick="addToCart('Ethiopian')"><svg viewBox="0 0 24 24"><circle cx="9" cy="21" r="1"/><circle cx="20" cy="21" r="1"/><path d="M1 1h4l2.68 13.39a2 2 0 002 1.61H19a2 2 0 001.95-1.57l1.54-7.42H6"/></svg></button>
            </div>

          </div>
        </div>
        <div class="shelf-plank"></div>
        <div class="shelf-carts">
          <div class="cart-slot"><button class="shelf-cart-btn" onclick="addToCart('Dark Blend')"><svg viewBox="0 0 24 24"><circle cx="9" cy="21" r="1"/><circle cx="20" cy="21" r="1"/><path d="M1 1h4l2.68 13.39a2 2 0 002 1.61H19a2 2 0 001.95-1.57l1.54-7.42H6"/></svg></button></div>
          <div class="cart-slot"><button class="shelf-cart-btn" onclick="addToCart('Robusta')"><svg viewBox="0 0 24 24"><circle cx="9" cy="21" r="1"/><circle cx="20" cy="21" r="1"/><path d="M1 1h4l2.68 13.39a2 2 0 002 1.61H19a2 2 0 001.95-1.57l1.54-7.42H6"/></svg></button></div>
          <div class="cart-slot"><button class="shelf-cart-btn" onclick="addToCart('Morning Blend')"><svg viewBox="0 0 24 24"><circle cx="9" cy="21" r="1"/><circle cx="20" cy="21" r="1"/><path d="M1 1h4l2.68 13.39a2 2 0 002 1.61H19a2 2 0 001.95-1.57l1.54-7.42H6"/></svg></button></div>
          <div class="cart-slot"><button class="shelf-cart-btn" onclick="addToCart('Cold Brew')"><svg viewBox="0 0 24 24"><circle cx="9" cy="21" r="1"/><circle cx="20" cy="21" r="1"/><path d="M1 1h4l2.68 13.39a2 2 0 002 1.61H19a2 2 0 001.95-1.57l1.54-7.42H6"/></svg></button></div>
          <div class="cart-slot"><button class="shelf-cart-btn" onclick="addToCart('Ethiopian')"><svg viewBox="0 0 24 24"><circle cx="9" cy="21" r="1"/><circle cx="20" cy="21" r="1"/><path d="M1 1h4l2.68 13.39a2 2 0 002 1.61H19a2 2 0 001.95-1.57l1.54-7.42H6"/></svg></button></div>
        </div>
      </div>

      <!-- ── Shelf Row 3 ── -->
      <div class="shelf-row">
        <div class="shelf-inner">
          <div class="shelf-products">

            <div class="product-slot">
              <img src="https://images.pexels.com/photos/1793035/pexels-photo-1793035.jpeg?auto=compress&cs=tinysrgb&w=200&h=300&fit=crop" alt="Signature Dark">
              <span class="slot-label">Signature Dark</span>
              <button class="slot-cart-btn" onclick="addToCart('Signature Dark')"><svg viewBox="0 0 24 24"><circle cx="9" cy="21" r="1"/><circle cx="20" cy="21" r="1"/><path d="M1 1h4l2.68 13.39a2 2 0 002 1.61H19a2 2 0 001.95-1.57l1.54-7.42H6"/></svg></button>
            </div>

            <div class="product-slot">
              <img src="https://images.pexels.com/photos/209604/pexels-photo-209604.jpeg?auto=compress&cs=tinysrgb&w=200&h=300&fit=crop" alt="Decaf">
              <span class="slot-label">Decaf</span>
              <button class="slot-cart-btn" onclick="addToCart('Decaf')"><svg viewBox="0 0 24 24"><circle cx="9" cy="21" r="1"/><circle cx="20" cy="21" r="1"/><path d="M1 1h4l2.68 13.39a2 2 0 002 1.61H19a2 2 0 001.95-1.57l1.54-7.42H6"/></svg></button>
            </div>

            <div class="product-slot">
              <img src="https://images.pexels.com/photos/2518604/pexels-photo-2518604.jpeg?auto=compress&cs=tinysrgb&w=200&h=300&fit=crop" alt="Espresso Blend">
              <span class="slot-label">Espresso Blend</span>
              <button class="slot-cart-btn" onclick="addToCart('Espresso Blend')"><svg viewBox="0 0 24 24"><circle cx="9" cy="21" r="1"/><circle cx="20" cy="21" r="1"/><path d="M1 1h4l2.68 13.39a2 2 0 002 1.61H19a2 2 0 001.95-1.57l1.54-7.42H6"/></svg></button>
            </div>

            <div class="product-slot">
              <img src="https://images.pexels.com/photos/1640774/pexels-photo-1640774.jpeg?auto=compress&cs=tinysrgb&w=200&h=300&fit=crop" alt="Premium Reserve">
              <span class="slot-label">Premium Reserve</span>
              <button class="slot-cart-btn" onclick="addToCart('Premium Reserve')"><svg viewBox="0 0 24 24"><circle cx="9" cy="21" r="1"/><circle cx="20" cy="21" r="1"/><path d="M1 1h4l2.68 13.39a2 2 0 002 1.61H19a2 2 0 001.95-1.57l1.54-7.42H6"/></svg></button>
            </div>

          </div>
        </div>
        <div class="shelf-plank"></div>
        <div class="shelf-carts">
          <div class="cart-slot"><button class="shelf-cart-btn" onclick="addToCart('Signature Dark')"><svg viewBox="0 0 24 24"><circle cx="9" cy="21" r="1"/><circle cx="20" cy="21" r="1"/><path d="M1 1h4l2.68 13.39a2 2 0 002 1.61H19a2 2 0 001.95-1.57l1.54-7.42H6"/></svg></button></div>
          <div class="cart-slot"><button class="shelf-cart-btn" onclick="addToCart('Decaf')"><svg viewBox="0 0 24 24"><circle cx="9" cy="21" r="1"/><circle cx="20" cy="21" r="1"/><path d="M1 1h4l2.68 13.39a2 2 0 002 1.61H19a2 2 0 001.95-1.57l1.54-7.42H6"/></svg></button></div>
          <div class="cart-slot"><button class="shelf-cart-btn" onclick="addToCart('Espresso Blend')"><svg viewBox="0 0 24 24"><circle cx="9" cy="21" r="1"/><circle cx="20" cy="21" r="1"/><path d="M1 1h4l2.68 13.39a2 2 0 002 1.61H19a2 2 0 001.95-1.57l1.54-7.42H6"/></svg></button></div>
          <div class="cart-slot"><button class="shelf-cart-btn" onclick="addToCart('Premium Reserve')"><svg viewBox="0 0 24 24"><circle cx="9" cy="21" r="1"/><circle cx="20" cy="21" r="1"/><path d="M1 1h4l2.68 13.39a2 2 0 002 1.61H19a2 2 0 001.95-1.57l1.54-7.42H6"/></svg></button></div>
        </div>
      </div>

    </div><!-- /shelf-unit -->
  </div><!-- /shelf-cabinet -->
@include('partial.footer')
  <!--  TOAST -->
  <div class="toast" id="toast">&#10003; <span id="toastMsg">Added to cart</span></div>

  <script>
    let cartCount = 0;

    function addToCart(name) {
      cartCount++;
      document.getElementById('cartBadge').textContent = cartCount;
      document.getElementById('cartItemsLabel').textContent = cartCount + ' item' + (cartCount !== 1 ? 's' : '');
      document.getElementById('cartEmpty').style.display = 'none';
      document.getElementById('toastMsg').textContent = name + ' added to cart';
      const toast = document.getElementById('toast');
      toast.classList.add('show');
      clearTimeout(window._tt);
      window._tt = setTimeout(() => toast.classList.remove('show'), 2000);
    }

    function clearFilters() {
      ['sel-category','sel-roast','sel-price','sel-avail','sel-sort'].forEach(id => {
        document.getElementById(id).selectedIndex = 0;
      });
    }

    // Hamburger
    const hamburger = document.getElementById('hamburger');
    const mobileMenu = document.getElementById('mobileMenu');
    hamburger.addEventListener('click', e => {
      e.stopPropagation();
      hamburger.classList.toggle('open');
      mobileMenu.classList.toggle('open');
    });

    // Dropdowns
    function toggleDrop(dropId) {
      const drop = document.getElementById(dropId);
      const isOpen = drop.classList.contains('open');
      document.querySelectorAll('.dropdown').forEach(d => d.classList.remove('open'));
      if (!isOpen) drop.classList.add('open');
    }
    document.getElementById('acctBtn').addEventListener('click', e => { e.stopPropagation(); toggleDrop('acctDropdown'); });
    document.getElementById('cartBtn').addEventListener('click', e => { e.stopPropagation(); toggleDrop('cartDropdown'); });
    document.addEventListener('click', () => {
      document.querySelectorAll('.dropdown').forEach(d => d.classList.remove('open'));
      hamburger.classList.remove('open');
      mobileMenu.classList.remove('open');
    });
    mobileMenu.addEventListener('click', e => e.stopPropagation());
  </script>
</body>
</html>
