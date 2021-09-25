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
    
</body>
</html>


<?php

require '../config/connect.php';

$db = connection();

$req = $db->query('SELECT * FROM news');

while($data = $req->fetchObject()) {

?>

    <div class="d-flex justify-content-center">
        <div class="card border border-dark mb-5 mt-3" style="width: 18rem;">
            <ul class="list-group list-group-flush border border-dark">
                <li class="list-group-item">Prénom : 
                    <strong><?php echo $data->firstName; ?></strong>
                       
                            <div class="d-flex justify-content-end">
                               <a href="../views/delete.php?id=<?php echo $data->id;?>"><button type="submit" class="btn btn-danger">Supprimer</button></a>
                            </div>
                </li>
                <li class="list-group-item">Nom : 
                    <strong><?php echo $data->lastName;  ?></strong>
                </li>
            </ul>
        </div>
    </div>

    

<?php
}
?>

    <form action="../post.html">
        <div class="d-flex justify-content-center mb-3">
            <button class="btn btn-primary" type="submit">Retour à la page d'acceuil</button>
        </div>
    </form> 



