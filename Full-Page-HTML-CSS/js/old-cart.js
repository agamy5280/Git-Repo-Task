let subtotal = 0;
const shippingCost = 30;
const discountPer = 0.25;
let list = [];
if(localStorage.getItem('products')){
    list = JSON.parse(localStorage.getItem('products'));
    CreateUl(list);
    let subtotal_ = localStorage.getItem('subtotalStorage').slice(1, -1);
    subtotal = parseInt(subtotal_);
    console.log(subtotal);
    document.getElementById("subtotal-cost").innerHTML = subtotal;
    document.getElementById("total-cost").innerHTML =  shippingCost;
}
function addProduct() {
    let productName = document.getElementById("product-name").value;
    let productPrice = document.getElementById("product-price").value;
    let productQuantity = document.getElementById("product-quantity").value;
    let total = productPrice * productQuantity;
    let btnNegative = document.createElement("button");
    let btnPositive = document.createElement("button");
    let btnRemove = document.createElement("button");
    btnNegative.innerHTML = `<i class="fa-solid fa-minus"></i>`;
    btnPositive.innerHTML = `<i class="fa-solid fa-plus"></i>`;
    btnRemove.innerHTML = `<i class="fa-solid fa-x"></i>`;
    let list = [productName, productPrice, btnNegative, productQuantity, btnPositive, total, btnRemove]
    console.log(list);
    CreateUl(list);
    subtotal += total;
    document.getElementById("subtotal-cost").innerHTML = +subtotal;
    document.getElementById("total-cost").innerHTML = +subtotal + +shippingCost;
    saveToLocalStorage(list, subtotal);
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

function saveToLocalStorage(list, subtotal) {
    let products = [];
    let subtotalStorage = [];
    if(localStorage.getItem('products')){
        products = JSON.parse(localStorage.getItem('products'));
    }
    products.push(list);
    subtotalStorage.push(subtotal);
    localStorage.setItem('products', JSON.stringify(products));
    localStorage.setItem('subtotalStorage', JSON.stringify(subtotalStorage));
}
localStorage.clear();
function CreateUl(list) {
    let listProducts = document.getElementById("product-cart");
    let ul = document.createElement("ul");
    listProducts.appendChild(ul);
    list.forEach((item) => {
        let li = document.createElement("li");
        li.append(item);
        li.style.display = "inline";
        listProducts.appendChild(li);
    })
    // let listProducts = document.getElementById("product-cart");
    // list.forEach(()=>{
    //     listProducts.innerHTML = `<ul>
    //     <li>${list[0]}</li>
    //     <li>${list[1]}</li>
    //     <li>
    //     <button><i class="fa-solid fa-minus"></i></button>
    //     ${list[2]}
    //     <button><i class="fa-solid fa-plus"></i></button>
    //     </li>
    //     <li>${list[3]}</li>
    //     <li><button><i class="fa-solid fa-x"></i></button></li>
    //     </ul>`
    // })
}