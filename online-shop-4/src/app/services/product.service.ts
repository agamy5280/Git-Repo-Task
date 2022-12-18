import { HttpClient } from '@angular/common/http';
import { Injectable } from '@angular/core';
import { environment } from 'src/environment/environment';
import { Product } from '../interfaces/product';

@Injectable({
  providedIn: 'root',
})
export class ProductService {
  cartProducts: Product[] = [];
  products: Product[] = [] ;
  listProducts: any[] = [];
  loginData: any;
  constructor(private httpClient: HttpClient) {
    this.products = JSON.parse(localStorage.getItem('products') || '');
    this.loginData = JSON.parse(localStorage.getItem('loginData') || '');
    this.products.forEach((p)=>{
      this.listProducts.push({
        "product_id": p._id,
        "name": p.name,
        "price": p.price
      })
    })
  }

  getFeaturedProducts(): any {
    return this.httpClient.get(`${environment.apiUrl}products/getFeatured`);
  }

  getProducts(): any {
    return this.httpClient.get(`${environment.apiUrl}products`);
  }

  getRecentProducts(): any {
    return this.httpClient.get(`${environment.apiUrl}products/getRecent`);
  }

  addProduct(product: Product): void {
    this.cartProducts.push(product);
  }

  getProductById(id:string){
    return this.httpClient.get(`${environment.apiUrl}products/${id}`)
  }

  getProductByCategoryId(id:string){
    return this.httpClient.get(`${environment.apiUrl}products/getByCategoryId/${id}`);
  }
  placeOrder(orderDetails: any) {
    console.log(this.loginData.token);
    return this.httpClient.post(`${environment.apiUrl}orders/`, {
      headers: {
          'Content-Type': 'application/json',
          'x-access-token': this.loginData.token,
        },
        body: JSON.stringify({
          "sub_total_price": orderDetails.subtotal,
          "shipping": orderDetails.shipping,
          "total_price": orderDetails.total,
          "user_id": orderDetails.user_id,
          "order_date": orderDetails.order_date,
          "order_details": this.listProducts,
          "shipping_info": {
              "first_name": orderDetails.firstName,
              "last_name": orderDetails.lastName,
              "email": orderDetails.email,
              "mobile_number": orderDetails.phone,
              "address1": orderDetails.address1,
              "address2": orderDetails.address2,
              "country": orderDetails.country,
              "city": orderDetails.city,
              "state": orderDetails.state,
              "zip_code": orderDetails.zipCode
          }
        })
  })
  }
}
