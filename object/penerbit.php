<?php

class penerbit {

    // koneksi database & NamaPenerbit tabel
    private $conn;
    private $table_name = "penerbit";

    // property object anggota
    public $ID;
    public $NamaPenerbit;
    public $Alamat;
    public $NoTelp;

    public function __construct($db) {
        $this->conn = $db;
    }

    function create() {
        //insert
        $query = "INSERT INTO " . $this->table_name . " (ID, NamaPenerbit, Alamat, NoTelp) " . 
                                                    " VALUES (:ID, :NamaPenerbit, :Alamat, :NoTelp)";

        
        $result = $this->conn->prepare($query);

        $this->ID = htmlspecialchars(strip_tags($this->ID));
        $this->NamaPenerbit = htmlspecialchars(strip_tags($this->NamaPenerbit));
        $this->Alamat = htmlspecialchars(strip_tags($this->Alamat));
        $this->NoTelp = htmlspecialchars(strip_tags($this->NoTelp));

        $result->bindParam(":ID", $this->ID);
        $result->bindParam(":NamaPenerbit", $this->NamaPenerbit);
        $result->bindParam(":Alamat", $this->Alamat);
        $result->bindParam(":NoTelp", $this->NoTelp);
        
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
        $this->NamaPenerbit = $row["NamaPenerbit"];
        $this->Alamat = $row["Alamat"];
        $this->NoTelp = $row["NoTelp"];
    }

    function update() {
        $query = "UPDATE " . $this->table_name . " SET
                                                    ID = :ID,
                                                    NamaPenerbit = :NamaPenerbit,
                                                    Alamat = :Alamat,
                                                    NoTelp = :NoTelp
                                                    WHERE
                                                    ID = :ID";
            
        $result = $this->conn->prepare($query);
    
        $this->ID = htmlspecialchars(strip_tags($this->ID));
        $this->NamaPenerbit = htmlspecialchars(strip_tags($this->NamaPenerbit));
        $this->Alamat = htmlspecialchars(strip_tags($this->Alamat));
        $this->NoTelp = htmlspecialchars(strip_tags($this->NoTelp));
            
        $result->bindParam(":ID", $this->ID);
        $result->bindParam(":NamaPenerbit", $this->NamaPenerbit);
        $result->bindParam(":Alamat", $this->Alamat);
        $result->bindParam(":NoTelp", $this->NoTelp);
    
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