<?php

require '../config/connect.php';

$db = connection();

if(isset($_GET['id'])){
    $id = htmlspecialchars(trim($_GET['id']));
}else{
    $id = "";
}


$sqlData = "SELECT * FROM news where id = :ids";

$reqData = $db->prepare($sqlData);
$reqData->bindParam(':ids', $id);
$reqData->execute();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous"></link>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <div class="d-flex justify-content-center mt-4">
        <h3>Quelle valeur voulez vous modifier ?</h3>
    </div>


    <form method="POST" action="../views/updateRequest.php">

    <?php
        while($data = $reqData->fetchObject()) {   
    ?>
        <div class="form-group d-flex justify-content-center mt-4">
            <input type="text" class="d-none form-control col-md-4" value="<?= $data->id ?>" id="id"  placeholder="Prénom" name="id">
            <input type="text" class="form-control col-md-4" value="<?=$data->firstName?>" id="modifPrenom" placeholder="Prénom" name="firstname">
            <input type="text" class="form-control col-md-4" value="<?= $data->lastName ?>" id="modfifNom"  placeholder="Nom" name="lastname">
            <button type="submit" class="btn btn-primary">Modifier</button>
        </div>


        <?php
            }
        ?>
           
    </form>


</body>
</html>