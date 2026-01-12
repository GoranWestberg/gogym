<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/styles/contact.css">
    <link rel="icon" href="/assets/media/webicon.png">
    <title>GoGym | Contacto</title>
</head>
<body>
    <?php include '../components/header.php' ?>

    <main>
        <h1 id="gogym-contact-title">Contacto</h1>
        <p id="gogym-contact-desc">¿Tenés dudas o simplemente querés saber más? ¡Escribinos que contestamos rápido!</p>

        <form action="../src/contact_form.php" id="gogym-contact-form" method="post">
            <div id="gogym-contact-form-fields">
                <div id="gogym-contact-form-fields-info">
                    <div id="gogym-contact-form-fields-left">
                        <label for="firstname">Nombre</label>
                        <span class="gogym-contact-form-fields-instr">5 a 50 caracteres</span>
                        <input type="text" placeholder="Ingresá tu nombre" id="firstname" name="firstname" required tabindex="1">
                        <div class="gogym-contact-form-error-space">
                            <?php
                                if (isset($_GET["firstname"])) {
                                    echo '<h4 class="gogym-contact-form-error">' . str_replace("firstname", "nombre", $_GET["firstname"]) . '</h4>';
                                }
                            ?>
                        </div>

                        <label for="email">Email</label>
                        <span class="gogym-contact-form-fields-instr">Ejemplo: hola@ejemplo.com</span>
                        <input type="email" placeholder="Ingresá tu email" id="email" name="email" required tabindex="3">
                        <div class="gogym-contact-form-error-space">
                            <?php
                                if (isset($_GET["email"])) {
                                    echo '<h4 class="gogym-contact-form-error">' . $_GET["email"] . '</h4>';
                                }
                            ?>
                        </div>
                    </div>

                    <div id="gogym-contact-form-fields-right">
                        <label for="lastname">Apellido</label>
                        <span class="gogym-contact-form-fields-instr">5 a 50 caracteres</span>
                        <input type="text" placeholder="Ingresá tu apellido" id="lastname" name="lastname" required tabindex="2">
                        <div class="gogym-contact-form-error-space">
                            <?php
                                if (isset($_GET["lastname"])) {
                                    echo '<h4 class="gogym-contact-form-error">' . str_replace("lastname", "apellido", $_GET["lastname"]) . '</h4>';
                                }
                            ?>
                        </div>
                        <label for="cellphone">Celular</label>
                        <span class="gogym-contact-form-fields-instr">9 a 18 caracteres</span>
                        <input type="text" placeholder="Ingresá tu celular" id="cellphone" name="cellphone" required tabindex="4">
                        <div class="gogym-contact-form-error-space">
                            <?php
                                if (isset($_GET["cellphone"])) {
                                    echo '<h4 class="gogym-contact-form-error">' . str_replace("cellphone", "celular", $_GET["cellphone"]) . '</h4>';
                                }
                            ?>
                        </div>
                    </div>
                </div>
                <div id="gogym-contact-form-fields-center">
                    <label for="message">Mensaje</label>
                    <textarea id="message" maxlength="500" placeholder="Ingresá tu mensaje..." name="message" onkeyup="countChars(this);" tabindex="5"></textarea>
                    <p id="charCounter"><span id="charCounterValue">0</span>/500</p>
                </div>

                <?php
                    if (isset($_GET["ok"])) {
                        echo '<h3 id="gogym-contact-form-success-title">¡El formulario fue enviado con éxito!</h3>';
                        echo '<p id="gogym-contact-form-success-info">Pronto recibirás un correo con los detalles.</p>';
                    }
                ?>
            </div>

            <div class="gogym-register-form-error-space" id="error-space">
                <?php
                    if (isset($_GET["cellphone"])) {
                        echo '<h4 class="gogym-register-form-error">' . str_replace("cellphone", "celular", $_GET["cellphone"]) . '</h4>';
                    } elseif (isset($_GET["unknownError"])) {
                        echo '<h4 class="gogym-register-form-error"> Ocurrió un error inesperado. Por favor inténtelo de nuevo.</h4>';
                    }
                ?>
            </div>

            <div id="gogym-contact-form-submit">
                <div id="gogym-contact-form-terms">
                    <input type="checkbox" id="terms" name="terms" required tabindex="6">
                    <label for="terms">Acepto los <a id="terms-href" href="./terms.php" target="_blank">Términos y condiciones</a></label>
                </div>

                <button tabindex="7">¡Enviar!</button>
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