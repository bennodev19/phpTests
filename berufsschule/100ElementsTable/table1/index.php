<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Table 1</title>
    <link rel="stylesheet" href="styles.css" />
</head>

<head>
    <title>PHP-Test</title>
</head>

<body>
    <?php echo '<h1>Hundert Zahlen</h1>'; ?>

    <table border="1" class="TableContainer">
        <?php
        for ($i = 1; $i <= 100; $i++) {
            // Table brak if number is modulu 10
            if ($i % 10 == 1) {
                echo "<tr>";
            }

            echo "<td>" . $i . "</td>";
        }
        ?>
    </table>


</body>

</html>