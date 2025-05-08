<?php
require_once 'Datenbank.php';
require_once 'Spieler.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $lebenspunkte = $_POST['lebenspunkte'];
    $angriffswert = $_POST['angriffswert'];

    $spieler = new Spieler($name, $lebenspunkte, $angriffswert);
    $db = new Datenbank();
    $id = $db->savePlayer($spieler);

    echo "Spieler {$spieler->getName()} erfolgreich registriert!<br>";
    echo "<a href='index.php'>Zurück zur Startseite</a>";
}
?>



<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Spieler Anmeldung</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Spieler Anmeldung</h1>
    <form method="POST">
        Name: <input type="text" name="name" required><br>
        Lebenspunkte: <input type="number" name="lebenspunkte" required><br>
        Angriffswert: <input type="number" name="angriffswert" required><br>
        <button type="submit">Anmelden</button>
    </form>
    <a href="index.php">Zurück zur Startseite</a>
</body>
</html>
