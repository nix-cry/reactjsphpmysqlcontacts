<?php

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header('Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept');


$method = $_SERVER['REQUEST_METHOD'];

if($method=="GET"){ 


    if( array_key_exists('name', $_GET) && array_key_exists('phone', $_GET) ){
        $nameTF = false; $phoneTF = false;
        if (preg_match("~^[a-zа-яёA-ZА-ЯЁ]+$~ui", $_GET["name"]) ) {
            $nameTF = true;
        }
        if (preg_match("/^((8|\+7)[\- ]?)?(\(?\d{3}\)?[\- ]?)?[\d\- ]{7,10}$/", $_GET["phone"])) {
            $phoneTF = true; 
        }
        if(  $nameTF && $phoneTF){
            require_once "bd.php";
            $newContact = new jamContactsBd();
            $nc = $newContact->add("INSERT INTO `contacts` (`id`, `name`, `phone`) VALUES (NULL, '".$_GET["name"]."', '".$_GET["phone"]."') ");
            $newContact = new jamContactsBd();
            $nc1 = $newContact->select("SELECT * FROM `contacts`  ");
            die(json_encode($nc1));
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