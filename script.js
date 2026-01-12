let total = 0;
let count = 0;

function toggleCart(){
  document.getElementById("cart").classList.toggle("active");
}

function addToCart(name, price, btn){
  const img = btn.parentElement.querySelector("img").src;

  // PHP session me cart add karne ke liye fetch
  fetch("add_to_cart.php", {
      method: "POST",
      headers: { "Content-Type": "application/x-www-form-urlencoded" },
      body: `name=${encodeURIComponent(name)}&price=${encodeURIComponent(price)}&img=${encodeURIComponent(img)}`
    })
    .then(res => res.text())
    .then(data => {
      // Side cart open
      document.getElementById("cart").classList.add("active");
      document.getElementById("orderBtn").style.display = "block";

      // Cart UI update
      const item = document.createElement("div");
      item.className = "cart-item";
      item.innerHTML = `
        <img src="${img}">
        <div>
          <p>${name}</p>
          <small>Rs ${price}</small>
        </div>
      `;
      document.getElementById("cartItems").appendChild(item);

      // Total + count update
      total += price;
      count++;
      document.getElementById("total").innerText = total;
      document.getElementById("cartCount").innerText = count;

      alert("Added to cart");
    });
}

function goCheckout(){
  window.location.href = "checkout.php";
}
