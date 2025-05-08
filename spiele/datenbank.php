<?php
class Datenbank {
    private $host = 'localhost';
    private $dbName = 'kampfspiel';
    private $user = 'root';
    private $password = '';
    private $pdo;

    public function __construct() {
        try {
            $this->pdo = new PDO("mysql:host=$this->host;dbname=$this->dbName", $this->user, $this->password);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die("Verbindung zur Datenbank fehlgeschlagen: " . $e->getMessage());
        }
    }

    public function savePlayer($spieler) {
        $stmt = $this->pdo->prepare("INSERT INTO Player (name, lebenspunkte, angriffswert, erstellungsdatum) 
                                      VALUES (?, ?, ?, ?)");
        $stmt->execute([$spieler->getName(), $spieler->getLebenspunkte(), $spieler->getAngriffswert(), $spieler->getErstellungsdatum()->format('Y-m-d H:i:s')]);
        return $this->pdo->lastInsertId(); 
    }

    public function loadPlayer($id) {
        $stmt = $this->pdo->prepare("SELECT * FROM Player WHERE id = ?");
        $stmt->execute([$id]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($row) {
            $spieler = new Spieler($row['name'], $row['lebenspunkte'], $row['angriffswert']);
            $spieler->setId($row['id']);
            $spieler->setErstellungsdatum(new DateTime($row['erstellungsdatum']));
            return $spieler;
        }
        return null;
    }

    public function loadAllPlayers() {
        $stmt = $this->pdo->query("SELECT * FROM Player");
        $players = [];
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $spieler = new Spieler($row['name'], $row['lebenspunkte'], $row['angriffswert']);
            $spieler->setId($row['id']);
            $spieler->setErstellungsdatum(new DateTime($row['erstellungsdatum']));
            $players[] = $spieler;
        }
        return $players;
    }
}
?>
