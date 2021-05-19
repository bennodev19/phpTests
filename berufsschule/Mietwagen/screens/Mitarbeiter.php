<?php
require "../components/Footer.php";
require "../components/Header.php";
require "../controller.php";
?>

<!DOCTYPE html>
<html lang="en">

<?php
startSession();

$loginSession = $loginSession = getLoginSession();


// Check if User is logged in otherwise go to Login.php
if ($loginSession == null) {
    redirect('./Login.php');
}
?>

<head>
    <meta charset="UTF-8">
    <title>Mitarbeiter</title>
    <link rel="stylesheet" href="../styles.css" />
</head>

<body>

    <!-- Header -->
    <?php
    renderHeader('Mietwagen');
    ?>

    <!-- Content -->
    <div class="ContentContainer">
        <form method="post">
            <?php
            if (isset($_POST['btnAdd'])) {
            ?>
                Nachname: <input type='text' name='txtNachname'> <br>
                <input type='submit' name='btnSaveNew'>
            <?php
            } else {
            ?>
                <!-- Print Table -->
                <table style="border-collapse: collapse" border="1" cellpadding="5">
                    <thead>
                        <tr style="background-color: lightgrey; " align="left">
                            <th>ID</th>
                            <th>Nachnamen</th>
                            <th>Aktionen</th>
                        </tr>
                    </thead>

                    <tbody>
                        <!-- TODO Hier wird der Datenbankinhalt ausgegeben und die Aktionen (Buttons) generiert. -->

                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan=3 align=right>
                                <button type='submit' name='btnAdd' value='true'><img src="media\add.png" width='15px'> </button>
                            </td>
                        </tr>
                    </tfoot>
                </table>

                <br>

                <!-- Idk Yet -->
                <form method="POST">
                    <table>
                        <tr>
                            <td>Anzahl Datensätze: <input type="number" style="width:50px" name="txtNumberRecords" value="<?php
                                                                                                                            if ($_SESSION["MaxNumberOfRecords"] > 0) echo $_SESSION["MaxNumberOfRecords"]; ?>"></td>
                            <td><button type="submit"><img src='media\Refresh.png' width='15px'></button></td>
                        </tr>
                    </table>
                </form>
                <br>
            <?php
            }
            ?>
        </form>

        <p>Es ist zu beachten, dass das RFID System sich noch in der Test-Phase befindet!</p>
    </div>

    <!-- Footer -->
    <?php
    renderFooter();
    ?>

</body>

</html>