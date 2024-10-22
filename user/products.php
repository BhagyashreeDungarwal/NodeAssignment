// /user/products.php
<?php
require '../common/db.php';
$category_id = new MongoDB\BSON\ObjectId($_GET['category']);
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$limit = 10;
$skip = ($page - 1) * $limit;

// Fetch products based on category and pagination
$products = $productsCollection->find(['category_id' => $category_id], ['skip' => $skip, 'limit' => $limit]);
?>
<div id="product-list">
    <?php foreach ($products as $product) { ?>
        <div>
            <img src="../uploads/<?= $product['image']; ?>" width="100">
            <p><?= $product['name']; ?> - $<?= $product['price']; ?></p>
        </div>
    <?php } ?>
</div>
<button id="load-more">Load More</button>

<script>
    let page = 1;
    document.getElementById('load-more').addEventListener('click', function () {
        page++;
        let xhr = new XMLHttpRequest();
        xhr.open('GET', 'products.php?category=<?= $_GET['category']; ?>&page=' + page, true);
        xhr.onload = function () {
            document.getElementById('product-list').innerHTML += xhr.responseText;
        };
        xhr.send();
    });
</script>
