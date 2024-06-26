document.addEventListener('DOMContentLoaded', () => {
  const addToCartBtn = document.getElementById("addToCart");
  const openIcn = document.getElementById("open_cart_icn");
  const cart = document.getElementById("sidecart");
  const closeBtn = document.getElementById("close_btn");
  const backdrop = document.querySelector(".backdrop");
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

   // Update Cart Items
   function updateCartItem(cartID, productName) {
    const formData = new FormData();
    formData.append('cartID', cartID);
    formData.append('productName', productName);
  
    fetch('./addcart/updatecart.php', {
      method: 'POST',
      body: formData
    })
    .then(response => {
      if (!response.ok) {
        throw new Error('Failed to update cart item');
      }
      return response.text();
    })
    .then(data => {
      console.log('Item updated successfully:', data);
      // Update cart_data and re-render
      const itemIndex = cart_data.findIndex(item => item.cartID == cartID);
      if (itemIndex !== -1) {
        cart_data[itemIndex].productName = productName;
      }
      updateCart();
    })
    .catch(error => {
      console.error('Error updating cart item:', error);
      // Handle error scenarios here
    });
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
                              <select id="productName-${item.cartID}" name="productName" class="form-control product_name_select" required>
                                  <option value="">Select Product...</option>
                                  <option value="Thailand Snack Box">Thailand</option>
                                  <option value="Japan Snack Box">Japan</option>
                                  <option value="Korean Snack">Korean</option>
                              </select>
                          </div>
                          <button class="update_btn" data-cart-id="${item.cartID}">Confirm</button>
                      </div>`;
  
    const removeBtn = cartItem.querySelector(".remove_item");
    removeBtn.addEventListener("click", () => {
      removeCartItem(item.cartID);
    });
  
    const updateBtn = cartItem.querySelector(".update_btn");
    updateBtn.addEventListener("click", () => {
      const productName = document.getElementById(`productName-${item.cartID}`).value;
      updateCartItem(item.cartID, productName);
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