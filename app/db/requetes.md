# Requêtes SQL

## Récupérer tous les produits

```sql
SELECT * FROM `product`
```

## Récupérer le produit ayant un id donné (#2)

```sql
SELECT *
FROM `product`
WHERE `id` = 2
```

## Récupérer toutes les marques

```sql
SELECT *
FROM `brand`
```

## Récupérer la marque ayant un id donné (#2)

```sql
SELECT *
FROM `brand`
WHERE `id` = 2
```

## Récupérer tous les produits d'une marque donnée (#5)

```sql
SELECT *
FROM `product`
INNER JOIN `brand`
ON `product`.`brand_id` = `brand`.`id`
WHERE `brand_id` = 5
```

## Récupérer toutes les catégories

```sql
SELECT *
FROM `category`
```

## Récupérer la catégorie ayant un id donné (#2)

```sql
SELECT *
FROM `category`
WHERE `id` = 2
```

## Récupérer tous les produits d'une catégorie donnée (#3)

```sql
SELECT *
FROM `product`
INNER JOIN `category`
ON `product`.`category_id` = `category`.`id`
WHERE `category_id` = 3
```

## Récupérer toutes les types

```sql
SELECT *
FROM `type`
```

## Récupérer le type ayant un id donné (#2)

```sql
SELECT *
FROM `type`
WHERE `id` = 2
```

## Récupérer tous les produits d'un type donné (#2)

```sql
SELECT *
FROM `product`
INNER JOIN `type`
ON `product`.`type_id` = `type`.`id`
WHERE `type_id` = 2
```

## Mega Bonus SQL

### Récupérer le nom et le prix des produits de la catégorie dont l'id est #1 ainsi que le nom de la catégorie

```sql
SELECT `product`.`name` AS `name_product`, 
`category`.`name` AS `name_category`,  
`price`
FROM `product`
INNER JOIN `category`
ON `product`.`category_id` = `category`.`id`
```

### Récupérer le nombre de produits pour chaque catégorie

```sql
SELECT COUNT(`category`.`name`) AS `nbr`,  `category`.`id`, `category`.`name`
FROM `product`
INNER JOIN `category`
ON `product`.`category_id` = `category`.`id`
GROUP BY `category`.`id`
```
