<?php

include "datenbank.php";



try {
    $pdo = new PDO("mysql:host=localhost;dbname=kampfspiel", "root", "");
    echo "✅ Verbindung erfolgreich!";
} catch (PDOException $e) {
    echo "❌ Fehler: " . $e->getMessage();
}





?>