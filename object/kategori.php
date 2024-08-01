<?php

class kategori {

    // koneksi database & NamaKategori tabel
    private $conn;
    private $table_name = "kategori";

    // property object kategori
    public $ID;
    public $NamaKategori;

    public function __construct($db) {
        $this->conn = $db;
    }

    function create() {
        //insert
        $query = "INSERT INTO " . $this->table_name . " (ID, NamaKategori) " . 
                                                    " VALUES (:ID, :NamaKategori)";

        
        $result = $this->conn->prepare($query);

        $this->ID = htmlspecialchars(strip_tags($this->ID));
        $this->NamaKategori = htmlspecialchars(strip_tags($this->NamaKategori));

        $result->bindParam(":ID", $this->ID);
        $result->bindParam(":NamaKategori", $this->NamaKategori);
        //TANYA
        if($result->execute()) {
            return true;
        } else {
            return false;
        }
    }

    function readAll() {
        // select
        $query = "SELECT * FROM " . $this->table_name;

        $result = $this->conn->prepare($query);
        $result->execute();

        return $result;
    }

    function readOne(){
        //select by ID
        $query = "SELECT * FROM " . $this->table_name . " WHERE ID = ?";

        $result = $this->conn->prepare($query);
        $result->bindParam(1, $this->ID);
        $result->execute();

        $row = $result->fetch(PDO::FETCH_ASSOC);

        $this->ID = $row["ID"];
        $this->NamaKategori = $row["NamaKategori"];
    }

    function update() {
        $query = "UPDATE " . $this->table_name . " SET
                                                    ID = :ID,
                                                    NamaKategori = :NamaKategori
                                                    WHERE
                                                    ID = :ID";
            
        $result = $this->conn->prepare($query);
    
        $this->ID = htmlspecialchars(strip_tags($this->ID));
        $this->NamaKategori = htmlspecialchars(strip_tags($this->NamaKategori));
            
        $result->bindParam(":ID", $this->ID);
        $result->bindParam(":NamaKategori", $this->NamaKategori);
    
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