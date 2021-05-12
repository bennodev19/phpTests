<!DOCTYPE html>
<html lang="en">

<?php
// Start Session
session_start();

// Get Login Session and Form Value
$formValue = $_POST;
$loginSession = null;

if (!isset($loginSession))
    $loginSession = $_SESSION['loginSession'];

console_log($formValue);

// Names Key Map
$namesKeyMap = [
    'kleinwagen' => 'Kleinwagen',
    'kompaktklasse' => 'Komaktklasse',
    'familienwagen' => 'Familienwagen',
    'luxusklasse' => 'Luxusklasse',
    'klimaanlage' => 'Klimaanlage',
    'navigator' => 'Navigator',
    'standheizung' => 'Standheizung',
    'autohaus_nettmann' => 'Autohaus Nettmann',
    'idk' => 'I don\'t know'
];

// Help Functions
function console_log($output, $with_script_tags = true)
{
    $js_code = 'console.log(' . json_encode($output, JSON_HEX_TAG) .
        ');';
    if ($with_script_tags) {
        $js_code = '<script>' . $js_code . '</script>';
    }
    echo $js_code;
}

function startsWith($haystack, $needle)
{
    $length = strlen($needle);
    return substr($haystack, 0, $length) === $needle;
}

function get_name($name)
{
    return $namesKeyMap[$name] ?? $name;
}
?>

<head>
    <meta charset="UTF-8">
    <title>Mietwagen Beleg</title>
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
        $output = "";

        // Print Result
        if (isset($formValue['sentRentCarForm']) && isset($loginSession)) {
            // Validate and print customor number
            $customerNumber = trim($loginSession['customerNumber']);
            if ($customerNumber == "") {
                $output .= "Bitte Kunden Nummer eingeben!";
                $output .= "<a href=\"Mietwagen.php\"> zurueck </a>";
            } else {
                $output .= "Kundennummer: " . $customerNumber;
            }

            $output .= "<br/>";

            // ---

            // Validate and print vehicle class
            $vehicleClass = $formValue['vehicleClass'];
            if (!$vehicleClass) {
                $output .= "Bitte Fahrzeugklasse auswaehlen!";
            } else {
                $output .= "Fahrzeugklasse: " . get_name($vehicleClass);
            }

            $output .= "<br/>";

            // ---

            // Print additionals
            $additionals = [];
            $additionalKey = 'additional_';
            foreach ($formValue as $key => $value) {
                console_log($key .  ' / ' . $value);

                if (startsWith($key, $additionalKey) && $value == 'true')
                    $additionals[] = str_replace($additionalKey, '', $key);
            }

            $output .= "Zusatzaustattung: ";
            if (sizeof($additionals) > 0) {
                foreach ($additionals as $additional) {
                    $output .= "- " . get_name($additional) . "<br/>";
                }
            } else {
                $output .= "Keine Zusatz features gewaehlt!";
            }

            $output .= "<br/>";

            // ---

            // Validate and print location
            $location = $formValue['location'];
            if (!$location) {
                $output .= "Bitte Abholort auswaehlen!";
            } else {
                $output .= "Abholort: " . get_name($location);
            }
        } else {
            $output .= "Unerlaubter Seitenzugriff";
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