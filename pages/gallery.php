<!doctype html>
<html lang='pt-br'>
<head>
    <meta charset='utf-8'/>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'/>

    <link rel='stylesheet' href='../style/default.css'/>
    <link rel='stylesheet' href='../style/headerfooter.css'/>
    <link rel='stylesheet' href='../style/gallery.css'/>

    <link rel='icon' href='../resources/Square-Logo-Icon.png'/>
    <title>Jornal da Primeira Hora - Galeria de Fotos</title>
</head>
<body>
    <?php
        require '../templates/header.php';
        loadHeader('../resources/Logo-Icon.png', '../menu/columnists', '../index.php', './news.php', './columnists.php', array('./colsMarco.php', './colsLeonardo.php'), './politics.php', './sport.php', './cheers.php', './education.php', './gallery.php', './contact.php', './gallery.php');
    ?>

    <div id='msg'>
        <div id='message'>
            <p>
                Aqui você íra
                encontrar images de todos os
                eventos e lugares em que
                nosso jornal já esteve.
            </p>
        </div>
        <img src='../resources/Computer-with-online-persons.png' id='backgroundimage'/>
        <div id='table'></div>
    </div>

    <div id='content'>
        <?php
            $folder = '../menu/gallery';
            $title = '';
            $description = '';

            $directory = dir($folder);
            try {
                while(($file = $directory -> read()) != false)
                {
                    if (!is_dir($file)) {
                        
                        if (substr($file, -4) == '.txt') {
                            $lines = file("$folder/$file");
    
                            for ($x = 0; $x < count($lines); ++$x) {
                                if ($x == 0) {
                                    $title = $lines[$x];
                                    ++$x;
                                }
                                $description = "$description<br/>$lines[$x]";
                            }
                        }
    
                        if (substr($file, -4) != '.txt') {
    
                            echo "
                            <div class='image'>
                                <img class='img' src='$folder/$file'/>
                                <h2 class='title'>$title</h2>
                                <p class='desc'>$description</p>
                            </div>
                            ";
                            $title = '';
                            $description = '';
                        }
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