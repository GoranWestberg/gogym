<?php

require_once __DIR__ . '/form_validation.php';
require_once __DIR__ . '/storage.php';

$token = $_POST["token"] ?? "";
$password = $_POST["password"] ?? "";
$repassword = $_POST["repassword"] ?? "";

if (empty($token)) {
    header("Location: /views/recover-pwd.php?error&unknownError");
    exit;
}

if (ValidateValue($password, "password", $requirements) !== null) {
    header("Location: /views/recover-pwd.php?token=" . urlencode($token) . "&error&password=El formato de la contraseña es inválido");
    exit;
}

if ($password !== $repassword) {
    header("Location: /views/recover-pwd.php?token=" . urlencode($token) . "&error&password_repeat=Las contraseñas no coinciden");
    exit;
}

$tokenHash = hash('sha256', $token);

$stmt = mysqli_prepare($connection, "
    SELECT user_id, expires_at, used
    FROM password_resets
    WHERE token_hash = ?
    LIMIT 1
");
mysqli_stmt_bind_param($stmt, "s", $tokenHash);

if (!mysqli_stmt_execute($stmt)) {
    header("Location: /views/forgot-pwd.php?token=" . urlencode($token) . "&error&unknownError");
    exit;
}

$result = mysqli_stmt_get_result($stmt);
$reset = mysqli_fetch_assoc($result);

if (!$reset) {
    header("Location: /views/forgot-pwd.php?error&invalidToken");
    exit;
}

if ((int)$reset["used"] === 1) {
    header("Location: /views/forgot-pwd.php?error&tokenUsed");
    exit;
}

$expiresAt = $reset["expires_at"] ?? null;
if (empty($expiresAt) || strtotime($expiresAt) < time()) {
    header("Location: /views/forgot-pwd.php?error&tokenExpired");
    exit;
}

$userId = (int)$reset["user_id"];
$newHash = password_hash($password, PASSWORD_DEFAULT);

$stmt2 = mysqli_prepare($connection, "
    UPDATE members
    SET password = ?
    WHERE id = ?
");
mysqli_stmt_bind_param($stmt2, "si", $newHash, $userId);

if (!mysqli_stmt_execute($stmt2)) {
    header("Location: /views/forgot-pwd.php?token=" . urlencode($token) . "&error&unknownError");
    exit;
}

$stmt3 = mysqli_prepare($connection, "
    UPDATE password_resets
    SET used = 1
    WHERE token_hash = ?
");
mysqli_stmt_bind_param($stmt3, "s", $tokenHash);

mysqli_stmt_execute($stmt3);

mysqli_close($connection);

header("Location: /views/auth.php?success&passwordChanged");
exit;
