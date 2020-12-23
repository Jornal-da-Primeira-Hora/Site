const btnDropDownContent = document.getElementsByClassName('btn-click-open')
const svg = document.querySelectorAll('.btn-click-open svg')
const path = document.querySelectorAll('.btn-click-open svg path')
const abrir_click = document.getElementsByClassName('div-open')

for (let x = 0; x < btnDropDownContent.length; x++) {

    abrir_click[x].addEventListener('click', () => {

        if (document.getElementById('p-' + btnDropDownContent[x].id).style.display == 'block') {
            document.getElementById('p-' + btnDropDownContent[x].id).style.display = 'none'

            svg[x].style.transform = 'rotate(0deg)'
            path[x].style.fill = 'var(--first-color)'
        }
        else if (document.getElementById('p-' + btnDropDownContent[x].id).style.display = 'none') {
            document.getElementById('p-' + btnDropDownContent[x].id).style.display = 'block'

            svg[x].style.transform = 'rotate(-180deg)'
            path[x].style.fill = 'var(--first-color-focused)'
        }

    })

    btnDropDownContent[x].addEventListener('click', () => {

        if (document.getElementById('p-' + btnDropDownContent[x].id).style.display == 'block') {
            document.getElementById('p-' + btnDropDownContent[x].id).style.display = 'none'

            svg[x].style.transform = 'rotate(0deg)'
            path[x].style.fill = 'var(--first-color)'
        }
        else if (document.getElementById('p-' + btnDropDownContent[x].id).style.display = 'none') {
            document.getElementById('p-' + btnDropDownContent[x].id).style.display = 'block'

            svg[x].style.transform = 'rotate(-180deg)'
            path[x].style.fill = 'var(--first-color-focused)'
        }

    })

}
