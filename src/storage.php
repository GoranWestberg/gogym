<?php

$connectionErrorMsg = "No se pudo conectar a la base de datos. Por favor revise las credenciales ingresadas.";
// (?string $hostname = null, ?string $username = null, ?string $password = null, ?string $database = null, ?int $port = null, ?string $socket = null)
$connection = mysqli_connect('sql306.infinityfree.com', 'if0_40460501', 'tusista123', 'if0_40460501_gogym') or exit($connectionErrorMsg);