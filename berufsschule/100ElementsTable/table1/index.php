<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Table 1</title>
    <link rel="stylesheet" href="styles.css" />
</head>

<body>
    <?php echo '<h1>Hundert Zahlen</h1>'; ?>

    <table border="1" class="TableContainer">
        <?php

        $startNumber = 8;
        $myArray = array();

        // Fill Array
        for ($i = $startNumber; $i <= 100 + $startNumber - 1; $i++) {
            $myArray[] = $i; // add i to array (like push())
        }

        // Build Table (like for(let number in myArray))
        foreach ($myArray as $number) {
            // close table row
            if (($number % 10 == 1 && $number != $startNumber) || sizeof($myArray) == $number - 1) {
                echo "</tr>";
            }

            // open table row
            if ($number % 10 == 1)
                echo "<tr>";

            echo "<td>" . $number . "</td>";
        }
        ?>
    </table>


</body>

</html>