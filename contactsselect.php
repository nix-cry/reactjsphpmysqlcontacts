<?php

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header('Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept');


$method = $_SERVER['REQUEST_METHOD'];

if($method=="GET"){ 



    if( array_key_exists('all', $_GET) ){
            
        if($_GET["all"] === "all"){
            require_once "bd.php";
            $newContact = new jamContactsBd();
            $nc = $newContact->select("SELECT * FROM `contacts`  ");

            die(json_encode( $nc));
        }else{
            $data = array(
                "error" => true,
            );
            die(json_encode($data));
        }
        

    }else{
        $data = array(
            "error" => true,
        );
        die(json_encode($data));
    }



}

?>