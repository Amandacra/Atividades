<div class="modal fade" id="modal_login" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Login</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form name='login' method="post" action="autenticacao.php">
      <div class="modal-body">
        <input type='text' name='email' placeholder='Email...' class="form-control">
        <input type='password' name='senha' placeholder='Senha...' class="form-control">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
        <button type="button" class="btn btn-primary autenticar">Salvar</button>
      </div>
      </form>
      <div>
        Ainda não é cadastrado? <a href='#' class='link_bg_claro'> Cadastrar</a>
        </div>
    </div>
  </div>
</div>

<script>
    $(function(){
        $(".autenticar").click(function(){
            var senha_md5 = $.md5($("input[name='senha']").val());
            $("input[name='senha']").val(senha_md5);
            $("form[name='login']").submit();
        });
    });
</script>