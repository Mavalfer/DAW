//uso del parámetro Event
window.onload = inicio;

function posicion(x, y) {
    return ' (' + x + ', ' + y + ') '
}

function inicio() {
    document.getElementById("arriba").addEventListener("mouseover", manejadorOver);
    document.getElementById("arriba").addEventListener("mouseout", manejadorOut);
    document.getElementById("abajo").addEventListener("mouseover", manejadorOver);
    document.getElementById("abajo").addEventListener("mouseout", manejadorOut);
}
//cuando salimos de y vamos hacia
function manejadorOut(e) {
    miSpan = document.getElementById("mensajes");
    miSpan.textContent = miSpan.textContent + "  Salió de " + e.target.id + posicion(e.clientX, e.clientY) +
        " hacia " + e.relatedTarget.id + posicion(e.offsetX, e.offsetY); // En firefox no sse reconoce offset
}

//cuando entramos en  y venimos desde
function manejadorOver(event) {
    miSpan = document.getElementById("mensajes");
    miSpan.textContent = miSpan.textContent + "  Entró en " + event.target.id + posicion(event.clientX, event.clientY) +
        " desde " + event.relatedTarget.id + posicion(event.offsetX, event.offsetY);
}