<?php

require_once __DIR__ . '/form_validation.php';
require_once __DIR__ . '/storage.php';
require_once __DIR__ . '/phpmailer.php';

$values = [
    "firstname" => $_POST["firstname"],
    "lastname" => $_POST["lastname"],
    "email" => $_POST["email"],
    "cellphone" => $_POST["cellphone"],
    "password" => $_POST["password"],
    "repassword" => $_POST["repassword"],
    "document_number" => $_POST["document_number"]
];

$errors = [];

foreach ($values as $type => $value) {
    $result = ValidateValue($value, $type, $requirements);

    if ($result !== null) {
        $errors[$type] = $result;
    }
}

if (empty($errors)) {
    // Profe: Según ChatGPT si hago la query únicamente haciendo un select/insert y pasando los valores, me arriesgo a SQL Injections y errores, por lo que me recomendó hacerlo de esta forma

    $exists = mysqli_prepare(
        $connection,
        "SELECT id FROM members WHERE document_number = ? LIMIT 1"
    );

    $document = $values["document_number"];
    mysqli_stmt_bind_param($exists, "s", $document);

    $check = mysqli_stmt_execute($exists);

    if ($check) {
        $result = mysqli_stmt_get_result($exists);
        $retrieved = mysqli_fetch_assoc($result);
        if ($retrieved !== null) {
            header("Location: /views/register.php?error&userAlreadyExists");
            exit;
        }
    } else {
        header("Location: /views/register.php?error&unknownError");
        exit;
    }

    $password = $_POST["password"];
    if ($password !== $_POST["repassword"]) {
        header("Location: /views/register.php?error&password=Las%20contraseñas%20no%20coinciden");
        exit;
    }

    $hash = password_hash($password, PASSWORD_DEFAULT);
    
    // Registrar la query con placeholders y dejarla lista para recibir valores
    // https://www.php.net/manual/en/mysqli.prepare.php
    $stmt = mysqli_prepare(
        $connection,
        "INSERT INTO members (firstname, lastname, document_number, email, cellphone, password, membership, active)
        VALUES (?, ?, ?, ?, ?, ?, '', '1')"
    );

    // Asociar los valores a los ?
    // https://www.php.net/manual/en/mysqli-stmt.bind-param.php
    mysqli_stmt_bind_param(
        $stmt,
        "ssssss",
        $values['firstname'],
        $values['lastname'],
        $document,
        $values['email'],
        $values['cellphone'],
        $hash
    );

    // Ejecuto la query
    $exec = mysqli_stmt_execute($stmt);

    if ($exec) {
        $subject = "¡Hola, {$values['firstname']}!";
        $message =
        "Gracias por registrarte.\r\n" .
        "Nos estaremos comunicando con vos a la brevedad.\r\n" .
        "\r\n" .
        "GoGym";
        SendMail($values['email'], $subject, $message);

        header("Location: /views/register.php?ok");
    } else {
        header("Location: /views/register.php?error&unknownError");
    }
} else {
    $queryStrings = "";
    foreach($errors as $key => $error) {
        $queryStrings = $queryStrings . $key . "=" . $error . "&";
    }

    header("Location: /views/register.php?error&$queryStrings");
}

mysqli_close($connection);