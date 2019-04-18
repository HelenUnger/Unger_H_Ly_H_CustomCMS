<?php require_once 'admin/scripts/config.php';

include('admin/scripts/connect.php');

//get all the filter types
$query = 'SELECT * FROM tbl_category';

$get_category = $pdo->prepare($query);
$get_category->execute(
    array()
);


//if there is a search, it takes priority over filters
if  (isset($_GET['search'])){
    $search  = $_GET['search'];
    $results = getSearch($search);
}else if (isset($_GET['filter'])) {//if there is a filter active
    $filter  = $_GET['filter'];
    $results = getFilter($filter);
} else { //if not, just get all of them
    $results = getAll();
}


?>

<?php include('templates/head.php');?>
<link rel="stylesheet" href="style/main.css">

<section class="home">

    <h1>Sportchek</h1>

    <a class="login" href="admin/login_form.php">LOGIN PAGE</a>

    <ul class="filters">
        <li><a href="index.php">All</a></li>
    <?php while ($cat = $get_category->fetch(PDO::FETCH_ASSOC)): ?>
        <li><a href="index.php?filter=<?php echo $cat['category_name'];?>"><?php echo $cat['category_name'];?></a></li>
    <?php endwhile; ?>
    </ul>

    <form class="search-form" action="index.php" method="get">
        <input type="search" name="search" id="search">
        <button type="submit">Search</button>
    </form>

    <div class="product-wrapper">
    <?php while ($product = $results->fetch(PDO::FETCH_ASSOC)): ?>
        <a href="details.php?id=<?php echo $product['product_id']; ?>">
            <div class="product-box">
                <img src="images/<?php echo $product['product_image']; ?>" alt="">
			    <h2>$<?php echo $product['product_price']; ?></h2>
			    <p><?php echo $product['product_name']; ?></p>
            </div>
		</a>
    <?php endwhile; ?>
    </div>

    </section>

<?php include('templates/foot.php');?>

