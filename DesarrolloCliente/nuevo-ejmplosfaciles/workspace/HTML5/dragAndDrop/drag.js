(function () {
    function allowDrop(ev) {
        ev.preventDefault();
    }

    function drag(ev) {
        ev.dataTransfer.setData("text", 'drop1');
    }

    function drop(ev) {
        ev.preventDefault();
        var data = ev.dataTransfer.getData("text");
        ev.target.appendChild(document.getElementById(data));
    }
    var origen = document.getElementById('drag1');
    origen.addEventListener('dragstart', drag, true);
    var destino = document.getElementById("destino");
    destino.addEventListener('drop', drop, true);
    destino.addEventListener('dragover', allowDrop,true);
   
})();
