<?php

    require '../config/connect.php';

    $db = connection();

    
    if (isset($_POST['firstname']) && isset($_POST['lastname'])) {
        $firstname = htmlspecialchars(trim($_POST['firstname']));
        $lastname = htmlspecialchars(trim($_POST['lastname']));
    }

    $req = $db->prepare('INSERT INTO news(firstName, lastName) VALUES(:nom, :possesseur)');

    
    $req->execute(array(
        'nom' => $firstname,
        'possesseur' => $lastname,
        ));
    
    

    header('Location: ../views/get.php');


?>


