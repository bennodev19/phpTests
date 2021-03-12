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

        function console_log($output, $with_script_tags = true)
        {
            $js_code = 'console.log(' . json_encode($output, JSON_HEX_TAG) .
                ');';
            if ($with_script_tags) {
                $js_code = '<script>' . $js_code . '</script>';
            }
            echo $js_code;
        }

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

        $output = "";
        $startNumber = 1; // $_GET["startNumber"];
        $endNumber = 100; // $_GET["endNumber"];
        $lineBrak = round(sqrt($endNumber - $startNumber));
        $myArray = array(); // same as '$myArray = [];'

        // Fill Array
        for ($i = $startNumber; $i <= $endNumber; $i++) {
            $myArray[] = $i; // add i to array (like push())
        }

        console_log($lineBrak);

        for ($i = 0; $i < sizeof($myArray); $i++) {
            $number = $myArray[$i];

            // ($i + 1 because '0 modulu 10 == 0' and '0 modulu 1 == 1')
            if (($i + 1) % $lineBrak == 1) {
                // close table row
                if ($i != 0)
                    $output .= "\n</tr>\n";

                // open table row
                $output .= "\n<tr>\n";
            }

            $output .= "<td" . (isPrime($i) ? " class='yellow'" : '') . ">"  . $number . "</td>";

            // close table row on last element
            if (sizeof($myArray) == $i + 1)
                $output .= "\n</tr>\n";
        }

        console_log($output);
        echo $output;
        ?>
    </table>


</body>

</html>