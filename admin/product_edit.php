<?php
	require_once('./scripts/config.php');
    valid_session();

    include('scripts/connect.php');

    //get all category
    $query = 'SELECT * FROM tbl_category';
    $getCategory = $pdo->prepare($query);
    $getCategory->execute();

    //get the id of the product the user is editing
    if(isset($_GET['editProduct'])){
        $_SESSION['productID'] = $_GET['editProduct'];
    }


    //when the user submits the form
    if(isset($_POST['submit'])){
        $name = trim($_POST['name']);
        $desc = trim($_POST['desc']);
        $price = trim($_POST['price']);
        $cat = $_POST['category'];
        
        if(empty($name) || empty($desc) || empty($price)){
            $message = 'Please fill the required fields';
        }else{
            //if they are updating the image
            if (!empty($_FILES['img'])){
                $result = editProduct($name,$desc,$price,$_SESSION['productID'],$cat, $_FILES['img']);
            }else{ //if they are not updating the image
                $result = editProduct($name,$desc,$price,$_SESSION['productID'],$cat, 'noImg');
            }
            $message = $result;
        }
    }


    //get the info from database for the form
    $query = 'SELECT * FROM tbl_product, tbl_category_product WHERE tbl_product.product_id = :id';

    $getProduct = $pdo->prepare($query);
    $getProduct->execute(
        array(
            ':id'=> $_SESSION['productID']
        )
    );

?>


<?php include('../templates/head.php');?>
<link rel="stylesheet" href="../style/main.css">

<section class="dashboard">
    <?php include('../templates/sidebar.php');?>
    <div class="db-content product-form">

	<h2>Edit Product</h2>
    <?php if(!empty($message)){echo $message;} ?>
    
	<form action="product_edit.php" method="post" enctype="multipart/form-data">
        <?php if($product = $getProduct->fetch(PDO::FETCH_ASSOC)): ?>
        <label for="name"> Product Name: </label>
        <input type="text" id="name" name="name" value="<?php echo $product['product_name'];?>" required>
        
        <label for="desc"> Product Description: </label>
        <textarea type="text" id="desc" name="desc" required rows="4" cols="50"><?php echo $product['product_desc'];?></textarea>
        
        <label for="category">Category</label>
        <select name="category" id="category" required>
        <?php while($category = $getCategory->fetch(PDO::FETCH_ASSOC)): ?>
            <option value="<?php echo $category['category_id'] ?>"<?php if($category['category_id'] == $product['category_id']){ echo 'selected'; }?>><?php echo $category['category_name'] ?></option>
        <?php endwhile; ?>
        </select>

        <label for="price">Product Price: $ </label>
        <input type="number" id="price" name="price" min="1" step="any" required value="<?php echo $product['product_price'];?>">
        
        <label for="img" >Product Main Image: </label>
        <input type="file" id="img" name="img">
		
		<button type="submit" name="submit">Edit Product</button>
        <?php endif; ?>
	</form>
    </div>
</section>

<?php include('../templates/foot.php');?>