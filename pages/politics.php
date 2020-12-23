<!doctype html>
<html lang='pt-br'>
<head>
    <meta charset='utf-8'/>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'/>

    <link rel='stylesheet' href='../style/default.css'/>
    <link rel='stylesheet' href='../style/headerfooter.css'/>
    <link rel='stylesheet' href='../style/politics.css'/>

    <link rel='icon' href='../resources/Square-Logo-Icon.png'/>
    <title>Jornal da Primeira Hora</title>
</head>
<body>
    <?php
        require '../templates/header.php';
        loadHeader('../resources/Logo-Icon.png', '../menu/columnists', '../index.php', './news.php', './columnists.php', array('./colsMarco.php', './colsLeonardo.php'), './politics.php', './sport.php', './cheers.php', './education.php', './gallery.php', './contact.php', './politics.php');
    ?>

    <div id='msg'>
        <img src='../resources/People-coins-finding.png' id='backgroundimage'>
    </div>

    <div id='content'>
    <?php
        require('../ewml/EWML.php');

        $directory = dir('../menu/politics');
        try {
            while(($file = $directory->read()) != false)
            {
                if (!is_dir($file))
                {
                    echo interpreterEWML('../menu/politics/'. $file);
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