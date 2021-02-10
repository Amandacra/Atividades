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

	$("#submeter").click(function(){
		if($("#lembrete").is(":checked")){
			/*Vai funcionar somente dentro do if*/
			let email64 = btoa($("#email").val()); //criptografando para base64
			//gravando o valor criptografado na localStorage
			localStorage.setItem("email", email64); //chave e valor
		}else{
			if(localStorage.getItem("email")){
				//verifica se existe um localStorage email
				localStorage.removeItem("email");
				//localStorage.clear() - remove todos os dados da localStorage
			}
		}
	});

	getItemLocalStorage();
	/*Localstorage*/
	/*API web storage (HTML 5)
		Diferenças entre cookie e Localstorage
		1 - tamanho dos dados (cookies - 4kb; Localstorage - 5mb)
		2 - dados gravados em uma Localstorage não são transmitidos entre cliente e servidor a cada nova requisição do cliente
		3 - Não possuem tempo para expiração
	*/
});

function getItemLocalStorage(){

	//retorna a chave gravada na localStorage na primeira posição
	alert(localStorage.key(0));

	//se houver um número indeterminado de localStorage pode-se fazer um for
	/*for(let i = 0; i < localStorage.length; i++){
		let chave = localStorage.key(i);
		let valor = localStorage.getItem(chave);
		console.log("Chave: "+chave+" Valor: "+valor);
	}*/

	if(localStorage.getItem("email")){
		let email = atob(localStorage.getItem("email"));
		$("#email").val(email);
	}
}
