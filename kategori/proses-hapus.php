<?php
if ($_GET["ID"]) {
    include '../config/database.php';
    include '../object/kategori.php';

    $database = new database();
    $db = $database->getConnection();

    $kategori = new kategori($db);
    $kategori->ID = $_GET["ID"];

    $kategori->delete();
}

header("location: http://localhost/perpus_app/kategori/index.php");
?>