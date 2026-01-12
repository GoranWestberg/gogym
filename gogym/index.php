<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/styles/home.css">
    <link rel="icon" href="/assets/media/webicon.png">
    <title>GoGym | Inicio</title>
</head>
<body>
    <?php include './components/header.php' ?>

    <main>
        <section id="gogym-home-info">
            <h1>Sobre nosotros</h1>

            <img src="/assets/media/gogym.png" alt="GoGym Logo">

            <p>
                GoGym es un espacio pensado para que entrenes con propósito.
                Combinamos equipamiento de última generación, rutinas personalizadas y un ambiente motivador para ayudarte a alcanzar tus objetivos, ya sea ganar fuerza, mejorar tu rendimiento o sentirte mejor cada día.
                Nuestro enfoque está en el progreso real, el acompañamiento constante y una experiencia de entrenamiento cómoda, segura y eficiente.
            </p>

            <p>
                En <span style="color: red;">GoGym</span> no solo entrenás: <b id="gogym-you-evolve">evolucionás</b>.
            </p>
        </section>

        <section id="gogym-home-imgs">
            <div class="gogym-home-img-section">
                <h1>Nuestros entrenamientos</h1>

                <p>
                    Nuestras membresías están pensadas para adaptarse a tu estilo de vida y a tus objetivos.
                    Ofrecemos planes flexibles que te permiten entrenar a tu ritmo, con acceso a equipamiento de primer nivel, clases guiadas y un ambiente pensado para motivarte día a día.
                    Ya sea que estés dando tus primeros pasos o buscando llevar tu entrenamiento al siguiente nivel, tenemos una opción para vos.
                </p>

                <p>
                    Además, nuestras membresías incluyen beneficios exclusivos como seguimiento personalizado, asesoramiento profesional y promociones especiales para miembros.
                    Creemos que entrenar no es solo venir al gimnasio, sino formar parte de una comunidad que te acompaña y te impulsa a superarte en cada entrenamiento.
                </p>

                <h2>¿Te convencimos? Accedé a las membresías que tenemos y averiguá cuál es más acorde a tus necesidades:</h2>

                <button onclick="window.location.href='./views/catalog.php'">Ver membresías</button>

                <h2>¿Te quedaron dudas? Contactá con nosotros a través del siguiente formulario:</h2>

                <button id="contact-btn" onclick="window.location.href='./views/contact.php'">Contactarse</button>
            </div>
        </section>
    </main>


    <?php include './components/footer.php' ?>
</body>
</html>