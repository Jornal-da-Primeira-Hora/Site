<!doctype html>
<html lang='pt-br'>
<head>
    <meta charset='utf-8'/>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'/>

    <link rel='stylesheet' href='./style/default.css'/>
    <link rel='stylesheet' href='./style/header.css'/>
    <link rel='stylesheet' href='./style/post.css'/>

    <link rel='icon' href='./resources/Square-Logo-Icon.png'/>
    <title>Jornal da Primeira Hora - Postar</title>
</head>
<body>
    <?php
        require './template/header.php';
        loadHeader('./resources/Logo-Icon.png', './menu/columnist', './index.php', './page/news.php', './page/columnists.php', array('./page/colsMarco.php', './page/colsLeonardo.php'), './page/politics.php', './page/sport.php', './page/cheers.php', './page/education.php', './page/gallery.php', './page/contact.php', './index.php');
    ?>

    <section id='content'>
        <h1>Postar edições, imagens e noticias</h1>

        
        <header>
            <h2>Digite a senha de acesso!</h2>

            <input type='password' id='txbSecurityKey' class='txbPass'/>
            <h4 id='alert-message-security-key'>Esta chave de segurança é necessária para postar algo!</h4>

            <select id='cboContentType'>
                <option>Paragráfo</option>
                <option>Imagem</option>
                <option>Titulo primário normal</option>
                <option>Titulo primário negrito</option>
                <option>Titulo secundário normal</option>
                <option>Titulo secundário negrito</option>
            </select>
            <a id='btnAddNewElement'>+</a>
        </header>

        <article onmouseover='if (imgLocation.innerText != img.value) { imgLocation.innerText = img.value }'>

        </article>

        <header>
            <a href='/' id='btnAddNewContentInPage'>Adicionar conteúdo</a>
        </header>
    </section>

    <footer id='footer'>
        <p>Entre em contato pelo e-mail &shy;[ jornaldaprimeirahora@hotmail.com ]</p>
    </footer>

    <script src='./js/post.js'></script>
</body>
</html>