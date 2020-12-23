<!DOCTYPE html>
<html lang='pt-br'>
<head>
    <meta charset='utf-8'/>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'/>

    <link rel='stylesheet' href='../style/default.css'/>
    <link rel='stylesheet' href='../style/headerfooter.css'/>
    <link rel='stylesheet' href='../style/contact.css'/>

    <link rel='icon' href='../resources/Square-Logo-Icon.png'/>
    <title>Jornal da Primeira Hora - Contato</title>
</head>
<body>
    <?php
        require '../templates/header.php';
        loadHeader('../resources/Logo-Icon.png', '../menu/columnists', '../index.php', './news.php', './columnists.php', array('./colsMarco.php', './colsLeonardo.php'), './politics.php', './sport.php', './cheers.php', './education.php', './gallery.php', './contact.php', './contact.php');
    ?>    

    <div id='msg'>
        <img src='../resources/men-writing.png' id='backgroundimage'/>
    </div>

    <div id='content'>
        <h1 id='title'>Entre em contato conosco</h1>
        <div id='obs'>
            <img src='../resources/Phone-Icon.png'/>
            <h3>Todos os campos são obrigatórios!</h3>
            <img src='../resources/Phone-Icon-right.png'/>
        </div>
            <div class='div' id='name'>
                <h3>Seu nome completo</h3>
                <input class='txb' type='text' placeholder='Seu nome' name='name' id='txbName'/>
                <h4>Esta pergunta é obrigatória</h4>
            </div>

            <div class='div' id='phone'>
                <h3>Telefone ou E-mail</h3>
                <input class='txb' type='text' placeholder='Telefone ou Email' name='phone' id='txbPhone'/>
                <h4>Esta pergunta é obrigatória</h4>
            </div>

            <div class='div' id='year'>
                <h3>Você tem mais de 18 anos?</h3>
                <input class='rb' type='radio' name='rb' id='rbYes'/>
                <label for='rbYes'>Sim</label>
                <input class='rb' type='radio' name='rb' id='rbNo'/>
                <label for='rbNo'>Não</label>
                <h4>Esta pergunta é obrigatória</h4>
            </div>

            <div class='div' id='msg'>
                <h3>Mensagem</h3>
                <textarea placeholder='Sua mensagem' name='message' id='txbMsg'></textarea>
                <h4>Esta pergunta é obrigatória</h4>
            </div>

            <input type='submit' id='btnSend' value='Enviar mensagem'/>

    </div>

    <div id='team'>
        <h1>Equipe de redação</h1>

        <section id='persons'>
            <div class='person'>
                <div class='image'>
                    <img src='../menu/teamphotos/transparent.png' style="background-image: url('../menu/teamphotos/Jeazon.png');"/>
                    <h2>Jeazon Costa</h2>
                    <crow></crow>
                </div>
                <h3 class='position'>Jornalista / Diretor</h3>
                <h3 class='email'>jornaldaprimeirahora @hotmal.com</h3>
            </div>

            <div class='person'>
                <div class='image'>
                    <img src='../menu/teamphotos/transparent.png' style="background-image: url('');"/>
                    <h2>Ivete Santos</h2>
                </div>
                <h3 class='position'>Diretora executiva</h3>
                <h3 class='email'></h3>
            </div>

            <div class='person'>
                <div class='image'>
                    <img src='../menu/teamphotos/transparent.png' style='background-image: url("../menu/teamphotos/Eliton.png");'/>
                    <h2>Eliton Lisboa</h2>
                </div>
                <h3 class='position'>Desenvolvedor</h3>
                <h3 class='email'>elitonlopes36@gmail.com</h3>
            </div>
        </section>

        <img src='../resources/men-computing.png' id='backgroundimage'/>
    </div>

    <?php
        require '../templates/footer.php';
        loadFooter();
    ?>

    <script src='../js/contact.js'></script>
</body>
</html>