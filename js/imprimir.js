const imprimir = document.querySelector("#btn-imprimir");
console.log(imprimir);
imprimir.addEventListener("click",imprimir_pagina);
const header = document.querySelector("#header")
console.log(header)
const footer = document.querySelector("#footer")
console.log(footer)

function imprimir_pagina(){
    header.classList.toggle("ocultar");
    footer.classList.toggle("ocultar");
    imprimir.classList.toggle("ocultar");
    window.print();
    header.classList.remove("ocultar");
    footer.classList.remove("ocultar");
    imprimir.classList.remove("ocultar");
}