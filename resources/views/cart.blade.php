<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Styled Cart</title>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&family=Playfair+Display:wght@700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="{{ asset('assets/css/cart.css') }}">
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

