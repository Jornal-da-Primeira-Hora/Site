var $editions = document.querySelectorAll('body div#content div#editions div.edition');
$editions.forEach(function (element) {
    element.addEventListener('click', function (event) {
        var tmp = event.path[1].attributes[0].value;
        localStorage.setItem('tmpSelectedUrlEdition', tmp);
        window.location.href = '../pages/viewedition.html';
    });
});
