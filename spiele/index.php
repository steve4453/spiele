<?php
require_once 'Datenbank.php';
require_once 'Spieler.php';

$db = new Datenbank();
$players = $db->loadAllPlayers();
?>

<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <title>Startseite - Wähle zwei Spieler</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <h1>Wähle zwei Spieler für den Kampf</h1>

    <form action="kampf.php" method="POST">
        <label for="spieler1">Spieler 1:</label>
        <select name="spieler1" id="spieler1">
            <?php foreach ($players as $player): ?>
                <option value="<?= $player->getId(); ?>"><?= htmlspecialchars($player->getName()); ?></option>
            <?php endforeach; ?>
        </select><br>

        <label for="spieler2">Spieler 2:</label>
        <select name="spieler2" id="spieler2">
            <?php foreach ($players as $player): ?>
                <option value="<?= $player->getId(); ?>"><?= htmlspecialchars($player->getName()); ?></option>
            <?php endforeach; ?>
        </select><br>

        <button type="submit">Kampf starten</button>
    </form>

    <a href="anmeldung.php">Neuen Spieler anmelden</a>

</body>
</html>
