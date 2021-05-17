<?php
require "../components/Footer.php";
require "../components/Header.php";
require "../controller.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Zutrittsversuche</title>
    <link rel="stylesheet" href="../styles.css" />
</head>

<body>

    <!-- Header -->
    <?php
    renderHeader('Zutrittsversuche');
    ?>

    <!-- Content -->
    <div class="ContentContainer">
        <?php
        // Get Zutrittsversuche
        $zutrittsVersuche = getZutrittsversuche(10);

        ?>
        <table>
            <tr style="background-color: lightgrey;">
                <th>ID</th>
                <th>Uhrzeit</th>
                <th>Chip</th>
                <th>Chip Besitzer</th>
                <th>Tür</th>
                <th>Ergebnis</th>
            </tr>
            <?php

            foreach ($zutrittsVersuche as $zutrittsVersuch) {
                console_log($zutrittsVersuch);

                $id = $zutrittsVersuch["Id"];
                $time = $zutrittsVersuch["time"];
                $chipId = $zutrittsVersuch["chipId"];
                $chipOwner = $zutrittsVersuch["chipOwner"];
                $door = $zutrittsVersuch["door"];
                $result = $zutrittsVersuch["result"];
                $resultColor = strpos($result, "gestattet") !== false ? "green" : "red";
            ?>
                <tr>
                    <td><?php echo $id ?></td>
                    <td><?php echo $time ?></td>
                    <td><?php echo $chipId ?></td>
                    <td><?php echo $chipOwner ?></td>
                    <td><?php echo $door ?></td>
                    <td style="color:<?php echo $resultColor ?>"><?php echo $result ?></td>
                </tr>
            <?php
            }
            ?>
        </table>
        <p>Es ist zu beachten, dass das RFID System sich noch in der Test-Phase befindet!</p>
    </div>

    <!-- Footer -->
    <?php
    renderFooter();
    ?>

</body>

</html>