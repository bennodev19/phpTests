<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Table 2</title>
    <link rel="stylesheet" href="styles.css" />
</head>

<body>
    <?php echo '<h1>Hundert Zahlen</h1>'; ?>
    <form action="" method="get">
        <input type="number" name="startNumber" id="startNumber" value="0">
        <input type="number" name="endNumber" id="endNumber" value="100">
    </form>

    <table border="1" class="TableContainer">
        <?php

        function isPrime($n)
        {
            // Corner case
            if ($n <= 1)
                return false;

            // Check from 2 to n-1
            for ($i = 2; $i < $n; $i++)
                if ($n % $i == 0)
                    return false;

            return true;
        }

        $startNumber = $_GET["startNumber"];
        $endNumber = $_GET["endNumber"];
        $lineBrak = sqrt($endNumber);

        for ($i = $startNumber; $i <= $endNumber; $i++) {
            // Table brak if number is modulu 10
            if ($i % $lineBrak == 1) {
                echo "<tr>";
            }

            echo "<td " . (isPrime($i) ? "class='yellow'" : '') . ">"  . $i . "</td>";
        }
        ?>
    </table>


</body>

</html>