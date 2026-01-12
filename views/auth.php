<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/styles/auth.css">
    <link rel="icon" href="/assets/media/webicon.png">
    <title>GoGym | Autenticación</title>
</head>
<body>
    <?php include '../components/header.php' ?>

    <main>
        <section id="gogym-auth">
            <h1 id="gogym-auth-title">Autenticarse</h1>

            <p>Autenticate con tus credenciales.</p>
            <p>Si aún no estás registrado, por favor registrate desde el botón que se encuentra al final de esta página.</p>

            <form id="gogym-auth-form" method="post" action="/src/auth_form.php">
                <h3 class="gogym-auth-form-label">Usuario</h3>
                <input type="text" placeholder="Número de documento" inputmode="numeric" id="document_number" name="document_number">
                <div class="gogym-auth-form-error-space">
                    <?php
                        if (isset($_GET["document_number"])) {
                            echo '<h4 class="gogym-auth-form-error">' . str_replace("document_number", "Usuario", $_GET["password"]) . '</h4>';
                        }
                    ?>
                </div>

                <h3 class="gogym-auth-form-label">Contraseña</h3>
                <input type="password" placeholder="Contraseña" id="password" name="password">
                <div class="gogym-auth-form-error-space">
                    <?php
                        if (isset($_GET["password"])) {
                            echo '<h4 class="gogym-auth-form-error">' . str_replace("password", "Contraseña", $_GET["password"]) . '</h4>';
                        }
                    ?>
                </div>

                <?php
                    if (isset($_GET["userDoesNotExist"])) {
                        echo '<h3 class="gogym-auth-form-error"> El usuario no existe. Por favor revise sus credenciales o regístrese desde "Aún no estoy registrado" </h3>';
                    } elseif (isset($_GET["unknownError"])) {
                        echo '<h3 class="gogym-auth-form-error"> Ocurrió un error. Por favor inténte iniciar sesión nuevamente. </h3>';
                    } elseif (isset($_GET["inactiveUser"])) {
                        echo '<h3 class="gogym-auth-form-error"> Su usuario se encuentra inactivo. Si cree que es un error, por favor <a id="gogym-auth-form-contact" href="./contact.php">contactate con nosotros</a>.</h3>';     
                    } elseif (isset($_GET["loggedOut"])) {
                        echo '<h3 class="gogym-auth-form-success"> ¡Sesión cerrada correctamente! </h3>';
                    } elseif (isset($_GET["passwordChanged"])) {
                        echo '<h3 class="gogym-auth-form-success"> ¡Contraseña cambiada correctamente! Inicie sesión. </h3>';
                    }
                ?>

                <button>Iniciar sesión</button>
                <a class="gogym-auth-form-redirect" href="./register.php">Aún no estoy registrado</a>
                <a class="gogym-auth-form-redirect" href="./forgot-pwd.php">Olvidé mi contraseña</a>
            </form>
        </section>
    </main>
    
    <?php include '../components/footer.php' ?>
</body>
</html>