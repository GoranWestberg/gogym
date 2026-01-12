<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/styles/recover-pwd.css">
    <link rel="icon" href="/assets/media/webicon.png">
    <title>GoGym | Recupero</title>
</head>
<body>
    <?php include '../components/header.php' ?>

    <main>
        <section id="gogym-recovery">
            <h1 id="gogym-recovery-title">Cambio de contraseña</h1>

            <p>Ingresá debajo tu nueva contraseña.</p>

            <form id="gogym-recovery-form" method="post" action="/src/handle_pw_change.php">
                <input type="hidden" name="token" value="<?= htmlspecialchars($_GET['token'] ?? '', ENT_QUOTES) ?>">

                <h3 class="gogym-recovery-label">Nueva contraseña</h3>
                <input type="password" name="password" placeholder="Nueva contraseña" required>

                <h3 class="gogym-recovery-label">Repetir contraseña</h3>
                <input type="password" name="repassword" placeholder="Repetir nueva contraseña" required>
                
                <?php
                    if (isset($_GET["password"])) {
                        echo '<h3 id="gogym-recovery-form-error">' . $_GET["password"] . '</h3>';
                    } elseif (isset($_GET["password_repeat"])) {
                        echo '<h3 id="gogym-recovery-form-error">' . $_GET["password_repeat"] . '</h3>';
                    }
    			?>

                <button type="submit">Cambiar contraseña</button>
            </form>
        </section>
    </main>
    
    <?php include '../components/footer.php' ?>
</body>
</html>