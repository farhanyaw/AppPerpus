<?php
if ($_POST) {
    include '../config/database.php';
    include '../object/anggota.php';

    $database = new database();
    $db = $database->getConnection();

    $anggota = new anggota($db);

    $anggota->NIK = $_POST['nik'];
    $anggota->NamaLengkap = $_POST['namalengkap'];
    $anggota->Alamat = $_POST['alamat'];
    $anggota->NoTelp = $_POST['notelp'];

    $anggota->create();
}

header("location: http://localhost/perpus_app/anggota/index.php");
?>