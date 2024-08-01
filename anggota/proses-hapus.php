<?php
if ($_GET["ID"]) {
    include '../config/database.php';
    include '../object/anggota.php';

    $database = new database();
    $db = $database->getConnection();

    $anggota = new anggota($db);
    $anggota->ID = $_GET["ID"];

    $anggota->delete();
}

header("location: http://localhost/perpus_app/anggota/index.php");
?>