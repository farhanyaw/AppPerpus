<?php
if ($_POST) {
    include '../config/database.php';
    include '../object/kategori.php';

    $database = new database();
    $db = $database->getConnection();

    $kategori = new kategori($db);

    $kategori->ID = $_POST['id'];
    $kategori->NamaKategori = $_POST['NamaKategori'];

    $kategori->create();
}

header("location: http://localhost/perpus_app/kategori/index.php");
?>