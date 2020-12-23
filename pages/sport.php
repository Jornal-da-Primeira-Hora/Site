<!doctype html>
<html lang='en'>
<head>
    <meta charset='utf-8'/>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'/>

    <link rel='stylesheet' href='../style/default.css'/>
    <link rel='stylesheet' href='../style/headerfooter.css'/>
    <link rel='stylesheet' href='../style/sport.css'/>

    <link rel='icon' href='../resources/Square-Logo-Icon.png'/>
    <title>Jornal da Primeira Hora - Esportes</title>
</head>
<body>
    <?php
        require '../templates/header.php';
        loadHeader('../resources/Logo-Icon.png', '../menu/columnists', '../index.php', './news.php', './columnists.php', array('./colsMarco.php', './colsLeonardo.php'), './politics.php', './sport.php', './cheers.php', './education.php', './gallery.php', './contact.php', './sport.php');
    ?>

    <div id='msg'>
        <img src='../resources/Woman-runnig-in-park.png' id='backgroundimage'>
    </div>

    <div id='content'>
    <?php
        require('../ewml/EWML.php');

        $directory = dir('../menu/sports');
        try {
            while(($file = $directory->read()) != false)
            {
                if (!is_dir($file))
                {
                    echo interpreterEWML('../menu/sports/'. $file);
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
</body>
</html>