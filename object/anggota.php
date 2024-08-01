<?php

class anggota {

    // koneksi database & nama tabel
    private $conn;
    private $table_name = "anggota";

    // property object anggota
    public $ID;
    public $NIK;
    public $NamaLengkap;
    public $Alamat;
    public $NoTelp;
    public $TglRegistrasi;

    public function __construct($db) {
        $this->conn = $db;
    }

    function create() {
        //insert
        $query = "INSERT INTO " . $this->table_name . " (NIK, NamaLengkap, Alamat, NoTelp, TglRegistrasi) " . 
                                                    " VALUES (:NIK, :NamaLengkap, :Alamat, :NoTelp, :TglRegistrasi)";

        
        $result = $this->conn->prepare($query);

        $this->NIK = htmlspecialchars(strip_tags($this->NIK));
        $this->NamaLengkap = htmlspecialchars(strip_tags($this->NamaLengkap));
        $this->Alamat = htmlspecialchars(strip_tags($this->Alamat));
        $this->NoTelp = htmlspecialchars(strip_tags($this->NoTelp));
        $this->TglRegistrasi = date("Y-m-d");

        $result->bindParam(":NIK", $this->NIK);
        $result->bindParam(":NamaLengkap", $this->NamaLengkap);
        $result->bindParam(":Alamat", $this->Alamat);
        $result->bindParam(":NoTelp", $this->NoTelp);
        $result->bindParam(":TglRegistrasi", $this->TglRegistrasi);
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

        $this->NIK = $row["NIK"];
        $this->NamaLengkap = $row["NamaLengkap"];
        $this->Alamat = $row["Alamat"];
        $this->NoTelp = $row["NoTelp"];
    }

    function update() {
        $query = "UPDATE " . $this->table_name . " SET
                                                    NIK = :NIK,
                                                    NamaLengkap = :NamaLengkap,
                                                    Alamat = :Alamat,
                                                    NoTelp = :NoTelp
                                                    WHERE
                                                    ID = :ID";
            
        $result = $this->conn->prepare($query);
    
        $this->NIK = htmlspecialchars(strip_tags($this->NIK));
        $this->NamaLengkap = htmlspecialchars(strip_tags($this->NamaLengkap));
        $this->Alamat = htmlspecialchars(strip_tags($this->Alamat));
        $this->NoTelp = htmlspecialchars(strip_tags($this->NoTelp));
        $this->ID = htmlspecialchars(strip_tags($this->ID));
            
        $result->bindParam(":NIK", $this->NIK);
        $result->bindParam(":NamaLengkap", $this->NamaLengkap);
        $result->bindParam(":Alamat", $this->Alamat);
        $result->bindParam(":NoTelp", $this->NoTelp);
        $result->bindParam(":ID", $this->ID);
    
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