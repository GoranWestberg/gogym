<?php

$requirements = [
    "firstname" => [
        "minLength" => 5,
        "maxLength" => 50,
        "format" => null
    ],
    "lastname" => [
        "minLength" => 5,
        "maxLength" => 50,
        "format" => null
    ],
    "email" => [
        "minLength" => 5,
        "maxLength" => 254,
        "format" => "^[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,}$"
    ],
    "cellphone" => [
        "minLength" => 9,
        "maxLength" => 18,
        "format" => "^(?:\+54)?(?:9)?\s?\(?\d{2,4}\)?[\s.-]?\d{6,8}$"
    ],
    "message" => [
        "minLength" => 0,
        "maxLength" => 500,
        "format" => null
    ],
    "document_number" => [
        "minLength" => 6,
        "maxLength" => 8,
        "format" => "^(0|[1-9]\d*)$"
    ],
    "password" => [
        "minLength" => 8,
        "maxLength" => 30,
        "format" => "^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[^A-Za-z0-9]).+$"
    ]
];

function ValidateValue($value, $type, $requirements) {
    if (!isset($value)) {
        return "El campo {$type} está vacío";
    }

    if (array_key_exists($type, $requirements) && isset($requirements[$type])) {
        if (strlen($value) < $requirements[$type]["minLength"]) {
            return "El campo {$type} no tiene suficientes caracteres ({$requirements[$type]['minLength']})";
        }

        if (strlen($value) > $requirements[$type]["maxLength"]) {
            return "El campo {$type} tiene más caracteres de los permitidos ({$requirements[$type]['maxLength']})";
        }

        if (isset($requirements[$type]["format"]) && $requirements[$type]["format"] !== null && !preg_match('/' . $requirements[$type]["format"] . '/', $value)) {
            return "El formato del campo {$type} es inválido";
        }
    // } else {
        // return "ERROR: No se puede ejecutar el sistema de validaciones para el dato de tipo $type";
    }
}