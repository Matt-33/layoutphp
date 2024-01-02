<?php

require 'connexion.php';


if (isset($_GET['id'])) {

$id = $_GET['id'];

$query = $db->prepare('SELECT * FROM products INNER JOIN products_categories ON products.id =  products_categories.product_id  WHERE category_id = ?');
$query->execute([$id]);
$products = $query->fetchAll();

$query = $db->prepare('SELECT * FROM categories  WHERE id = ?');
$query->execute([$id]);
$category = $query->fetch();

$template = 'categorie.phtml'; 
}

else {

$query = $db->prepare('SELECT * FROM categories');
$query->execute();
$categories = $query->fetchAll();

$template = 'index.phtml';
}

include "layout.phtml";