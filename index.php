
<style>
    html {
        background: #f3f4f6;
    }

    .cargando {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        font-size: 3em;
        color: #3498db;
    }

    .cargando::before {
        content: "";
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        border: 3px solid transparent;
        border-top-color: #3498db;
        border-radius: 50%;
        animation: girar 1s linear infinite;
    }

    @keyframes girar {
        0% {
            transform: rotate(0deg);
        }
        100% {
            transform: rotate(360deg);
        }
    }
</style>

<div class="cargando">Cargando...</div>
<?php

echo "<meta http-equiv='refresh' content='2;url=login'>";

