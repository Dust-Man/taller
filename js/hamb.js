const hamb = document.querySelector("#hamb");
console.log(hamb);
const nav = document.querySelector("#nav");
console.log(nav);
hamb.addEventListener("click",menu);

function menu(){
    console.log("Clickeado");
    nav.classList.toggle("mostrar")

}