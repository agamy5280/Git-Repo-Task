import { NgModule } from '@angular/core';
import { BrowserModule } from '@angular/platform-browser';

import { AppRoutingModule } from './app-routing.module';
import { AppComponent } from './app-component/app.component';
import { FormsModule } from '@angular/forms';
import { HeaderComponent } from './components/layouts/header/header.component';
import { HomeComponent } from './components/layouts/home/home.component';
import { FooterComponent } from './components/layouts/footer/footer.component';
import { ShopComponent } from './components/layouts/shop/shop.component';
import { CategoriesComponent } from './components/categories/categories.component';
import { CategoryComponent } from './components/category/category.component';
import { ProductComponent } from './components/product/product.component';
import { StarsComponent } from './components/stars/stars.component';
import { ShopDetailComponent } from './components/layouts/shop-detail/shop-detail.component';
import { BreadcrumbsComponent } from './components/layouts/breadcrumbs/breadcrumbs.component';
import { SimilarProductsComponent } from './components/similar-products/similar-products.component';
import { ContactComponent } from './components/layouts/contact/contact.component';
import { CartComponent } from './components/layouts/cart/cart.component';
import { CheckoutComponent } from './components/layouts/checkout/checkout.component';

@NgModule({
  declarations: [
    AppComponent,
    HeaderComponent,
    HomeComponent,
    FooterComponent,
    ShopComponent,
    CategoriesComponent,
    CategoryComponent,
    ProductComponent,
    StarsComponent,
    ShopDetailComponent,
    BreadcrumbsComponent,
    SimilarProductsComponent,
    ContactComponent,
    CartComponent,
    CheckoutComponent
  ],
  imports: [
    BrowserModule,
    AppRoutingModule,
    FormsModule
  ],
  providers: [],
  bootstrap: [AppComponent]
})
export class AppModule { }
