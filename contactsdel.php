<?php



header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header('Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept');


$method = $_SERVER['REQUEST_METHOD'];

if($method=="GET"){ 



    if( array_key_exists('name', $_GET) && array_key_exists('phone', $_GET) ){
            

            require_once "bd.php";
            $newContact = new jamContactsBd();
            $nc = $newContact->delet("DELETE FROM `contacts` WHERE `contacts`.`name` = '".$_GET["name"]."' AND `contacts`.`phone` = '".$_GET["phone"]."' ");
            $newContact = new jamContactsBd();
            $nc1 = $newContact->select("SELECT * FROM `contacts`  ");
            die(json_encode( $nc1));
            

    }else{
        $data = array(
            "error" => true,
        );
        die(json_encode($data));
    }



}

?>