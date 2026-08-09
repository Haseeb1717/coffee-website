<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Coffee &amp; Bean — Our Signature</title>
  <link rel="icon" type="image/png" href="{{ asset('assets/Images/favicon (1).ico') }}">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,500;0,700;1,500&family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="{{ asset('assets/css/menu.css') }}">
  
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

            @forelse ($coffees->take(5) as $coffee)
              <div class="product-slot">
                <img src="{{ $coffee->image_url ?: 'https://images.pexels.com/photos/302899/pexels-photo-302899.jpeg?auto=compress&cs=tinysrgb&w=200&h=300&fit=crop' }}" alt="{{ $coffee->name }}">
                <span class="slot-label">{{ $coffee->name }}</span>
                <button class="slot-cart-btn" onclick="addToCart('{{ addslashes($coffee->name) }}')"><svg viewBox="0 0 24 24"><circle cx="9" cy="21" r="1"/><circle cx="20" cy="21" r="1"/><path d="M1 1h4l2.68 13.39a2 2 0 002 1.61H19a2 2 0 001.95-1.57l1.54-7.42H6"/></svg></button>
              </div>
            @empty
              <div class="product-slot">
                <span class="slot-label">No coffee items yet</span>
              </div>
            @endforelse

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
@include('partial.navbar')
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
