<?php

function createProduct($name,$desc,$price,$catID,$img){
    try {
        //connect to db
        include 'connect.php';

        //validate the file, must be image
        $file_type      = pathinfo($img['name'], PATHINFO_EXTENSION);
        $accepted_types = array('gif', 'jpg', 'jpe', 'jpeg', 'png');
        if (!in_array($file_type, $accepted_types)) { //if not the right extentions
            throw new Exception('Wrong file type!');
        }

        //take the temporary file and store it
        $new_name = uniqid() . '.' .  $file_type;
        $target_path = '../images/' . $new_name;
        if (!move_uploaded_file($img['tmp_name'], $target_path)) {
            throw new Exception('Failed to move uploaded file!');
        }

        //insert the product information into the db
        $insert_product_query = 'INSERT INTO tbl_product (product_name, product_desc, product_price, product_image) VALUES (:Pname, :Pdesc, :Pprice, :Pimg)';

        $insert_product  = $pdo->prepare($insert_product_query);
        $insert_result = $insert_product->execute(
            array(
                ':Pname'     => $name,
                ':Pdesc'      => $desc,
                ':Pprice'   => $price,
                ':Pimg'     => $new_name
            )
        );

        //get the most recent rows id
        $prodID = $pdo->lastInsertId();

        //insert the category information into the db
        $insert_category_query = 'INSERT INTO tbl_category_product (category_id, product_id) VALUES (:cat, :prod)';

        $insert_category  = $pdo->prepare($insert_category_query);
        $insert_result = $insert_category->execute(
            array(
                ':cat'     => $catID,
                ':prod'     => $prodID
            )
        );

        if (!$insert_result) {
            throw new Exception('Failed to insert the new product!');
        }

        //if everything works, redirect to product list
        redirect_to('product_list.php');

        //catch any thrown errors and return them
    } catch (Exception $e) {
        $error = $e->getMessage();
        return $error;
    }
}


function editProduct($name,$desc,$price,$id,$catID,$img){
    try {
        //connect to db
        include 'connect.php';


        if(!empty($img['name'])){ //if there is a file...
            //validate the file, must be image
            $file_type      = pathinfo($img['name'], PATHINFO_EXTENSION);
            $accepted_types = array('gif', 'jpg', 'jpe', 'jpeg', 'png');
            if (!in_array($file_type, $accepted_types)) { //if not the right extentions
                throw new Exception('Wrong file type!');
            }

            //get old file name to delete it before replacing it
            $query = 'SELECT * FROM tbl_product WHERE product_id = :id';
            $getProduct = $pdo->prepare($query);
            $getProduct->execute(
                array(
                    ':id'=> $id
                )
            );

            if($product = $getProduct->fetch(PDO::FETCH_ASSOC)){
                $old_file_name = $product['product_image'];
                if($old_file_name != 'placeholder.png'){
                    $old_path = '../images/' . $old_file_name;
                    unlink($old_path);
                }
            }
            

            //take the uploaded file and store it
            $new_name = uniqid() . '.' .  $file_type;
            $target_path = '../images/' . $new_name;
            if (!move_uploaded_file($img['tmp_name'], $target_path)) {
                throw new Exception('Failed to move uploaded file!');
            }

            //use this to update the db since the file needs to be updated
            $update_product_query = 'UPDATE tbl_product SET product_name = :Pname, product_desc = :Pdesc, product_price = :Pprice, product_image = :Pimg WHERE product_id = :id';

            $update_product  = $pdo->prepare($update_product_query);
            $product_result = $update_product->execute(
                array(
                    ':Pname' => $name,
                    ':Pdesc' => $desc,
                    ':Pprice' => $price,
                    ':Pimg' => $new_name,
                    ':id' => $id
                )
            );

        }else{
            //since the image isnt being updated, use this query
            $update_product_query = 'UPDATE tbl_product SET product_name = :Pname, product_desc = :Pdesc, product_price = :Pprice WHERE product_id = :id';

            $update_product  = $pdo->prepare($update_product_query);
            $product_result = $update_product->execute(
                array(
                    ':Pname'     => $name,
                    ':Pdesc'      => $desc,
                    ':Pprice'   => $price,
                    ':id' => $id
                )
            );
        }

        //throw an error if the db didnt update
        if (!$product_result) {
            throw new Exception('Failed to update the product!');
        }

        //update the relational table
        $update_category_query = 'UPDATE tbl_category_product SET category_id = :catID WHERE product_id = :id';

            $update_category  = $pdo->prepare($update_category_query);
            $category_result = $update_category->execute(
                array(
                    ':catID' => $catID
                )
            );

        //throw an error if the db didnt update
        if (!$category_result) {
            throw new Exception('Failed to update the category!');
        }

        //redirect back to list if there are no errors 
        redirect_to('./product_list.php');
    } catch (Exception $e) {
        $error = $e->getMessage();
        return $error;
    }
}

function deleteProduct($id) {
    try {
        //connect to db
        include 'connect.php';

        //get product's main image
        $query = 'SELECT * FROM tbl_product WHERE product_id = :id';

        $getProduct = $pdo->prepare($query);
        $getProduct->execute(
            array(
                ':id'=> $id
            )
        );

        //delete main image file
        if($product = $getProduct->fetch(PDO::FETCH_ASSOC)){
            
            $filename = $product['product_image'];
            $path = '../images/' . $filename;

            if($filename != 'placeholder.png'){
                unlink($path);
            }
        }

        //delete gallery images 

        //delete category next
        $delete_category_query = 'DELETE FROM tbl_category_product WHERE product_id = :id';
        $delete_category  = $pdo->prepare($delete_category_query);
        $category_result = $delete_category->execute(
            array(
                ':id' => $id
            )
        );

        if (!$category_result) {
            throw new Exception('Failed to delete the category!');
        }

        //delete product 
        $delete_product_query = 'DELETE FROM tbl_product WHERE product_id = :id';
        $delete_product  = $pdo->prepare($delete_product_query);
        $delete_result = $delete_product->execute(
            array(
                ':id' => $id
            )
        );
        
        if (!$delete_result) {
            throw new Exception('Failed to delete the product!');
        }

        //direct back to list
        redirect_to('./product_list.php');
    } catch (Exception $e) {
        $error = $e->getMessage();
        return $error;
    }
}

?>