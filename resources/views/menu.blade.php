<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Coffee & Pastries</title>
  <style>
   body {
    font-family: 'Poppins', sans-serif;
    margin: 0;
    padding: 0;
    color: #f5e1c0;

    background-image: url("https://urbanasuperfoods.com/cdn/shop/files/4bfb1b99-57a2-41a2-83c7-2645123f7d77.webp?v=1779263609");
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
    background-attachment: fixed;

    min-height: 100vh;
}

.navbar {
  display: flex;
  justify-content: space-between;
  align-items: center;
  background-color: #3a2618;
  padding: 1rem 2rem;
}

.navbar ul {
  list-style: none;
  display: flex;
  gap: 1.5rem;
}

.navbar li {
  cursor: pointer;
  transition: color 0.3s;
}

.navbar li:hover {
  color: #d4a373;
}

.clear-btn {
  background-color: #d4a373;
  border: none;
  padding: 0.5rem 1rem;
  color: #2b1d13;
  cursor: pointer;
  border-radius: 4px;
}

.popular {
  text-align: center;
  margin: 2rem 0;
}

.shelves {
  display: flex;
  flex-direction: column;
  gap: 2rem;
  align-items: center;
}

.shelf {
  display: flex;
  justify-content: center;
  gap: 1rem;
  background-color: #4a2e1b;
  padding: 1rem;
  border-radius: 8px;
  box-shadow: inset 0 0 10px #1a0e07;
}

.shelf img {
  width: 120px;
  height: 160px;
  border-radius: 6px;
  transition: transform 0.3s;
}

.shelf img:hover {
  transform: scale(1.05);
}

.pastries {
  text-align: center;
  margin: 3rem 0;
}

.pastry-grid {
  display: flex;
  justify-content: center;
  gap: 2rem;
}

.pastry img {
  width: 150px;
  height: 150px;
  border-radius: 8px;
}

.footer {
  background-color: #3a2618;
  padding: 2rem;
  display: flex;
  flex-direction: column;
  gap: 1.5rem;
}

.footer .info {
  display: flex;
  justify-content: space-around;
  font-weight: bold;
}

.footer .links {
  display: flex;
  justify-content: space-around;
}
.shelf {
  display: flex;
  justify-content: center;
  gap: 1rem;
  background-color: #4a2e1b;
  padding: 1.5rem;
  border-radius: 8px;
  position: relative;
  box-shadow: inset 0 0 10px #1a0e07;
}

/* Add warm light glow on top */
.shelf::before {
  content: "";
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 40%;
  background: linear-gradient(to bottom, rgba(255, 220, 150, 0.6), transparent);
  border-top-left-radius: 8px;
  border-top-right-radius: 8px;
  pointer-events: none;
  box-shadow: 0 -10px 20px rgba(255, 220, 150, 0.4);
}

.shelf img {
  width: 120px;
  height: 160px;
  border-radius: 6px;
  transition: transform 0.3s;
}

.shelf img:hover {
  transform: scale(1.05);
}
/* Responsive adjustments */
@media (max-width: 1024px) {
  .navbar ul {
    gap: 1rem;
  }
  .pastry-grid {
    gap: 1rem;
  }
}

@media (max-width: 768px) {
  .navbar {
    flex-direction: column;
    align-items: flex-start;
  }
  .navbar ul {
    flex-direction: column;
    gap: 0.5rem;
  }
  .shelf {
    flex-wrap: wrap;
    justify-content: center;
  }
  .shelf img {
    width: 100px;
    height: 130px;
  }
  .pastry-grid {
    flex-wrap: wrap;
    justify-content: center;
  }
  .pastry img {
    width: 120px;
    height: 120px;
  }
  .footer .info,
  .footer .links {
    flex-direction: column;
    align-items: center;
    text-align: center;
  }
}

@media (max-width: 480px) {
  .navbar {
    padding: 1rem;
  }
  .clear-btn {
    width: 100%;
    margin-top: 0.5rem;
  }
  .shelf img {
    width: 80px;
    height: 110px;
  }
  .pastry img {
    width: 100px;
    height: 100px;
  }
}
.shelf{
    display:flex;
    justify-content:center;
    align-items:flex-start;
    gap:20px;

    width:fit-content;      /* only as wide as the products */
    max-width:90%;

    margin:30px auto;       /* center the shelf */

    padding:25px 35px;

    background:#4a2e1b;
    border-radius:12px;

    position:relative;

    box-shadow:
        inset 0 0 12px #1a0e07,
        0 10px 25px rgba(0,0,0,.45);
}
/* Each product item */
.product{
    width:130px;
    display:flex;
    flex-direction:column;
    align-items:center;
}

.product img {
  width: 120px;
  height: 160px;
  border-radius: 6px;
  transition: transform 0.3s;
}

.product img:hover {
  transform: scale(1.05);
}

.price {
  font-weight: bold;
}

.cart-btn {
  background-color: #d4a373;
  border: none;
  padding: 0.4rem 0.8rem;
  color: #2b1d13;
  cursor: pointer;
  border-radius: 4px;
}
</style>

</style>
</head>
<body>
  <header class="navbar">
    <div class="logo">Coffee & Bean</div>
    <nav>
      <ul>
        <li>Filter By</li>
        <li>Our Story</li>
        <li>All Brews</li>
        <li>Gear</li>
        <li>Subscriptions</li>
        <li>Locations</li>
      </ul>
    </nav>
    <button class="clear-btn">Clear Filters</button>
  </header>

  <section class="popular">
    <h2>Popular Picks</h2>
    <h3>Coffee Blends</h3>
    <div class="shelf">

    <div class="product">
        <img src="https://media.istockphoto.com/id/1358132613/photo/refreshing-hot-cup-of-coffee-at-a-cafe.jpg?s=612x612&w=0&k=20&c=ObwIF28Vt3k93Nch9U4QYUdOwMA_eiMwVVCvKbypnNc=" alt="Blend 1">
        <p class="price">OMR 2.50</p>
        <button class="cart-btn">Add to Cart</button>
    </div>

    <div class="product">
        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSP6AmfsIFqL1hnNQoKHxzJuqnpcBW1pBXu8WD8hqggF_ja6XuTPzpKn8gH&s=10" alt="Blend 2">
        <p class="price">OMR 2.50</p>
        <button class="cart-btn">Add to Cart</button>
    </div>

    <div class="product">
        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSP6AmfsIFqL1hnNQoKHxzJuqnpcBW1pBXu8WD8hqggF_ja6XuTPzpKn8gH&s=10" alt="Blend 3">
        <p class="price">OMR 2.50</p>
        <button class="cart-btn">Add to Cart</button>
    </div>

    <div class="product">
        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSP6AmfsIFqL1hnNQoKHxzJuqnpcBW1pBXu8WD8hqggF_ja6XuTPzpKn8gH&s=10" alt="Blend 4">
        <p class="price">OMR 2.50</p>
        <button class="cart-btn">Add to Cart</button>
    </div>

    <div class="product">
        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSP6AmfsIFqL1hnNQoKHxzJuqnpcBW1pBXu8WD8hqggF_ja6XuTPzpKn8gH&s=10" alt="Blend 5">
        <p class="price">OMR 2.50</p>
        <button class="cart-btn">Add to Cart</button>
    </div>

</div>
      <div class="shelf">

    <div class="product">
        <img src="https://media.istockphoto.com/id/1358132613/photo/refreshing-hot-cup-of-coffee-at-a-cafe.jpg?s=612x612&w=0&k=20&c=ObwIF28Vt3k93Nch9U4QYUdOwMA_eiMwVVCvKbypnNc=" alt="Blend 1">
        <p class="price">OMR 2.50</p>
        <button class="cart-btn">Add to Cart</button>
    </div>

    <div class="product">
        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSP6AmfsIFqL1hnNQoKHxzJuqnpcBW1pBXu8WD8hqggF_ja6XuTPzpKn8gH&s=10" alt="Blend 2">
        <p class="price">OMR 2.50</p>
        <button class="cart-btn">Add to Cart</button>
    </div>

    <div class="product">
        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSP6AmfsIFqL1hnNQoKHxzJuqnpcBW1pBXu8WD8hqggF_ja6XuTPzpKn8gH&s=10" alt="Blend 3">
        <p class="price">OMR 2.50</p>
        <button class="cart-btn">Add to Cart</button>
    </div>

    <div class="product">
        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSP6AmfsIFqL1hnNQoKHxzJuqnpcBW1pBXu8WD8hqggF_ja6XuTPzpKn8gH&s=10" alt="Blend 4">
        <p class="price">OMR 2.50</p>
        <button class="cart-btn">Add to Cart</button>
    </div>

    <div class="product">
        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSP6AmfsIFqL1hnNQoKHxzJuqnpcBW1pBXu8WD8hqggF_ja6XuTPzpKn8gH&s=10" alt="Blend 5">
        <p class="price">OMR 2.50</p>
        <button class="cart-btn">Add to Cart</button>
    </div>

</div>
      <div class="shelf">

    <div class="product">
        <img src="https://media.istockphoto.com/id/1358132613/photo/refreshing-hot-cup-of-coffee-at-a-cafe.jpg?s=612x612&w=0&k=20&c=ObwIF28Vt3k93Nch9U4QYUdOwMA_eiMwVVCvKbypnNc=" alt="Blend 1">
        <p class="price">OMR 2.50</p>
        <button class="cart-btn">Add to Cart</button>
    </div>

    <div class="product">
        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSP6AmfsIFqL1hnNQoKHxzJuqnpcBW1pBXu8WD8hqggF_ja6XuTPzpKn8gH&s=10" alt="Blend 2">
        <p class="price">OMR 2.50</p>
        <button class="cart-btn">Add to Cart</button>
    </div>

    <div class="product">
        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSP6AmfsIFqL1hnNQoKHxzJuqnpcBW1pBXu8WD8hqggF_ja6XuTPzpKn8gH&s=10" alt="Blend 3">
        <p class="price">OMR 2.50</p>
        <button class="cart-btn">Add to Cart</button>
    </div>

    <div class="product">
        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSP6AmfsIFqL1hnNQoKHxzJuqnpcBW1pBXu8WD8hqggF_ja6XuTPzpKn8gH&s=10" alt="Blend 4">
        <p class="price">OMR 2.50</p>
        <button class="cart-btn">Add to Cart</button>
    </div>

    <div class="product">
        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSP6AmfsIFqL1hnNQoKHxzJuqnpcBW1pBXu8WD8hqggF_ja6XuTPzpKn8gH&s=10" alt="Blend 5">
        <p class="price">OMR 2.50</p>
        <button class="cart-btn">Add to Cart</button>
    </div>
</div>
    </div>
  </section>

  <section class="pastries">
    <h3>Pastries</h3>
    <div class="pastry-grid">
      <div class="pastry"><img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTP04G0LdmNQdlu4kT5J7amtp4gPnuK29wmc70sCgdASw&s=10" alt="Croissant"><p>Croissants</p></div>
      <div class="pastry"><img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSCzbC1_5tmsw10r9vTjPNpxag8xiRtcotDgS6_AMSiQlnpw1qffsSEbAcg&s=10" alt="Muffin"><p>Muffins</p></div>
    </div>
  </section>

  <footer class="footer">
    <div class="info">
      <div>Delivery Order</div>
      <div>Fresh & Fast</div>
      <div>Secure Payment</div>
      <div>Loyalty Rewards</div>
    </div>
    <div class="links">
      <div>
        <h4>Quick Links</h4>
        <p>FAQ</p><p>Shipping & Delivery</p><p>Returns & Refunds</p><p>Privacy Policy</p>
      </div>
      <div>
        <h4>Contact Us</h4>
        <p>📞 +968 6888 8688</p>
        <p>✉️ borders@gmail.com</p>
        <p>🏠 175 Coffee Lane, Brew City, Oman</p>
      </div>
    </div>
  </footer>
</body>
</html>
