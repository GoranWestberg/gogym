<?php

require_once __DIR__ . '/form_validation.php';
require_once __DIR__ . '/storage.php';

$values = [
    "document_number" => $_POST["document_number"],
    "password" => $_POST["password"]
];

$errors = [];

foreach ($values as $type => $value) {
    $result = ValidateValue($value, $type, $requirements);

    if ($result !== null) {
        $errors[$type] = $result;
    }
}

if (empty($errors)) {
    // Profe: Según ChatGPT si hago la query únicamente haciendo un select y pasando los valores, me arriesgo a SQL Injections y errores, por lo que me recomendó hacerlo de esta forma

    $exists = mysqli_prepare(
        $connection,
        "SELECT * FROM members WHERE document_number = ? LIMIT 1"
    );

    $document = $values["document_number"];
    mysqli_stmt_bind_param($exists, "s", $document);

    $check = mysqli_stmt_execute($exists);

    if (!$check) {
        header("Location: /views/auth.php?error&unknownError");
        exit;
    }

    $result = mysqli_stmt_get_result($exists);
    $retrieved = mysqli_fetch_assoc($result);
    if ($retrieved === null) {
        header("Location: /views/auth.php?error&userDoesNotExist");
        exit;
    }

    $userActive = $retrieved["active"];
    if (isset($userActive) && $userActive === 0) {
        header("Location: /views/auth.php?error&inactiveUser");
        exit;
    }

    $storedPw = $retrieved["password"];
    $password = $_POST["password"];

    if (!password_verify($password, $storedPw)) {
        header("Location: /views/auth.php?error&badPassword");
        exit;
    }

    session_start();

    $firstname = $retrieved["firstname"] ?? null;
    $lastname = $retrieved["lastname"] ?? null;
    $dni = $retrieved["document_number"] ?? null;
    $email = $retrieved["email"] ?? null;
    $cellphone = $retrieved["cellphone"] ?? null;
    $membership = $retrieved["membership"] ?? null;
    $membership_exp = $retrieved["membership_expiration"] ?? null;


    $_SESSION["username"] = ($firstname && $lastname) ? "$firstname $lastname" : ($firstname ?? "");
    $_SESSION["dni"]            = $dni            ?? "";
    $_SESSION["email"]          = $email          ?? "";
    $_SESSION["cellphone"]      = $cellphone      ?? "";
    $_SESSION["membership"]     = $membership     ?? "";
    $_SESSION["membership_exp"] = $membership_exp ?? "";

    header("Location: /views/profile.php?success");
    exit;
} else {
    $queryStrings = http_build_query($errors);
    header("Location: /views/auth.php?error&" . $queryStrings);
    exit;
}

mysqli_close($connection);