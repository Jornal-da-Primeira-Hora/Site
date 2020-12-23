var $txbSecurityKey = document.getElementById('txbSecurityKey');
var $btnAddNewElement = document.getElementById('btnAddNewElement');
var $txb = document.getElementsByClassName('txb');
var $preview = document.querySelectorAll('.preview');
var $alert_message_security_key = document.getElementById('alert-message-security-key');
var $cboContentType = document.getElementById('cboContentType');
var $section_content_article = document.querySelector('body section#content article');
reloadPreviews();
function reloadPreviews() {
    $txb = document.getElementsByClassName('txb');
    $preview = document.querySelectorAll('.preview');
    var _loop_1 = function (x) {
        $txb[x].addEventListener('keydown', function (key) {
            $preview[x].innerText = $txb[x].value;
        });
    };
    for (var x = 0; x < $txb.length; x++) {
        _loop_1(x);
    }
}
$btnAddNewElement.addEventListener('click', function () {
    if ($txbSecurityKey.value == 'teste') {
        $alert_message_security_key.style.opacity = '0';
        switch ($cboContentType.selectedOptions[0].innerText) {
            case 'Paragráfo':
                $section_content_article.innerHTML += createParagraph();
                break;
            case 'Imagem':
                $section_content_article.innerHTML += createImage();
                break;
            case 'Titulo primário normal':
                $section_content_article.innerHTML += createNormalH1();
                break;
            case 'Titulo primário negrito':
                $section_content_article.innerHTML += createBoldH1();
                break;
            case 'Titulo secundário normal':
                $section_content_article.innerHTML += createNormalH2();
                break;
            case 'Titulo secundário negrito':
                $section_content_article.innerHTML += createBoldH2();
                break;
        }
        reloadPreviews();
    }
    else {
        $alert_message_security_key.style.opacity = '1';
    }
});
function createParagraph() {
    return "\n    <div class='p p-div'>\n        <h2>Paragrafo</h2>\n\n        <textarea cols='30' rows='10' class='txa' placeholder='Digite um paragr\u00E1fo aqui'></textarea>\n        <p class='preview'>\n\n        </p>\n    </div>";
}
function createImage() {
    return "\n    <div class='img'>\n        <h2>Imagem</h2>\n\n        <input type='file' id='img' style='display: none;'/>\n        <label for='img'>Open</label>\n        <p id='imgLocation'></p>\n    </div>";
}
function createNormalH1() {
    return "\n    <div class='normal-h1'>\n        <h2>Titulo prim\u00E1rio normal</h2>\n\n        <input type='text' class='txb' placeholder='Digite um titulo prim\u00E1rio normal aqui'/>\n        <h1 class='preview'>\n\n        </h1>\n    </div>";
}
function createBoldH1() {
    return "\n    <div class='bold-h1'>\n        <h2>Titulo prim\u00E1rio negrito</h2>\n\n        <input type='text' class='txb' placeholder='Digite um titulo prim\u00E1rio negrito aqui'/>\n        <h1 class='preview'>\n\n        </h1>\n    </div>";
}
function createNormalH2() {
    return "\n    <div class='normal-h2'>\n        <h2>Titulo secund\u00E1rio normal</h2>\n\n        <input type='text' class='txb' placeholder='Digite um titulo secund\u00E1rio normal aqui'/>\n        <h2 class='preview'>\n\n        </h2>\n    </div>";
}
function createBoldH2() {
    return "\n    <div class='bold-h2'>\n        <h2>Titulo secund\u00E1rio negrito</h2>\n\n        <input type='text' class='txb' placeholder='Digite um titulo secund\u00E1rio negrito aqui'/>\n        <h2 class='preview'>\n\n        </h2>\n    </div>";
}
