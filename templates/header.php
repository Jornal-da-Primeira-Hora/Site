<?php

    function loadHeader($icon, $localCols, $home, $news, $cols, $indexCols, $politic, $sport, $cheers, $edu, $gallery, $contact, $activated) {
        $folder = $localCols;
        $_cols = '';
        $_icols = '';
        $selectedX = 0;

        $directory = dir($folder);
        while(($file = $directory -> read()) != false)
        {
            if (is_file("$folder/$file") and substr($file, -4) == '.txt') {
                $lines = file("$folder/$file");

                for ($x = 0; $x < count($lines); ++$x) {
                    if ($x == 0) {
                        $_cols = "$_cols <li> <a href='$indexCols[$selectedX]'> $lines[$x] </a> </li>";
                        $_icols = "$_icols <li class='invisible-items-menu-columnists'> <a href='$indexCols[$selectedX]'> $lines[$x] </a> </li>";
                        ++$selectedX;
                    }
                }
            }
        }
        $directory -> close();

        echo "
        <input type='checkbox' id='checkboxMenuMobileOpen'/>

        <header id='header'>
            <div id='logo'>
                <img src='$icon'/>
                <h1>Jornal da Primeira Hora</h1>
            </div>

            <label for='checkboxMenuMobileOpen' id='MenuMobile'></label>

            <ul id='buttons'>
                <li> <a href='$home'> Página inicial      </a> </li>
                <li> <a href='$news'> Notícias            </a> </li>
                <li> <a href='$cols' id='btnColumnists'> Colunistas          </a>
                    <ul class='subColumnists'>
                        $_cols
                    </ul>
                </li>
                $_icols
                <li> <a href='$politic'> Política            </a> </li>
                <li> <a href='$sport'  > Esportes            </a> </li>
                <li> <a href='$cheers' > Saúde               </a> </li>
                <li> <a href='$edu'    > Educação e Cultura  </a> </li>
                <li> <a href='$gallery'> Galeria de Fotos    </a> </li>
                <li> <a href='$contact'> Contato             </a> </li>
                <a href='#' id='btnSearch'></a>
            </ul>
        </header>
        ";

        if ($activated != null) {
            echo "
            <style>
                li a {
                    color: black;
                }

                li a[href='$activated'] {
                    background-color: var(--first-color-focused);
                    border-radius: 4px;
                    color: #fff;
                }
            </style>
            ";
        }

    }

?>