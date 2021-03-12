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
        function console_log($output, $with_script_tags = true)
        {
            $js_code = 'console.log(' . json_encode($output, JSON_HEX_TAG) .
                ');';
            if ($with_script_tags) {
                $js_code = '<script>' . $js_code . '</script>';
            }
            echo $js_code;
        }

        $output = "";
        $startNumber = 10;
        $myArray = array(); // same as '$myArray = [];'
        $lineBrak = 10;

        // Fill Array
        for ($i = $startNumber; $i <= 100 + $startNumber - 1; $i++) {
            $myArray[] = $i; // add i to array (like push())
        }

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

            $output .= ("<td>$number</td>");

            // close table row on last element
            if (sizeof($myArray) == $i + 1)
                $output .= "\n</tr>\n";
        }

        console_log($myArray);
        echo $output;
        ?>
    </table>


</body>

</html>