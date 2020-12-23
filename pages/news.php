<!doctype html>
<html lang='pt-br'>
<head>
    <meta charset='utf-8'/>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'/>

    <link rel='stylesheet' href='../style/default.css'/>
    <link rel='stylesheet' href='../style/headerfooter.css'/>
    <link rel='stylesheet' href='../style/news.css'/>
    <link rel='stylesheet' href='../style/contentstyle.css'/>

    <link rel='icon' href='../resources/Square-Logo-Icon.png'/>
    <title>Jornal da Primeira Hora</title>
</head>
<body>
    <?php
        require '../templates/header.php';
        loadHeader('../resources/Logo-Icon.png', '../menu/columnists', '../index.php', './news.php', './columnists.php', array('./colsMarco.php', './colsLeonardo.php'), './politics.php', './sport.php', './cheers.php', './education.php', './gallery.php', './contact.php', './news.php');
    ?>

    <div id='msg'>
        <img src='../resources/Woman-jornalist.png' id='backgroundimage'>
        <div id='table'></div>
    </div>

    <div id='content'>
        <?php
            require('../ewml/EWML.php');
            $btn_click_abrir_count = -1;

            $directory = dir('../menu/news');
            try {
                while(($file = $directory->read()) != false)
                {
                    if (!is_dir($file) and substr($file, -5) == '.ewml')
                    {
                        echo interpreterEWML('../menu/news/'. $file, $btn_click_abrir_count);
                    }
                }
    
                $directory -> close();

            } catch (\Throwable $th) { }

        ?>
    </div>

    <?php
        require '../templates/footer.php';
        loadFooter();
    ?>

    <script src='../js/contentstyle.js'></script>
</body>
</html>