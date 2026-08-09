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
            src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTiVjHrpcfvIPCU2zvMM-tK_nB6LU2dFEEcXRUtCw3af5FxA56A1HjgQlCp&s=10"
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
