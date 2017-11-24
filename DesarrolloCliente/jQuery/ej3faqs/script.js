//(function() {
//    window.addEventListener('load', function() {
//        var faqs = document.getElementById("faqs");
//        var elementosH2 = faqs.getElementsByTagName("h2");
//        var nodoH2;
//        for (var i = 0; i < elementosH2.length; i++) {
//            nodoH2 = elementosH2[i];
//            nodoH2.addEventListener('click',cambiar);
//        }
//        document.getElementById("primer-link").focus();
//        function cambiar(e) {
//            e.preventDefault();
//            var h2 = e.currentTarget; // h2 es el nodoH2 actual
//            h2.classList.toggle("menos");
//            h2.classList.toggle("mas");
//            h2.nextElementSibling.classList.toggle("abierto");
//            h2.nextElementSibling.classList.toggle("cerrado");
//        }
//    });
//}());
$(function() {
    alert("asdasds");
    $('.section').find('#primer-link').focus();
    $('.section').find('h2').on('click', function(e) {
        e.preventDefault();
        $(this).toggleClass('menos');
        $(this).toggleClass('mas');
        $(this).next().toggle();
        $(this).next().toggle();
    });
});