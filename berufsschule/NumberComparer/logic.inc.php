<?php

$formValue = $_POST;
$numbers = [];

// Help Functions
function console_log($output, $with_script_tags = true)
{
    $js_code = 'console.log(' . json_encode($output, JSON_HEX_TAG) .
        ');';
    if ($with_script_tags) {
        $js_code = '<script>' . $js_code . '</script>';
    }
    echo $js_code;
}

function sortNumbers($numbers)
{
    // https://stackoverflow.com/questions/32520910/php-usort-returns-1-instead-array/32520966
    usort($numbers, function ($a, $b) {
        return $b > $a;
    });

    return $numbers;
}

// Check if FormValue got submitted
if (isset($formValue['sentFormData'])) {
    // Sort Numbers
    $numbers = sortNumbers(array($formValue['number1'], $formValue['number2']));
}
