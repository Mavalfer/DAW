var  persona = {
    nombre: "Juan",
    apellido: "Sierra",
    edad: 25
}; 
var  texto =  "";
var  x;
for  (x  in  persona) { //Itera sobre los nombres de las propiedades del objeto
    texto += persona[x];
    alert("x vale: " + x);
}
alert("texto vale: " + texto);

var sum = 0;
var obj = {
    prop1: 5,
    prop2: 13,
    prop3: 8
};
for (item in obj) {
    sum += obj[item];
}
alert(sum); // imprime "26", que es 5+13+8