let subtotal = 0;
const shippingCost = 30;
const discountPer = 0.25;
function addProduct() {
    let productName = document.getElementById("product-name").value;
    let productPrice = document.getElementById("product-price").value;
    let productQuantity = document.getElementById("product-quantity").value;
    let total = productPrice * productQuantity;
    const remove = "Remove";
    let list = [productName, productPrice, productQuantity, total, remove]
    let listProducts = document.getElementById("product-cart");
    let ul = document.createElement("ul");
    ul.classList.add("myClass");
    listProducts.appendChild(ul);
    ul.classList.add("myClass");
    list.forEach((item) => {
        let li = document.createElement("li");
        li.innerText = item;
        li.style.display = "inline";
        listProducts.appendChild(li);
    })
    subtotal += total;
    document.getElementById("subtotal-cost").innerHTML = subtotal;
    document.getElementById("total-cost").innerHTML = subtotal + shippingCost;
}

function addCoupon() {
    let couponCode = document.getElementById("coupon").value;
    if (couponCode == "Sprints" || couponCode == "sprints") {
        subtotal = document.getElementById("subtotal-cost").innerHTML;
        price = subtotal * discountPer;
        discount = subtotal - price;
        document.getElementById("discount").innerHTML = "-" + discount;
        document.getElementById("total-cost").innerHTML = price + shippingCost;
        document.getElementById("coupon-btn").onclick = null;
    } else {
        alert("Coupon is invalid!")
    }
}