<?php
    require_once __DIR__ . '/../src/session_handler.php';
    HandleSession();

$BASE_URL = ""; // raíz del dominio
?>

<header>
    <nav>
        <ul id="gogym-header">
            <li><a href="<?= $BASE_URL ?>/index.php">Inicio</a></li>
            <li><a href="<?= $BASE_URL ?>/views/catalog.php">Membresías</a></li>
            <li>
                <?php if (IsLoggedIn()): ?>
                    <a href="<?= $BASE_URL ?>/views/profile.php">Mi perfil</a>
                <?php else: ?>
                    <a href="<?= $BASE_URL ?>/views/auth.php">Autenticarse</a>
                <?php endif; ?>
            </li>
        </ul>
    </nav>
</header>

<style>
#gogym-header {
    display: flex;
    flex-direction: row;
    justify-content: space-between;
    height: 5rem;
    margin: 0;
    text-align: center;
    align-items: center;
    padding: 0;
    font-size: 1.5rem;
    overflow: hidden;
    list-style: none;
}

#gogym-header ul {
    display: flex;
    align-items: center;
    height: 100%;
    margin: 0;
    padding: 0;
}

#gogym-header li {
    flex: 1;
    list-style: none;
    display: flex;
    align-items: center;
    justify-content: center;
    height: 100%;
    transition: transform 0.25s ease;
}

#gogym-header li a {
    width: 100%;
    height: 100%;
    display: flex;
    justify-content: center;
    align-items: center;
}

#gogym-header li:hover {
    cursor: pointer;
}

#gogym-header a {
    width: 100%;
    height: 100%;
    display: flex;
    align-items: center;
    justify-content: center;
    color: var(--text);
    text-decoration: none;
    outline: none;
    transition: scale 0.25s ease, color 0.25s ease;
}

#gogym-header a:hover {
    scale: 1.1;
    color: var(--accent-hover);
}

/* foco teclado */
#gogym-header a:focus-visible {
    outline: 3px solid rgba(182, 0, 0, 0.25);
    outline-offset: -6px;
    border-radius: 8px;
}

/* Responsive */
@media (max-width: 600px) {
    #gogym-header {
        font-size: 1.15rem;
        height: 4.25rem;
    }
}
</style>