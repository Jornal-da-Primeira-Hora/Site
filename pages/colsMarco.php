<!doctype html>
<html lang='pt-br'>
<head>
    <meta charset='utf-8'/>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'/>

    <link rel='stylesheet' href='../style/default.css'/>
    <link rel='stylesheet' href='../style/headerfooter.css'/>
    <link rel='stylesheet' href='../style/cheers.css'/>
    <link rel='stylesheet' href='../style/contentstyle.css'/>

    <link rel='icon' href='../resources/Square-Logo-Icon.png'/>
    <title>Jornal da Primeira Hora - Saúde</title>
</head>
<body>
    <?php
        require '../templates/header.php';
        loadHeader('../resources/Logo-Icon.png', '../menu/columnists', '../index.php', './news.php', './columnists.php', array('./colsMarco.php', './colsLeonardo.php'), './politics.php', './sport.php', './cheers.php', './education.php', './gallery.php', './contact.php', './colsMarco.php');
    ?>

    <div id='msg'>
        <!-- <img src='../resources/Doctor-and-people-wearing-medical-mask.png' id='backgroundimage'/> -->
        <!-- <div id='table'></div> -->
    </div>

    <div id='content'>
        <?php
            require '../ewml/EWML.php';

            $folder = '../menu/columnists';    
            $directory = dir($folder);
            try {
                while(($file = $directory -> read()) != false)
                {
                    if ($file == 'MarcoAmaral.ewml') {
                        echo interpreterEWML($folder. '/'. $file);
    
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