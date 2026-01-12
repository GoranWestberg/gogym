<?php
    require_once __DIR__ . '/../src/session_handler.php';
    HandleSession();
    RequireGuest();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/styles/register.css">
    <link rel="icon" href="/assets/media/webicon.png">
    <title>GoGym | Registro</title>
</head>
<body>
    <?php include '../components/header.php' ?>

    <main>
        <h1 id="gogym-register-title">Registro</h1>
        <p id="gogym-register-desc">Completá los datos debajo y creá tu perfil</p>

        <form action="/src/register_form.php" id="gogym-register-form" method="post">
            <div id="gogym-register-form-fields">
                <div id="gogym-register-form-fields-info">
                    <div id="gogym-register-form-fields-left">
                        <label for="firstname">Nombre</label>
                        <span class="gogym-contact-form-fields-instr">5 a 50 caracteres</span>
                        <input type="text" placeholder="Ingresá tu nombre" id="firstname" name="firstname" required tabindex="1">
                        <div class="gogym-register-form-error-space">
                            <?php
                                if (isset($_GET["firstname"])) {
                                    echo '<h4 class="gogym-register-form-error">' . str_replace("firstname", "nombre", $_GET["firstname"]) . '</h4>';
                                }
                            ?>
                        </div>

                        <label for="email">Email</label>
                        <span class="gogym-contact-form-fields-instr">Ejemplo: hola@ejemplo.com</span>
                        <input type="email" placeholder="Ingresá tu email" id="email" name="email" required tabindex="3">
                        <div class="gogym-register-form-error-space">
                            <?php
                                if (isset($_GET["email"])) {
                                    echo '<h4 class="gogym-register-form-error">' . $_GET["email"] . '</h4>';
                                }
                            ?>
                        </div>

                        <label for="password">Contraseña</label>
                        <span class="gogym-contact-form-fields-instr">Al menos 8 caracteres, 1 minúscula, 1 mayúscula, 1 número y 1 símbolo</span>
                        <input type="password" placeholder="Ingresá una contraseña" id="password" name="password" required tabindex="5">
                    </div>

                    <div id="gogym-register-form-fields-right">
                        <label for="lastname">Apellido</label>
                        <span class="gogym-contact-form-fields-instr">5 a 50 caracteres</span>
                        <input type="text" placeholder="Ingresá tu apellido" id="lastname" name="lastname" required tabindex="2">
                        <div class="gogym-register-form-error-space">
                            <?php
                                if (isset($_GET["lastname"])) {
                                    echo '<h4 class="gogym-register-form-error">' . str_replace("lastname", "apellido", $_GET["lastname"]) . '</h4>';
                                }
                            ?>
                        </div>

                        <label for="cellphone">Celular</label>
                        <span class="gogym-contact-form-fields-instr">9 a 18 caracteres</span>
                        <input type="text" placeholder="Ingresá tu celular" id="cellphone" name="cellphone" required tabindex="4">
                        <div class="gogym-register-form-error-space">
                            <?php
                                if (isset($_GET["cellphone"])) {
                                    echo '<h4 class="gogym-register-form-error">' . str_replace("cellphone", "celular", $_GET["cellphone"]) . '</h4>';
                                }
                            ?>
                        </div>

                        <label for="repassword">Repetir contraseña</label>
                        <span class="gogym-contact-form-fields-instr">Debe ser igual a la indicada en el campo anterior</span>
                        <input type="password" placeholder="Repetí la contraseña" id="repassword" name="repassword" required tabindex="6">
                    </div>
                    
                    <div id="gogym-register-form-fields-document">
                        <label for="document_number">Número de documento</label>
                        <span class="gogym-contact-form-fields-instr">Numérico, de 6 a 8 caracteres</span>
                        <input type="text" placeholder="Ingresá tu DNI" id="document_number" name="document_number" required tabindex="7">
                        <div class="gogym-register-form-error-space">
                            <?php
                                if (isset($_GET["document_number"])) {
                                    echo '<h4 class="gogym-register-form-error">' . str_replace("document_number", "DNI", $_GET["document_number"]) . '</h4>';
                                }
                            ?>
                        </div>
                    </div>
                </div>

                <?php
                    if (isset($_GET["ok"])) {
                        echo '<h3 id="gogym-register-form-success-title">¡Te registraste correctamente!</h3>';
                        echo '<p id="gogym-register-form-success-info">Pronto recibirás un correo con los detalles.</p>';
                    }
                ?>
            </div>

            <div class="gogym-register-form-error-space-center" id="error-space">
                <?php
                    if (isset($_GET["password"])) {
                        echo '<h4 class="gogym-register-form-error">' . str_replace("password", "contraseña", $_GET["password"]). '</h4>';
                    } elseif (isset($_GET["userAlreadyExists"])) {
                        echo '<h4 class="gogym-register-form-error">Ya existe un usuario con ese DNI</h4>';
                        echo '<h3 class="gogym-register-form-error">Por favor, <a href="./auth.php">inicie sesión</a> o <a href="./forgot-pwd.php">recupere su contraseña</a></h3>';
                    }
                     elseif (isset($_GET["unknownError"])) {
                        echo '<h4 class="gogym-register-form-error">Ocurrió un error inesperado. Por favor inténtelo de nuevo.</h4>';
                    }
                ?>
            </div>

            <div id="gogym-register-form-submit">
                <div id="gogym-register-form-terms">
                    <input type="checkbox" id="terms" name="terms" required tabindex="8">
                    <label for="terms">Acepto los <a id="terms-href" href="./terms.php" target="_blank">Términos y condiciones</a></label>
                </div>

                <button tabindex="9">¡Enviar!</button>
            </div>
        </form>
    </main>

    <?php include '../components/footer.php' ?>
</body>
</html>

<script>
function countChars(obj){
    document.getElementById("charCounterValue").innerHTML = obj.value.length;
}
</script>