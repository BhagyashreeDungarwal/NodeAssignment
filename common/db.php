<?php
require 'vendor/autoload.php'; // Composer autoload for MongoDB

// Connection to MongoDB
$client = new MongoDB\Client("mongodb://localhost:27017");
$database = $client->shopping_cart; // Database named 'shopping_cart'

// Collections (similar to tables in SQL)
$categoriesCollection = $database->categories;
$productsCollection = $database->products;
$usersCollection = $database->users;
?>
