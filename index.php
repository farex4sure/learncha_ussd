<?php 

    include_once 'menu.php';
    //Read the data sent via POST from our AT API
    $sessionId   = $_POST["sessionId"];
    $serviceCode = $_POST["serviceCode"];
    $phoneNumber = $_POST["phoneNumber"];
    $text        = $_POST["text"];

	 $menu = new Menu();
    if($text == "" ){
        $textArray = explode("*", $text);
        echo "CON ". $menu->mainMenuRegistered($textArray, $phoneNumber);
        }else{
        $textArray = explode("*", $text);
        switch($textArray[0]){
            case 1: 
                $menu->Dictionary($textArray,$phoneNumber);
            break;
            case 2: 
                $menu->Games($textArray,$phoneNumber);
            break;
            case 3: 
                $menu->Challenge($textArray,$phoneNumber);
            break;
            }
    }
    
    
    
    
?>