<?php
/**
 * Dieses Skript verarbeitet die Daten eines Kassenzettels, die über ein HTML-Formular
 * eingegeben wurden. Es beinhaltet das Einbinden der Klassen 'Kassenzettel' und 'Artikel',
 * das Sammeln der Formulardaten und das Erstellen von Objekten, um die Gesamtkosten
 * der gekauften Artikel zu berechnen und auszugeben.
 *
 * Zuerst werden die Klassen 'Kassenzettel' und 'Artikel' eingebunden, die für die
 * Verarbeitung der Artikel und Kassenzettel-Daten benötigt werden. Anschließend werden
 * die Daten aus dem POST-Request des Formulars geholt, welches die Namen, Preise,
 * Anzahlen und Mehrwertsteuersätze der Artikel enthält.
 *
 * Mit diesen Daten wird ein Array von 'Artikel'-Objekten erstellt, das dann zusammen
 * mit den Anzahlen zur Erstellung eines 'Kassenzettel'-Objekts verwendet wird. Das
 * 'Kassenzettel'-Objekt bietet Methoden, um die Namen der Artikel auszugeben und die
 * Gesamtkosten zu berechnen.
 *
 * Schließlich wird der HTML-Code für die Darstellung des Kassenzettels auf einer Webseite
 * vorbereitet, wobei die Ausgabe der Artikelnamen bereits im PHP-Teil erfolgt.
 */

include "Kassenzettel.php"; // Einbinden der Kassenzettel-Klasse
include 'Artikel.php'; // Einbinden der Artikel-Klasse

// Die folgenden Zeilen holen die Daten aus dem Formular, das auf der Webseite ausgefüllt wurde
$name = $_POST['artikel']; // Array mit den Namen der Artikel
$einzelpreis = $_POST['einzelpreis']; // Array mit den Einzelpreisen der Artikel
$anzahl = $_POST['anzahl']; // Array mit den Anzahlen der gekauften Artikel
$mwst = $_POST["mwst"]; // Array mit den Mehrwertsteuersätzen der Artikel

// Erzeugen eines Arrays von Artikel-Objekten basierend auf den eingegebenen Daten
$artikel_array = Artikel::create_artikel_array($name, $einzelpreis, $mwst);

// Erzeugen eines Kassenzettel-Objekts mit den bereitgestellten Daten
$kassenzettel = new Kassenzettel($anzahl, $artikel_array);

// Ausgabe der Namen der Artikel (Methode printName)
$kassenzettel->printName();
?>

<!doctype html>
<html lang='en'>
<head>
    <meta charset='UTF-8'>
    <meta name='viewport'
          content='width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0'>
    <meta http-equiv='X-UA-Compatible' content='ie=edge'>
    <title>Document</title>

    <div>
<!--        --><?php
//        foreach ($kassenzettel->getArtikel() as $item) {
//            $name = $item->getName();
//            $
//            echo" <div></div> ";
//
//        }
//
//        ?>



    </div>
</head>
<body>

</body>
</html>






