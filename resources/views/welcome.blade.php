<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Brew & Bean - Artisan Coffee</title>
  <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;600;700;900&family=Inter:wght@300;400;500;600&display=swap" rel="stylesheet">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/gsap.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/ScrollTrigger.min.js"></script>
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    :root {
      --primary-bg: #1a0f05;
      --secondary-bg: #2d1810;
      --accent: #C8A87A;
      --accent-light: #E5D4B8;
      --text-light: #F5EDE4;
      --text-muted: #A89A8C;
      --card-bg: #2a1a12;
    }

    html {
      scroll-behavior: smooth;
    }

    body {
      font-family: 'Inter', sans-serif;
      background-color: var(--primary-bg);
      color: var(--text-light);
      line-height: 1.6;
      overflow-x: hidden;
    }

=
    /* Hero Section */
    .hero {
      min-height: 150vh;
      display: flex;
      align-items: center;
      justify-content: center;
      padding: 8rem 5% 4rem;
      position: relative;
      overflow: hidden;
    }

    .hero::before {
      content: '';
      position: absolute;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
      width: 1000px;
      height: 1000px;
      background: radial-gradient(circle, rgba(200, 168, 122, 0.06) 0%, transparent 60%);
      border-radius: 50%;
      pointer-events: none;
    }

    .hero-container {
      text-align: center;
      max-width: 1200px;
      width: 100%;
      position: relative;
      z-index: 10;
    }

    /* Centered Hero Image */
    .hero-image-wrapper {
      display: flex;
      justify-content: center;
      align-items: center;
      margin: 2rem 0;
      position: relative;
    }

    .hero-image-container {
      position: relative;
      width: 380px;
      height: 380px;
      display: flex;
      align-items: center;
      justify-content: center;
    }

    .hero-glow {
      position: absolute;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
      width: 140%;
      height: 140%;
      background: radial-gradient(circle, rgba(200, 168, 122, 0.4) 0%, transparent 55%);
      filter: blur(60px);
      animation: pulse 3s ease-in-out infinite;
    }

    @keyframes pulse {
      0%, 100% { opacity: 0.6; transform: translate(-50%, -50%) scale(1); }
      50% { opacity: 1; transform: translate(-50%, -50%) scale(1.1); }
    }

    .hero-main-img {
      width: 340px;
      height: 340px;
      object-fit: contain;
      position: relative;
      z-index: 2;
      filter: drop-shadow(0 30px 60px rgba(0, 0, 0, 0.6));
      border-radius: 20px;
    }

    .hero-title-top {
      font-family: 'Playfair Display', serif;
      font-size: clamp(2.5rem, 7vw, 5rem);
      font-weight: 900;
      color: var(--text-light);
      letter-spacing: -1px;
      line-height: 1.1;
      margin-bottom: 1rem;
    }

    .hero-title-top span {
      color: var(--accent);
    }

    .hero-title-bottom {
      font-family: 'Playfair Display', serif;
      font-size: clamp(3rem, 8vw, 6rem);
      font-weight: 900;
      color: var(--text-light);
      letter-spacing: -1px;
      line-height: 1.1;
    }

    .hero-title-bottom span {
      color: var(--accent);
      display: block;
      font-size: clamp(3.5rem, 10vw, 7rem);
      margin-top: 0.3rem;
    }

    .hero-subtitle {
      font-size: 1.15rem;
      color: var(--text-muted);
      max-width: 550px;
      margin: 2rem auto 0;
      line-height: 1.8;
    }

    .hero-buttons {
      display: flex;
      gap: 1.2rem;
      justify-content: center;
      margin-top: 2.5rem;
      flex-wrap: wrap;
    }

    .btn-primary {
      background: linear-gradient(135deg, var(--accent), #B8976A);
      color: var(--primary-bg);
      border: none;
      padding: 1.1rem 2.8rem;
      border-radius: 35px;
      font-family: 'Inter', sans-serif;
      font-weight: 600;
      font-size: 1rem;
      cursor: pointer;
      transition: all 0.3s ease;
      box-shadow: 0 8px 30px rgba(200, 168, 122, 0.3);
    }

    .btn-primary:hover {
      transform: translateY(-4px);
      box-shadow: 0 15px 40px rgba(200, 168, 122, 0.5);
    }

    .btn-secondary {
      background: transparent;
      color: var(--text-light);
      border: 2px solid var(--accent);
      padding: 1.1rem 2.8rem;
      border-radius: 35px;
      font-family: 'Inter', sans-serif;
      font-weight: 600;
      font-size: 1rem;
      cursor: pointer;
      transition: all 0.3s ease;
    }

    .btn-secondary:hover {
      background: var(--accent);
      color: var(--primary-bg);
      transform: translateY(-4px);
    }

    /* Sticky Coffee Image - Follows Scroll */
    .sticky-coffee {
      position: fixed;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
      z-index: 50;
      pointer-events: none;
      opacity: 0;
      will-change: transform, opacity;
    }

    .sticky-coffee-img {
      width: 340px;
      height: 340px;
      object-fit: contain;
      filter: drop-shadow(0 30px 60px rgba(0, 0, 0, 0.6));
      border-radius: 20px;
    }

    .sticky-glow {
      position: absolute;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
      width: 140%;
      height: 140%;
      background: radial-gradient(circle, rgba(200, 168, 122, 0.4) 0%, transparent 55%);
      filter: blur(60px);
      z-index: -1;
    }

    /* Decorative Circles */
    .deco-circle {
      position: absolute;
      border: 1px solid rgba(200, 168, 122, 0.15);
      border-radius: 50%;
      pointer-events: none;
    }

    .deco-circle-1 {
      width: 600px;
      height: 600px;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
      animation: rotateCircle 40s linear infinite;
    }

    .deco-circle-2 {
      width: 750px;
      height: 750px;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
      animation: rotateCircle 50s linear infinite reverse;
    }

    @keyframes rotateCircle {
      from { transform: translate(-50%, -50%) rotate(0deg); }
      to { transform: translate(-50%, -50%) rotate(360deg); }
    }

    /* Floating Beans */
    .beans-container {
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      pointer-events: none;
      z-index: 1;
    }

    .bean {
      position: absolute;
      width: 20px;
      height: 28px;
      background: linear-gradient(135deg, var(--accent) 0%, #9A7A50 100%);
      border-radius: 50%;
      box-shadow: 0 4px 12px rgba(0, 0, 0, 0.3);
    }

    .bean::before {
      content: '';
      position: absolute;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
      width: 2px;
      height: 65%;
      background: rgba(26, 15, 5, 0.4);
      border-radius: 2px;
    }

    .bean:nth-child(1) { top: 15%; left: 5%; transform: rotate(25deg); }
    .bean:nth-child(2) { top: 25%; right: 8%; transform: rotate(-35deg); }
    .bean:nth-child(3) { bottom: 35%; right: 3%; transform: rotate(55deg); }
    .bean:nth-child(4) { bottom: 20%; left: 7%; transform: rotate(-20deg); }
    .bean:nth-child(5) { top: 50%; left: 2%; transform: rotate(70deg); }
    .bean:nth-child(6) { top: 45%; right: 5%; transform: rotate(15deg); }

    /* Coffee Cards Section */
    .coffees-section {
      min-height: 100vh;
      padding: 8rem 5%;
      position: relative;
      background: linear-gradient(180deg, var(--primary-bg) 0%, var(--secondary-bg) 50%, var(--primary-bg) 100%);
    }

    .section-header {
      text-align: center;
      margin-bottom: 5rem;
    }

    .section-subtitle {
      font-family: 'Playfair Display', serif;
      font-size: 1.2rem;
      color: var(--accent);
      letter-spacing: 3px;
      text-transform: uppercase;
      margin-bottom: 1rem;
    }

    .section-title {
      font-family: 'Playfair Display', serif;
      font-size: clamp(2.5rem, 6vw, 4rem);
      font-weight: 700;
      color: var(--text-light);
    }

    .section-title span {
      color: var(--accent);
    }

    /* Cards Container */
    .cards-container {
      display: flex;
      justify-content: center;
      align-items: stretch;
      gap: 2rem;
      max-width: 1400px;
      margin: 0 auto;
      flex-wrap: wrap;
    }

    /* Individual Card */
    .coffee-card {
      flex: 1;
      min-width: 300px;
      max-width: 380px;
      background: var(--card-bg);
      border-radius: 24px;
      overflow: hidden;
      position: relative;
      transition: all 0.4s ease;
      box-shadow: 0 10px 40px rgba(0, 0, 0, 0.3);
    }

    .coffee-card:hover {
      transform: translateY(-15px);
      box-shadow: 0 25px 60px rgba(200, 168, 122, 0.2);
    }

    /* Featured Center Card */
    .coffee-card.featured {
      min-width: 340px;
      max-width: 420px;
      transform: scale(1.08);
      z-index: 10;
      background: linear-gradient(145deg, #3a251a 0%, #2a1a12 100%);
      border: 2px solid rgba(200, 168, 122, 0.3);
    }

    .coffee-card.featured:hover {
      transform: scale(1.08) translateY(-15px);
    }

    .featured-badge {
      position: absolute;
      top: 1.2rem;
      right: 1.2rem;
      background: linear-gradient(135deg, var(--accent), #B8976A);
      color: var(--primary-bg);
      padding: 0.5rem 1rem;
      border-radius: 20px;
      font-size: 0.8rem;
      font-weight: 600;
      letter-spacing: 1px;
      text-transform: uppercase;
      z-index: 5;
    }

    .card-image-wrapper {
      position: relative;
      height: 280px;
      overflow: hidden;
      background: linear-gradient(180deg, rgba(200, 168, 122, 0.1) 0%, transparent 100%);
      display: flex;
      align-items: center;
      justify-content: center;
    }

    .coffee-card.featured .card-image-wrapper {
      height: 320px;
    }

    .card-image {
      width: 100%;
      height: 100%;
      object-fit: contain;
      padding: 1.5rem;
      transition: transform 0.5s ease;
    }

    .coffee-card:hover .card-image {
      transform: scale(1.08);
    }

    /* Placeholder for image that will be filled by scroll animation */
    .card-image-placeholder {
      width: 100%;
      height: 100%;
      display: flex;
      align-items: center;
      justify-content: center;
      padding: 1.5rem;
    }

    .card-image-placeholder img {
      width: 100%;
      height: 100%;
      object-fit: contain;
      opacity: 0;
    }

    .card-glow {
      position: absolute;
      bottom: 0;
      left: 50%;
      transform: translateX(-50%);
      width: 60%;
      height: 40%;
      background: radial-gradient(ellipse, rgba(200, 168, 122, 0.15) 0%, transparent 70%);
      pointer-events: none;
    }

    .card-content {
      padding: 1.8rem;
      text-align: center;
    }

    .card-category {
      font-size: 0.8rem;
      color: var(--accent);
      letter-spacing: 2px;
      text-transform: uppercase;
      margin-bottom: 0.5rem;
    }

    .card-title {
      font-family: 'Playfair Display', serif;
      font-size: 1.6rem;
      font-weight: 700;
      color: var(--text-light);
      margin-bottom: 0.8rem;
    }

    .coffee-card.featured .card-title {
      font-size: 1.8rem;
    }

    .card-description {
      font-size: 0.95rem;
      color: var(--text-muted);
      line-height: 1.6;
      margin-bottom: 1.5rem;
    }

    .card-footer {
      display: flex;
      justify-content: space-between;
      align-items: center;
      padding-top: 1rem;
      border-top: 1px solid rgba(200, 168, 122, 0.15);
    }

    .card-price {
      font-family: 'Playfair Display', serif;
      font-size: 1.5rem;
      font-weight: 700;
      color: var(--accent);
    }

    .card-price span {
      font-size: 0.9rem;
      color: var(--text-muted);
      font-family: 'Inter', sans-serif;
      font-weight: 400;
    }

    .card-btn {
      background: linear-gradient(135deg, var(--accent), #B8976A);
      color: var(--primary-bg);
      border: none;
      padding: 0.8rem 1.5rem;
      border-radius: 25px;
      font-family: 'Inter', sans-serif;
      font-weight: 600;
      font-size: 0.9rem;
      cursor: pointer;
      transition: all 0.3s ease;
    }

    .card-btn:hover {
      transform: scale(1.05);
      box-shadow: 0 5px 20px rgba(200, 168, 122, 0.4);
    }

    /* Mobile Menu */
    .menu-toggle {
      display: none;
      flex-direction: column;
      gap: 5px;
      background: none;
      border: none;
      cursor: pointer;
      padding: 0.5rem;
    }

    .menu-toggle span {
      width: 25px;
      height: 2px;
      background: var(--text-light);
      transition: 0.3s;
    }

    /* Responsive */
    @media (max-width: 1024px) {
      .cards-container {
        gap: 1.5rem;
      }

      .coffee-card.featured {
        transform: scale(1.03);
      }

      .coffee-card.featured:hover {
        transform: scale(1.03) translateY(-15px);
      }
    }

    @media (max-width: 768px) {
      .nav-links,
      .header-actions {
        display: none;
      }

      .menu-toggle {
        display: flex;
      }

      .hero {
        padding: 6rem 5% 3rem;
      }

      .hero-image-container {
        width: 280px;
        height: 280px;
      }

      .hero-main-img {
        width: 250px;
        height: 250px;
      }

      .sticky-coffee-img {
        width: 250px;
        height: 250px;
      }

      .cards-container {
        flex-direction: column;
        align-items: center;
      }

      .coffee-card {
        max-width: 100%;
      }

      .coffee-card.featured {
        transform: scale(1);
        order: -1;
      }

      .coffee-card.featured:hover {
        transform: translateY(-15px);
      }

      .btn-primary,
      .btn-secondary {
        padding: 0.9rem 2rem;
        font-size: 0.95rem;
      }
    }

    @media (max-width: 480px) {
     
      .hero-image-container {
        width: 220px;
        height: 220px;
      }

      .hero-main-img {
        width: 200px;
        height: 200px;
      }

      .sticky-coffee-img {
        width: 200px;
        height: 200px;
      }

      .hero-buttons {
        flex-direction: column;
        width: 100%;
      }

      .btn-primary,
      .btn-secondary {
        width: 100%;
      }

      .coffee-card.featured {
        min-width: auto;
      }
    }
  </style>
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
   @include('partial.navbar')

  <!-- Hero Section -->
  <section class="hero" id="heroSection">
    <div class="deco-circle deco-circle-1"></div>
    <div class="deco-circle deco-circle-2"></div>

    <div class="hero-container">
      <h1 class="hero-title-top">Here is your <span>Perfect</span></h1>

      <div class="hero-image-wrapper">
        <div class="hero-image-container" id="heroCoffee">
          <div class="hero-glow"></div>
          <img src="{{ asset('assets/mainimg.png') }}" alt="Main Image"   alt="Signature Coffee Cup"
            class="hero-main-img"
            id="heroImage"
          >
          
        </div>
      </div>

      <h1 class="hero-title-bottom">
        COFFEE <span>CUP</span>
      </h1>

      <p class="hero-subtitle">
        Experience the art of artisan coffee. From bean to cup, we bring you the finest selection of single-origin coffees from around the world.
      </p>

      <div class="hero-buttons">
        <button class="btn-primary">Explore Our Menu</button>
        <button class="btn-secondary">Learn More</button>
      </div>
    </div>
  </section>

  <!-- Coffee Cards Section -->
  <section class="coffees-section" id="coffees">
    <div class="section-header">
      <p class="section-subtitle">Our Selection</p>
      <h2 class="section-title">Signature <span>Coffees</span></h2>
    </div>

    <div class="cards-container">
      <!-- Card 1 - Left -->
      <div class="coffee-card">
        <div class="card-image-wrapper">
          <img
            src="https://images.pexels.com/photos/4107260/pexels-photo-4107260.jpeg?auto=compress&cs=tinysrgb&w=400"
            alt="Espresso"
            class="card-image"
          >
          <div class="card-glow"></div>
        </div>
        <div class="card-content">
          <p class="card-category">Classic</p>
          <h3 class="card-title">Rich Espresso</h3>
          <p class="card-description">Bold and intense, our signature espresso delivers a powerful kick with notes of dark chocolate and caramel.</p>
          <div class="card-footer">
            <p class="card-price">$4.50 <span>/ cup</span></p>
            <button class="card-btn">Add to Cart</button>
          </div>
        </div>
      </div>

      <!-- Card 2 - Center (Featured - target for scroll image) -->
      <div class="coffee-card featured" id="centerCard">
        <div class="featured-badge">Best Seller</div>
        <div class="card-image-wrapper" id="centerCardImageWrapper">
          <div class="card-image-placeholder" id="centerCardPlaceholder">
            <img
              src="https://images.pexels.com/photos/1697157/pexels-photo-1697157.jpeg?auto=compress&cs=tinysrgb&w=400"
              alt="Signature Blend"
              id="centerCardImage"
            >
          </div>
          <div class="card-glow"></div>
        </div>
        <div class="card-content">
          <p class="card-category">Premium</p>
          <h3 class="card-title">Signature Blend</h3>
          <p class="card-description">Our house special, crafted from the finest beans sourced from Ethiopia and Colombia. Smooth, balanced, unforgettable.</p>
          <div class="card-footer">
            <p class="card-price">$6.50 <span>/ cup</span></p>
            <button class="card-btn">Add to Cart</button>
          </div>
        </div>
      </div>

      <!-- Card 3 - Right -->
      <div class="coffee-card">
        <div class="card-image-wrapper">
          <img
            src="https://images.pexels.com/photos/3124111/pexels-photo-3124111.jpeg?auto=compress&cs=tinysrgb&w=400"
            alt="Cappuccino"
            class="card-image"
          >
          <div class="card-glow"></div>
        </div>
        <div class="card-content">
          <p class="card-category">Creamy</p>
          <h3 class="card-title">Silky Cappuccino</h3>
          <p class="card-description">Velvety steamed milk meets our expertly pulled espresso, topped with a cloud of microfoam perfection.</p>
          <div class="card-footer">
            <p class="card-price">$5.50 <span>/ cup</span></p>
            <button class="card-btn">Add to Cart</button>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Footer -->
  <footer>
    <div class="footer-logo">coffee<span>& Bean</span></div>
    <p class="footer-text">&copy; 2024 Coffee & Bean. Crafted with passion.</p>
  </footer>

  <script>
    // Register GSAP ScrollTrigger
    gsap.registerPlugin(ScrollTrigger);

    // Header scroll effect
    const header = document.getElementById('header');
    window.addEventListener('scroll', () => {
      if (window.scrollY > 80) {
        header.classList.add('scrolled');
      } else {
        header.classList.remove('scrolled');
      }
    });

    // Elements
    const heroImage = document.getElementById('heroImage');
    const heroCoffee = document.getElementById('heroCoffee');
    const stickyCoffee = document.getElementById('stickyCoffee');
    const stickyCoffeeImg = document.getElementById('stickyCoffeeImg');
    const centerCard = document.getElementById('centerCard');
    const centerCardImage = document.getElementById('centerCardImage');
    const coffeesSection = document.getElementById('coffees');

    // Hero entrance animations
    gsap.from('.hero-title-top', {
      opacity: 0,
      y: -60,
      duration: 1.2,
      ease: 'power3.out'
    });

    gsap.from('.hero-title-bottom', {
      opacity: 0,
      y: 60,
      duration: 1.2,
      ease: 'power3.out',
      delay: 0.2
    });

    gsap.from('.hero-image-container', {
      opacity: 0,
      scale: 0.6,
      duration: 1.5,
      ease: 'elastic.out(1, 0.5)',
      delay: 0.4
    });

    gsap.from('.hero-subtitle', {
      opacity: 0,
      y: 40,
      duration: 1,
      ease: 'power3.out',
      delay: 0.6
    });

    gsap.from('.hero-buttons', {
      opacity: 0,
      y: 40,
      duration: 1,
      ease: 'power3.out',
      delay: 0.8
    });

    gsap.from('.nav-links li', {
      opacity: 0,
      y: -20,
      duration: 0.8,
      stagger: 0.1,
      ease: 'power2.out',
      delay: 0.5
    });

    gsap.from('.logo', {
      opacity: 0,
      x: -30,
      duration: 0.8,
      ease: 'power2.out',
      delay: 0.3
    });

    // Floating beans animation
    gsap.to('.bean', {
      y: -25,
      rotation: '+=15',
      duration: 3,
      ease: 'sine.inOut',
      stagger: {
        each: 0.5,
        repeat: -1,
        yoyo: true
      }
    });

    // Main scroll animation - Coffee cup follows scroll and moves to center card
    const getCenterCardPosition = () => {
      const cardRect = centerCard.getBoundingClientRect();
      const cardImageWrapper = document.getElementById('centerCardImageWrapper');
      const wrapperRect = cardImageWrapper.getBoundingClientRect();

      return {
        x: wrapperRect.left + wrapperRect.width / 2,
        y: wrapperRect.top + wrapperRect.height / 2,
        width: wrapperRect.width,
        height: wrapperRect.height
      };
    };

    // Create the main scroll animation timeline
    const coffeeScrollTimeline = gsap.timeline({
      scrollTrigger: {
        trigger: '.hero',
        start: 'top top',
        end: () => `+=${window.innerHeight * 1.5}`,
        scrub: 1,
        pin: false,
        onUpdate: (self) => {
          const progress = self.progress;

          // Fade out hero content
          gsap.set('.hero-title-top, .hero-title-bottom, .hero-subtitle, .hero-buttons', {
            opacity: 1 - progress * 2
          });

          // Transition hero image to sticky
          gsap.set(heroCoffee, {
            opacity: 1 - progress,
            scale: 1 + progress * 0.2
          });

          gsap.set(stickyCoffee, {
            opacity: progress
          });
        }
      }
    });

    // Sticky coffee: smoothly move from viewport center into the featured card image
    ScrollTrigger.create({
      trigger: '#coffees',
      start: 'top bottom',
      end: 'top center',
      scrub: true,
      onEnter: () => gsap.to(stickyCoffee, { opacity: 1, duration: 0.25 }),
      onLeaveBack: () => gsap.to(stickyCoffee, { opacity: 1, duration: 0.25 }),
      onLeave: () => {
        gsap.to(stickyCoffee, { opacity: 0, duration: 0.25 });
        gsap.to(centerCardImage, { opacity: 1, duration: 0.3 });
      },
      onUpdate: (self) => {
        const progress = self.progress; // 0 -> 1

        // compute target in viewport coordinates
        const wrapper = document.getElementById('centerCardImageWrapper');
        const wrapperRect = wrapper.getBoundingClientRect();
        const targetCenterX = wrapperRect.left + wrapperRect.width / 2;
        const targetCenterY = wrapperRect.top + wrapperRect.height / 2;

        // start is viewport center
        const startX = window.innerWidth / 2;
        const startY = window.innerHeight / 2;

        // delta from center
        const deltaX = targetCenterX - startX;
        const deltaY = targetCenterY - startY;

        // scale target so the sticky image fits inside the card image area
        const targetScale = (wrapperRect.width / stickyCoffeeImg.offsetWidth) * 0.98;

        // set transform based on progress
        gsap.set(stickyCoffee, {
          x: deltaX * progress,
          y: deltaY * progress,
          scale: 1 + (targetScale - 1) * progress,
          rotation: progress * 6,
          transformOrigin: '50% 50%'
        });

        // fade hero image out as progress grows
        gsap.set(heroCoffee, { opacity: Math.max(0, 1 - progress * 1.4) });

        // reveal center card image as we approach
        const revealOpacity = progress > 0.65 ? (progress - 0.65) / 0.35 : 0;
        gsap.set(centerCardImage, { opacity: revealOpacity });
      }
    });

    // Section animations
    gsap.utils.toArray('.coffee-card').forEach((card, i) => {
      gsap.from(card, {
        scrollTrigger: {
          trigger: card,
          start: 'top 85%',
          toggleActions: 'play none none reverse'
        },
        opacity: 0,
        y: 60,
        duration: 1,
        ease: 'power3.out',
        delay: i * 0.1
      });
    });

    // Section header animation
    gsap.from('.section-header', {
      scrollTrigger: {
        trigger: '.section-header',
        start: 'top 85%',
        toggleActions: 'play none none reverse'
      },
      opacity: 0,
      y: 40,
      duration: 1,
      ease: 'power3.out'
    });

    // Parallax effect for decorative circles
    gsap.to('.deco-circle-1', {
      scrollTrigger: {
        trigger: '.hero',
        start: 'top top',
        end: 'bottom top',
        scrub: true
      },
      rotation: 90,
      scale: 1.2
    });

    gsap.to('.deco-circle-2', {
      scrollTrigger: {
        trigger: '.hero',
        start: 'top top',
        end: 'bottom top',
        scrub: true
      },
      rotation: -90,
      scale: 1.3
    });

    // Handle window resize
    let resizeTimeout;
    window.addEventListener('resize', () => {
      clearTimeout(resizeTimeout);
      resizeTimeout = setTimeout(() => {
        ScrollTrigger.refresh();
      }, 200);
    });
  </script>
</body>
</html>
