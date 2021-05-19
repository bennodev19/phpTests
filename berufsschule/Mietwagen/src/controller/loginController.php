<?php 

function login($customerNumber, $password)
{
    startSession();

    global $users;

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