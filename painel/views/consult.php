<?php if(!empty($naotempermissao)): ?>
  <script type="text/javascript">
    $(document).ready(function(){
      $('#naoTemPermissao').modal('show');
    });
  </script> 
<?php endif; ?>  

<script type="text/javascript">
    $(document).ready(function(){
      $('.m3').addClass('ativo');
    });
</script> 

   <style type="text/css">

    .container-fluid{margin-top: 100px;}

    .caixapontuacao{}
    .caixapontuacao .titlePontu{font-size: 1.2em;}

    .clickSelection{width: 100%;margin:auto;margin-top: 50px;margin-bottom: 20px;display: none;}
    .clickSelection label{font-size: 1em;}
    .clickSelection input{width: 80px;margin-right: 10px;}
    .clickSelection button{margin-left: 10px;}
    .campolitros,.passerrado{display: none;}
    .clickSelectionTitulo{float: left;margin-top: 5px;margin-right: 10px;}
    .nlitros{float: left;}

    .areaPontoss{display: flex;}
    .seis_prime_nume{width: 49%;margin-right: 10px;}
    .seis_ulti_nume{width: 49%;}

    .modal-title{font-size: 2em;color: #999;padding-top: 30px;}

    .logoEmpresa{height: 120px;}
    .logoEmpresa img{height: 100%;}

    .senhaUserAddPonto{display: none;}  

    .nameUserConsultePonto{font-size: 2em;}
    .totalPontosClients{font-size: 1.3em;}
    .pontTotalConsultePontos{font-size: 2.5em;background: blue;padding:30px;border-radius: 100%;color: white;}
    .irAoInicio{font-size: 1.3em;}
    .nameUltimoAtendent{}

    .div_phonesss{display: flex;}
    .div_phonesss div{width: 50%;}
    .div_phonesss .fone01{margin-right: 10px;}

    .parteEndereco{display: flex;flex-wrap: wrap;}
    .form-group{width: 49%;}
    .form-group2{margin-right: 10px;}
    .contener_form-group{display: flex;}
    .divCep{width: 350px;}
    .search{width: 35px;height: 35px;margin-top: 25px;margin-left: 5px;padding: 5px;}
    .search img{width: 100%;height: 100%;}

    .senhaUserMostrarPontuacao1{display: none;}
    .senhaUserMostrarPontuacao2{display: none;}

    .areaCode{display: flex;}
    .areaCodeDivs{width: 49%;}
    .areaCodeDivs{margin-right: 10px;}

    .titulosite{position: absolute;top:130px;left: 25%;}
      .titulosite label{font-size: 2.5em;margin-top: 50px;}


    @media all and (min-width: 640px){
      .titulosite{position: absolute;top:130px;left: 25%;}
      .titulosite label{font-size: 2.5em;margin-top: 50px;}
    }

    @media all and (min-width: 768px){
      .titulosite{position: absolute;top:130px;left: 28%;}
      .titulosite label{font-size: 2.5em;margin-top: 50px;}
    }

    @media all and (min-width: 800px){
      .titulosite{position: absolute;top:130px;left: 28%;}
      .titulosite label{font-size: 2.5em;margin-top: 50px;}
    }

    @media all and (min-width: 960px){
      .titulosite{position: absolute;top:130px;left: 33%;}
      .titulosite label{font-size: 2.5em;margin-top: 50px;}
    }

    @media all and (min-width: 1024px){
      .titulosite{position: absolute;top:130px;left: 35%;}
      .titulosite label{font-size: 2.5em;margin-top: 50px;}
    }

    @media all and (min-width: 1280px){
      .titulosite{position: absolute;top:130px;left: 37%;}
      .titulosite label{font-size: 2.5em;margin-top: 50px;}
    }

    @media all and (min-width: 1366px){
      .titulosite{position: absolute;top:130px;left: 38%;}
      .titulosite label{font-size: 2.5em;margin-top: 50px;}
    }

    @media all and (min-width: 1680px){
      .titulosite{position: absolute;top:130px;left: 40%;}
      .titulosite label{font-size: 2.5em;margin-top: 50px;}
    }

    @media all and (min-width: 1920px){

      .titulosite{position: absolute;top:130px;left: 42%;}
      .titulosite label{font-size: 2.5em;margin-top: 50px;}

    }

    .buscar{background-image: url('<?php echo BASE_URL; ?>/assets/images/search.png');background-repeat:no-repeat;background-size:20px 20px;background-position:5px;padding-left: 28px;}

  </style>

  <script type="text/javascript">
      $(function(){

          $('.buscar').on('keyup', function(){

            var buscar = $(this).val();

            $.ajax({
                url:'<?php echo BASE_URL; ?>/painel/ajax/listClients',
                type:'POST',
                async: true,
                data:{buscar:buscar},
                dataType:'json',
                success:function(json){
                  if(json != ''){
                    $('.resultProcura').html('<tr><td>'+json.nome+'</td><td>'+json.cpf+'</td><td>'+json.codigo_cartao+'</td><td><center> <a href="javascript:;" class="btn btn-info " onClick="verPontuacao(this)" data-cpf="'+json.cpf+'" >VER PONTUAÇÃO</a><br><br><a href="<?php echo BASE_URL; ?>/painel/consult/edit/'+json.id+'" class="btn btn-primary" style="margin-right:5px;" >EDITAR</a></tr>');
                  }else{
                    $('.resultProcura').html('<td style="height:40px;" colspan="4"><center><strong>Úsuario não encontrado</strong></center></td>');
                  }
                }
            });

          });

          //<a href="<?php echo BASE_URL; ?>/painel/consult/del/'+json.id+'" class="btn btn-danger" >DELETAR</a></center></td>
          
          //           $('.buscar').on('blur', function(){

          //   var buscar = $(this).val();

          //   if(buscar == ''){

          //     var buscar = '1';

          //     $.ajax({
          //         url:'<?php echo BASE_URL; ?>/painel/ajax/listClients2',
          //         type:'POST',
          //         async: true,
          //         data:{buscar:buscar},
          //         dataType:'json',
          //         success:function(json){
          //           $('.resultProcura').html('');
          //           for(var i in json){
          //             $('.resultProcura').append('<tr><td>'+json[i].nome+'</td><td>'+json[i].cpf+'</td><td>'+json[i].codigo_cartao+'</td><td><center> <a href="javascript:;" class="btn btn-info " onClick="verPontuacao(this)" data-cpf="'+json[i].cpf+'" >VER PONTUAÇÃO</a><br><br><a href="<?php echo BASE_URL; ?>/painel/consult/edit/'+json[i].id+'" class="btn btn-primary" style="margin-right:5px;" >EDITAR</a></center></td></tr>'); 
          //           }
          //         }
          //     });

          //   }

          // });

          // <a href="<?php echo BASE_URL; ?>/painel/consult/del/'+json[i].id+'" class="btn btn-danger" >DELETAR</a>


          $('.delUser').on('click', function(){
              var id = $(this).attr('data-id');

              $('.idSelectDel').val(id);

              $('#myModal2').modal('show');
          });
           
          
          $('.clickSimDel').on('click', function(){
              var id = $('.clickSimDel').val();
              window.location.href = "<?php echo BASE_URL; ?>/painel/consult/del/"+id;
          });


          $('.verpontuacaouser').on('click', function(){

            $('#myModalConsultePontuacao').modal('show');

          });
           

        });   
</script>

<script type="text/javascript">

  function verPontuacao(obj){

    var cpf = obj.getAttribute('data-cpf');

    $('.cpfSelect').val(cpf);

    $('#myModalConsultePontuacao').modal('show');

  }

</script>


<script type="text/javascript">
  $(function(){
      $('.confirmarAcaoRegister').on('click', function(){

      var senha = $('.senhauserRegisterEdit').val();
      var cpf = $('.cpfSelect').val();

      if(senha != ''){
          $.ajax({
            url:'<?php echo BASE_URL; ?>/painel/ajax/confirmesenhaRegister',
            type:'POST',
            dataType:'json',
            data:{senha:senha},
            success:function(json){
              if(json == 2){
                $('.senhaUserMostrarPontuacao1').css('display','block');
              }else{
                 $('#myModalConsultePontuacao').modal('hide');
                
                 //MOSTRAR PONTUAÇÃO

                  $.ajax({
                      url:'<?php echo BASE_URL; ?>/painel/ajax/pontos',
                      type:'POST',
                      dataType:'json',
                      data:{cpf:cpf},
                      success:function(json){
                        $('.nameUserConsultePonto').html(json.nome);
                        $('.pontTotalConsultePontos').html(json.pontos);
                        $('.nameUltimoAtendenteConslPont').html(json.nameatendente);
                      }
                    }); 

                  $('#pontuacaouserver').modal('show');

              }
            }
          });
      }else{
          $('.senhaUserMostrarPontuacao2').css('display', 'block');
      }

    });

    $('.senhauserRegisterEdit').on('focus',function(){
      $('.senhaUserMostrarPontuacao1').css('display','none');
      $('.senhaUserMostrarPontuacao2').css('display','none');
    });
});    
</script>


<!-- Modal -->
<div id="myModalConsultePontuacao" class="modal fade" role="dialog" data-backdrop="static" style="position: fixed;">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" style="display: none;">&times;</button>
        <div class="modal-title"><center><p>CONFIRME SUA SENHA</p></center></div>
      </div>
      <div class="modal-body">

        <div class="divApresResgate">

          <center>
            <div class="logoEmpresa">
              <img src="<?php echo BASE_URL; ?>/painel/assets/images/TEMPLATE/LogoBrasilComputadoresPNG2.png" border="0" alt="">
            </div>
        </center>   
        <br>
          <hr/>
          <div class="infoUser">
              <div class="alert alert-danger senhaUserMostrarPontuacao1">
                <strong>SENHA INCORRETA!</strong>
              </div>
              <div class="alert alert-danger senhaUserMostrarPontuacao2">
                <strong>VOCÊ PRECISA PREENCHER SUA SENHA!</strong>
              </div>

               <script type="text/javascript">
                $(document).ready(function(){
                    $('.testee2').html('<input type="password" autocomplete="off" name="senhauserRegisterEdit" class="form-control senhauserRegisterEdit" required="required" >');
                });
              </script>

            <strong>SENHA: (123)</strong> <div class="testee2"></div>
          </div>
          <div class="modal-footer">
            <center><button type="button" class="btn btn-success confirmarAcaoRegister" >CONFIRMAR </button><a href="<?php echo BASE_URL; ?>/painel/consult" class="btn btn-danger irAoInicio" style="font-size: 1em;" >CANCELAR </a></center>
          </div>

      </div>  

      </div>
    </div>

  </div>
</div>

<!-- Modal -->
<div id="pontuacaouserver" class="modal fade" role="dialog" data-backdrop="static" style="position: fixed;">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" style="display: none;">&times;</button>
        <div class="modal-title"><center><p>PONTUAÇÃO</p></center></div>
      </div>
      <div class="modal-body">

        <div class="divApresResgate">

          <center>
            <div class="logoEmpresa">
              <img src="<?php echo BASE_URL; ?>/painel/assets/images/TEMPLATE/LogoBrasilComputadoresPNG2.png" border="0" alt="">
            </div>
        </center>   
        <br>

          <hr/>
          <div class="infoUser">
            <center><label class="nameUserConsultePonto"><!--  Ricardo Augusto de Aguiar Alves  --></label> <br>
            <strong class="topcs totalPontosClients">Total de Pontos:</strong> <br><br><br> 
            <strong class="topcs pontTotalConsultePontos"><!-- 999.999 --></strong><br><br><br>
            <strong class="topcs nameUltimoAtendent">Último Atendente: <span class="nameUltimoAtendenteConslPont"><!-- Ricardo Augusto de Aguiar Alves --></span></strong> <br>
              </center>
            <br><br>
            

          </div>
          <div class="modal-footer">
            <center><a href="<?php echo BASE_URL; ?>/painel/consult" class="btn btn-success irAoInicio" >FECHAR </a></center>
          </div>

      </div>  

      </div>
    </div>

  </div>
</div>

<br><br>

<!-- Modal -->
<div id="myModal2" class="modal fade" role="dialog" style="position: fixed;z-index: 99999;" data-backdrop="static">
  <div class="modal-dialog modal-sm">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" style="display: none;">&times;</button>
      </div>
      <div class="modal-body">
        <center>
          <i class="fa fa-exclamation-triangle" style="font-size: 5em;color: #FFC125;"></i><br>
          <p style="font-size: 1.3em;font-weight: bold;">TEM CERTEZA QUE DESEJA EXCLUIR?</p><br><br>
          <input type="hidden" name="idSelectDel"  class="idSelectDel" >
          <a href="javascript:;" class="btn btn-success clickSimDel" >SIM</a>
          <button class="btn btn-danger" data-dismiss="modal" >NÃO</button>
        </center> 
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal" style="display: none;">Close</button>
      </div>
    </div>

  </div>
</div>

<!-- Modal -->
<div id="buscacep" class="modal fade" role="dialog" data-backdrop="static">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <center><h4 class="modal-title">ENCONTRE SEU CEP</h4></center>
      </div>
      <div class="modal-body">
        <form class="nada" >
         <label>Escolha Estado:</label><br>
         <select name="state_address" class="form-control state_address" required="required"  >
                  <option value="" selected="selected">Estado</option>
                  <option value="AC">AC</option>
                  <option value="AL">AL</option>
                  <option value="AM">AM</option>
                  <option value="AP">AP</option>
                  <option value="BA">BA</option>
                  <option value="CE">CE</option>
                  <option value="DF">DF</option>
                  <option value="ES">ES</option>
                  <option value="GO">GO</option>
                  <option value="MA">MA</option>
                  <option value="MG">MG</option>
                  <option value="MS">MS</option>
                  <option value="MT">MT</option>
                  <option value="PA">PA</option>
                  <option value="PB">PB</option>
                  <option value="PE">PE</option>
                  <option value="PI">PI</option>
                  <option value="PR">PR</option>
                  <option value="RJ">RJ</option>
                  <option value="RN">RN</option>
                  <option value="RS">RS</option>
                  <option value="RO">RO</option>
                  <option value="RR">RR</option>
                  <option value="SC">SC</option>
                  <option value="SE">SE</option>
                  <option value="SP">SP</option>
                  <option value="TO">TO</option>
          </select><br>

          <label>Cidade:</label>
          <select name="cidades1" class="form-control cidades1" required="required" disabled="disabled"  >
              
          </select><br>

          <label style="margin-bottom: 0px;">Nome da Rua:</label>
          <input type="text" name="nome_rua" placeholder="SOMENTE O NOME DA RUA" class="nome_rua" style="border:1px solid #ccc;border-radius: 3px;width: 100%;padding: 5px;"  />

          <input type="button" name=""  class="btn btn-primary btn_busccep" value="Buscar Cep" style="margin-top: 10px;padding: 3px;">
        </form>  
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">SAIR</button>
      </div>
    </div>

  </div>
</div>

<div class="container-fluid">
  <div>
    <img src="<?php echo BASE_URL; ?>/painel/assets/images/TEMPLATE/LogoBrasilComputadoresPNG2.png" border="0" alt="" class="logo" />
  </div>
  <div class="titulosite">
    <center><label >LISTA DE CLIENTES</label></center>
  </div><br><br>

  <div class="caixapontuacao">
    <label class="titlePontu"></label><br><br>

  <table class="table table-bordered">
    <thead>
      <tr>
        <th>NOME</th>
        <th>CPF</th>
        <th>CÓDIGO CARTÃO</th>
        <th style="text-align: center;" width="150" >AÇÕES</th>
      </tr>
    </thead>
    <tbody class="resultProcura">
      <input type="text" name="buscar" class="form-control buscar" placeholder="Buscar por CPF " onkeydown="javascript: fMasc( this, mCPF );" >
     <!--  <?php foreach($listClients as $list): ?>
        <tr>
          <td><?php echo $list['nome']; ?></td>
          <td><?php echo $list['cpf']; ?></td>
          <td><?php echo $list['codigo_cartao']; ?></td>
          <td>
            <center>
              <a href="javascript:;" class="btn btn-info verpontuacaouser" >VER PONTUAÇÃO</a>
              <a href="<?php echo BASE_URL; ?>/painel/consult/edit/<?php echo $list['id']; ?>" class="btn btn-primary" >EDITAR</a>
              <a href="javascript:;" class="btn btn-danger delUser" data-id="<?php echo $list['id']; ?>" >DELETAR</a>
            </center>  
          </td>
        </tr>
      <?php endforeach; ?> -->
    </tbody>
    <input type="hidden" name="cpfSelect" class="cpfSelect" />
  </table>

  </div>

<br><br>
</div>

<script type="text/javascript">
      function fMasc(objeto,mascara) {
        obj=objeto
        masc=mascara
        setTimeout("fMascEx()",1)
      }
      function fMascEx() {
        obj.value=masc(obj.value)
      }
      function mCPF(cpf){
        cpf=cpf.replace(/\D/g,"")
        cpf=cpf.replace(/(\d{3})(\d)/,"$1.$2")
        cpf=cpf.replace(/(\d{3})(\d)/,"$1.$2")
        cpf=cpf.replace(/(\d{3})(\d{1,2})$/,"$1-$2")
        return cpf
      }
     
    </script>





















