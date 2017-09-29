window.onload=inicio;
function inicio(){
    
	var linda = { 
		name: "Linda", // Las propiedades se separan por comas
		weight: 40, 
		breed: "mezcla",
		loves: ["pasear", "las bolas"],
		bark: function() {
			alert("Woof woof!")
		},
        nombrar: miNombre
	}
	alert('La perrilla se llama :'+linda.nombrar());
}
function miNombre(){
        return this.name;
}

