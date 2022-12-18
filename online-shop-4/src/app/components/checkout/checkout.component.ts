import { JsonPipe } from '@angular/common';
import { HttpClient } from '@angular/common/http';
import { Component } from '@angular/core';
import { FormControl, FormGroup, Validators } from '@angular/forms';
import { CartLine } from 'src/app/interfaces/cart-line';
import { Product } from 'src/app/interfaces/product';
import { ProductService } from 'src/app/services/product.service';
import { StorageService } from 'src/app/services/storage.service';

@Component({
  selector: 'app-checkout',
  templateUrl: './checkout.component.html',
  styleUrls: ['./checkout.component.css'],
})
export class CheckoutComponent {
  cartLines: CartLine[] = [];
  products: Product[] = [] ;
  constructor(private storageService: StorageService, private httpClient: HttpClient, private productService: ProductService) {
    this.cartLines = storageService.getCartLines();
    this.products = JSON.parse(localStorage.getItem('products') || '');
  }


  getTotal(): number {
    return this.getShipping() + this.getSubTotal();
  }
  getSubTotal(): number {
    return this.cartLines
      .map((x) => x.price * x.quantity)
      .reduce((a, v) => (a += v), 0);
  }
  getShipping(): number {
    return (
      this.cartLines.map((x) => x.quantity).reduce((a, v) => (a += v), 0) * 2
    );
  }
  checkoutForm = new FormGroup({
    firstName: new FormControl('', [Validators.required]),
    lastName: new FormControl('', [Validators.required]),
    email: new FormControl('', [Validators.required, Validators.email]),
    phone: new FormControl('', [Validators.required]),
    address1: new FormControl('', [Validators.required]),
    address2: new FormControl('', [Validators.required]),
    country: new FormControl('', [Validators.required]),
    city: new FormControl('', [Validators.required]),
    State: new FormControl('', [Validators.required]),
    zip: new FormControl('', [Validators.required]),
    subtotal: new FormControl(Number(localStorage.getItem("subTotal"))),
    shipping: new FormControl(Number(localStorage.getItem("shipping"))),
    total: new FormControl(Number(localStorage.getItem("total"))),
    user_id: new FormControl(JSON.parse(localStorage.getItem('loginData') || '')._id),
    order_date: new FormControl(new Date().getFullYear() + "-" + new Date().getMonth() + "-" + new Date().getDate()),
  })
  placeOrder() {
    if(this.checkoutForm.valid) {
      this.productService.placeOrder(this.checkoutForm).subscribe();
    } else {
      alert("order placement failed!")
    }

  }
}
