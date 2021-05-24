# Routes

## Sprint 1

| URL | HTTP Method | Controller | Method | Title | Content | Comment |
|--|--|--|--|--|--|--|
| `/` | `GET` | `MainController` | `home` | Dans les shoe | 5 categories, 5 products, category nav (secondary) | - |
| `/category/[i:id]` | `GET` | `CatalogController` | `category` | Dans les shoe | 5 categories (nav), title, subtitle, products list of category, number of results, button to sort | id : category's id |
| `/mentions-legales` | `GET` | `MainController` | `legal` | Dans les shoe | Legal mention | - |
| `/type/[i:id]` | `GET` | `CatalogController` | `type` | Dans les shoe | 5 types (nav), title, subtitle, products list of type, number of results, button to sort | id : type's id |
| `/brand/[i:id]` | `GET` | `CatalogController` | `brand` | Dans les shoe | 5 brands (nav), title, subtitle, products list of brand, number of results, button to sort | id : brand's id |
| `/product/[i:id]` | `GET` | `CatalogController` | `product` | Dans les shoe | product's name, product's brand, product's picture, product's range, product's price, button to add, product's description | id : product's id |
