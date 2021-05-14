<?php
require "../components/Footer.php";
require "../components/Header.php";
require "../controller.php";
?>

<!DOCTYPE html>
<html lang="en">

<?php
 startSession();

// Get form Value and Login Session
$formValue = $_POST;
$loginSession = getLoginSession();

// Check if Login Session exists, if so go to Mietwagen.php
if ($loginSession != null) {
    redirect('./Mietwagen.php');
    return;
}

// Create Login Session
if (isset($formValue['sentLoginData'])) {
    $password = $formValue["password"];
    $customerNumber = $formValue["customerNumber"];

    login($customerNumber, $password);
    refresh(); // Refresh site in order to call this php script again and go to 'Mietwagen.php'
}

console_log($_SESSION);
?>

<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="../styles.css" />
</head>

<body>

    <!-- Header -->
    <?php
    renderHeader('Mietwagen');
    ?>

    <!-- Content -->
    <div class="ContentContainer">
        <form method="post" action="">
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
    <?php
    renderFooter();
    ?>

</body>

</html>