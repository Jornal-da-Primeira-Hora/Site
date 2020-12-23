<?php
    function loadFooter($extends = false) {

        if (!$extends) {
            echo "
            <footer id='footer'>
                <p>Entre em contato pelo e-mail &shy;[ jornaldaprimeirahora@hotmail.com ]</p>
            </footer>
            ";
        }
        else {
            echo "
            <footer id='footer'>
                <iframe src='https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d13808.863948634324!2d-51.624543!3d-30.088000000000005!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zMzDCsDA1JzE2LjgiUyA1McKwMzcnMjguNCJX!5e0!3m2!1spt-BR!2sus!4v1606414670770!5m2!1spt-BR!2sus' frameborder='0' allowfullscreen='' aria-hidden='false' tabindex='0' id='map'></iframe>
                <p>Entre em contato pelo e-mail &shy;[ jornaldaprimeirahora@hotmail.com ]</p>
            </footer>
            ";
        }
    }
?>