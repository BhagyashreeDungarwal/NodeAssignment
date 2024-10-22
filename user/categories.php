// /user/categories.php
<?php
require '../common/db.php';

// Fetch categories
$categories = $categoriesCollection->find();
?>
<h2>Categories</h2>
<ul>
    <?php foreach ($categories as $category) { ?>
        <li><a href="products.php?category=<?= $category['_id']; ?>"><?= $category['name']; ?></a></li>
    <?php } ?>
</ul>
