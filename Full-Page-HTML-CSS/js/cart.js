let subtotal = 0;
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
    list.forEach((item)=>{
        let li = document.createElement("li");
        li.innerText = item;
        li.style.display = "inline";
        listProducts.appendChild(li);
    })
    subtotal += total;
    document.getElementById("subtotal-cost").innerHTML = subtotal;
    document.getElementById("total-cost").innerHTML = subtotal + 30;
}
function addCoupon() {
    let couponCode = document.getElementById("coupon").value;
    if(couponCode == "Sprints" || couponCode == "sprints") {
        subtotal = document.getElementById("subtotal-cost").innerHTML;
        price = subtotal * 0.25;
        discount = subtotal - price;
        document.getElementById("discount").innerHTML = "-" + discount;
        document.getElementById("total-cost").innerHTML = price + 30;
        document.getElementById("coupon-btn").onclick = null;
    }else {
        alert("Coupon is invalid!")
    }
}
