<?php
class Spieler {
    private $id;
    private $name;
    private $lebenspunkte;
    private $angriffswert;
    private $erstellungsdatum;

    public function __construct($name, $lebenspunkte, $angriffswert) {
        $this->name = $name;
        $this->lebenspunkte = $lebenspunkte;
        $this->angriffswert = $angriffswert;
        $this->erstellungsdatum = new DateTime();
    }

    public function getName() {
        return $this->name;
    }

    public function setName($name) {
        $this->name = $name;
    }

    public function getLebenspunkte() {
        return $this->lebenspunkte;
    }

    public function setLebenspunkte($lebenspunkte) {
        $this->lebenspunkte = $lebenspunkte;
    }

    public function getAngriffswert() {
        return $this->angriffswert;
    }

    public function setAngriffswert($angriffswert) {
        $this->angriffswert = $angriffswert;
    }

    public function getErstellungsdatum() {
        return $this->erstellungsdatum;
    }

    public function setErstellungsdatum(DateTime $datum) {
        $this->erstellungsdatum = $datum;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function getId() {
        return $this->id;
    }

    public function zeige_Status() {
        return "Name: {$this->name}, Lebenspunkte: {$this->lebenspunkte}, Angriffswert: {$this->angriffswert}, Erstellt am: " . $this->erstellungsdatum->format('Y-m-d');
    }
}
?>
