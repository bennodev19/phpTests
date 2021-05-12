<?php
// Start Session
session_start();

// Get form Value
$formValue = $_POST;

// Create Login Session
if (isset($formValue['sentLoginData'])) {
    $password = $formValue["password"];
    $customerNumber = $formValue["customerNumber"];

    $loginSession = [
        'customerNumber' => $customerNumber
    ];

    // Fill Login Session into the Session 'Storage'
    $_SESSION["loginSession"] = $loginSession;
}

console_log($_SESSION);

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
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Mietwagen</title>
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
    <?php
    if ($loginSession['customerNumber']) {
    ?>
        <div class="ContentContainer">
            <h1>Mietwagen</h1>
            <form method="post" action="MietwagenBeleg.php">
                <?php
                $output = "Kundennummer: " . $loginSession['customerNumber'];

                console_log($output);
                echo $output;
                ?>

                <div>
                    <p>Welche Fahryeugklasse bevorzugen Sie:</p>
                    <input type="radio" name="vehicleClass" value="kleinwagen" checked />
                    Kleinwagen<br />
                    <input type="radio" name="vehicleClass" value="kompaktklasse" />
                    Kompaktklasse <br />
                    <input type="radio" name="vehicleClass" value="familienwagen" />
                    Familienwagen <br />
                    <input type="radio" name="vehicleClass" value="luxusklasse" />
                    Luxusklasse <br />
                </div>

                <div>
                    <p>Welche Zusatausstattung wuenschen Sie:</p>
                    <input type="checkbox" name="additional_klimaanlage" value="true" />
                    Klimaanlage <br />
                    <input type="checkbox" name="additional_navigator" value="true" />
                    Navigator <br />
                    <input type="checkbox" name="additional_standheizung" value="true" />
                    Standheizung <br />
                </div>

                <div>
                    <p>Wo wollen Sie das Auto abholen?checkdnsrr</p>
                    <select name="location" size="1">
                        <option value="autohaus_nettmann">Autohaus Nettmann</option>
                        <option value="idk">I don't know</option>
                    </select>
                </div>

                <div>
                    <input type="reset" value="Loeschen" />
                    <button type="submit" name="sentRentCarForm" value="true">Abschicken</button>
                </div>
            </form>
        </div>
    <?php
    } else {
    ?>
        Unerlaubter Seitenzugriff
        <a href=\"Mietwagen.php\"> Startseite </a>
    <?php
    }
    ?>

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