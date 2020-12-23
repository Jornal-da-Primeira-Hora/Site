<!DOCTYPE html>
<html lang='pt-br'>
<head>
    <meta charset='utf-8'/>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'/>

    <link rel='stylesheet' href='../style/default.css'/>
    <link rel='stylesheet' href='../style/headerfooter.css'/>
    <link rel='stylesheet' href='../style/contact.css'/>
    <link rel='stylesheet' href='../style/sendemail.css'/>

    <link rel='icon' href='../resources/Square-Logo-Icon.png'/>
    <title>Jornal da Primeira Hora - Contato</title>
</head>
<body>
    <?php
        require '../templates/header.php';
        loadHeader('../resources/Logo-Icon.png', '../menu/columnists', '../index.php', './news.php', './columnists.php', array('./colsMarco.php', './colsLeonardo.php'), './politics.php', './sport.php', './cheers.php', './education.php', './gallery.php', './contact.php', './contact.php');

        echo '<script> _error = false </script>';
    ?>

    <div id='msg'>
        <img src='../resources/men-writing.png' id='backgroundimage'/>
    </div>

    <div id='content'>
        <?php
            require('../phpmailer/PHPMailer.php');
            require('../phpmailer/SMTP.php');
            require('../phpmailer/Exception.php');
        
            use PHPMailer\PHPMailer\PHPMailer;
            use PHPMailer\PHPMailer\SMTP;
            use PHPMailer\PHPMailer\Exception;

            $name = isset( $_GET['name'] ) ? $_GET['name'] : false;
            $phone = isset( $_GET['phone'] ) ? $_GET['phone'] : false;
            $year = isset( $_GET['year'] ) ? $_GET['year'] : false;
            $message = isset( $_GET['message'] ) ? $_GET['message'] : false;

            if (!$name or !$phone or !$message) {
                echo '<script> _error = false </script>';
            }
            else {
                sendMessage($name, $phone, $year, $message, new PHPMailer(true));
            }

            function sendMessage($name, $phone, $year, $message, $mail) {

                try {
                    $mail->isSMTP();
                    $mail->CharSet = 'utf-8';
                    $mail->Host = 'smtp.live.com';
                    $mail->SMTPAuth = true;
                    $mail->Username = 'jornaldaprimeirahora@hotmail.com';
                    $mail->Password = 'Imprenssa';
                    $mail->Port = 587;

                    $mail->SetFrom('jornaldaprimeirahora@hotmail.com');
                    $mail->addAddress('jornaldaprimeirahora@hotmail.com');

                    $mail->Subject = 'Site Jornal da Primeira Hora - Contato';
                    $mail->Body = 'Nome: '. $name. "\nTelefone ou Email: ". $phone. "\nMaior de 18 anos: ". $year. "\n\nMensagem: ". $message;

                    if ($mail->send() == false) {
                        echo '<script> _error = true </script>';
                    }
                }
                catch (Exception $e) {
                    echo '<script> _error = true </script>';
                }
            }
        ?>


        <div id='error'>
            <svg version='1.1' fill='#34495e' xmlns='http://www.w3.org/2000/svg' xmlns:xlink='http://www.w3.org/1999/xlink' viewBox='0 0 512 512' xml:space='preserve'><g><g><g><path d='M507.113,428.415L287.215,47.541c-6.515-11.285-18.184-18.022-31.215-18.022c-13.031,0-24.7,6.737-31.215,18.022L4.887,428.415c-6.516,11.285-6.516,24.76,0,36.044c6.515,11.285,18.184,18.022,31.215,18.022h439.796c13.031,0,24.7-6.737,31.215-18.022C513.629,453.175,513.629,439.7,507.113,428.415z M481.101,449.441c-0.647,1.122-2.186,3.004-5.202,3.004H36.102c-3.018,0-4.556-1.881-5.202-3.004c-0.647-1.121-1.509-3.394,0-6.007L250.797,62.559c1.509-2.613,3.907-3.004,5.202-3.004c1.296,0,3.694,0.39,5.202,3.004L481.1,443.434C482.61,446.047,481.748,448.32,481.101,449.441z'/><rect x='240.987' y='166.095' width='30.037' height='160.197'/><circle cx='256.005' cy='376.354' r='20.025'/></g></g></g></svg>
            <h2>Erro ao enviar mensagem</h2>
        </div>

        <div id='success'>
            <svg version='1.1' fill='#34495e' xmlns='http://www.w3.org/2000/svg' xmlns:xlink='http://www.w3.org/1999/xlink' viewBox='0 0 477.867 477.867' xml:space='preserve'><g><g><path d='M238.933,0C106.974,0,0,106.974,0,238.933s106.974,238.933,238.933,238.933s238.933-106.974,238.933-238.933C477.726,107.033,370.834,0.141,238.933,0z M238.933,443.733c-113.108,0-204.8-91.692-204.8-204.8s91.692-204.8,204.8-204.8s204.8,91.692,204.8,204.8C443.611,351.991,351.991,443.611,238.933,443.733z'/></g></g><g><g><path d='M370.046,141.534c-6.614-6.388-17.099-6.388-23.712,0v0L187.733,300.134l-56.201-56.201c-6.548-6.78-17.353-6.967-24.132-0.419c-6.78,6.548-6.967,17.353-0.419,24.132c0.137,0.142,0.277,0.282,0.419,0.419l68.267,68.267c6.664,6.663,17.468,6.663,24.132,0l170.667-170.667C377.014,158.886,376.826,148.082,370.046,141.534z'/></g></g></svg>
            <h2>Mensagem enviada com sucesso</h2>
        </div>

        <a href='./contact.php'>Voltar</a>
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
    <script>
        const divError = document.getElementById('error')
        const divSuccess = document.getElementById('success')

        if (_error == false) {
            divSuccess.style.display = 'block'
        }
        else {
            divError.style.display = 'block'
        }
    </script>
</body>
</html>