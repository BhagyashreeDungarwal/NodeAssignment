// /admin/category.php
<?php
require '../common/db.php';
session_start();
if (!isset($_SESSION['admin_logged_in'])) {
    header('Location: login.php');
    exit();
}

// Handle adding a category
if (isset($_POST['add_category'])) {
    $name = $_POST['category_name'];
    $categoriesCollection->insertOne(['name' => $name]);
}

// Fetch all categories
$categories = $categoriesCollection->find();
?>
<h2>Manage Categories</h2>
<form method="POST">
    <input type="text" name="category_name" placeholder="New Category" required>
    <input type="submit" name="add_category" value="Add Category">
</form>
<ul>
    <?php foreach ($categories as $category) { ?>
        <li><?= $category['name']; ?></li>
    <?php } ?>
</ul>
