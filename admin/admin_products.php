<?php
require '../common/db.php';
session_start();
if (!isset($_SESSION['admin_logged_in'])) {
    header('Location: login.php');
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $product_name = $_POST['product_name'];
    $price = $_POST['price'];
    $category_id = $_POST['category_id'];

    // Handling image upload
    $image_name = $_FILES['image']['name'];
    $image_temp = $_FILES['image']['tmp_name'];
    $upload_dir = "../uploads/$image_name";
    move_uploaded_file($image_temp, $upload_dir);

    // Insert product into MongoDB
    $productsCollection->insertOne([
        'name' => $product_name,
        'price' => $price,
        'category_id' => new MongoDB\BSON\ObjectId($category_id),
        'image' => $image_name
    ]);
}

// Fetch categories to display in dropdown
$categories = $categoriesCollection->find();
?>
<form method="POST" enctype="multipart/form-data">
    Product Name: <input type="text" name="product_name" required><br>
    Price: <input type="number" name="price" required><br>
    Category: 
    <select name="category_id" required>
        <?php foreach ($categories as $category) { ?>
            <option value="<?= $category['_id']; ?>"><?= $category['name']; ?></option>
        <?php } ?>
    </select><br>
    Image: <input type="file" name="image" required><br>
    <input type="submit" value="Add Product">
</form>
