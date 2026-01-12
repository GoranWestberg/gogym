<?php

require_once __DIR__ . '/form_validation.php';
require_once __DIR__ . '/storage.php';
require_once __DIR__ . '/phpmailer.php';

$values = [
    "firstname" => $_POST["firstname"] ?? "",
    "lastname"  => $_POST["lastname"] ?? "",
    "email"     => $_POST["email"] ?? "",
    "cellphone" => $_POST["cellphone"] ?? "",
    "message"   => $_POST["message"] ?? ""
];

$errors = [];

foreach ($values as $type => $value) {
    $result = ValidateValue($value, $type, $requirements);
    if ($result !== null) {
        $errors[$type] = $result;
    }
}

if (!empty($errors)) {
    $queryStrings = http_build_query($errors);
    header("Location: /views/contact.php?error&" . $queryStrings);
    exit;
}

$stmt = mysqli_prepare(
    $connection,
    "INSERT INTO contact_forms (firstname, lastname, email, cellphone_number, message)
     VALUES (?, ?, ?, ?, ?)"
);

mysqli_stmt_bind_param(
    $stmt,
    "sssss",
    $values['firstname'],
    $values['lastname'],
    $values['email'],
    $values['cellphone'],
    $values['message']
);

$exec = mysqli_stmt_execute($stmt);

if ($exec) {

    if (function_exists('SendMail')) {
        $subject = "¡Hola, {$values['firstname']}!";
        $message =
            "Gracias por completar nuestro formulario de contacto.\r\n" .
            "Nos estaremos comunicando con vos a la brevedad.\r\n\nGoGym";

        SendMail($values['email'], $subject, $message);
    }

    header("Location: /views/contact.php?ok");
    exit;
}

header("Location: /views/contact.php?error&unknownError");
exit;
