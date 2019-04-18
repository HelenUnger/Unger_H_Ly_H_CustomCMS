<?php
	require_once('./scripts/config.php');
    valid_session();

    include('scripts/connect.php');
    $query = 'SELECT * FROM tbl_category';
    $getCategory = $pdo->prepare($query);
    $getCategory->execute();
    
    if(isset($_POST['submit'])){
        $name = trim($_POST['name']);
        $desc = trim($_POST['desc']);
        $price = trim($_POST['price']);
        $cat = $_POST['category'];
        $img = $_FILES['img'];
        
        if(empty($name) || empty($desc) || empty($price) || empty($cat) || empty($img)){
            $message = 'Please fill the required fields';
        }else{
            $result = createProduct($name,$desc,$price,$cat,$img);
            $message = $result;
        }
    }
?>

<?php include('../templates/head.php');?>
<link rel="stylesheet" href="../style/main.css">

<section class="dashboard">
    <?php include('../templates/sidebar.php');?>
    <div class="db-content product-form">

    <h2>Publish Product</h2>
    <?php if(!empty($message)):?>
		<p><?php echo $message;?></p>
    <?php endif?>

    <form action="product_create.php" enctype="multipart/form-data" method="POST">
        <label for="name"> Product Name: </label>
        <input type="text" id="name" name="name" required>
        
        <label for="desc"> Product Description: </label>
        <textarea type="text" id="desc" name="desc" required rows="4" cols="50"></textarea>

        <label for="category">Category</label>
        <select name="category" id="category" required>
        <?php while($category = $getCategory->fetch(PDO::FETCH_ASSOC)): ?>
            <option value="<?php echo $category['category_id'] ?>"><?php echo $category['category_name'] ?></option>
        <?php endwhile; ?>
        </select>
        
        <label for="price">Product Price: $ </label>
        <input type="number" id="price" name="price" min="1" step="any" required>
        
        <label for="img" >Product Main Image: </label>
        <input type="file" id="img" name="img" required>
        
        <button type="submit" name="submit">Publish Product</button>
    </form>
        
    </div>
</section>

<?php include('../templates/foot.php');?>