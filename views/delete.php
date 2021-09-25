<?php

require '../config/connect.php';

$db = connection();

$id = $_GET["id"];
$sqlRequestDelete = "DELETE FROM news WHERE id=:ids";
$reqDeleteProducts = $db->prepare($sqlRequestDelete);
$reqDeleteProducts->bindParam(':ids',$id);
$reqDeleteProducts->execute();

header('Location: ../views/get.php');
?>