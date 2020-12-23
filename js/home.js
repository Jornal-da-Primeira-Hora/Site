var $backgroundshadow = document.getElementById('backgroundshadow');
var $btnBack = document.querySelector('body div#backgroundshadow div#alertpanel a#btnBack');
var $editions = document.querySelectorAll('body div#content div#editions div.edition');
if (localStorage.getItem('newuser') == null) {
    $backgroundshadow.style.display = 'block';
}
function $btnBack_Click() {
    $backgroundshadow = document.getElementById('backgroundshadow');
    $backgroundshadow.style.display = 'none';
    localStorage.setItem('newuser', 'true');
}
$editions.forEach(function (element) {
    element.addEventListener('click', function (event) {
        var tmp = event.path[1].attributes[0].value;
        localStorage.setItem('tmpSelectedUrlEdition', tmp);
        window.location.href = './pages/viewedition.php';
    });
});
