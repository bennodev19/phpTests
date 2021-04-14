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
        <h1>Mietwagen</h1>
        <form method="post" action="MietwagenBeleg.php">
            <div>
                Kundennummer:
                <input type="text" name="customerNumber" size="25" />
            </div>

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
                <button type="submit" name="sentData" value="true">Abschicken</button>
            </div>
        </form>
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