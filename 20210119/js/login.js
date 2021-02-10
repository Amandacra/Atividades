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

	$("#f1").submit(function(evento) {
		var senha= $("input[name='senha']").val();
    senha = $.md5(senha);
    $("input[name='senha']").val(senha);

		evento.preventDefault(); //cancela o evento de submissão

		var dados = {"email":$("#email").val(),
								"senha":$("#senha").val(),
								"lembrete":$("#lembrete").is(":checked")?$("#lembrete").val():""
								};

		$.post("autenticacao.php",dados,function(retorno){
			var resultado = JSON.parse(retorno);

			if(resultado.codigo == 1){
				window.location.href = "index.php";
			}else{
				$("#erro").html(resultado.mensagem);
				$("input[name='submeter']").val("Login");
			}

		});
		$("input[name='submeter']").val("Logando...");
	});

	$(window).click(function(event) {
		/*
		var target = event.target;
		if (target.className=="modal") {
			$(".modal").css("display", "none");
		}*/
		var target = $(event.target);
		if(target.is($(".modal"))) {
			$(".modal").css("display", "none");
		}
	});

});
