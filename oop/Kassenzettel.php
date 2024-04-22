<?php
/**
 * Die Kassenzettel-Klasse ist verantwortlich für die Verwaltung eines Kassenzettels.
 * Sie speichert eine Liste von Artikeln und deren Anzahlen, die auf dem Kassenzettel
 * aufgeführt sind. Die Klasse bietet Methoden zum Hinzufügen und Entfernen von Artikeln,
 * zum Berechnen der Gesamtsumme sowie zum Berechnen der Mehrwertsteuerbeträge für
 * unterschiedliche Steuersätze. Die Methoden printName und berechnePreise ermöglichen
 * das Ausgeben der Artikelnamen und das Berechnen der Preise für die jeweiligen Artikel.
 * Die Methoden mwstSumme7 und mwstSumme19 berechnen die Summe der Mehrwertsteuer für
 * die Steuersätze 7% bzw. 19%. Zusätzlich bietet die Klasse Getter- und Setter-Methoden
 * für die Eigenschaften Artikel und Anzahl, um die Flexibilität bei der Verwaltung des
 * Kassenzettels zu erhöhen.
 */


// Klassendefinition für Kassenzettel
class Kassenzettel
{
    /** @var Artikel[] $artikel */
    private array $artikel; // Ein Array, das Artikel-Objekte speichert
    private array $anzahl; // Ein Array, das die Anzahl der gekauften Artikel speichert

    // Konstruktor für die Kassenzettel-Klasse
    public function __construct(array $anzahl, array $artikel)
    {
        $this->artikel = $artikel; // Initialisierung des Artikel-Arrays
        $this->anzahl = $anzahl; // Initialisierung des Anzahl-Arrays
    }

    // Methode zum Ausgeben der Namen der Artikel
    public function printName(): void
    {
        foreach ($this->artikel as $item) {
            echo $item->getName(); // Gibt den Namen jedes Artikels aus
        }
    }

    // Methode zur Berechnung der Preise für jeden Artikel
    public function berechnePreise(): array
    {
        $preise = [];
        foreach ($this->artikel as $index => $art) {
            $preise[] = $art->getPreis() * $this->anzahl[$index]; // Berechnet den Preis für jeden Artikel
        }
        return $preise; // Gibt ein Array mit den berechneten Preisen zurück
    }

    // Methode zur Berechnung der Gesamtsumme
    public function berechneSumme(): float
    {
        $summe = 0;
        foreach ($this->berechnePreise() as $preis) {
            $summe += $preis; // Addiert die Preise aller Artikel zur Gesamtsumme
        }
        return $summe; // Gibt die Gesamtsumme zurück
    }

    // Methode zur Berechnung der Mehrwertsteuer-Summe für 7% MwSt.
    public function mwstSumme7(): float
    {
        $summe = 0;
        $preise = $this->berechnePreise();
        foreach ($this->artikel as $index => $item) {
            if ($item->getMwst() == 7) {
                $summe += $item->mwstBetrag() * $this->anzahl[$index]; // Berechnet die Mehrwertsteuer für Artikel mit 7% MwSt.
            }
        }
        return $summe; // Gibt die Mehrwertsteuer-Summe für 7% MwSt. zurück
    }

    // Methode zur Berechnung der Mehrwertsteuer-Summe für 19% MwSt.
    public function mwstSumme19(): float
    {
        $summe = 0;
        foreach ($this->artikel as $index => $item) {
            if ($item->getMwst() == 19) {
                $summe += $item->mwstBetrag() * $this->anzahl[$index]; // Berechnet die Mehrwertsteuer für Artikel mit 19% MwSt.
            }
        }
        return $summe; // Gibt die Mehrwertsteuer-Summe für 19% MwSt. zurück
    }

    // Getter-Methode für das Artikel-Array
    public function getArtikel(): array
    {
        return $this->artikel;
    }

    // Setter-Methode für das Artikel-Array
    public function setArtikel(array $artikel): void
    {
        $this->artikel = $artikel;
    }

    // Getter-Methode für das Anzahl-Array
    public function getAnzahl(): array
    {
        return $this->anzahl;
    }

    // Setter-Methode für das Anzahl-Array
    public function setAnzahl(array $anzahl): void
    {
        $this->anzahl = $anzahl;
    }
}
