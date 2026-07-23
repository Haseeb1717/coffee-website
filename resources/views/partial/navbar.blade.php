<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title>Coffee & Bean Navbar</title>
<style>
  :root {
    --bg: #f7f3ee;
    --bg-soft: #fffaf3;
    --primary: #6f4e37;
    --primary-dark: #4b3220;
    --accent: #c9a27e;
    --text: #2a1d12;
    --muted: #8a7461;
    --border: rgba(111, 78, 55, 0.18);
    --border-strong: rgba(111, 78, 55, 0.35);
    --shadow: 0 10px 30px rgba(75, 50, 32, 0.12);
    --radius: 14px;
  }

  
  /* Header / Navbar */
  .navbar {
    position: sticky;
    top: 0;
    z-index: 50;
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 16px;
    padding: 18px 30px;
    background:transparent;
   }

  .logo {
    display: flex;
    align-items: center;
    gap: 10px;
    text-decoration: none;
    color: var(--primary-dark);
    font-weight: 700;
    font-size: 20px;
    letter-spacing: 0.3px;
  }
  .logo-icon {
    font-size: 24px;
    line-height: 1;
  }
  .logo span { color: var(--accent); }

  /* Nav links with light border */
  .nav-links {
    display: flex;
    align-items: center;
    gap: 6px;
    border: 2px solid var(--border);
    border-radius: 999px;
  padding: 8px 16px;
  
    list-style: none;
  }
  .nav-links a {
    display: inline-block;
    padding: 8px 16px;
    text-decoration: none;
    color:#fff;
    font-size: 15px;
    font-weight: 500;
    border-radius: 999px;
  
    transition: all 0.25s ease;
  }
  .nav-links a:hover {
    background: var(--primary);
    color: #fff;
    border-color: var(--primary);
    transform: translateY(-1px);
  }
  .nav-links a.active {
    background: var(--primary-dark);
    color: #fff;
    border-color: var(--primary-dark);
  }

  /* Actions */
  .header-actions {
    display: flex;
    align-items: center;
    gap: 10px;
  }
  .icon-btn {
    position: relative;
    width: 42px;
    height: 42px;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    border: 1px solid var(--border);
    border-radius: 50%;
    background: var(--bg-soft);
    color: var(--primary-dark);
    cursor: pointer;
    transition: all 0.25s ease;
  }
  .icon-btn:hover {
    background: var(--primary);
    color: #fff;
    border-color: var(--primary);
    transform: translateY(-1px);
  }
  .icon-btn svg { width: 20px; height: 20px; }

  .cart-count {
    position: absolute;
    top: -4px;
    right: -4px;
    min-width: 18px;
    height: 18px;
    padding: 0 5px;
    background: #d9534f;
    color: #fff;
    font-size: 11px;
    font-weight: 700;
    border-radius: 999px;
    display: flex;
    align-items: center;
    justify-content: center;
    border: 2px solid var(--bg-soft);
  }

  /* Cart panel */
  .cart-panel {
    position: absolute;
    top: calc(100% + 10px);
    right: 28px;
    width: 320px;
    max-width: calc(100vw - 32px);
    background: var(--bg-soft);
    border: 1px solid var(--border);
    border-radius: var(--radius);
    box-shadow: var(--shadow);
    padding: 18px;
    opacity: 0;
    visibility: hidden;
    transform: translateY(-8px);
    transition: all 0.25s ease;
    z-index: 60;
  }
  .cart-panel.open {
    opacity: 1;
    visibility: visible;
    transform: translateY(0);
  }
  .cart-panel h3 {
    font-size: 16px;
    color: var(--primary-dark);
    margin-bottom: 4px;
  }
  .cart-sub {
    font-size: 13px;
    color: var(--muted);
    margin-bottom: 14px;
  }
  .cart-row {
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 10px 0;
    border-top: 1px dashed var(--border);
    font-size: 14px;
  }
  .cart-row .label { color: var(--muted); }
  .cart-row .value { font-weight: 600; color: var(--primary-dark); }
  .cart-checkout {
    margin-top: 14px;
    width: 100%;
    padding: 12px;
    background: var(--primary);
    color: #fff;
    border: none;
    border-radius: 10px;
    font-size: 14px;
    font-weight: 600;
    cursor: pointer;
    transition: background 0.25s ease;
  }
  .cart-checkout:hover { background: var(--primary-dark); }

  /* Mobile toggle */
  .menu-toggle {
    display: none;
    flex-direction: column;
    justify-content: center;
    gap: 5px;
    width: 42px;
    height: 42px;
    border: 1px solid var(--border);
    border-radius: 10px;
    background: var(--bg-soft);
    cursor: pointer;
  }
  .menu-toggle span {
    display: block;
    width: 20px;
    height: 2px;
    margin: 0 auto;
    background: var(--primary-dark);
    transition: all 0.3s ease;
  }

  /* Responsive */
  @media (max-width: 820px) {
    .navbar { padding: 12px 16px; }
    .cart-panel { right: 16px; }

    .menu-toggle { display: flex; }

    .nav-links {
      position: absolute;
      top: 100%;
      left: 0;
      right: 0;
      flex-direction: column;
      align-items: stretch;
      gap: 8px;
      padding: 14px 16px;
      background: var(--bg-soft);
      border-bottom: 1px solid var(--border);
      box-shadow: var(--shadow);
      transform: translateY(-10px);
      opacity: 0;
      visibility: hidden;
      transition: all 0.3s ease;
    }
    .nav-links.open {
      transform: translateY(0);
      opacity: 1;
      visibility: visible;
    }
    .nav-links a {
      display: block;
      border-radius: 10px;
      padding: 12px 16px;
    }
  }
</style>
</head>
<body>

  <nav class="navbar">
    <a href="#" class="logo">
      <span class="logo-icon">&#9749;</span>
      <span class="logo-text">coffee<span>& Bean</span></span>
    </a>

    <ul class="nav-links" id="navLinks">
      <li><a href="#" class="active">Home</a></li>
      <li><a href="#">About</a></li>
      <li><a href="#">Menu</a></li>
      <li><a href="#">Shop</a></li>
      <li><a href="#">Contact</a></li>
    </ul>

    <div class="header-actions">
      <div class="search-container">
  <button class="icon-btn" aria-label="search">
    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" 
         stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
      <!-- Circle for the lens -->
      <circle cx="11" cy="11" r="8"></circle>
      <!-- Line for the handle -->
      <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
    </svg>
  </button>
</div>

      <button class="icon-btn" id="cartBtn" aria-label="Cart">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
          <circle cx="9" cy="21" r="1"></circle>
          <circle cx="20" cy="21" r="1"></circle>
          <path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path>
        </svg>
        <span class="cart-count" id="cartCount">3</span>
      </button>

      <button class="icon-btn" aria-label="Profile">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
          <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
          <circle cx="12" cy="7" r="4"></circle>
        </svg>
      </button>

      <button class="menu-toggle" id="menuToggle" aria-label="Menu">
        <span></span>
        <span></span>
        <span></span>
      </button>
    </div>

    <!-- Cart panel -->
    <div class="cart-panel" id="cartPanel">
      <h3>Your Cart</h3>
      <p class="cart-sub">Quick summary of your selection</p>

      <div class="cart-row">
        <span class="label">Items in cart</span>
        <span class="value" id="cartItems">3</span>
      </div>
      <div class="cart-row">
        <span class="label">Subtotal</span>
        <span class="value">$18.50</span>
      </div>
      <div class="cart-row">
        <span class="label">Delivery</span>
        <span class="value">$2.00</span>
      </div>
      <div class="cart-row">
        <span class="label">Total</span>
        <span class="value">$20.50</span>
      </div>

      <button class="cart-checkout">Check further</button>
    </div>
  </nav>

<script>
  const cartBtn = document.getElementById('cartBtn');
  const cartPanel = document.getElementById('cartPanel');
  const menuToggle = document.getElementById('menuToggle');
  const navLinks = document.getElementById('navLinks');

  cartBtn.addEventListener('click', (e) => {
    e.stopPropagation();
    cartPanel.classList.toggle('open');
  });

  document.addEventListener('click', (e) => {
    if (!cartPanel.contains(e.target) && !cartBtn.contains(e.target)) {
      cartPanel.classList.remove('open');
    }
  });

  menuToggle.addEventListener('click', () => {
    navLinks.classList.toggle('open');
  });
</script>
</body>
</html>
