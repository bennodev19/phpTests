<?php
require "../components/Footer.php";
require "../components/Header.php";
require "../controller.php";
?>

<!DOCTYPE html>
<html lang="en">

<?php
startSession();

// Get Login Session and Form Value
$loginSession = getLoginSession();
$formValue = $_POST;
// $priceKeyMap = getPriceKeyMap();

console_log(getNamesKeyMap());

// Check if User is logged in otherwise go to Login.php
if ($loginSession == null) {
    redirect('./Login.php');
}

// Help Functions
function startsWith($haystack, $needle)
{
    $length = strlen($needle);
    return substr($haystack, 0, $length) === $needle;
}

function getName($name)
{
    return getNamesKeyMap()[$name] ?? $name;
}

function getPrice($name)
{
    // return $priceKeyMap[$name]; // Doesn't work because I guess the scope of the function is different.. but idk
    return getPriceKeyMap()[$name] ?? 0;
}
?>

<head>
    <meta charset="UTF-8">
    <title>Mietwagen Beleg</title>
    <link rel="stylesheet" href="styles.css" />
</head>

<body>

    <!-- Header -->
    <?php
    renderHeader('Mietwagen - Kundenbeleg');
    ?>

    <!-- Content -->
    <div class="ContentContainer">
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
                $output .= "Fahrzeugklasse: " . getName($vehicleClass);
            }

            $output .= "<br/>";

            // ---

            // Print Brutto Price
            $output .= "Bruttobetrag: " .  getPrice($vehicleClass);

            // ---

            $output .= "<br/>";

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
                $output .= "<br/>";
                foreach ($additionals as $additional) {
                    $output .= "- " . getName($additional) . "<br/>";
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
                $output .= "Abholort: " . getName($location);
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
    <?php
    renderFooter();
    ?>

</body>

</html>