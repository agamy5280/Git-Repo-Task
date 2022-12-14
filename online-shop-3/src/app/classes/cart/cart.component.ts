import { StorageService } from 'src/app/services/storage.service';
import { cartLine } from '../cartlines/cartlines.component';

export class Cart{
  cartlines: cartLine[] = [];
  constructor(private StorageSerivce: StorageService) {}
  
  decQuantity(i: number) {
    if (this.cartlines[i].quantity > 1) this.cartlines[i].quantity -= 1;
    this.StorageSerivce.save(this.cartlines);
  }
  
  incQuantity(i: number) {
    this.cartlines[i].quantity += 1;
    this.StorageSerivce.save(this.cartlines);
  }
  getSubTotal(): number {
    return this.cartlines
      .map((x) => x.price * x.quantity)
      .reduce((a, v) => (a += v), 0);
  }
  getShipping(): number {
    return (
      this.cartlines.map((x) => x.quantity).reduce((a, v) => (a += v), 0) * 2
    );
  }
  remove(i: number) {
    this.cartlines.splice(i, 1);
    this.StorageSerivce.save(this.cartlines);
  }
  getTotal(): number {
    return this.getShipping() + this.getSubTotal();
  }
}
