<?php
class Database {
    public $pdo;



public function __construct($db = "bedrijfen", $user="root", $pwd="", $host="localhost") {
    try {
        $this->pdo = new PDO("mysql:host=$host; dbname=$db", $user, $pwd);
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        echo "connected to database $db";
    } catch (PDOException $e) {
        echo"error", $e->getMessage();
    }
}

public function telefoons($merk, $model, $opslag, $Prijs) {
    try{
        $stmt = $this->pdo->prepare("INSERT INTO `telefoons` (`merk`, `model`, `prijs`, `opslag`) VALUES (:merk, :model, :opslag, :Prijs)");
        $stmt->bindParam(':merk', $merk);
        $stmt->bindParam(':model', $model);
        $stmt->bindParam(':opslag', $opslag);
        $stmt->bindParam(':Prijs', $Prijs);
        $stmt->execute();
        return $stmt->rowCount();
    } catch (PDOException $e) {
        echo"error", $e->getMessage();      
    }
}
}
$Database = new  database();
?>

