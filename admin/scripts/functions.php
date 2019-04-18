<?php 
//personal redirect function that redirects to specific location
function redirect_to($location){
    //checks to make sure the location is set
    if($location != NULL){
        //sends the header the new location
        header('Location: '. $location);
        exit;
    }
}