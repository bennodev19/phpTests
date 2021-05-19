<?php
require "../components/Footer.php";
require "../components/Header.php";
require "../src/controller/mietwagenController.php";
require "../src/controller/loginController.php";
require "../src/utils.php";
?>

<!DOCTYPE html>
<html lang="en">

<?php
startSession();

$loginSession = $loginSession = getLoginSession();
global $priceKeyMap;

// Check if User is logged in otherwise go to Login.php
if ($loginSession == null) {
    redirect('./Login.php');
}
?>

<head>
    <meta charset="UTF-8">
    <title>Mietwagen</title>
    <link rel="stylesheet" href="../styles.css" />
</head>

<body>

    <!-- Header -->
    <?php
    renderHeader('Mietwagen');
    ?>

    <!-- Content -->
    <div class="ContentContainer">
        <?php
        if ($loginSession != null) {
        ?>
            <form method="post" action="MietwagenBeleg.php">
                <?php
                $output = "Kundennummer: " . $loginSession['customerNumber'];

                console_log($output);
                echo $output;
                ?>

                <div>
                    <p>Welche Fahryeugklasse bevorzugen Sie:</p>
                    <input type="radio" name="vehicleClass" value="kleinwagen" checked />
                    Kleinwagen (<?php echo $priceKeyMap['kleinwagen'] ?> Netto) <br />
                    <input type="radio" name="vehicleClass" value="kompaktklasse" />
                    Kompaktklasse (<?php echo $priceKeyMap['kompaktklasse'] ?> Netto) <br />
                    <input type="radio" name="vehicleClass" value="familienwagen" />
                    Familienwagen (<?php echo $priceKeyMap['familienwagen'] ?> Netto) <br />
                    <input type="radio" name="vehicleClass" value="luxusklasse" />
                    Luxusklasse (<?php echo $priceKeyMap['luxusklasse'] ?> Netto) <br />
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
        <?php
        } else {
        ?>
            Unerlaubter Seitenzugriff
            <a href=\"Mietwagen.php\"> Startseite </a>
        <?php
        }
        ?>
    </div>

    <!-- Footer -->
    <?php
    renderFooter();
    ?>

</body>

</html>