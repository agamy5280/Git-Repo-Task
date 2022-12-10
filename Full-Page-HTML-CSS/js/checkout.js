if(localStorage.getItem('x-access-token')) {
  
} else {
  alert("please login first!");
  window.location.href = "login.html";
}
const URL = 'http://localhost:5000/api/orders';
const products = JSON.parse(localStorage.getItem("products") || "[]")
const renderHTML = () => {
    document.getElementById("subtotal").innerHTML = '$' + JSON.parse(localStorage.getItem("subtotal"));
    document.getElementById("shipping").innerHTML = '$' + JSON.parse(localStorage.getItem("shipping"));
    document.getElementById("total").innerHTML = '$' + JSON.parse(localStorage.getItem("totalCost"));

    products.forEach((p) => {
        document.getElementById("productsContainer").innerHTML += addProducts(p);
    });
}

const addProducts =  (p) =>{
    return `
    <div class="d-flex justify-content-between">
    <p>${p.productName}</p>
    <p>${p.price * p.quantity}</p>
    </div>
    `
  }
const addProductsToList = () => {
    let listProducts = [];
    products.forEach((p) => {
        listProducts.push({
            "product_id": p.id,
            "price": p.price,
            "quantity": p.quantity
        })
    })
    return listProducts;
}
let firstName;
let lastName;
let email;
let mobileNumber;
let address_one;
let address_two;
let country;
let city;
let state;
let zipCode;
 const getShippingInfo = async () => {
    await fetch(URL)
    .then(async(res)=>{
        let data = await res.json();
        let info = await data.data[0].shipping_info;
        document.getElementById("savedFirstName").value = info.first_name;
        firstName = info.first_name;
        document.getElementById("savedLastName").value = info.last_name;
        lastName = info.last_name;
        document.getElementById("savedEmail").value = info.email;
        email = info.email;
        document.getElementById("SavedMobileNumber").value = info.mobile_number;
        mobileNumber = info.mobile_number;
        document.getElementById("savedAddress_one").value = info.address1;
        address_one = info.address1;
        document.getElementById("savedAddress_two").value = info.address2;
        address_two = info.address2;
        document.getElementById("savedCountry").value = info.country;
        country = info.country;
        document.getElementById("savedCity").value = info.city;
        city = info.city;
        document.getElementById("savedState").value = info.state;
        state = info.state;
        document.getElementById("savedZipCode").value = info.zip_code;
        zipCode = info.zip_code;
    })
    .catch((err)=> {
        alert(err);
    })
 }
function disableSavedInfo() {
    let savedInfoDiv = document.getElementById("savedInfo");
    savedInfoDiv.style.pointerEvents = "none";
    savedInfoDiv.style.opacity = "0.6";
}

function updateShippingInfo() {
    firstName = document.getElementById("firstName").value;
    lastName = document.getElementById("lastName").value;
    email = document.getElementById("email").value;
    mobileNumber = document.getElementById("mobileNumber").value;
    address_one = document.getElementById("address_one").value;
    address_two = document.getElementById("address_two").value;
    country = document.getElementById("country").value;
    city = document.getElementById("city").value;
    state = document.getElementById("state").value;
    zipCode = document.getElementById("zipCode").value;
}
const placeOrder = async () => {
    if(document.getElementById("firstName").value){
        updateShippingInfo();
        let order = await fetch(URL, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'x-access-token': localStorage.getItem("x-access-token"),
              },
              body: JSON.stringify({
                "sub_total_price": document.getElementById("subtotal").innerHTML.replace("$",""),
                "shipping": document.getElementById("shipping").innerHTML .replace("$",""),
                "total_price": document.getElementById("total").innerHTML.replace("$",""),
                "user_id": localStorage.getItem("userID"),
                "order_date": new Date().getFullYear() + "-" + new Date().getMonth() + "-" + new Date().getDate(),
                "order_details": addProductsToList(),
                "shipping_info": {
                    "first_name": firstName,
                    "last_name": lastName,
                    "email": email,
                    "mobile_number": mobileNumber,
                    "address1": address_one,
                    "address2": address_two,
                    "country": country,
                    "city": city,
                    "state": state,
                    "zip_code": zipCode
                }
              })
        })
         let res = await order.json();
         alert("Order Placed!");
         console.log(res);
    }else {
        let order = await fetch(URL, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'x-access-token': localStorage.getItem("x-access-token"),
              },
              body: JSON.stringify({
                "sub_total_price": document.getElementById("subtotal").innerHTML.replace("$",""),
                "shipping": document.getElementById("shipping").innerHTML .replace("$",""),
                "total_price": document.getElementById("total").innerHTML.replace("$",""),
                "user_id": localStorage.getItem("userID"),
                "order_date": new Date().getFullYear() + "-" + new Date().getMonth() + "-" + new Date().getDate(),
                "order_details": addProductsToList(),
                "shipping_info": {
                    "first_name": firstName,
                    "last_name": lastName,
                    "email": email,
                    "mobile_number": mobileNumber,
                    "address1": address_one,
                    "address2": address_two,
                    "country": country,
                    "city": city,
                    "state": state,
                    "zip_code": zipCode
                }
              })
        })
         let res = await order.json();
         alert("Order Placed!");
         console.log(res);
    }
   
}
  renderHTML();
  getShippingInfo();