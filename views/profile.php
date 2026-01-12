<?php
    require_once __DIR__ . '/../src/session_handler.php';
    HandleSession();
    RequireLogin();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/styles/profile.css">
    <link rel="icon" href="/assets/media/webicon.png">
    <title>GoGym | Mi perfil</title>
</head>

<body>
    <?php include '../components/header.php' ?>

    <main>
        <section id="gogym-profile">
            <h1>Mi perfil</h1>
            <div id="gogym-profile-container">
                <div id="gogym-profile-info">
                    <h2>Información personal</h2>
                    <ul id="gogym-profile-info-details">
                        <li>Nombre: <?php echo $_SESSION["username"] ?? "" ?></li>
                        <li>DNI: <?php echo $_SESSION["dni"] ?? ""  ?></li>
                        <li>Email: <?php echo $_SESSION["email"] ?? ""  ?></li>
                        <li>Celular: <?php echo $_SESSION["cellphone"] ?? ""  ?></li>
                    </ul>
                </div>

                <?php
                    if (!empty($_SESSION["membership"])) {
                        $color = "";
                        $img = "";
                        switch($_SESSION["membership"]) {
                            case "Oro":
                                $color = "gold";
                                $img = "gold";
                                break;
                            case "Plata":
                                $color = "silver";
                                $img = "silver";
                                break;
                            default:
                                $color = "orange";
                                $img = "bronze";
                                break;
                        }
                        echo "
                        <div id='gogym-profile-membership' style='background-color: $color;'>
                            <h2>Membresía</h2>
                            <p>Contás con la membresía {$_SESSION["membership"]}</p>
                            <img id='gogym-profile-membership-image' src='/assets/media/member_$img.png'>
                        </div>";
                    } else {
                        echo "
                        <div id='gogym-profile-membership'>
                            <h2>Membresía</h2>
                            <p>Podés adquirir una desde <a href='./catalog.php' id='gogym-profile-adquire' target='_blank'>acá</a></p>
                        </div>";
                    }
                ?>
            </div>

            <form method="post" action="/src/logout.php">
                <button id="gogym-profile-logout" type="submit">Cerrar sesión</button>
            </form>
        </section>
    </main>

    <?php include '../components/footer.php' ?>
</body>
</html>