<?php

    require '../config/connect.php';

    $db = connection();

    
    if (isset($_POST['firstname']) && isset($_POST['lastname'])) {
        $firstname = htmlspecialchars(trim($_POST['firstname']));
        $lastname = htmlspecialchars(trim($_POST['lastname']));
    }

    $sqlInsertData = "INSERT INTO news (firstName, lastName) values(:firstname,:lastname)";
    $reqInsertData = $db->prepare($sqlInsertData);
    $reqInsertData->bindParam(":firstname",$firstname);
    $reqInsertData->bindParam(":lastname",$lastname);
    $reqInsertData->execute();

    $req = $db->query('SELECT * FROM news');

  
    
    
    

    header('Location: ../views/get.php');


?>


