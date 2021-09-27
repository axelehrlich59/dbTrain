<?php

require '../config/connect.php';

$db = connection();


if(isset($_POST['id'])) {
    $id = htmlspecialchars(trim($_POST['id']));
}
else {
    $id = '';
}

if(isset($_POST['firstname'])) {
    $firstname = htmlspecialchars(trim($_POST['firstname']));
}
else {
    $firstname = '';
}

if(isset($_POST['lastname'])) {
    $lastname = htmlspecialchars(trim($_POST['lastname']));
}
else {
    $lastname = '';
}

$sqlUpdate = "UPDATE news SET firstName = :firstname, lastName = :lastname WHERE id = :ids ";
$reqUpdate = $db->prepare($sqlUpdate);
$reqUpdate->bindParam(':firstname',$firstname);
$reqUpdate->bindParam(':lastname',$lastname);
$reqUpdate->bindParam(':ids',$id);
$reqUpdate->execute();


if($reqUpdate->rowCount()==1) {
    header('location: ../views/get.php');
}

?>

<? else {?>
    <div class="alert alert-danger" role="alert">
  La modification n'as pas été prise en compte. Réessayez !
</div>   

<? }?>