<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Build a table</title>
    <link rel="stylesheet" href="styles.css" />
</head>

<body>

    <!-- Header -->
    <header>
        <div>
            <a href="/Zutrittsversuche">Zutrittsversuche</a>
            |
            <a href="/Mitarbeiter">Mitarbeiter</a>
            |
            <a href="/Mietwagen">Mietwagen</a>
        </div>
        <img alt="Logo" height="50" src="./resources/Nettmann Logo.png" />
    </header>

    <!-- Content -->
    <div class="ContentContainer">
        <h1>Mietwagen - Kundenbeleg</h1>
        <?php
        function console_log($output, $with_script_tags = true)
        {
            $js_code = 'console.log(' . json_encode($output, JSON_HEX_TAG) .
                ');';
            if ($with_script_tags) {
                $js_code = '<script>' . $js_code . '</script>';
            }
            echo $js_code;
        }

        $output = "";
        $formValue = $_POST;

        console_log($formValue);

        
        if ($formValue['sentData']) {
            // Validate and print customor number
            if (trim($formValue['customerNumber']) == "") {
                $output .= "Bitte Kunden Nummer eingeben!";
                $output .= "<a href=\"Mietwagen.php\"> zurueck </a>";
            } else {
                $output .= "Kundennummer: ". $formValue['customerNumber'];
            }

            $output .= "<br/>";

            // Validate and print vehicle class
            if (!$formValue['vehicleClass']) {
                $output .= "Bitte Fahrzeugklasse auswaehlen!";
            } else {
                $output .= "Fahrzeugklasse: ". $formValue['vehicleClass'];
            }

            $output .= "<br/>";

            // print additional
            if ($formValue['additional']) {
                $output .= "Bitte Fahrzeugklasse auswaehlen!";
            } 


        } else {
            $output .= "unerlaubter Seitenzugriff";
            $output .= "<a href=\"Mietwagen.php\"> Startseite </a>";
        }

        console_log($output);
        echo $output;
        ?>
    </div>

    <!-- Footer -->
    <footer>
        <div class="FooterContainer">
            <div>
                <h3>Kontakt</h3>
                <ul>
                    <li>Ottostraße 22, 90762 Fürth</li>
                    <li>0911/11...</li>
                    <li>info@autohaus-nettmann.de</li>
                </ul>
            </div>

            <div>
                <h3>Bankdaten</h3>
                <ul>
                    <li>IBAN: DE76 1231 ...</li>
                    <li>BIC: 123 ...</li>
                    <li>Institut: SuperBank</li>
                </ul>
            </div>
        </div>
    </footer>
</body>

</html>