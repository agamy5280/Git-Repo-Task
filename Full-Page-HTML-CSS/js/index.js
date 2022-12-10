const URL = "http://localhost:5000/api/"

if(localStorage.getItem('x-access-token')) {
  
} else {
  alert("please login first!");
  window.location.href = "login.html";
}


class Product {
    id;
    productName;
    price;
    constructor(id, productName, price) {
      this.id = id;
      this.productName = productName;
      this.price = price;
    }
  }
class saveProduct {
  constructor(){}
  saveToLocalStorage(product) {
    const products = JSON.parse(localStorage.getItem("products") || "[]");
    const oldProductIndex = products.findIndex((x) => x.id === product.id);
    if (oldProductIndex >= 0) {
      products[oldProductIndex].quantity += 1;
    } else {
      products.push({ ...product, quantity: 1 });
    }
    localStorage.setItem("products", JSON.stringify(products));
  }
} 
const addSingleProductToCart = (product)=>{
  let newProduct;
  newProduct = new Product(product.id, product.productName, product.price);
  let productSave = new saveProduct();
  productSave.saveToLocalStorage(newProduct);
}

const getCategories = async () => {
  let res = await fetch(URL + "categories");
  let data = await res.json();
  data.data.forEach((category)=>{
    document.getElementById("container-categories-list").innerHTML += addCategory(category);
  })
}

const getFeaturedProducts = async () =>{
  let res = await fetch(URL + "products/getRecent");
  let data = await res.json();
  data.data.forEach((product) => {
    document.getElementById("container-featured-products").innerHTML += addFeaturedProduct(product);
    document.getElementById("container-recent-products").innerHTML += addFeaturedProduct(product);
  })
}

const addFeaturedProduct = (product) => {
  return `
  <div id="single-featured-product">
  <img src="${product.image}" alt="${product.name}">
  <div>
      <h6>${product.name}</h6>
      <h5>$${product.price}<span>$50</span></h5>
      <i class="fa-solid fa-star"></i>
      <i class="fa-solid fa-star"></i>
      <i class="fa-solid fa-star"></i>
      <i class="fa-solid fa-star"></i>
      <i class="fa-solid fa-star"></i>
      <small>(${product.rating_count})</small>
      <a class="cart-icon" href="cart.html" onclick="addSingleProductToCart({id:'${product._id}', productName:'${product.name}',price:'${product.price}'})"><i id="cart-icon" class="fa fa-shopping-cart"></i></a>
  </div>
  </div>
  `
}

const addCategory = (category) => {
  return `
  <div id="single-product">
    <img src="${category.image}" alt="${category.name}">
    <div>
      <h6>${category.name}</h6>
      <p>${category.productCount} Products</p>
    </div>
  </div>
  `
}
getCategories();
getFeaturedProducts();