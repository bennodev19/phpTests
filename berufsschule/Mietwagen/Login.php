<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Login</title>
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
        <form method="post" action="Mietwagen.php">
            <div>
                Kundennummer:
                <input type="text" name="customerNumber" size="25" />
            </div>
            <div>
                Passwort:
                <input type="password" name="password" size="25" />
            </div>

            <div>
                <button type="submit" name="sentLoginData" value="true">Anmelden</button>
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