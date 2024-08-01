<?php

class Petugas {

    private $conn;
    private $table_name = "petugas";

    public $ID;
    public $NamaPetugas;
    public $Alamat;
    public $NoTelp;
    public $Email;
    public $Password;
    public $Role;

    public function __construct($db) {
        $this->conn = $db;
    }

    function create() {
        //insert
        $query = "INSERT INTO " . $this->table_name . " (ID, NamaPetugas, Alamat, NoTelp, Email, Password, Role)" .
                 " VALUES (:ID, :NamaPetugas, :Alamat, :NoTelp, :Email, :Password, :Role)";
        
        $result = $this->conn->prepare($query);

        $this->NamaPetugas = htmlspecialchars(strip_tags($this->NamaPetugas));
        $this->Alamat = htmlspecialchars(strip_tags($this->Alamat));
        $this->NoTelp = htmlspecialchars(strip_tags($this->NoTelp));
        $this->Email = htmlspecialchars(strip_tags($this->Email));
        $this->Password = htmlspecialchars(strip_tags($this->Password));
        $this->Role = htmlspecialchars(strip_tags($this->Role));

        $result->bindParam(":ID", $this->ID);
        $result->bindParam(":NamaPetugas", $this->NamaPetugas);
        $result->bindParam(":Alamat", $this->Alamat);
        $result->bindParam(":NoTelp", $this->NoTelp);
        $result->bindParam(":Email", $this->Email);
        $result->bindParam(":Password", $this->Password);
        $result->bindParam(":Role", $this->Role);
        if ($result->execute()) {
            return true;
        } else {
            return false;
        }
    }
    function readAll() {
        //select
        $query = "SELECT * FROM " . $this->table_name;
        
        $result = $this->conn->prepare($query);
        $result->execute();

        return $result;
    }
    function readOne() {
        //select by ID
        $query = "SELECT * FROM " . $this->table_name . " WHERE ID = ?";

        $result = $this->conn->prepare($query);
        $result->bindParam(1 , $this->ID);
        $result->execute();

        $row = $result->fetch(PDO::FETCH_ASSOC);

        $this->NamaPetugas = $row["NamaPetugas"];
        $this->Alamat = $row["Alamat"];
        $this->NoTelp = $row["NoTelp"];
        $this->Email = $row["Email"];
        $this->Password = $row["Password"];
        $this->Role = $row["Role"];
    }

    function update() {
        $query = "UPDATE " . $this->table_name . " SET 
                                                    NamaPetugas = :NamaPetugas,
                                                    Alamat = :Alamat,
                                                    NoTelp = :NoTelp,
                                                    Email = :Email, 
                                                    Password = :Password, 
                                                    Role = :Role
                                                    WHERE 
                                                    ID = :ID";
                                                    
        $result = $this->conn->prepare($query);

        $this->NamaPetugas = htmlspecialchars(strip_tags($this->NamaPetugas));
        $this->Alamat = htmlspecialchars(strip_tags($this->Alamat));
        $this->NoTelp = htmlspecialchars(strip_tags($this->NoTelp));
        $this->Email = htmlspecialchars(strip_tags($this->Email));
        $this->Password = htmlspecialchars(strip_tags($this->Password));
        $this->Role = htmlspecialchars(strip_tags($this->Role));

        $result->bindParam(":ID", $this->ID);
        $result->bindParam(":NamaPetugas", $this->NamaPetugas);
        $result->bindParam(":Alamat", $this->Alamat);
        $result->bindParam(":NoTelp", $this->NoTelp);
        $result->bindParam(":Email", $this->Email);
        $result->bindParam(":Password", $this->Password);
        $result->bindParam(":Role", $this->Role);

        $result->execute();
    }
    
    function delete() {
        $query = "DELETE FROM " . $this->table_name . " WHERE ID = ? ";

        $result = $this->conn->prepare($query);
        $result->bindParam(1 , $this->ID);

        $result->execute();
    }

    function authenticate() {
        $query = "SELECT * FROM " . $this->table_name . " WHERE Email = :Email AND Password = :Password";

        $result = $this->conn->prepare($query);

        $this->Email=htmlspecialchars(strip_tags($this->Email));
        $this->Password=htmlspecialchars(strip_tags($this->Password));

        $result->bindParam(":Email", $this->Email);
        $result->bindParam(":Password", $this->Password);
        
        $result->execute();

        if($result->rowCount() > 0) {
            $petugas = $result->fetch(PDO::FETCH_ASSOC);

            $_SESSION["namapetugas"] = $petugas["NamaPetugas"];
            $_SESSION["roletugas"] = $petugas["Role"];
            $_SESSION["idpetugas"] = $petugas["ID"];
            $_SESSION["emailpetugas"] = $petugas["Email"];
            
            return true;
        } else {
            return false;
        }
    }
}
?>