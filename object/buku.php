<?php

class buku {

    // koneksi database & nama tabel
    private $conn;
    private $table_name = "buku";

    // property object anggota
    public $ID;
    public $ISBN;
    public $Judul;
    public $Pengarang;
    public $Kategori_ID;
    public $Penerbit_ID;
    public $Deskripsi;
    public $Stok;

    public function __construct($db) {
        $this->conn = $db;
    }
    function create() {
        //insert
        $query = "INSERT INTO " . $this->table_name . " (ISBN, Judul, Pengarang, Kategori_ID, Penerbit_ID, Deskripsi, Stok) " . 
                                          " VALUES (:ISBN, :Judul, :Pengarang, :Kategori_ID, :Penerbit_ID, :Deskripsi, :Stok)";
    
        
        $result = $this->conn->prepare($query);
    
        $this->ISBN = htmlspecialchars(strip_tags($this->ISBN));
        $this->Judul = htmlspecialchars(strip_tags($this->Judul));
        $this->Pengarang = htmlspecialchars(strip_tags($this->Pengarang));
        $this->Kategori_ID = htmlspecialchars(strip_tags($this->Kategori_ID));
        $this->Penerbit_ID = htmlspecialchars(strip_tags($this->Penerbit_ID));
        $this->Deskripsi = htmlspecialchars(strip_tags($this->Deskripsi));
        $this->Stok = htmlspecialchars(strip_tags($this->Stok));
    
        $result->bindParam(":ISBN", $this->ISBN);
        $result->bindParam(":Judul", $this->Judul);
        $result->bindParam(":Pengarang", $this->Pengarang);
        $result->bindParam(":Kategori_ID", $this->Kategori_ID);
        $result->bindParam(":Penerbit_ID", $this->Penerbit_ID);
        $result->bindParam(":Deskripsi", $this->Deskripsi);
        $result->bindParam(":Stok", $this->Stok);
        
        if($result->execute()) {
            return true;
        } else {
            return false;
        }
    }
    
    

    function readAll() {
        // select
        $query = "SELECT buku.ID,
                        buku.ISBN,
                        buku.Judul,
                        buku.Pengarang,
                        buku.Kategori_ID,
                        buku.Penerbit_ID,
                        buku.Deskripsi,
                        buku.Stok,
                        kategori.NamaKategori,
                        penerbit.NamaPenerbit
                        FROM buku JOIN kategori ON buku.Kategori_ID = kategori.ID
                                    JOIN penerbit ON buku.Penerbit_ID = penerbit.ID";

        $result = $this->conn->prepare($query);
        $result->execute();

        return $result;
    }

    function readOne(){
        $query = "SELECT buku.ID,
                        buku.ISBN,
                        buku.Judul,
                        buku.Pengarang,
                        buku.Kategori_ID,
                        buku.Penerbit_ID,
                        buku.Deskripsi,
                        buku.Stok,
                        kategori.NamaKategori,
                        penerbit.NamaPenerbit
                        FROM buku JOIN kategori ON buku.Kategori_ID = kategori.ID
                                    JOIN penerbit ON buku.Penerbit_ID = penerbit.ID";

        $result = $this->conn->prepare($query);
        $result->execute();

        return $result;
    }

    function update() {
        $query = "UPDATE " . $this->table_name . " SET
                                                    ISBN = :ISBN,
                                                    Judul = :Judul,
                                                    Kategori_ID = :Kategori_ID,
                                                    Penerbit_ID = :Penerbit_ID,
                                                    Deskripsi = :Deskripsi,
                                                    Stok = :Stok
                                                    WHERE
                                                    ID = :ID";
            
        $result = $this->conn->prepare($query);
    
        $this->ISBN = htmlspecialchars(strip_tags($this->ISBN));
        $this->Judul = htmlspecialchars(strip_tags($this->Judul));
        $this->Kategori_ID = htmlspecialchars(strip_tags($this->Kategori_ID));
        $this->Penerbit_ID = htmlspecialchars(strip_tags($this->Penerbit_ID));
        $this->ID = htmlspecialchars(strip_tags($this->ID));
        $this->Deskripsi = htmlspecialchars(strip_tags($this->Deskripsi));
        $this->Stok = htmlspecialchars(strip_tags($this->Stok));
            
        $result->bindParam(":ISBN", $this->ISBN);
        $result->bindParam(":Judul", $this->Judul);
        $result->bindParam(":Kategori_ID", $this->Kategori_ID);
        $result->bindParam(":Penerbit_ID", $this->Penerbit_ID);
        $result->bindParam(":ID", $this->ID);
        $result->bindParam(":Deskripsi", $this->Deskripsi);
        $result->bindParam(":Stok", $this->Stok);
    
        $result->execute();
    }
    

    function delete() {
        $query = "DELETE FROM " . $this->table_name . " WHERE ID = ?";

        echo $query;
        $result = $this->conn->prepare($query);
        $result->bindParam(1, $this->ID);

        $result->execute();
    }
}
?>