<?php
if ($_POST) {
    include '../config/database.php';
    include '../object/penerbit.php';

    $database = new database();
    $db = $database->getConnection();

    $penerbit = new penerbit($db);

    $penerbit->NamaPenerbit = $_POST['NamaPenerbit'];
    $penerbit->Alamat = $_POST['alamat'];
    $penerbit->NoTelp = $_POST['notelp'];

    $penerbit->create();
}

header("location: http://localhost/perpus_app/penerbit/index.php");
?>