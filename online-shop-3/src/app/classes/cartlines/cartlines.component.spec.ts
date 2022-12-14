import { ComponentFixture, TestBed } from '@angular/core/testing';

import { CartlinesComponent } from './cartlines.component';

describe('CartlinesComponent', () => {
  let component: CartlinesComponent;
  let fixture: ComponentFixture<CartlinesComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      declarations: [ CartlinesComponent ]
    })
    .compileComponents();

    fixture = TestBed.createComponent(CartlinesComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
