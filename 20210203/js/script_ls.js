$(function() {

	$(".modalbtn").click(function() {
        $(".modal").css("display", "block");
    });

	$(".close").click(function() {
        $(".modal").css("display", "none");
    });

	$(".cancelbtn").click(function() {
        $(".modal").css("display", "none");
    });

	$(window).click(function(event) {
		//var target = event.target;
		//if (target.className=="modal") {
			//$(".modal").css("display", "none");
		//}
		var target = $(event.target);
		if(target.is($(".modal"))) {
			$(".modal").css("display", "none");
		}
	});

	$("#submeter").click(function() {
		if($("#lembrete").is(":checked")) {
			let email64 = btoa($("#email").val()); //criptografando para base64

			//Objeto é um conjunto de dados que pertencem a um tipo, no caso ao tipo usuario
			let usuario = {"email":email64, "data":Date.now()};
			localStorage.setItem("usuario", JSON.stringify(usuario));
			//convertendo para string
			//localStorage.setItem("email", email64); //chave e valor
			//localStorage.setItem("data", Date.now());
			//instante de tempo atual em milissegundos desde 01/01/1970
		}
		else {
			if(localStorage.getItem("usuario")) {
				localStorage.removeItem("usuario");
				//localStorage.clear(); //remove todos os itens da localStorage
			}
		}
	});

	getItemLocalStorage();

	/*localStorage*/
	/*Web Storage (HTML5)*/
	/*
	1- Tamanho dos dados
	(cookies -> 4kb; localStorage -> 5mb)
	2- Dados gravados em uma localStorage não são transmitidos entre cliente e servidor a
	cada nova requisição do cliente
	3- Não possuem tempo para expiração
	*/
});

function getItemLocalStorage() {
	//percorrendo todos os itens da localStorage
	/*
	for(let i = 0; i < localStorage.length; i++) {
		let chave = localStorage.key(i);
		let valor = localStorage.getItem(chave);
		console.log("Chave: "+chave+" Valor:"+valor);
	}
	*/

	if(localStorage.getItem("usuario")) {
		let usuario = JSON.parse(localStorage.getItem("usuario"));
		//convertendo para objeto

		let email = atob(usuario.email); //obtém o valor do endereço de e-mail
		let data = usuario.data; //instante de tempo em milissegundos
		$("#email").val(email);
		let r_pagina = Date.now();

		if((r_pagina-data)>=172800000){
			localStorage.removeItem("usuario");
		}
		
	}
}
