<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/styles/catalog.css">
    <link rel="icon" href="/assets/media/webicon.png">
    <title>GoGym | Membresías</title>
</head>
<body>
    <?php include '../components/header.php' ?>

    <main>
        <section id="gogym-memberships-info">
            <h1>Membresías</h1>

            <p id="gogym-memberships-desc">
                Nuestras membresías están diseñadas para adaptarse a tus necesidades y a tu ritmo de vida, ofreciéndote flexibilidad y múltiples beneficios desde el primer día.
                Contamos con distintos planes que se ajustan tanto a quienes entrenan de forma ocasional como a quienes buscan un compromiso a largo plazo con su bienestar.
                Al elegir una membresía, accedés a entrenamientos personalizados, uso completo de las instalaciones y el acompañamiento de profesionales que te ayudan a alcanzar tus objetivos de manera eficiente y segura.
            </p>

            <?php
                if (isset($_GET["unknownError"])) {
                    echo '<p id="gogym-memberships-error"> Ocurrió un error. Por favor inténtelo de nuevo. </p>';
                } elseif (isset($_GET["alreadyHasMembership"])) {
                    echo '<p id="gogym-memberships-error"> Ya contás con esa membresía y aún no expiró. Por favor esperar a la próxima fecha de expiración o adquirir una membresía distinta. </p>';
                } elseif (isset($_GET["success"])) {
                    echo '<p id="gogym-memberships-success"> ¡Membresía adquirida exitosamente! </p>';
                }
            ?>

            <div id="gogym-memberships">
                <form method="post" action="../src/buy_membership.php" class="gogym-membership-form">
                    <input type="hidden" name="plan" value="Bronce">

                    <button type="submit" class="gogym-membership column" id="gogym-membership-bronze">
                        <img src="/assets/media/member_bronze.png" alt="GoGym Membership">
                        <div class="gogym-membership info">
                            <h2>Membresía de acceso Bronce</h2>
                            <h3>Con esta membresía tenés acceso a:</h3>
                        </div>
                        <div class="gogym-membership info">
                            <ul id="gogym-membership-benefit-list-bronze">
                                <li>Acceso a todo el gimnasio</li>
                                <li>Rutina personalizada</li>
                                <li>Acceso a clases de spinning y boxeo</li>
                            </ul>

                            <p class="gogym-membership-price">ARS 15.000/mes</p>
                        </div>
                    </button>
                </form>

                <form method="post" action="/src/buy_membership.php" class="gogym-membership-form">
                    <input type="hidden" name="plan" value="Plata">

                    <button type="submit" class="gogym-membership column" id="gogym-membership-silver">
                        <img src="/assets/media/member_silver.png" alt="GoGym Membership">
                        <div class="gogym-membership info">
                            <h2>Membresía de acceso Plata</h2>
                            <h3>Con esta membresía tenés acceso a:</h3>
                        </div>
                        <div class="gogym-membership info">
                            <ul id="gogym-membership-benefit-list-silver">
                                <li>Acceso a todo el gimnasio</li>
                                <li>Rutina personalizada</li>
                                <li>Acceso a clases de spinning y boxeo</li>
                                <li>Acceso a nuestra aplicación de tracking</li>
                                <li>Acceso a nuestra línea de bebidas sin costo adicional</li>
                            </ul>

                            <p class="gogym-membership-price">ARS 25.000/mes</p>
                        </div>
                    </button>
                </form>

                <form method="post" action="/src/buy_membership.php" class="gogym-membership-form">
                    <input type="hidden" name="plan" value="Oro">

                    <button type="submit" class="gogym-membership column" id="gogym-membership-gold">
                        <img src="/assets/media/member_gold.png" alt="GoGym Membership">
                        <div class="gogym-membership info">
                            <h2>Membresía de acceso Oro</h2>
                            <h3>Con esta membresía tenés acceso a:</h3>
                        </div>
                        <div class="gogym-membership info">
                            <ul id="gogym-membership-benefit-list-gold">
                                <li>Acceso a todo el gimnasio</li>
                                <li>Rutina personalizada</li>
                                <li>Acceso a clases de spinning y boxeo</li>
                                <li>Acceso a nuestra aplicación de tracking</li>
                                <li>Acceso a nuestra línea de bebidas sin costo adicional</li>
                                <li>Suplementos semanales incluidos</li>
                                <li>Acceso al gimnasio en horarios de no-apertura</li>
                                <li>Acceso a añadir música a la playlist del gimnasio</li>
                            </ul>

                            <p class="gogym-membership-price">ARS 35.000/mes</p>
                        </div>
                    </button>
                </form>
            </div>
        </section>
    </main>

    <?php include '../components/footer.php' ?>
</body>
</html>
