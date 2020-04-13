<?php if(!empty($naotempermissao)): ?>
  <script type="text/javascript">
    $(document).ready(function(){
      $('#naoTemPermissao').modal('show');
    });
  </script> 
<?php endif; ?>  

<script type="text/javascript">
    $(document).ready(function(){
      $('.m4').addClass('ativo');
      //$('#myModalPremiacao').modal();
    });
</script> 

   <style type="text/css">

    .container-fluid{margin-top: 100px;max-width: 1920px;}
    .logo{width: 11%;margin:20px;}
    .titulosite{position: absolute;top:100px;left: 44%;}
    .titulosite label{font-size: 2.5em;margin-top: 50px;}
    .linhaLinha{border: 1px solid #26325c;}

    .caixapontuacao{display: flex;}
    .caixapontuacao .titlePontu{font-size: 1.2em;}
    .tableDePontos{width: 200px;height: 150px;background: #26325c;font-size: 1.3em;text-align: center;padding-top: 50px;font-weight: bold;color: white;border-radius: 5px;margin-left: 10px;}
    .tableDePontos:hover{cursor: pointer;background: #1c274e; }
    a:hover{text-decoration: none;}


    .listaProdutos{display: flex;justify-content: left;flex-wrap: wrap;}
    .areaProduct{width: 250px;min-height: 220px;background: #26325c;padding:10px;border-radius: 5px;color: white;text-align: center;margin-right: 10px;margin-bottom: 10px;}
    .areaProductImg{width: 100px;height: 100px;}
    .resgatarBtn{margin-top: 10px;}


    .modal-title{font-size: 2em;color: #999;padding-top: 30px;}
    .logoEmpresa{height: 120px;}
    .logoEmpresa img{height: 100%;}
    

    .listaProdutosModal{display: flex;justify-content: center;flex-wrap: wrap;}
    .areaProductModal{width: 220px;min-height: 220px;background: #26325c;padding:10px;border-radius: 5px;color: white;text-align: center;margin-right: 10px;margin-bottom: 10px;}
    .areaProductImgModal{width: 100px;height: 100px;}


        .senhaUserAddPonto{display: none;}  
    .senhaUserAddPonto2{display: none;}
    .senhaUserAddPonto3{display: none;}
    .senhaUserAddPonto4{display: none;}
    .senhaUserAddPonto5{display: none;}
    .senhaUserAddPonto6{display: none;}


    .cpfSelect{border:3px solid rgba(0,0,0, .5);}
    .cpfSelect:hover{border:3px solid rgba(0,0,0, .5);}
    .cardModalDiv{display: none;}

    .numeroGeradoResgate{font-size: 2em;}
    .numeroDePontos{font-size: 2em;}


        /*EXCLUIR MODAL*/
    .fa-exclamation-triangle{color: #FFB90F; font-size: 4em;margin-bottom: -15px;}
    .atencion{font-size: 2em;}
    .titleExcluir{text-align: center;font-size: 1.2em;margin-top: 10px;}


    @media all and (min-width: 640px){
      .titulosite{position: absolute;top:100px;left: 25%;}
      .titulosite label{font-size: 2.5em;margin-top: 50px;}
    }

    @media all and (min-width: 768px){
      .titulosite{position: absolute;top:100px;left: 28%;}
      .titulosite label{font-size: 2.5em;margin-top: 50px;}
    }

    @media all and (min-width: 800px){
      .titulosite{position: absolute;top:100px;left: 28%;}
      .titulosite label{font-size: 2.5em;margin-top: 50px;}
    }

    @media all and (min-width: 960px){
      .titulosite{position: absolute;top:100px;left: 33%;}
      .titulosite label{font-size: 2.5em;margin-top: 50px;}
    }

    @media all and (min-width: 1024px){
      .titulosite{position: absolute;top:100px;left: 35%;}
      .titulosite label{font-size: 2.5em;margin-top: 50px;}
    }

    @media all and (min-width: 1280px){
      .titulosite{position: absolute;top:100px;left: 37%;}
      .titulosite label{font-size: 2.5em;margin-top: 50px;}
    }

    @media all and (min-width: 1366px){
      .titulosite{position: absolute;top:100px;left: 38%;}
      .titulosite label{font-size: 2.5em;margin-top: 50px;}
    }

    @media all and (min-width: 1680px){
      .titulosite{position: absolute;top:100px;left: 40%;}
      .titulosite label{font-size: 2.5em;margin-top: 50px;}
    }

    @media all and (min-width: 1920px){

      .titulosite{position: absolute;top:100px;left: 41%;}
      .titulosite label{font-size: 2.5em;margin-top: 50px;}

    }

  </style>

  <script type="text/javascript">
      function fMasc(objeto,mascara) {
        obj=objeto
        masc=mascara
        setTimeout("fMascEx()",1)
      }
      function fMascEx() {
        obj.value=masc(obj.value)
      }
      function mTel(tel) {
        tel=tel.replace(/\D/g,"")
        tel=tel.replace(/^(\d)/,"($1")
        tel=tel.replace(/(.{3})(\d)/,"$1)$2")
        if(tel.length == 9) {
          tel=tel.replace(/(.{1})$/,"-$1")
        } else if (tel.length == 10) {
          tel=tel.replace(/(.{2})$/,"-$1")
        } else if (tel.length == 11) {
          tel=tel.replace(/(.{3})$/,"-$1")
        } else if (tel.length == 12) {
          tel=tel.replace(/(.{4})$/,"-$1")
        } else if (tel.length > 12) {
          tel=tel.replace(/(.{4})$/,"-$1")
        }
        return tel;
      }
      function mCNPJ(cnpj){
        cnpj=cnpj.replace(/\D/g,"")
        cnpj=cnpj.replace(/^(\d{2})(\d)/,"$1.$2")
        cnpj=cnpj.replace(/^(\d{2})\.(\d{3})(\d)/,"$1.$2.$3")
        cnpj=cnpj.replace(/\.(\d{3})(\d)/,".$1/$2")
        cnpj=cnpj.replace(/(\d{4})(\d)/,"$1-$2")
        return cnpj
      }
      function mCPF(cpf){
        cpf=cpf.replace(/\D/g,"")
        cpf=cpf.replace(/(\d{3})(\d)/,"$1.$2")
        cpf=cpf.replace(/(\d{3})(\d)/,"$1.$2")
        cpf=cpf.replace(/(\d{3})(\d{1,2})$/,"$1-$2")
        return cpf
      }
      function mCEP(cep){
        cep=cep.replace(/\D/g,"")
        cep=cep.replace(/^(\d{2})(\d)/,"$1.$2")
        cep=cep.replace(/\.(\d{3})(\d)/,".$1-$2")
        return cep
      }
      function mNum(num){
        num=num.replace(/\D/g,"")
        num=num.replace(/(\d{3})(\d)/,"$1.$2")
        num=num.replace(/(\d{3})(\d)/,"$1.$2")
        return num
      }
    </script>


  <script type="text/javascript">
      $(function(){

            $('.confirmarAcao').on('click', function(){

                  var senha = $('.senhauserResgate').val();
                  var cpfOucard = $('.cpfOuCardModal').val();
                  var cpfOucard2 = $('.cpfOuCardModal2').val();

                  if(senha != ''){
                        var pontos = $('.pontosHiddenModal').val();
                        var quantidade = $('.quantiHiddenModal').val();
                        var idPremio = $('.idHiddenModal').val();
                        
                        if(cpfOucard != ''){
                           var cpf = cpfOucard;
                        }
                       
                        if(cpfOucard2 != ''){
                           var cpf = cpfOucard2;
                        }
                        
                        if(cpf != ''){
                           $.ajax({
                            url:'<?php echo BASE_URL; ?>/painel/ajax/confirmesenhaModal',
                            type:'POST',
                            dataType:'json',
                            data:{senha:senha,pontos:pontos,cpf:cpf,quantidade:quantidade,idPremio:idPremio},
                            success:function(json){

                              if(json == 2){
                                $('.senhaUserAddPonto').css('display','block');
                              }else if(json == 4){

                                  $.ajax({
                                    url:'<?php echo BASE_URL; ?>/painel/ajax/quantipontos',
                                    type:'POST',
                                    dataType:'json',
                                    data:{cpf:cpf},
                                    success:function(json){

                                      $('.numeroDePontos').html("VOCÊ TEM O TOTAL DE  <br/>"+json.pontos+ " <br/> PONTOS");
                                      $('.senhaUserAddPonto4').css('display','block');
                                      $('.confirmarAcao').css('display', 'none');
                                      $('.cancelAcaoResgate').html("SAIR");
                                      $('.areaPreenchimentoModalResgate').css('display','none');
                                    }
                                  });
                              }else{
                                 $('.senhaUserAddPonto3').css('display','block');
                                 $('.numeroGeradoResgate').html("CÓDIGO "+json);
                                 $('.confirmarAcao').css('display', 'none');
                                 $('.cancelAcaoResgate').html("SAIR");
                                 $('.areaPreenchimentoModalResgate').css('display','none');
                              }

                            }
                          });
                         
                    }else{
                      $('.senhaUserAddPonto5').css('display', 'block');
                    }
                  }else{
                      $('.senhaUserAddPonto2').css('display', 'block');
                  }

            });


          $('.resgatarBtn').on("click", function(){

              var id = $(this).attr('data-id');
              $('.senhaUserAddPonto6').css('display','none');

                $.ajax({
                    url:'<?php echo BASE_URL; ?>/painel/ajax/pegardadospremios',
                    type:'POST',
                    dataType:'json',
                    data:{id:id},
                    success:function(json){
                       var quantidade = json.quantidade;

                       if(quantidade == 0){

                        $('.senhaUserAddPonto6').css('display','block');

                       }else{

                          $('.imgModalResgate').html('<img src="<?php echo BASE_URL; ?>/painel/assets/images/'+json.imagem+'" border="0" alt="" class="areaProductImgModal" />');
                          $('.nameModal').html(json.name);
                          $('.quantidadeModal').html(json.quantidade+' qnt.');
                          $('.valorPontoPremioModal').html(json.quantos_pontos);
                          $('.pontosHiddenModal').val(json.quantos_pontos);
                          $('.quantiHiddenModal').val(json.quantidade);
                          $('.idHiddenModal').val(json.id);


                          $('#myModalPremiacao').modal('show');

                       }

                     
                    }
                });
            
          });

          $('.cancelAcaoResgate').on('click', function(){

              window.location.href="<?php echo BASE_URL; ?>/painel/resgatar/listapremios";

          });

          $('.senhauserResgate').on('focus',function(){
            $('.senhaUserAddPonto').css('display','none');
            $('.senhaUserAddPonto2').css('display','none');
            $('.senhaUserAddPonto3').css('display','none');
            $('.senhaUserAddPonto4').css('display','none');
            $('.senhaUserAddPonto5').css('display','none');
          });

          $('.cpfOuCardModal').on('focus', function(){
            $('.senhaUserAddPonto5').css('display','none');
          });



          $('.cardSelect').on('click', function(){
            $('.cpfModalDiv').css('display','none');
            $('.cardModalDiv').css('display','block');

            $('.cardSelect').css('border','3px solid rgba(0,0,0, .5)');
            $('.cardSelect:hover').css('border','3px solid rgba(0,0,0, .5)');
            $('.cpfSelect').css('border','3px solid rgba(255,255,255,1)');
            $('.cpfSelect:hover').css('border','3px solid rgba(255,255,255,1)');


            $('.cpfOuCardModal').val("");

          });


          $('.cpfSelect').on('click', function(){
            $('.cardModalDiv').css('display','none');
            $('.cpfModalDiv').css('display','block');

            $('.cpfSelect').css('border','3px solid rgba(0,0,0, .5)');
            $('.cpfSelect:hover').css('border','3px solid rgba(0,0,0, .5)');
            $('.cardSelect').css('border','3px solid rgba(255,255,255,1)');
            $('.cardSelect:hover').css('border','3px solid rgba(255,255,255,1)');

            $('.cpfOuCardModal2').val("");

          });



          //EXCLUIR MODAL 
          $('.delPremio').on('click', function(){
            var id = $(this).attr('data-id');

            $('.idPremioDell').val(id);

            $('#deletePremio').modal('show');

          });
          $('.simDelEscolher').on('click', function(){
            var id = $('.idPremioDell').val();

            window.location.href = "<?php echo BASE_URL; ?>/painel/resgatar/del/"+id;

          });


      });

        
  </script>

    <div class="modal fade" id="deletePremio" data-backdrop="static" role="dialog" style="position: fixed;">
        <div class="modal-dialog modal-sm">
          <div class="modal-content">
            <div class="modal-body">
              <center>
                <i class="fa fa-exclamation-triangle"></i> <br><br> 
                <strong style="font-weight: bold;color: red;" class="atencion" > ATENÇÃO!</strong>
              </center>

              <p class="titleExcluir">Tem certeza que deseja excluir?</p>

              <center>
                <div>
                    <a href="javascript:;" type="button" class="btn btn-success simDelEscolher"  >SIM</a>
                    <a href="javascript:;" type="button" class="btn btn-danger" data-dismiss="modal" >NÃO</a>
                </div>
              </center>

              <br><br>

                <input type="hidden" name="idPremioDell"  class="form-control idPremioDell" required="required" />
            </div>
          </div>
        </div>
      </div>


<!-- Modal -->
<div id="myModalPremiacao" class="modal fade" role="dialog" data-backdrop="static" style="position: fixed;">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" style="display: none;">&times;</button>
        <div class="modal-title"><center><p>ÁREA DE PREMIAÇÃO</p></center></div>
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

             <!-- PRODUTOS -->
             <div class="listaProdutosModal">
                 <div class="areaProductModal">
                    <center class="imgModalResgate"></center><br>
                    <label class="nameModal" ></label><br>
                    <p class="quantidadeModal" ></p>
                    <strong><span class="valorPontoPremioModal" ></span> pontos</strong><br>
                    <input type="hidden" name="" class="pontosHiddenModal" >
                    <input type="hidden" name="" class="quantiHiddenModal" >
                    <input type="hidden" name="" class="idHiddenModal" >
                </div>
             </div>   


             <script type="text/javascript">
                $(document).ready(function(){
                    // $('.testee4').html('<input type="password" autocomplete="off" name="senhauserResgate" class="form-control senhauserResgate" required="required" placeholder="Senha" >');
                    //$('.titleParaCpfCard').html('CPF:');
                    //$('.testee5').html('');
                    // $('.testee5').html('<input type="text" name="cardModal" class="form-control cardModal" placeholder="NÚMERO DO CARTÃO" >');
                });
              </script>

          <div class="areaPreenchimentoModalResgate" >    

            <strong>SENHA: </strong> <div class="testee4"><input type="password" autocomplete="off" name="senhauserResgate" class="form-control senhauserResgate" required="required" placeholder="Senha" ></div><br>

            <div class="escolhaOpcaoCardOuCpf">
                <button type="button" class="btn btn-info cpfSelect">CPF</button>
                <button type="button" class="btn btn-primary cardSelect">CARTÃO FIDELIDADE</button>
            </div><br>
            
            <div class="cpfModalDiv" >
              <strong class="titleParaCpfCard" >CPF: </strong> <div class="testee5"><input type="text" name="cpfOuCardModal" class="form-control cpfOuCardModal cpfModalResgate"  placeholder="CPF" onkeydown="javascript: fMasc( this, mCPF );" ></div><br> 
            </div>  

            <div class="cardModalDiv" >
                 <strong class="titleParaCpfCard" >CARTÃO FIDELIDADE: </strong> <div class="testee5"><input type="text" name="cpfOuCardModal2" class="form-control cpfOuCardModal2"  placeholder="CARTÃO FIDELIDADE" ></div><br> 
            </div>  

        </div>    

            <br>
             <div class="alert alert-danger senhaUserAddPonto">
              <strong>SENHA INCORRETA e/ou NÚMERO DO CARTÃO ESTÃO ERRADOS!</strong>
            </div>
            <div class="alert alert-danger senhaUserAddPonto2">
              <strong>VOCÊ PRECISA PREENCHER SUA SENHA!</strong>
            </div>

            <div class="alert alert-success senhaUserAddPonto3" style="text-align: center;font-size: 1.5em;" >
              <strong>VOCÊ PODE RESGATAR ESSE PRÊMIO!</strong><br>
              <center><p class="numeroGeradoResgate"></p></center>
            </div>

            <div class="alert alert-danger senhaUserAddPonto4">
              <center>
                   <strong style="font-size: 1.5em;" >VOCÊ NÃO TEM PONTOS SUFICIENTES!</strong><br>
                   <p class="numeroDePontos"></p>
              </center>
            </div>

             <div class="alert alert-danger senhaUserAddPonto5">
              <strong>VOCÊ PRECISA PREENCHER SUA CPF OU NÚMERO DO CARTÃO!</strong>
            </div>

          </div>
          <div class="modal-footer">
            <center><button type="button" class="btn btn-success confirmarAcao" >CONFIRMAR </button><button type="button" class="btn btn-danger cancelAcaoResgate" >CANCELAR</button></center>
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
    <center><label >LISTA DE PRÊMIOS</label></center>
  </div>
  <p class="linhaLinha" ></p>

  <div class="alert alert-danger senhaUserAddPonto6">
      <strong>NÃO TEMOS ESSE PRODUTO NO ESTOQUE!</strong>
  </div>

  <div class="listaProdutos">
    <?php foreach($lista_premios as $premio): ?>
      <div class="areaProduct">
          <center><img src="<?php echo BASE_URL; ?>/painel/assets/images/<?php echo $premio['imagem']; ?>" border="0" alt="" class="areaProductImg" /></center><br>
          <label><?php echo $premio['name']; ?></label><br>
          <p><?php echo $premio['quantidade']; ?> qnt.</p>
          <strong><span class="valorPontoPremio" ><?php echo $premio['quantos_pontos']; ?></span> pontos</strong><br>
          <?php if($grupo == 2 || $grupo == 13 || $grupo == 19): ?>
            <a href="javascript:;" class="btn btn-success resgatarBtn" data-id="<?php echo $premio['id']; ?>" >Resgatar</a>
          <?php endif; ?>  
          <?php if($grupo == 2 || $grupo == 13): ?>
            <br><br>
            <div>
                <a href="<?php echo BASE_URL; ?>/painel/resgatar/edit/<?php echo $premio['id']; ?>" class="btn btn-primary" >Editar</a>
                <a href="javascript:;" class="btn btn-danger delPremio" data-id="<?php echo $premio['id']; ?>" >Excluir</a>
            </div>
          <?php endif; ?>
      </div>
    <?php endforeach; ?>  
  </div>

<br><br>
</div>
































