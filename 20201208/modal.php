<div class="modal fade" id="modalAlterar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"><?=$titulo;?></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <?php 
          if($nome_form=="pais"){
            pais();
          }else if($nome_form=="estado"){
            estado();
          }else if($nome_form=="cidade"){
            cidade();
          }else{
            usuario();
          }
        ?> 
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
        <button type="button" class="btn btn-primary salvar">Salvar</button>
      </div>
    </div>
  </div>
</div>

<script>
$(function(){
    $("input[name='trocar_senha']").change(function(){
        if($("input[name='trocar_senha']:checked").val()=='1'){
            $("#trocar_senha").fadeIn();
        }else{
            $("input[name='senha_cadastro']").val("");
            $("input[name='confirma_senha']").val("");
            $("#trocar_senha").fadeOut();
        }
    });
});
</script>