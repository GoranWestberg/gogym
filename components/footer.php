<footer>
    <span class="left">© 2026</span>
    <a class="center" href="https://www.linkedin.com/in/gorandwestberg/" target="_blank" rel="noopener noreferrer">
        Goran Dirk Westberg
    </a>
    <span class="right">Todos los derechos reservados</span>
</footer>

<style>
footer {
    margin-top: auto;
    font-family: inherit;
    display: grid;
    grid-template-columns: 1fr auto 1fr;
    align-items: center;
    background-color: var(--footer-bg);
    color: var(--footer-text);
    min-height: 60px;
    padding: 0 1rem;
}

footer .left {
    justify-self: start;
}

footer .center {
    justify-self: center;
}

footer .right {
    justify-self: end;
}

footer a {
    color: inherit;
    text-decoration: none;
    transition: color 0.2s ease;
}

footer a:hover {
    color: var(--accent-hover);
}

footer a:visited {
    color: inherit;
}

footer a:visited:hover {
    color: var(--accent-hover);
}

footer a[target="_blank"]::after {
    content: " ↗";
    font-size: 0.8em;
}

/* Responsive */
@media (max-width: 600px) {
    footer {
        grid-template-columns: 1fr;
        row-gap: 0.25rem;
        text-align: center;
        padding: 0.75rem 1rem;
    }

    footer .left,
    footer .center,
    footer .right {
        justify-self: center;
    }
}
</style>