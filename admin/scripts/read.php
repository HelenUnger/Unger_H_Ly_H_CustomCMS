<?php

function getAll()
{
    include 'connect.php';

    //create query using placeholders
    $get_all_query = 'SELECT * FROM tbl_product';

    //prepare and execute query using the variables in the lower array
    $get_all_set = $pdo->prepare($get_all_query);
    $result = $get_all_set->execute(
        array()
    );

    //if some thing was created/updated.. then:
    if($result){
        //send the result back  
        return $get_all_set;
    }else{
        //there was an error
        $message = 'something went wrong';
        return $message;
    }
}

function getFilter($filter)
{
    include 'connect.php';

    //filter query
    $product_filter_query = 'SELECT * FROM tbl_product, tbl_category_product, tbl_category WHERE tbl_product.product_id = tbl_category_product.product_id AND tbl_category_product.category_id = tbl_category.category_id AND tbl_category.category_name = :fltr ';

    //prepare and execute the query
    $get_filter_set = $pdo->prepare($product_filter_query);
    $result = $get_filter_set->execute(
        array(
            ':fltr'     => $filter
        )
    );

    //if some thing was created/updated.. then:
        if($result){
            //send the result back  
            return $get_filter_set;
        }else{
            //there was an error
            $message = 'something went wrong';
            return $message;
        }
}

function getSingle($id)
{
    include 'connect.php';

    //create query using placeholders
    $get_single_query = "SELECT * FROM tbl_product WHERE product_id = :id";

    //prepare and exicute query using the variables in the lower array
    $get_single_set = $pdo->prepare($get_single_query);
    $result = $get_single_set->execute(
        array(
            ':id' => $id
            )
    );

    //if some thing was created/updated.. then:
    if($result){
        //send the result back  
        return $get_single_set;
    }else{
        //there was an error
        $message = 'something went wrong';
        return $message;
    }
}

function getSearch($search){
    include 'connect.php';

    //create query using placeholders
    $get_search_query = "SELECT * FROM tbl_product WHERE product_name LIKE :search";

    //prepare and exicute query using the variables in the lower array
    $get_search_set = $pdo->prepare($get_search_query);
    $result = $get_search_set->execute(
        array(
            ':search' => "%".$search."%"
            )
    );
    
    //if some thing was created/updated.. then:
    if($result){ 
        //send the result back  
        return $get_search_set;
    }else{
        //there was an error
        $message = 'something went wrong';
        return $message;
    }
}