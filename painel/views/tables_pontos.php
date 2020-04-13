   <style type="text/css">

    .container-fluid{margin-top: 100px;}
    .caixapontuacao{}
    .caixapontuacao .titlePontu{font-size: 1.2em;}


  </style>


<?php if(!empty($naotempermissao)): ?>
  <script type="text/javascript">
    $(document).ready(function(){
      $('#naoTemPermissao').modal('show');
    });
  </script> 
<?php endif; ?>  

<script type="text/javascript">
    $(document).ready(function(){
      $('.m5').addClass('ativo');
    });
</script> 


  <script type="text/javascript">
    $(function(){
      $('.editProd').on('click', function(){
        var name = $(this).attr('data-name');
        var value = $(this).attr('data-value');
        var id = $(this).attr('data-id');

        $('.nameProdE').val(name);
        $('.valueProdE').val(value);
        $('.idE').val(id);

        $('.modaleditProd').modal('show');

      });
      $('.realmenteDel').on('click', function(){
        var id = $(this).attr('data-id');

        $('.idSelectCancell').val(id);

        $('#myModal2').modal('show');

      });
      $('.clickSimCancel').on('click', function(){
          var id =  $('.idSelectCancell').val();
          window.location.href="<?php echo BASE_URL; ?>/painel/tables/delitempontos/"+id;
      });
    });
  </script>

 


  <!-- Modal -->
  <div id="addProd" class="modal fade" role="dialog" data-backdrop="static">
    <div class="modal-dialog modal-md">

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <center><h4 class="modal-title">ADICIONAR PRODUTO</h4></center>
        </div>
        <form method="POST" >
          <div class="modal-body">
            <label>NOME DO PRODUTO: </label>
            <input type="text" name="nameProd" class="form-control nameProd" required="required" />
            <label style="margin-top: 15px;">QUANTOS PONTOS: </label>
            <input type="text" name="valueProd" class="form-control valueProd" required="required" />
          </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-primary" >ADICIONAR</button>
            <button type="button" class="btn btn-default" data-dismiss="modal">CANCELAR</button>
          </div>
        </form>
      </div>

    </div>
  </div>

    <!-- Modal -->
  <div id="editProd" class="modal fade modaleditProd" role="dialog" data-backdrop="static">
    <div class="modal-dialog modal-md">

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <center><h4 class="modal-title">EDITAR PRODUTO</h4></center>
        </div>
        <form method="POST" >
          <div class="modal-body">
            <label>NOME DO PRODUTO: </label>
            <input type="text" name="nameProdE" class="form-control nameProdE" required="required" />
            <label style="margin-top: 15px;">QUANTOS PONTOS: </label>
            <input type="text" name="valueProdE" class="form-control valueProdE" required="required" />
            <input type="hidden" name="idE" class="idE">
          </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-primary" >ATUALIZAR</button>
            <button type="button" class="btn btn-default" data-dismiss="modal">CANCELAR</button>
          </div>
        </form>
      </div>

    </div>
  </div>


  <!-- Modal -->
<div id="myModal2" class="modal fade" role="dialog" style="position: fixed;" data-backdrop="static">
  <div class="modal-dialog modal-sm">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" style="display: none;">&times;</button>
      </div>
      <div class="modal-body">
        <center>
          <i class="fa fa-exclamation-triangle" style="font-size: 5em;color: #FFC125;"></i><br>
          <p style="font-size: 1.3em;font-weight: bold;">TEM CERTEZA QUE DESEJA CANCELAR?</p><br><br>
          <input type="hidden" name="idSelectCancell"  class="idSelectCancell" >
          <a href="javascript:;" class="btn btn-success clickSimCancel" >SIM</a>
          <button class="btn btn-danger" data-dismiss="modal" >NÃO</button>
        </center> 
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal" style="display: none;">Close</button>
      </div>
    </div>

  </div>
</div>



<div class="container-fluid">
  <div>
    <img src="<?php echo BASE_URL; ?>/painel/assets/images/TEMPLATE/LogoBrasilComputadoresPNG2.png" border="0" alt="" class="logo" />
  </div>
  <div class="titulosite">
    <center><label >TABELAS PRODUTOS <br> PONTOS</label></center>
  </div>

  <div class="caixapontuacao">
    <label class="titlePontu"></label><br><br>

    <a data-toggle="modal" data-target="#addProd" class="btn btn-primary" >ADICIONAR PRODUTO</a><br><br>

      <table class="table table-bordered">
      <thead>
        <tr>
          <th>NOME PRODUTO</th>
          <th width="100" style="text-align: center;">QUANTOS PONTOS</th>
          <th width="210" style="text-align: center;">AÇÕES</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach($listProdu as $prods): ?>
          <tr>
            <td><?php echo $prods['name_prod']; ?></td>
            <td><center><?php echo str_replace(".", ",", $prods['value_ponto']); ?></center></td>
            <td>
              <center>
                <a href="javascript:;" class="btn btn-info editProd" data-name="<?php echo $prods['name_prod']; ?>" data-value="<?php echo str_replace(".", ",", $prods['value_ponto']); ?>" data-id="<?php echo $prods['id']; ?>" >EDITAR</a>
                <?php if($grupo == 1): ?>
                  <a style="cursor: pointer;" data-id="<?php echo $prods['id']; ?>" class="btn btn-danger realmenteDel" >EXCLUIR</a>
                <?php endif; ?>  
              </center>  
            </td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>

  </div>

<br><br>
</div>

<script type="text/javascript">
 $(document).ready(function(){

  //$('.birth').mask('00/00/0000');
  // $('.cpf').mask('000.000.000-00', {reverse: true});
  // $('.cep').mask('00000-000');   
  // $('.cell01').mask('(00) 00000-0000');
  // $('.cell02').mask('(00) 00000-0000');
  // $('.phone01').mask('(00) 0000-0000');
  // $('.phone02').mask('(00) 0000-0000');


  //$('.dateFundacion').mask('00/00/0000');
  // $('.cep2').mask('00000-000'); 
  // $('.cnpj').mask('00.000.000/0000-00', {reverse: true});
  // $('.cell01B').mask('(00) 00000-0000');
  // $('.cell02B').mask('(00) 00000-0000');
  // $('.phone01B').mask('(00) 0000-0000');
  // $('.phone02B').mask('(00) 0000-0000');
  
  // $('.time').mask('00:00:00');
  // $('.date_time').mask('00/00/0000 00:00:00');
  // $('.phone').mask('0000-0000');
  
  // $('.phone_us').mask('(000) 000-0000');
  // $('.mixed').mask('AAA 000-S0S');
  
  //$('.money').mask('000.000.000.000.000,00', {reverse: true});
  // $('.money2').mask("#.##0,00", {reverse: true});
  // $('.ip_address').mask('0ZZ.0ZZ.0ZZ.0ZZ', {
  //   translation: {
  //     'Z': {
  //       pattern: /[0-9]/, optional: true
  //     }
  //   }
  // });
  // $('.ip_address').mask('099.099.099.099');
  // $('.percent').mask('##0,00%', {reverse: true});
  // $('.clear-if-not-match').mask("00/00/0000", {clearIfNotMatch: true});
  // $('.placeholder').mask("00/00/0000", {placeholder: "__/__/____"});
  // $('.fallback').mask("00r00r0000", {
  //     translation: {
  //       'r': {
  //         pattern: /[\/]/,
  //         fallback: '/'
  //       },
  //       placeholder: "__/__/____"
  //     }
  //   });
  // $('.selectonfocus').mask("00/00/0000", {selectOnFocus: true});

});
</script>






























