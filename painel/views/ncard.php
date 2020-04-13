<?php if(!empty($naotempermissao)): ?>
  <script type="text/javascript">
    $(document).ready(function(){
      $('#naoTemPermissao').modal('show');
    });
  </script> 
<?php endif; ?>  

<script type="text/javascript">
    $(document).ready(function(){
      $('.m7').addClass('ativo');
    });
</script> 

   <style type="text/css">

    .container-fluid{margin-top: 100px;max-width: 1920px;}
    .caixapontuacao{}
    .caixapontuacao .titlePontu{font-size: 1.2em;}
    .tableDePontos{width: 200px;height: 150px;background: #26325c;font-size: 1.3em;text-align: center;padding-top: 50px;font-weight: bold;color: white;border-radius: 5px;}
    .tableDePontos:hover{cursor: pointer;background: #1c274e; }
    a:hover{text-decoration: none;}

     .modal-title{font-size: 2em;color: #999;padding-top: 30px;}

    .logoEmpresa{height: 120px;}
    .logoEmpresa img{height: 100%;}

    .areaCardContent{display: flex;justify-content: space-between;flex-wrap: nowrap;}
    .areacard01{width: 100%; padding: 10px; }
    .areacard01 img{width: 100%;}

    .listaClientesTrocarCard{width: 100%;height: auto;background: #ccc;position: relative;}
    .listaClientesTrocarCard li{background: transparent;padding:10px;list-style: none;display: flex;justify-content: space-between;}
    .listaClientesTrocarCard li:hover{background: #26325c;color: white;}

    .trocarCardButton{padding: 20px;font-size: 1.1em;}

    .senhaUserMostrarPontuacao1{display: none;}
    .senhaUserMostrarPontuacao2{display: none;}
    .senhaUserMostrarPontuacao3{display: none;}
    .senhaUserMostrarPontuacao4{display: none;}

    .buscar{background-image: url('<?php echo BASE_URL; ?>/assets/images/search.png');background-repeat:no-repeat;background-size:20px 20px;background-position:5px;padding-left: 28px;}

  </style>


    <script type="text/javascript">
      $(function(){

          $('.buscar').on('keyup', function(){

            var buscar = $(this).val();

            if(buscar != ''){
              $.ajax({
                  url:'<?php echo BASE_URL; ?>/painel/ajax/listClients',
                  type:'POST',
                  async: true,
                  data:{buscar:buscar},
                  dataType:'json',
                  success:function(json){
                    if(json != ''){
                      $('.listaClientesTrocarCard').html('<li style="cursor: pointer;" onClick="trocarcard(this)" data-id="'+json.id+'" data-card="'+json.codigo_cartao+'"  ><strong>'+json.nome+'</strong> <strong><i class="fa fa-credit-card"></i> <span class="ncardTrocar" >'+json.codigo_cartao+'</span></strong></li>');
                      $('.listaClientesTrocarCard').css('display','block');
                      $('.nCardNovo').removeAttr('readonly');
                    }else{
                      $('.listaClientesTrocarCard').html('<li><strong>ÚSUARIO NÃO ENCONTRADO</strong></li>');
                      $('.nCardNovo').attr('readonly');
                    }
                  }
              });
            }else{
              $('.listaClientesTrocarCard').css('display','none');
            }
          });

      });   

      
      function trocarcard(obj){

        $('.listaClientesTrocarCard').css('display','none');
        $('.buscar').val('');

        var id = obj.getAttribute('data-id');
        var card = obj.getAttribute('data-card');

        $('.nCardAntigo').val(card);
        $('.idPessoa').val(id);

        $('.nCardNovo').val('7678647');
        $('.nCardNovo').focus();

        $('.trocarCardButton').removeClass('disabled');

      }

    </script>   



<script type="text/javascript">
    $(function(){
        $('.confirmarAcaoRegister').on('click', function(){

        var senha = $('.senhauserTrocarCard').val();
        var card = $('.nCardNovo').val();

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
                    //enviar formulario
                    $('.senhaQuemAlterou').val(senha);
                    $('.enviarTrocaCard').submit();
                  }
                }
              });
          }else{
              $('.senhaUserMostrarPontuacao2').css('display', 'block');
          }
        


      });

      $('.senhauserTrocarCard').on('focus',function(){
        $('.senhaUserMostrarPontuacao1').css('display','none');
        $('.senhaUserMostrarPontuacao2').css('display','none');
      });

      $('.nCardNovo').on('focus',function(){
        $('.senhaUserMostrarPontuacao3').css('display','none');
        $('.senhaUserMostrarPontuacao4').css('display','none');
         $('.trocarCardButton').removeClass('disabled');
      });


      $('.trocarCardButton').on('click', function(){
          var card = $('.nCardNovo').val();

          if(card != ''){//7678647 123456

            if(card.length == 13){ 

                $.ajax({
                  url:'<?php echo BASE_URL; ?>/painel/ajax/conferecad',
                  type:'POST',
                  dataType:'json',
                  data:{card:card},
                  success:function(json){
                    if(json == false){
                        $('.senhaUserMostrarPontuacao4').css('display','block');
                        $('.trocarCardButton').addClass('disabled');
                    }else{
                        $('.trocarCardButton').removeClass('disabled');
                        $('#confimesenhauser').modal('show');
                    }
                  }
                });

            }else{
              $('.trocarCardButton').addClass('disabled');
              $('.senhaUserMostrarPontuacao3').css('display','block');
            }

          }
      }); 

  });    
</script>   


<!-- Modal -->
<div id="confimesenhauser" class="modal fade" role="dialog" data-backdrop="static" style="position: fixed;">
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
              <img src="<?php echo BASE_URL; ?>/assets/images/TEMPLATE/logo.png" border="0" alt="">
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

            <strong>SENHA: </strong> <div class="testee20"><input type="password" autocomplete="off" name="senhauserTrocarCard" class="form-control senhauserTrocarCard" required="required" ></div>
          </div>

          <div class="modal-footer">
            <center><button type="button" class="btn btn-success confirmarAcaoRegister" >CONFIRMAR </button><a href="<?php echo BASE_URL; ?>/painel/consult" class="btn btn-danger irAoInicio" style="font-size: 1em;" >CANCELAR </a></center>
          </div>

      </div>  

      </div>
    </div>

  </div>
</div>


<div class="container-fluid">
  <div>
    <img src="<?php echo BASE_URL; ?>/painel/assets/images/TEMPLATE/LogoBrasilComputadoresPNG2.png" border="0" alt="" class="logo" />
  </div>
  <div class="titulosite">
    <center><label >TROCAR NÚMERO <br> DO CARTÃO</label></center>
  </div>
  <br><br>
  <div class="caixapontuacao">
    <input type="text" name="" class="form-control buscar" placeholder="Buscar Cliente" >
    <div class="listaClientesTrocarCard">
    </div>
    <form method="POST"  class="enviarTrocaCard">
      <div class="areaCardContent">
        <div class="areacard01" >
          <img src="<?php echo BASE_URL; ?>/painel/assets/images/CartaofidelidadeVerso.png" border="0" alt="" /><br>
          <center><input type="text" name="nCardAntigo" class="form-control nCardAntigo" style="text-align: center;pointer-events: none;" readonly="readonly" /></center>
        </div>  
        <div class="areacard01" >
          <img src="<?php echo BASE_URL; ?>/painel/assets/images/CartaofidelidadeVerso.png" border="0" alt="" /><br>
          <center><input type="text" name="nCardNovo" class="form-control nCardNovo" readonly="readonly" style="text-align: center;" /></center>
        </div>
      </div>
      <input type="hidden" name="senhaQuemAlterou" class="senhaQuemAlterou" />
      <input type="hidden" name="idPessoa" class="idPessoa" /><br><br><br>
      <div class="alert alert-danger senhaUserMostrarPontuacao3">
          <strong>NÚMERO DO CARTÃO INCOMPLETO!</strong>
      </div>
      <div class="alert alert-danger senhaUserMostrarPontuacao4">
          <strong>ESSE CARTÃO JA FOI CADASTRADO!</strong>
      </div>
      <center><input type="button" class="btn btn-primary trocarCardButton disabled"  value="TROCAR CARTÃO" ></center>
    </form>  
    <br><br>
  </div>

<br><br>
</div>






























