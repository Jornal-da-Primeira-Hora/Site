<!doctype html>
<html lang='pt-br'>
<head>
    <meta charset='utf-8'/>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'/>

    <link rel='stylesheet' href='../style/default.css'/>
    <link rel='stylesheet' href='../style/headerfooter.css'/>
    <link rel='stylesheet' href='../style/viewalleditions.css'/>

    <link rel='icon' href='../resources/Square-Logo-Icon.png'/>
    <title>Jornal da Primeira Hora - Ver todas as edições</title>
</head>
<body>
    <?php
        require '../templates/header.php';
        loadHeader('../resources/Logo-Icon.png', '../menu/columnists', '../index.php', './news.php', './columnists.php', array('./colsMarco.php', './colsLeonardo.php'), './politics.php', './sport.php', './cheers.php', './education.php', './gallery.php', './contact.php', 'php');
    ?>

    <div id='msg'>
        <div id='message'>
            <p>
                Aqui você encontrara todas as edições
                do nosso jornal para a sua informação
            </p>
        </div>
        <img src='../resources/Woman-podcaster.png' id='backgroundimage'/>
    </div>

    <div id='content'>
        <div id='editions'>
            <?php
                $folder = '../menu/editions';
                $first = 0;
                $last = 0;

                $directory = dir($folder);
                try {
                    while(($file = $directory -> read()) != false)
                    {
                        if (!is_dir($file) and $file != 'image') {
                            if ($first == 0) { $first = substr($file, 0, -4); }
                            $last = substr($file, 0, -4);
                        }
                    }
                    $directory -> close();
                    
                    for ($x = $last; $x >= $first; --$x)
                    {
                        echo "
                            <div class='edition'>
                                <a tag='$folder/$x.pdf'>
                                    <div class='imageEdition' style='background-image: url(\"$folder/image/$x.png\");'></div>
                                    <h2 class='title'> Edição $x </h2>";
    
                        if ($x == $last) {
                            echo '  <new></new>';
                        }
    
                        echo '  </a>
                            </div>
                        ';
                    }
                    
                } catch (\Throwable $th) { }

            ?>
        </div>
    </div>

    <?php
        require '../templates/footer.php';
        loadFooter();
    ?>

    <script src='../js/viewalledition.js'></script>
</body>
</html>