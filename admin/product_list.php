<?php
    require_once('scripts/connect.php');
    require_once('scripts/config.php');
    //check if user is logged in
    valid_session();

    $query = 'SELECT * FROM tbl_product ORDER BY product_id DESC';

    $getProducts = $pdo->prepare($query);
    $getProducts->execute();

?>


<?php include('../templates/head.php');?>
<link rel="stylesheet" href="../style/main.css">

<section class="dashboard">
    <?php include('../templates/sidebar.php');?>
    <div class="db-content product-list">
    
        <h2>Manage Products</h2>
        <ul>
            <li id="create"><a href="product_create.php">Create New Product</a></li>
        </ul>

        <ul class="productList">
        <?php while($product = $getProducts->fetch(PDO::FETCH_ASSOC)): ?>
            <li class="product">
                <h4><?php echo $product['product_name']; ?></h4>
                <img src="../images/<?php echo $product['product_image']; ?>" alt=""><br>
                <a href="product_edit.php?editProduct=<?php echo $product['product_id']; ?>" title="Edit Product Info"><i class="far fa-edit"></i></a>
                <a href="product_delete.php?deleteProduct=<?php echo $product['product_id']; ?>" title="Delete Product"><i class="far fa-trash-alt"></i></a>
            </li>
        <?php endwhile; ?>
        </ul>

    </div>
</section>
