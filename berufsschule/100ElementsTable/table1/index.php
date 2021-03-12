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

        // Fill Array
        for ($i = $startNumber; $i <= 100 + $startNumber - 1; $i++) {
            $myArray[] = $i; // add i to array (like push())
        }

        // Build Table (like for(let number in myArray))
        for ($i = 0; $i < sizeof($myArray); $i++) {
            $number = $myArray[$i];

            // open table row ($i + 1 because '0 modulu 10 == 0' and '0 modulu 1 == 1')
            if (($i + 1) % 10 == 1)
                $output .= "<tr>\n";

            // close table row
            if (($i + 1) % 10 == 1 || sizeof($myArray) == $i - 1)
                $output .= "</tr>\n";

            $output .= ("<td>$number</td>\n");
        }

        console_log($myArray);
        echo $output;
        ?>
    </table>


</body>

</html>