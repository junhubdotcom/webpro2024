document.addEventListener('DOMContentLoaded', () => {
const addToCartBtn = document.getElementById("addToCart");
const openIcn = document.getElementById("open_cart_icn");
const cart = document.getElementById("sidecart");
const closeBtn = document.getElementById("close_btn");
const backdrop = document.querySelector(".backdrop");
const itemsEl = document.querySelector(".items");
const cartItems = document.querySelector(".cart_items");
const itemsNum = document.getElementById("items_num");
const subtotalPrice = document.getElementById("subtotal_price");

let cart_data = [];

addToCartBtn.addEventListener("click", openCart);
openIcn.addEventListener("click", openCart);
closeBtn.addEventListener("click", closeCart);
backdrop.addEventListener("click", closeCart);


fetch('./addcart/readcart.php')
.then(response => response.json())
.then(data => {
  cart_data = data;
  renderCartItems();
  updateCart();
})
.catch(error => console.error('Error fetching cart data:', error));

// Open Cart
function openCart() {
  cart.classList.add("open");
  backdrop.style.display = "block";

  // Fetch cart data from PHP script
  fetch('./addcart/readcart.php')
  .then(response => response.json())
  .then(data => {
    cart_data = data;
    renderCartItems();
    updateCart();
  })
  .catch(error => console.error('Error fetching cart data:', error));

  setTimeout(() => {
    backdrop.classList.add("show");
  }, 0);
}

// Close Cart
function closeCart() {
  cart.classList.remove("open");
  backdrop.classList.remove("show");

  setTimeout(() => {
    backdrop.style.display = "none";
  }, 500);
}

//Remove Cart Items
function removeCartItem(cartID) {
  const formData = new FormData();
    formData.append('cartID', cartID);

    fetch('./addcart/removecart.php', {
        method: 'POST',
        body: formData
    })
    .then(response => {
        if (!response.ok) {
            throw new Error('Failed to delete cart item');
        }
        return response.text();
    })
    .then(data => {
        console.log('Item deleted successfully:', data);
        // Assuming you want to update the UI after deletion, you can update cart_data and re-render
        cart_data = cart_data.filter(item => item.cartID != cartID);
        updateCart();
    })
    .catch(error => {
        console.error('Error deleting cart item:', error);
        // Handle error scenarios here
    });
  
  updateCart()
}

// Calculate Items Number
function calcItemsNum() {
  let itemsCount = 0;
  
  cart_data.forEach((item) => (itemsCount += item.qty || 1));
  
  itemsNum.innerText = itemsCount;
}

// Calculate Subtotal Price
function calcSubtotalPrice() {
  let subtotal = 0;
  
  cart_data. forEach((item) => (subtotal += item.productPrice));

  if(subtotal === 0) {
    subtotalPrice.innerText = subtotal.toFixed(2);
  }
  else{
    subtotalPrice. innerText = subtotal.replace(/^0+/,'');
  }
  
  
}

// Update Cart Items
function updateCartItem(cartID, updates) {
  
}


//Display /Render Cart Items
function renderCartItems() {
    //remove everything from cart
    cartItems.innerHTML = "";
    //add new data
    cart_data.forEach((item) => {
    const cartItem = document.createElement("div");
    cartItem.classList.add("cart_item");
    cartItem.innerHTML = `
            <div class="remove_item">
            <span>&times;</span>
                    </div>
                    <div class="item_img">
                        <img src="images/snackbox.png" "alt="snackbox" />
                    </div>
                    <div class="item_details">
                        <p>${item.productName} Snack Box </p>
                        <strong>RM${item.productPrice}</strong>
                        <div class="plan">
                            <select id="city" name="city" class="form-control product_plan_select" required>
                                <option value="">Select City...</option>
                                <option value="Thailand">Thailand</option>
                                <option value="Japan">Japan</option>
                                <option value="Korean">Korean</option>
                            </select>
                            <button class="update_btn">Confirm</button>
                        </div>
                    </div>`;

  const removeBtn = cartItem.querySelector(".remove_item");
  removeBtn.addEventListener("click", () => {
    removeCartItem(item.cartID);
  });



    cartItems.appendChild(cartItem);
  });
}

function updateCart(){
    //render cart items when cart is updated
    renderCartItems()

    // Update Items Number in Cart
    calcItemsNum()

    //Update Subtotal 
    calcSubtotalPrice()
}
}
);
