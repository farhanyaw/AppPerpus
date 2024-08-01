
<?php
if($_GET["ID"]) {
    include '../config/database.php';
    include '../object/Petugas.php';

    $database = new Database();
    $db = $database->getConnection();

    $petugas = new Petugas($db);
    $petugas->ID = $_GET["ID"]; 

    $petugas->delete();
}

header("Location: http://localhost/perpus_app/petugas/index.php");
?>
