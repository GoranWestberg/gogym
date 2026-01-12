<?php 

require_once __DIR__ . '/form_validation.php';
require_once __DIR__ . '/storage.php';
require_once __DIR__ . '/phpmailer.php';

$dni = $_POST["document_number"];

if (ValidateValue($dni, "document_number", $requirements) !== null) {
  header("Location: /views/forgot-pwd.php?error&document_number=El formato del DNI es inválido");
  exit;
}

$stmt = mysqli_prepare($connection, "
    SELECT id, email
    FROM members
    WHERE document_number = ?
    LIMIT 1
");
mysqli_stmt_bind_param($stmt, "s", $dni);

if (!mysqli_stmt_execute($stmt)) {
    header("Location: /views/forgot-pwd.php?error&unknownError");
    exit;
}

$result = mysqli_stmt_get_result($stmt);
$user = mysqli_fetch_assoc($result);

if (!$user) {
  header("Location: /views/forgot-pwd.php?error&userDoesNotExist");
  exit;
}

$userId = (int)$user["id"];
$email  = $user["email"];
$token = bin2hex(random_bytes(32));
$tokenHash = hash('sha256', $token);
$expiresAt = date('Y-m-d H:i:s', strtotime('+1 hour'));


$stmt2 = mysqli_prepare($connection, "
    INSERT INTO password_resets (user_id, token_hash, expires_at, used)
    VALUES (?, ?, ?, 0)
");
mysqli_stmt_bind_param($stmt2, "iss", $userId, $tokenHash, $expiresAt);

if (!mysqli_stmt_execute($stmt2)) {
    header("Location: /views/forgot-pwd.php?error&unknownError");
    exit;
}

$link = "https://goran-westberg.page.gd/views/recover-pwd.php?token=" . urlencode($token);

SendMail(
    $email,
    "GoGym | Recuperar contraseña",
    "Usá este link para recuperar tu contraseña:\n\n$link\n\nEste link expira en 1 hora."
);

header("Location: /views/forgot-pwd.php?success");
exit;