<?php

// Names Key Map
// $namesKeyMap = [
//     'kleinwagen' => 'Kleinwagen',
//     'kompaktklasse' => 'Komaktklasse',
//     'familienwagen' => 'Familienwagen',
//     'luxusklasse' => 'Luxusklasse',
//     'klimaanlage' => 'Klimaanlage',
//     'navigator' => 'Navigator',
//     'standheizung' => 'Standheizung',
//     'autohaus_nettmann' => 'Autohaus Nettmann',
//     'idk' => 'I don\'t know'
// ];

// Workaround because I couldn't get global variables to work
function getNamesKeyMap() {
    return [
        'kleinwagen' => 'Kleinwagen',
        'kompaktklasse' => 'Komaktklasse',
        'familienwagen' => 'Familienwagen',
        'luxusklasse' => 'Luxusklasse',
        'klimaanlage' => 'Klimaanlage',
        'navigator' => 'Navigator',
        'standheizung' => 'Standheizung',
        'autohaus_nettmann' => 'Autohaus Nettmann',
        'idk' => 'I don\'t know'
    ];
}

// Price Key Map
// $priceKeyMap = [
//     'kleinwagen' => 29.99,
//     'kompaktklasse' => 39.99,
//     'familienwagen' => 49.99,
//     'luxusklasse' => 89.99,
// ];

// Workaround because I couldn't get global variables to work
function getPriceKeyMap() {
    return [
        'kleinwagen' => 29.99,
        'kompaktklasse' => 39.99,
        'familienwagen' => 49.99,
        'luxusklasse' => 89.99,
    ];
}

function getUsers () {
    return [
        '123' => '123'
    ];
}

function console_log($output, $with_script_tags = true)
{
    $js_code = 'console.log(' . json_encode($output, JSON_HEX_TAG) .
        ');';
    if ($with_script_tags) {
        $js_code = '<script>' . $js_code . '</script>';
    }
    echo $js_code;
}

function redirect($path, $with_script_tags = true)
{
    $js_code = 'document.location=\'' . $path . '\';';
    if ($with_script_tags) {
        $js_code = '<script>' . $js_code . '</script>';
    }
    echo $js_code;
}

function startSession()
{
    // Start Session if no session is active yet
    // https://www.php.net/manual/de/function.session-status.php
    if (session_status() != 2) {
        session_start();
    }
}

function login($customerNumber, $password)
{
    startSession();

    // Get Users
    $users = getUsers();

    // Check if user exists
    if(!$users[$customerNumber]){
        return false;
    }

    // Check if password is correct
    if(strcmp($users[$customerNumber], $password)){
        return false;
    }

    $loginSession = [
        'customerNumber' => $customerNumber
    ];

    // Fill Login Session into the Session 'Storage'
    $_SESSION["loginSession"] = $loginSession;

    return true;
}

function logout()
{
    startSession();

    // Reset Login Session
    $_SESSION["loginSession"] = null;
}

function getLoginSession()
{
    startSession();

    return isset($_SESSION["loginSession"]) ? $_SESSION["loginSession"] : null;
}

function refresh()
{
    // https://stackoverflow.com/questions/12383371/refresh-a-page-using-php
    header("Refresh:0");
}

function getCurrentUrl()
{
    // https://stackoverflow.com/questions/6768793/get-the-full-url-in-php
    return (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://{$_SERVER['HTTP_HOST']}{$_SERVER['REQUEST_URI']}";
}

function calculateBrutto($nettoPrice){
    return $nettoPrice / 1.19;
}