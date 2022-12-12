import { Injectable } from '@angular/core';
import { CartLine } from '../interfaces/cart-line';
import { Product } from '../interfaces/product';

@Injectable({
  providedIn: 'root',
})
export class StorageService {
  constructor() {}

  addProducts(product: Product, quantity: number) {
    const products: Product[] = this.getProductsFromLocalStorage();
    for (let i = 0; i < quantity; i++) {
      products.push(product);
    }
    localStorage.setItem('products', JSON.stringify(products));
  }
  getProductsFromLocalStorage(): Product[] {
    return JSON.parse(localStorage.getItem('products') || '[]');
  }

  getCartLines(): CartLine[] {
    const products: Product[] = this.getProductsFromLocalStorage();
    const cartLines: CartLine[] = [];
    products.forEach((p) => {
      const ix = cartLines.findIndex((x) => x.product._id === p._id);
      if (ix >= 0) {
        cartLines[ix].quantity += 1;
      } else {
        cartLines.push({
          price: p.price,
          product: p,
          quantity: 1,
        });
      }
    });
    return cartLines;
  }
  save(cartLines: CartLine[]) {
    const products: Product[] = [];
    cartLines.forEach((element) => {
      for(let i = 0; i<element.quantity; i++){
        products.push(element.product);
      }
    })
    localStorage.setItem('products', JSON.stringify(products));
  }
}
