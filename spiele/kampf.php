
<?php
require_once 'Datenbank.php';
require_once 'Spieler.php';

$db = new Datenbank();
$spieler1 = $db->loadPlayer($_POST['spieler1']);
$spieler2 = $db->loadPlayer($_POST['spieler2']);

class Kampf {
    public function kampf($spieler1, $spieler2) {
        echo "🏟 Kampf zwischen {$spieler1->getName()} und {$spieler2->getName()} beginnt!<br>";

        $runde = 1;
        while ($spieler1->getLebenspunkte() > 0 && $spieler2->getLebenspunkte() > 0) {
            echo "<strong>Runde $runde:</strong><br>";

            $spieler2->setLebenspunkte(max(0, $spieler2->getLebenspunkte() - $spieler1->getAngriffswert()));
            echo "{$spieler1->getName()} greift {$spieler2->getName()} an!<br>";

            if ($spieler2->getLebenspunkte() <= 0) {
                echo "<strong>{$spieler1->getName()} hat gewonnen!</strong><br>";
                break;
            }

            $spieler1->setLebenspunkte(max(0, $spieler1->getLebenspunkte() - $spieler2->getAngriffswert()));
            echo "{$spieler2->getName()} greift zurück!<br>";

            if ($spieler1->getLebenspunkte() <= 0) {
               // echo "<strong>{$spieler2->getName()} hat gewonnen!</strong><br>";
                break;
            }

            $runde++;
        }
    }
}

$kampf = new Kampf();
$kampf->kampf($spieler1, $spieler2);

?>


<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kampf Resultat</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>


    <video width="100%" autoplay loop muted>
        <source src="video.mp4" type="video/mp4">
        Dein Browser unterstützt kein Video-Tag.
    </video>



    <div class="kampf-result">
        <h2>Ergebnis des Kampfes:</h2>
        <?php
        // Kampf Simulation ausführen und Ergebnis anzeigen
        if ($spieler1->getLebenspunkte() <= 0) {
            echo "<strong>{$spieler2->getName()} hat gewonnen!</strong><br>";
        }
        else {
            echo "<strong>{$spieler1->getName()} hat gewonnen!</strong><br>";
        }

        ?>
    </div>
    <a href="index.php">Zurück zur Startseite</a>
</body>
</html>





