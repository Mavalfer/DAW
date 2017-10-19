(function () {
    
    document.getElementById('myParagraph').lastElementChild.innerText = "Ya no estoy vacio";
    
    document.getElementById('ciao').remove();
    
    var parrafo = document.getElementById('myParagraph');
    
    parrafo.querySelector('span').classList.add('error');
    
    
    
}());