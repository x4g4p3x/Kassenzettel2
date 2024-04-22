<?php
/**
 * Die Artikel-Klasse ist zuständig für die Verwaltung der Eigenschaften eines Artikels,
 * wie Name, Preis und Mehrwertsteuersatz. Die Methoden getName, getPreis, und getMwst
 * sind sogenannte Getter, die es ermöglichen, die Werte der privaten Variablen von
 * außerhalb der Klasse zu lesen. Die entsprechenden Setter-Methoden erlauben es, diese
 * Werte zu ändern. Die Methode mwstBetrag berechnet den Betrag der Mehrwertsteuer für
 * den Artikel, und create_artikel_array ist eine Hilfsmethode, um ein Array von
 * Artikel-Objekten zu erstellen.
 */

// Klassendefinition für Artikel
class Artikel
{
    private string $name; // Variable für den Namen des Artikels
    private float $preis; // Variable für den Preis des Artikels
    private int $mwst; // Variable für den Mehrwertsteuersatz des Artikels

    // Konstruktor für die Artikel-Klasse
    public function __construct(string $name, float $preis, int $mwst)
    {
        $this->name = $name; // Initialisierung des Namens
        $this->preis = $preis; // Initialisierung des Preises
        $this->mwst = $mwst; // Initialisierung des Mehrwertsteuersatzes
    }

    // Getter-Methode für den Namen
    public function getName(): string
    {
        return $this->name;
    }

    // Setter-Methode für den Namen
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    // Getter-Methode für den Preis
    public function getPreis(): float
    {
        return $this->preis;
    }

    // Setter-Methode für den Preis
    public function setPreis(float $preis): void
    {
        $this->preis = $preis;
    }

    // Getter-Methode für den Mehrwertsteuersatz
    public function getMwst(): int
    {
        return $this->mwst;
    }

    // Setter-Methode für den Mehrwertsteuersatz
    public function setMwst(int $mwst): void
    {
        $this->mwst = $mwst;
    }

    // Methode zur Berechnung des Mehrwertsteuerbetrags
    public function mwstBetrag(): float
    {
        // Berechnet den Mehrwertsteuerbetrag basierend auf dem Preis und dem Mehrwertsteuersatz
        return (($this->getPreis()) * ($this->getMwst()) / (100 + $this->getMwst()));
    }

    // Statische Methode zur Erstellung eines Arrays von Artikel-Objekten
    public static function create_artikel_array(array $artikel, array $einzelpreis, array $mwst) :array
    {
        $artikel_a = []; // Array für Artikel-Objekte
        foreach ($artikel as $index => $arti) {
            // Erstellt für jeden Artikel ein neues Artikel-Objekt und fügt es dem Array hinzu
            $artikel_a[] = new Artikel($arti, $einzelpreis[$index], $mwst[$index]);
        }
        return $artikel_a; // Gibt das Array mit Artikel-Objekten zurück
    }
}