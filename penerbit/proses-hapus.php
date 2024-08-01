<?php
if ($_GET["ID"]) {
    include '../config/database.php';
    include '../object/penerbit.php';

    $database = new database();
    $db = $database->getConnection();

    $penerbit = new penerbit($db);
    $penerbit->ID = $_GET["ID"];

    $penerbit->delete();
}

header("location: http://localhost/perpus_app/penerbit/index.php");
?>