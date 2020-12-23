const $txbSecurityKey = document.getElementById('txbSecurityKey')
const $btnAddNewElement = document.getElementById('btnAddNewElement')
let $txb = document.getElementsByClassName('txb')
let $preview = document.querySelectorAll('.preview')
const $alert_message_security_key = document.getElementById('alert-message-security-key')
const $cboContentType = document.getElementById('cboContentType')
const $section_content_article = document.querySelector('body section#content article');

reloadPreviews()
function reloadPreviews() {
    $txb = document.getElementsByClassName('txb')
    $preview = document.querySelectorAll('.preview')

    for (let x = 0; x < $txb.length; x++) {
        $txb[x].addEventListener('keydown', key => {
            $preview[x].innerText = $txb[x].value
        })
    }
}

$btnAddNewElement.addEventListener('click', () => {
    if ($txbSecurityKey.value == 'teste') {
        $alert_message_security_key.style.opacity = '0'

        switch($cboContentType.selectedOptions[0].innerText) {
            case 'Paragráfo':
                $section_content_article.innerHTML += createParagraph()
                break;
            case 'Imagem':
                $section_content_article.innerHTML += createImage()
                break;
            case 'Titulo primário normal':
                $section_content_article.innerHTML += createNormalH1()
                break;
            case 'Titulo primário negrito':
                $section_content_article.innerHTML += createBoldH1()
                break;
            case 'Titulo secundário normal':
                $section_content_article.innerHTML += createNormalH2()
                break;
            case 'Titulo secundário negrito':
                $section_content_article.innerHTML += createBoldH2()
                break;
        }
        reloadPreviews()
    }
    else { $alert_message_security_key.style.opacity = '1' }
})

function createParagraph() {
    return `
    <div class='p p-div'>
        <h2>Paragrafo</h2>

        <textarea cols='30' rows='10' class='txa' placeholder='Digite um paragráfo aqui'></textarea>
        <p class='preview'>

        </p>
    </div>`
}

function createImage() {
    return `
    <div class='img'>
        <h2>Imagem</h2>

        <input type='file' id='img' style='display: none;'/>
        <label for='img'>Open</label>
        <p id='imgLocation'></p>
    </div>`
}

function createNormalH1() {
    return `
    <div class='normal-h1'>
        <h2>Titulo primário normal</h2>

        <input type='text' class='txb' placeholder='Digite um titulo primário normal aqui'/>
        <h1 class='preview'>

        </h1>
    </div>`
}

function createBoldH1() {
    return `
    <div class='bold-h1'>
        <h2>Titulo primário negrito</h2>

        <input type='text' class='txb' placeholder='Digite um titulo primário negrito aqui'/>
        <h1 class='preview'>

        </h1>
    </div>`
}

function createNormalH2() {
    return `
    <div class='normal-h2'>
        <h2>Titulo secundário normal</h2>

        <input type='text' class='txb' placeholder='Digite um titulo secundário normal aqui'/>
        <h2 class='preview'>

        </h2>
    </div>`
}

function createBoldH2() {
    return `
    <div class='bold-h2'>
        <h2>Titulo secundário negrito</h2>

        <input type='text' class='txb' placeholder='Digite um titulo secundário negrito aqui'/>
        <h2 class='preview'>

        </h2>
    </div>`
}
