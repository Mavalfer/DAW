$(document).ready(function() {
	// añade span a algunos elementos
//	$(":text, #password, #verificar").after("<span>*</span>");
	$(":text, #password, #verificar").after(function() {
			var idError = this.id + 'Error';
			return "<span id =" + idError +'>' + '*' + "</span>";
	});
	// mueve el foco al primer campo de texto
	$("#email").focus();

	// pone la fecha actual en el campo input 'Fecha inicio'
	var hoy = new Date();
	var mes = hoy.getMonth() + 1; // Add 1 since mess start at 0
	var dia = hoy.getDate();
	var year = hoy.getFullYear();
	var dateText = ((mes < 10) ? "0" + mes : mes) + "/";
	dateText += ((dia < 10) ? "0" + dia : dia) + "/";
	dateText += year;
	$("#fecha").val(dateText);
	// Devuelve el spam correspondiente al mensaje de error
	var spamMensajeError = function (campo){
		var idSpamError = campo.attr('id')+'Error';
		return $('#'+idSpamError);
	}
	
	//________________________________________________________________ Funciones de validación
	var validarEmail = function (campo) {
		// validar el e-mail
		var isValid = true;
		var patronemail = /\b[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}\b/;
		var email = campo.val();
		//var spamError = campo.next("span[id$='Error']"); //siguiente elemento cuyo id acabe en 'Error'
		var spamError = spamMensajeError (campo);
		if (email == "") {
			spamError.text("Campo requerido.");
			isValid = false;
		}
		else if (!patronemail.test(email)) {
			spamError.text("Debe ser un e-mail válido.");
			isValid = false;
		}
		else {
			spamError.text("");
		}
		return isValid;
	}
	var validarLongi = function (campo, min) {
		var isValid = true;
		var valor = campo.val().trim();
		var spamError = spamMensajeError (campo);
		if (valor == "") {
			spamError.text("Campo requerido.");
			isValid = false;
		}
		else if (valor.length < min) {
			spamError.text('Al menos '+ min + ' caracteres');
			isValid = false;
		}
		else {
			spamError.text("");
		}
		return isValid;
	}
	var validarVerificar = function (campo1, campo2) {
		// validar la dos campos iguales
		var isValid=true;
		var spamError = spamMensajeError (campo2);
		if (campo2.val() == "") {
			spamError.text("Campo requerido.");
			isValid = false;
		}
		else if (campo2.val() !== campo1.val()) {
			spamError.text("Deben ser claves iguales.");
			isValid = false;
		}
		else {
			spamError.text("");
		}
		return isValid;
	}
	var validarCodPostal = function (campo){
	// validar código postal
		var isValid = true;
		var patronCodPostal = /^\d{5}$/;
		var zip = campo.val();
		var spamError = spamMensajeError (campo);
		if (zip == "") {
			spamError.text("Campo requerido.");
			isValid = false;
		}
		else if (!patronCodPostal.test(zip)) {
			spamError.text("cinco números");
			isValid = false;
		}
		else {
			campo.next().text("");
		}
		return isValid;
	}
	// manejador para el evento submit
	var validar = function(event) {
		var emailValido=validarEmail($("#email"));
		var passwordValida=validarLongi($('#password'), 6);
		var verificarValida=validarVerificar($('#password'),$("#verificar"));
		var nombreValido = validarLongi($("#nombre"), 1);
		var apellidosValido = validarLongi($("#apellidos"), 1);
		var provinciaValida = validarLongi($('#provincia'), 2);
		var CodPostalValido = validarCodPostal ($("#codPostal"));
		var telefonoValido = validarLongi ($("#telefono"), 9);
		var fechaValida = validarLongi ($("#fecha"));
		if (emailValido && passwordValida && verificarValida && nombreValido && apellidosValido && provinciaValida && CodPostalValido && telefonoValido && fechaValida){
		}
		else {
			event.preventDefault();
		}
	}
	$("#formInscripcion").on('submit',validar);
});
