const $editions = document.querySelectorAll('body div#content div#editions div.edition')

$editions.forEach(element => {
    element.addEventListener('click', event => {
        let tmp = event.path[1].attributes[0].value

        localStorage.setItem('tmpSelectedUrlEdition', tmp)
        window.location.href = '../pages/viewedition.html'
    })
})
