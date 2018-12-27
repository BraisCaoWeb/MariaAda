//Añadir los SVG a los items del menú
function addSVG() {
    var items = document.querySelectorAll("#menu-main-menu li a");
    items.forEach(function(element) {
        element.insertAdjacentHTML(
            "beforeend",
            '<svg><rect class="borde" width="100%" height="100%"></rect></svg>'
        );
    });
}

//Posicion aleatorio de los títulos de las secciones
var left = Math.floor(Math.random() * 30 + 20);
var degrees = Math.floor(Math.random() * (3 - -3 + 1) + -3);
var title = document.querySelector(".section__title");
if (title != null) {
    title.style.left = left + "%";
    title.style.transform = "rotate(" + degrees + "deg)";
}

addSVG();
