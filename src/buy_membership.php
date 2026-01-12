<?php

require_once __DIR__ . '/storage.php';
require __DIR__ . '/session_handler.php';

$selectedMembership = $_POST["plan"];
HandleSession();
$dni = $_SESSION["dni"];

if (!isset($dni) || empty($dni)) {
    header("Location: /views/auth.php?error&requireLogin");
    exit;
}

if (!isset($selectedMembership)) {
    header("Location: ../views/catalog.php?error&unknownError");
    exit;
}

// Tengo que obtener al usuario al cual le voy a aplicar la membresía

$getUser = mysqli_prepare(
    $connection,
    "SELECT * FROM members WHERE document_number = ? LIMIT 1"
);

mysqli_stmt_bind_param($getUser, "s", $dni);

$exec = mysqli_stmt_execute($getUser);

if (!$exec) {
    header("Location: ../views/catalog.php?error&unknownError");
    exit;
}

$result = mysqli_stmt_get_result($getUser);
$retrieved = mysqli_fetch_assoc($result);
if ($retrieved === null) {
    header("Location: ../views/catalog.php?error&unknownError");
    exit;
}

// Las membresías tienen una vigencia de 1 mes, por lo que un usuario puede comprar una membresía si y solo si:
// No tiene membresía activa (membership está vacío, o está completo pero la fecha de membership_expiration ya pasó)
// La membresía que tiene sigue activa pero quiere comprar una membresía distinta a la que tiene

// Establecemos el huso horario
date_default_timezone_set('America/Argentina/Buenos_Aires');
// Obtenemos la fecha de caducidad de la membresía del usuario que sacamos por DB
$expDate = $retrieved["membership_expiration"];
$curDate = date('Y-m-d H:i:s');
$nextExpDate = new DateTime('now');
$nextExpDate->modify('+1 month');
$nextExpDate->format('Y-m-d H:i:s');
$formatedNextExpDate = $nextExpDate->format('Y-m-d H:i:s');

if (isset($expDate) && !empty($expDate)) {
    $formattedExpDate = date('Y-m-d H:i:s', strtotime($expDate));
    if (date('Y-m-d', strtotime($formatedNextExpDate)) > date('Y-m-d', strtotime($curDate)) && $selectedMembership === $retrieved["membership"]) {
        header("Location: ../views/catalog.php?error&alreadyHasMembership");
        exit;
    }
}

$stmt = mysqli_prepare(
    $connection,
    "UPDATE members
    set membership = ?, membership_expiration = ?
    WHERE document_number = ?"
);

// Asociar los valores a los ?
// https://www.php.net/manual/en/mysqli-stmt.bind-param.php
mysqli_stmt_bind_param(
    $stmt,
    "sss",
    $selectedMembership,
    $formatedNextExpDate,
    $dni
);

$_SESSION["membership"] = $selectedMembership;

// Ejecuto la query
$exec = mysqli_stmt_execute($stmt);

header("Location: /views/catalog.php?success");
mysqli_close($connection);