<?php

function RequireLogin() {
    if (empty($_SESSION["dni"])) {
        header("Location: /views/auth.php");
        exit;
    }
}

function RequireGuest() {
    if (!empty($_SESSION["dni"])) {
        header("Location: /views/profile.php");
        exit;
    }
}

function IsLoggedIn(): bool {
    return !empty($_SESSION["dni"]);
}

function HandleSession() {
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }
}