<?php

$name = '';
$email = '';
$message = '';
$nameError = '';
$emailError = '';
$messageError = '';
$success = false;
$participated = $_COOKIE['participated'] ?? false;

if ($_POST) {
    // Validate input
    if (empty($_POST['name'])) {
        $nameError = 'Name muss ausgefüllt sein';
    } else {
        $name = $_POST['name'];
    }

    if (empty($_POST['email'])) {
        $emailError = 'E-Mail muss ausgefüllt sein';
    } elseif (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
        $emailError = 'Das ist keine valide E-Mail';
    } else {
        $email = $_POST['email'];
    }

    if (empty($_POST['message'])) {
        $messageError = 'Nachricht muss ausgefüllt sein';
    } else {
        $message = $_POST['message'];
    }


    // If input is valid set $success to true
    if (!$nameError && !$emailError && !$messageError) {
        $success = true;
        setcookie('participated', 'true');

        $fp = fopen('participants.csv', 'a');
        fputcsv($fp, [$name, $email, $message]);
        fclose($fp);
    }
}

require 'index.view.php';
