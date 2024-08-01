
<?php
if ($_POST) {
    include '../config/database.php';
    include '../object/Petugas.php';

    $database = new Database();
    $db = $database->getConnection();

    $petugas = new Petugas($db);

    $petugas->NamaPetugas = $_POST['namapetugas'];
    $petugas->Alamat = $_POST['alamat'];
    $petugas->NoTelp = $_POST['notelp'];
    $petugas->Email = $_POST['email'];
    $petugas->Password = $_POST['password'];
    $petugas->Role = $_POST['role'];

    $petugas->create();
}

header("Location: http://localhost/perpus_app/Petugas/index.php");
?>
