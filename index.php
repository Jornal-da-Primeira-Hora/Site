<!doctype html>
<html lang='pt-br'>
<head>
    <meta charset='utf-8'/>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'/>

    <link rel='stylesheet' href='./style/default.css'/>
    <link rel='stylesheet' href='./style/headerfooter.css'/>
    <link rel='stylesheet' href='./style/home.css'/>

    <link rel='icon' href='./resources/Square-Logo-Icon.png'/>
    <title>Jornal da Primeira Hora</title>
</head>
<body>
    <?php
        require './templates/header.php';
        loadHeader('./resources/Logo-Icon.png', './menu/columnists', './index.php', './pages/news.php', './pages/columnists.php', array('./pages/colsMarco.php', './pages/colsLeonardo.php'), './pages/politics.php', './pages/sport.php', './pages/cheers.php', './pages/education.php', './pages/gallery.php', './pages/contact.php', './index.php');
    ?>
    
    <img src='./resources/EldoradoDoSulRS.jpg' id='backgroundimage'/>

    <div id='backgroundshadow'>
        <div id='alertpanel'>

            <h1>Olá bem-vindo ao nosso novo site</h1>
            <div id='p1'>
                <div id='image'><img src='./resources/Woman-doctor-pandemia.png'>
                    <h3>Use mascara!</h3>
                </div>
                <p>
                    Olá bem-vindo ao nosso novo site do
                    Jornal da Primeira Hora. Nós estamos
                    com este novo site devido a que o nosso
                    último site não estava com bom funcionamento
                    devido a seu peso em memória.
                </p>
            </div>

            <div id='p2'>
                <p>
                    Aproveite o nosso site feito com todo
                    o carinho para você se informar.
                </p>
            </div>
        
            <a onclick='$btnBack_Click()' id='btnBack'>Voltar ao site</a>
        </div>

    </div>

    <div id='msg'>
        <h1 class='title'>JORNAL DA PRIMEIRA</h1>
        <h1 class='title'>HORA</h1>
        <h3 class='dilema'>'O JORNALISMO LEVADO À SÉRIO'</h3>
    </div>

    <div id='message'>
        <img src='./resources/Woman-using-mask.jpg'/>
        <p>
            A empresa jornalística 'Costa & Santos LTDA. Me' é detentora
            do Jornal da Primeira Hora, veículo de mídia escrita
            e impressa fundado em 15 de Julho de 2009 por seu idealizador
            jornalista Jeazon Costa. Nosso compromisso é levar a notícia
            fidedigna à nossa comunidade e adjacência, sempre pautado
            pela ética, transparência e imparcialidade que requer um bom jornalismo,
            por isso como praxe adotamos nosso bordão 'O JORNALISMO LEVADO À SÉRIO'.
            Prestamos nossos agradecimentos a todos os nossos parceiros
            e colaboradores que confiaram em nosso trabalho nos proporcionando
            a oportunidade de chegarmos aos 11 anos no campo da informação,
            trazendo a notícia e o entretenimento.
        </p>
    </div>

    <div id='content'>
        <div id='editions'>
            <?php
                $folder = './menu/editions';
                $first = 0;
                $last = 0;
                $editions_count = 0;

                $directory = dir($folder);
                while(($file = $directory -> read()) != false)
                {
                    if (!is_dir("$folder/$file") and $editions_count < 4) {
                        if ($first == 0) { $first = substr($file, 0, -4); }
                        $last = substr($file, 0, -4);

                        ++$editions_count;
                    }
                }
                $directory -> close();
                
                for ($x = $last; $x >= $first; --$x)
                {
                    echo "
                        <div class='edition'>
                            <a tag='.$folder/$x.pdf' name='edition'>
                                <div class='imageEdition' style='background-image: url(\"$folder/image/$x.png\");'></div>
                                <h2 class='title'> Edição $x </h2>";

                    if ($x == $last) {
                        echo '  <new></new>';
                    }

                    echo '  </a>
                        </div>
                    ';
                }
            ?>
        </div>
        <a href='./pages/viewalleditions.php' id='btnViewAllEditions'>Ver mais edições</a>

    </div>

    <div id='advertisements'>
        <?php
            $folder = './menu/advertisements';
            $links = array('http://www.peresjunior.com.br/', 'http://www.preferencialimoveisrs.com.br/cgi-sys/suspendedpage.cgi', 'https://amaralesilveira.adv.br/', 'https://www.facebook.com/paty.frago.7');
            $advertisement_count = -1;
            $directory = dir($folder);

            while(($file = $directory -> read()) != false)
            {
                if (!is_dir($file)) {
                    
                    ++$advertisement_count;
                    $this_link = $links[$advertisement_count];
    
                    echo "
                    <a href='$this_link' target='_blank'>
                        <img src='.$folder/$file'/>
                    </a>
    
                    ";
                    // <line></line>
                    // <a class='btn' href='$this_link' target='_blank'>Clique aqui para visitar o site</a>
                }
            }
            $directory -> close();
        ?>

    </div>

    <?php
        require './templates/footer.php';
        loadFooter(true);
    ?>

    <script src='./js/home.js'></script>
</body>
</html>