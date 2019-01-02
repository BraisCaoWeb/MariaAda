//Añadir los SVG a los items del menú
function addSVG() {
    var items = document.querySelectorAll("#menu-main-menu li a");
    items.forEach(function(element) {
        element.insertAdjacentHTML(
            "beforeend",
            '<svg class="svg-menu"><rect class="borde" width="100%" height="100%"></rect></svg>'
        );
    });
}

//Posicion aleatorio de los títulos de las secciones
var left = Math.floor(Math.random() * 20);
var degrees = Math.floor(Math.random() * (3 - -3 + 1) + -3);
var title = document.querySelector(".section__title");
if (title != null) {
    title.style.left = left + "%";
    title.style.transform = "rotate(" + degrees + "deg)";
}

addSVG();

//MOBILE NAV
function closeMenu() {
    document.querySelector(".site-header").style.transform =
        "translate(-100%, 0)";
    document.querySelector(".hamburger-menu").classList.toggle("open");
}

function openMenu() {
    document.querySelector(".site-header").style.transform = "translate(0%, 0)";
    document.querySelector(".hamburger-menu").classList.toggle("open");
}

document.addEventListener("DOMContentLoaded", function() {
    var menu = "close";
    document
        .querySelector(".hamburger-menu")
        .addEventListener("click", function() {
            if (menu === "close") {
                menu = "open";
                openMenu();
            } else {
                menu = "close";
                closeMenu();
            }
        });
    document.addEventListener("scroll", function() {
        if (menu === "open") {
            menu = "close";
            closeMenu();
        }
    });
    document.querySelectorAll(".main-content").forEach(element => {
        element.addEventListener("click", function() {
            if (menu === "open") {
                menu = "close";
                closeMenu();
            }
        });
    });
});
