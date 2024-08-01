<?php
if ($_GET["ID"]) {
    include '../config/database.php';
    include '../object/buku.php';

    $database = new database();
    $db = $database->getConnection();

    $anggota = new buku($db);
    $anggota->ID = $_GET["ID"];

    $anggota->delete();
}

header("location: http://localhost/perpus_app/buku/index.php");
?>