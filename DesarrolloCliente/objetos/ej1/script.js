(function() {
    var array = new Array("Vaca", "Cerdo", "Pollo");
    console.log(array.ultimo());
    
    var array2 = ["Pollo", "Cerdo", "Vaca"];
    
    console.log(array2.ultimo()); 
    
    Array.prototype.ultimo = function() {
        return this[this.length - 1];
    }
    
    Array.prototype.primero = function() {
        return this[0];
    }

    console.log(array.primero());
    
    Array.prototype.limpia = function() {
        this.length = 0;
    }
    
    console.log(array2.limpia());
    
    var array3 = new Array();
    array3[0] = "cerdo";
    
})();