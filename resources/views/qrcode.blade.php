<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Brew & Bean - Artisan Coffee</title>
  <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;600;700;900&family=Inter:wght@300;400;500;600&display=swap" rel="stylesheet">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/gsap.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/ScrollTrigger.min.js"></script>
  <link rel="stylesheet" href="{{ asset('assets/css/welcome.css') }}">
</head>

<body>
  <!-- Floating Beans -->
  <div class="beans-container">
    <div class="bean"></div>
    <div class="bean"></div>
    <div class="bean"></div>
    <div class="bean"></div>
    <div class="bean"></div>
    <div class="bean"></div>
  </div>

  <!-- Sticky Coffee Image that follows scroll -->
  <div class="sticky-coffee" id="stickyCoffee">
    <div class="sticky-glow"></div>
   <img src="{{ asset('assets/mainimg.png') }}" alt="Main Image"  class="sticky-coffee-img"
      id="stickyCoffeeImg">
    
  </div>

  <!-- Header -->
  <header id="header">
    <a href="#" class="logo">
      <div class="logo-icon">&#9749;</div>
      <div class="logo-text">coffee<span>& Bean</span></div>
    </a>

    <ul class="nav-links">
      <li><a href="#">Home</a></li>
      <li><a href="#">Menu</a></li>
      <li><a href="#">About</a></li>
      <li><a href="#">Shop</a></li>
      <li><a href="#">Contact</a></li>
    </ul>

    <div class="header-actions">
      <button class="header-btn">Order Now</button>
    </div>

    <button class="menu-toggle" aria-label="Menu">
      <span></span>
      <span></span>
      <span></span>
    </button>
  </header>
  
<div style="min-height: 100vh; display: flex; align-items: center; justify-content: center;">
  <img src="{{ asset('assets/MY MENU.png') }}" alt="My Menu" style="display: block; max-width: 90vw; width: 420px; height: auto; margin: 0 auto;">
</div>