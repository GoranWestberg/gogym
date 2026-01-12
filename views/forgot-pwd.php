<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/styles/forgot-pwd.css">
    <link rel="icon" href="/assets/media/webicon.png">
    <title>GoGym | Recupero</title>
</head>
<body>
    <?php include '../components/header.php' ?>

    <main>
        <section id="gogym-forgot">
            <h1 id="gogym-forgot-title">Recuperar contraseña</h1>

            <p>¿Olvidaste tu contraseña?</p>
            <p>No te preocupes. Ingresá tu DNI debajo y comenzá el proceso para recuperarla.</p>

            <form id="gogym-forgot-form" method="post" action="/src/handle_pw_reset.php">
                <h3>Usuario</h3>
                <input type="text" placeholder="Número de documento" id="document_number" name="document_number">
                <?php
                    if (isset($_GET["document_number"])) {
                        echo '<h4 id="gogym-forgot-form-error">' . $_GET["document_number"] . '</h4>';
                    } elseif (isset($_GET["userDoesNotExist"])) {
                        echo '<h4 id="gogym-forgot-form-error"> No existe ningún usuario con ese DNI. Por favor, regístrese.</h4>';
                    } elseif (isset($_GET["success"])) {
                        echo '<h4 id="gogym-forgot-form-success">Te enviamos un mail con un enlace para restaurar tu contraseña.</h4>';
                    }
                ?>

                <button>Recuperar contraseña</button>
            </form>
        </section>
    </main>
    
    <?php include '../components/footer.php' ?>
</body>
</html>