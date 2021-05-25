# Routes

## Sprint 1

| URL | HTTP Method | Controller | Method | Title | Content | Comment |
|--|--|--|--|--|--|--|
| `/` | `GET` | `MainController` | `home` | Dans les shoe | 5 categories, products list | - |
| `/legal` | `GET` | `MainController` | `legal` | Legal Mentions | Legal mentions | - |
| `/category/[i:id]` | `GET` | `CatalogController` | `category` | #Name of the category# | products list of category | id : category's id |
| `/type/[i:id]` | `GET` | `CatalogController` | `type` | #Name of the type# | products attached to the type | id : type's id |
| `/brand/[i:id]` | `GET` | `CatalogController` | `brand` | #Name of the brand# | products attached to the brand | id : brand's id |
| `/product/[i:id]` | `GET` | `CatalogController` | `product` | #Product's name# | products details | id : product's id |
