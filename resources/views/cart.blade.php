<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Styled Cart</title>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&family=Playfair+Display:wght@700&display=swap" rel="stylesheet">
  <style>
    /* Base style from your menu */
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
      padding: 2rem;
    }

    .container {
      display: flex;
      gap: 2rem;
      max-width: 1100px;
      margin: auto;
      flex-wrap: wrap;
    }

    .cart, .checkout {
      background: #2a1509;
      border: 1px solid rgba(201,146,74,.35);
      border-radius: 12px;
      padding: 1.5rem;
      flex: 1;
      min-width: 320px;
      box-shadow: 0 8px 24px rgba(0,0,0,.5);
    }

    h2 {
      font-family: 'Playfair Display', serif;
      color: #c9924a;
      margin-bottom: 1rem;
      font-size: 1.4rem;
    }

    /* Cart items */
    .cart-item {
      display: flex;
      align-items: center;
      margin-bottom: 1rem;
      border-bottom: 1px solid rgba(201,146,74,.25);
      padding-bottom: .8rem;
    }
    .cart-item img {
      width: 70px;
      height: 70px;
      border-radius: 8px;
      margin-right: 1rem;
      object-fit: cover;
      box-shadow: 0 4px 12px rgba(0,0,0,.6);
    }
    .details {
      flex: 1;
    }
    .details h3 {
      margin: 0;
      font-size: 1rem;
      color: #e8cfa0;
    }
    .details p {
      margin: .3rem 0;
      font-size: .85rem;
      color: rgba(224,200,160,.7);
    }
    .details span {
      font-weight: 600;
      color: #c9924a;
    }
    .cart-item input {
      width: 50px;
      padding: .3rem;
      background: #3a200f;
      border: 1px solid rgba(201,146,74,.35);
      color: #e8cfa0;
      border-radius: 6px;
    }
    .remove {
      background: none;
      border: none;
      cursor: pointer;
      font-size: 18px;
      color: #c9924a;
      margin-left: .5rem;
    }

    /* Checkout form */
    .checkout label {
      display: block;
      margin-top: .8rem;
      font-weight: 600;
      color: #c9924a;
      font-size: .85rem;
    }
    .checkout input {
      width: 100%;
      padding: .6rem;
      margin-top: .3rem;
      background: #3a200f;
      border: 1px solid rgba(201,146,74,.35);
      color: #e8cfa0;
      border-radius: 6px;
      font-size: .85rem;
    }
    .checkout input::placeholder { color: rgba(224,200,160,.4); }

    .summary {
      margin-top: 1.2rem;
      border-top: 1px solid rgba(201,146,74,.25);
      padding-top: 1rem;
    }
    .summary p {
      display: flex;
      justify-content: space-between;
      margin: .4rem 0;
      font-size: .9rem;
    }
    .summary strong { color: #c9924a; }

    .checkout-btn {
      margin-top: 1.2rem;
      width: 100%;
      padding: .8rem;
      background: #c9924a;
      color: #1e0f07;
      border: none;
      border-radius: 8px;
      font-size: 1rem;
      font-weight: 600;
      cursor: pointer;
      transition: background .2s;
    }
    .checkout-btn:hover { background: #e0a85e; }
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
  <div class="container">
    <!-- Cart Section -->
    <div class="cart">
      <h2>Shopping Cart</h2>
      <div class="cart-item">
        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTbEkG2KuQb9pLSQHksBIrTbECyNUkmLVpOFUVdKtAu0Q&s" alt="Italy Pizza">
        <div class="details">
          <h3>Italy Pizza</h3>
          <p>Extra cheese and topping</p>
          <span>$681</span>
        </div>
        <input type="number" value="1" min="1">
        <button class="remove">🗑</button>
      </div>

      <div class="cart-item">
        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRnQaTKwJjyl8oDF-ryeJreS1PF-5lM7257Caq7mp0kPQ&s=10" alt="Combo Plate">
        <div class="details">
          <h3>Combo Plate</h3>
          <p>Extra cheese and topping</p>
          <span>$681</span>
        </div>
        <input type="number" value="1" min="1">
        <button class="remove">🗑</button>
      </div>

      <div class="cart-item">
        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQ30vOnd7viVa7Mxmj3S6FIOE6SLOAiBeVPChjUDe3Htg&s=10" alt="Spanish Rice">
        <div class="details">
          <h3>Spanish Rice</h3>
          <p>Extra garlic</p>
          <span>$681</span>
        </div>
        <input type="number" value="1" min="1">
        <button class="remove">🗑</button>
      </div>
    </div>

    <!-- Checkout Section -->
    <div class="checkout">
      <h2>Card Details</h2>
      <form>
        <label>Name on card</label>
        <input type="text" placeholder="John Doe">

        <label>Card Number</label>
        <input type="text" placeholder="1111 2222 3333 4444">

        <label>Expiration Date</label>
        <input type="text" placeholder="MM/YY">

        <label>CVV</label>
        <input type="text" placeholder="123">

        <div class="summary">
          <p>Subtotal: <span>$1688</span></p>
          <p>Shipping: <span>$4</span></p>
          <p>Total (Tax Incl.): <strong>$1672</strong></p>
        </div>

        <button type="submit" class="checkout-btn">Checkout</button>
      </form>
    </div>
  </div>
</body>
</html>

