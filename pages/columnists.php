<!doctype html>
<html lang='pt-br'>
<head>
    <meta charset='utf-8'/>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'/>

    <link rel='stylesheet' href='../style/default.css'/>
    <link rel='stylesheet' href='../style/headerfooter.css'/>
    <link rel='stylesheet' href='../style/columnists.css'/>

    <link rel='icon' href='../resources/Square-Logo-Icon.png'/>
    <title>Jornal da Primeira Hora - Colunistas</title>
</head>
<body>
    <?php
        require '../templates/header.php';
        loadHeader('../resources/Logo-Icon.png', '../menu/columnists', '../index.php', './news.php', './columnists.php', array('./colsMarco.php', './colsLeonardo.php'), './politics.php', './sport.php', './cheers.php', './education.php', './gallery.php', './contact.php', './columnists.php');
    ?>

    <div id='msg'>
        <div id='message'>
            <p>
                Aqui você irá encontrar todos os
                nossos colunistas que apostaram no
                nosso trabalho e acreditaram na
                nossa familia.
            </p>
        </div>
        <img src='../resources/Mother-reading-book.png' id='backgroundimage'/>

        <div id='table'></div>
    </div>

    <div id='content'>
        <?php
            $folder = '../menu/columnists';
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
                                $description = "$description $lines[$x]";
                            }
                        }
    
                        if (substr($file, -4) != '.txt' and substr($file, -5) != '.ewml') {
    
                            echo "
                            <h1> <a href='/'> $title </a> </h1>
    
                            <div class='col'>
                                <div class='img'> <img src='$folder/$file'> </div>
                                <p>
                                    $description
                                </p>
                            </div>
    
                            <line></line>
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