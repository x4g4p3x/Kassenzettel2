<!--
  Die Datei 'show_kassenzettel.php' dient als Benutzeroberfläche für die Erstellung eines Kassenzettels.
  Sie ermöglicht es dem Benutzer, Artikelinformationen wie Namen, Einzelpreise, Anzahlen und
  Mehrwertsteuersätze über ein Webformular einzugeben. Nach dem Absenden des Formulars werden die
  Daten an 'kassenzettelBerechnung.php' gesendet, wo die Gesamtkosten berechnet und der Kassenzettel
  generiert wird.

  Die Struktur der Datei ist wie folgt:
  - Der Kopfbereich (head) enthält Meta-Informationen für die Darstellung und den Titel der Webseite.
  - Der Hauptteil (body) enthält eine Überschrift mit dem aktuellen Datum und der Uhrzeit, gefolgt von
    einem Formular, das in einer Tabelle organisiert ist. Jede Tabellenzeile repräsentiert einen Artikel
    mit Eingabefeldern für den Namen, den Einzelpreis und die Anzahl sowie Radiobuttons für die Auswahl
    des Mehrwertsteuersatzes.
  - Das Formular verwendet die POST-Methode, um die eingegebenen Daten sicher an die Verarbeitungsdatei
    zu übermitteln.
  - Ein Absenden-Button am Ende des Formulars ermöglicht es dem Benutzer, die Eingabe zu bestätigen und
    die Daten zur weiteren Verarbeitung zu senden.
-->

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <!-- Die Meta-Tags sorgen für eine korrekte Darstellung auf verschiedenen Geräten und legen den Zeichensatz fest -->
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>kassenzettel</title>
    <!-- Hier können zusätzliche Stylesheets oder Styles eingefügt werden -->
    <style>
        /* Hier können CSS-Stile definiert werden, um das Aussehen des Kassenzettels anzupassen */
    </style>
</head>
<body>
<!-- Überschrift für den Kassenzettel mit dem aktuellen Datum und Uhrzeit -->
<h1>Kassenzettel <?php echo date('d.m.y H:i:s') ?></h1>
<!-- Das Formular sendet die eingegebenen Daten an die kassenzettelBerechnung.php zur Verarbeitung -->
<form action="kassenzettelBrechnung.php" method="post">
    <table>
        <!-- Kopfzeile der Tabelle definiert die Spalten für Artikel, Einzelpreis, Anzahl und MwSt. -->
        <thead>
        <th>Artikel</th>
        <th>Einzelpreis</th>
        <th>Anzahl</th>
        <th>MwSt.</th>
        </thead>
        <tbody>
        <!-- PHP-Schleife, um mehrere Zeilen für Artikel-Eingaben zu erzeugen -->
        <?php
        for ($i = 0; $i < 3; $i++) {
            ?>
            <tr>
                <!-- Eingabefelder für Artikelname, Einzelpreis, Anzahl und Auswahl des MwSt.-Satzes -->
                <td><input type="text" name="artikel[]" value=""></td>
                <td><input type="text" name="einzelpreis[]" value=""></td>
                <td><input type="text" name="anzahl[]" value=""></td>
                <td>
                    <!-- Radiobuttons für die Auswahl des Mehrwertsteuersatzes -->
                    <label><input type="radio" name="mwst[<?php echo $i ?>]" value="7" checked>7% </label>
                    <label><input type="radio" name="mwst[<?php echo $i ?>]" value="19" >19% </label>
                </td>
                <td style="text-align: center"></td>
            </tr>
            <?php
        }
        ?>
        <!-- Eine Zeile für den Absenden-Button -->
        <tr>
            <td colspan="2" rowspan="3"><input type="submit"></td>
        </tr>
        </tbody>
    </table>
</form>
</body>
</html>
