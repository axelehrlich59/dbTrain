<?php

require '../config/connect.php';

$db = connection();

if (isset($_GET['agentsdelete'])) {

    $agents_id = $_GET['agentsdelete'];
    $delete = $db->prepare("DELETE FROM agents WHERE agents_id= ? ");
    //header('location: ../views/get.php');

    $delete-> execute();
}

?>