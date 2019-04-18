<?php require_once 'admin/scripts/config.php';
if (isset($_GET['id'])) {
    $id      = $_GET['id'];
    $results = getSingle($id);
} else {
    echo 'Missing Movie ID';
    exit;
}
?>

<?php include('templates/head.php');?>
<link rel="stylesheet" href="style/main.css">

<section class="details">
	<?php while ($product = $results->fetch(PDO::FETCH_ASSOC)): ?>
		<div>
			<h1><?php echo $product['product_name']; ?></h1>
            <h3>$<?php echo $product['product_price']; ?></h3>
            <img src="images/<?php echo $product['product_image']; ?>" alt="">
            <p><?php echo $product['product_desc']; ?></p>
			
		</div>
	<?php endwhile; ?>
</section>
<?php include('templates/foot.php');?>