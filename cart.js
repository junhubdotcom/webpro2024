const ITEMS = [
  {
    id: 1,
    name: "Japan Suprize Box",
    price: 30,
    image: "images/shoppingcart.jpg",
    monthlyPlan: 12,
  },
  {
    id: 2,
    name: "Thailand Suprize Box",
    price: 30,
    image: "images/shoppingcart.jpg",
    monthlyPlan: 12,
  },
];

const openBtn = document.getElementById("open_cart_btn");
const cart = document.getElementById("sidecart");
const closeBtn = document.getElementById("close_btn");
const backdrop = document.querySelector(".backdrop");
const itemsEl = document.querySelector(".items");
const cartItems = document.querySelector(".cart_items");
const itemsNum = document.getElementById("items_num");
const subtotalPrice = document.getElementById("subtotal_price");

let cart_data = [

]

openBtn.addEventListener("click", openCart);
closeBtn.addEventListener("click", closeCart);
backdrop.addEventListener("click", closeCart);

renderItems();
renderCartItems();

// Open Cart
function openCart() {
  cart.classList.add("open");
  backdrop.style.display = "block";

  setTimeout(() => {
    backdrop.classList.add("show");
  }, 0);
}

// Add Items to Cart
function addItem(idx, itemId) {
  // find same items
  const foundedItem = cart_data.find(
  (item) => item.id.toString() === itemId.toString()
  )

  if (foundedItem) {
  // increase item qty
  } else {
  cart_data.push(ITEMS[idx])
  
  updateCart()
  openCart()
  }
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
function removeCartItem(itemId) {
  cart_data = cart_data.filter((item) => item.id != itemId)
  
  updateCart()
}

// Calculate Items Number
function calcItemsNum() {
  let itemsCount = 0
  
  cart_data.forEach((item) => (itemsCount += item.qty))
  
  itemsNum.innerText = itemsCount
}

// Calculate Subtotal Price
function calcSubtotalPrice() {
  let subtotal = 0
  
  cart_data. forEach((item) => (subtotal += item.price * item.qty))
  
  subtotalPrice. innerText = subtotal
}

// Render Items
function renderItems() {
  ITEMS.forEach((item, idx) => {
    const itemEl = document.createElement("div")
    itemEl.classList.add("item")
    itemEl.onclick = () => addItem(idx, item.id)
    itemEl.innerHTML = `
            <img src="${item.image}" alt="${item.name}">
            <div class="content">
                <h4>${item.name}</h4>
                <p>$${item.price}</p>
                <p>$${item.price}</p>
                <p>Monthly Plan: ${item.monthlyPlan}</p>
            </div>
            <button>Add to Cart</button>
        `;
    itemsEl.appendChild(itemEl);
  });
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
            <div class="remove_item" onclick="removeCartItem(${item.id})">
            <span>&times;</span>
                    </div>
                    <div class="item_img">
                        <img src="${item.image} "alt="snackbox" />
                    </div>
                    <div class="item_details">
                        <p>${item.name} SUB-Prize Snack Box </p>
                        <strong>$${item.price}</strong>
                        <div class="plan">
                            <select id="city" name="city" class="form-control" required>
                                <option value="">Select City...</option>
                                <option value="12">12 Months</option>
                                <option value="6">6 Months</option>
                                <option value="3">3 Months</option>
                                <option value="1">1 Month</option>
                            </select>
                        </div>
                    </div>`;

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