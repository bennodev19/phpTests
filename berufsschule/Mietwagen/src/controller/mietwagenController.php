<?php

// Names Key Map
$namesKeyMap = [
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

// Price Key Map
$priceKeyMap = [
    'kleinwagen' => 29.99,
    'kompaktklasse' => 39.99,
    'familienwagen' => 49.99,
    'luxusklasse' => 89.99,
];

function calculateBrutto($nettoPrice){
    return $nettoPrice / 1.19;
}