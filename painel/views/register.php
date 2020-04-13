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

    .nameUser2{font-size: 2em;}
    .totalPontosClients{font-size: 1.3em;}
    .pontTotal{font-size: 2.5em;background: blue;padding:30px;border-radius: 100%;color: white;}
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

    .areaCode{display: flex;}
    .areaCodeDivs{width: 49%;}
    .areaCodeDivs{margin-right: 10px;}

    .areaNameData{display: flex;flex-direction: row;}
    .areaNameData div{flex: 1;}
    .areaNameData div .nameClients{}
    .areaNameData div .data_nasc_title{margin-left: 10px;}
    .areaNameData div .data_nasc{width: 98%;margin-left: 10px;padding-top: 0px;}

    

    .senhaUserAddPontoRegister1{display: none;}
    .senhaUserAddPontoRegister2{display: none;}

     .titulosite{position: absolute;top:100px;left: 25%;}
      .titulosite label{font-size: 2.5em;margin-top: 50px;}

      .cadJaCadastrado{display: none; }

      .avisocampovazio{display: none;}


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
    $(document).ready(function(){
      $('.m2').addClass('ativo');
    });
</script> 

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
        tel=tel.replace(/(.{3})(\d)/,"$1) $2")
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
      function mCel(tel) {
        tel=tel.replace(/\D/g,"")
        tel=tel.replace(/^(\d)/,"($1")
        tel=tel.replace(/(.{3})(\d)/,"$1) $2")
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
        cep=cep.replace(/\.(\d{3})(\d)/,"$1-$2")
        return cep
      }
      function mNum(num){
        num=num.replace(/\D/g,"")
        return num
      }
    </script>
  

  <script type="text/javascript">
      $(function(){

            //PEGAR CEP 1
            $('input[name=cep]').on('blur', function(){

              var cep = $(this).val();

              $.ajax({
                url:'https://viacep.com.br/ws/'+cep+'/json/',
                type:'GET',
                //async: true,
                dataType:'json',
                success:function(json){
                  if(typeof json.logradouro != 'undefined'){
                    $('input[name=address]').val(json.logradouro);
                    $('input[name=neighb_address]').val(json.bairro);
                    $('.city_address').val(json.localidade);
                    $(".state_address option:contains("+json.uf+")").attr('selected', true);
                    $('input[name=number_address]').focus();
                  }
                }
              });

            });

            $('.btn_busccep').on('click', function(){

              var state = $('.state_address').val();
              var cidade = $('.cidades1').val();
              var rua = $('.nome_rua').val();
              

              $.ajax({
                url:'https://viacep.com.br/ws/'+state+'/'+cidade+'/'+rua+'/json',
                type:'GET',
                //async: true,
                dataType:'json',
                success:function(json){
                  //console.log(json.results[0].address_components[6].long_name);
                  if(typeof json[0] != 'undefined'){
                       $('#buscacep').modal('hide');
                       $('.cep').val('');
                       $('.cep').val(json[0].cep);
                       $('.cep').focus();
                       $('input[name=number_address]').focus();
                  }

                }
              });

            });

              $('.state_address').on('change', function(){
                  var state = $(this).val();

                  $.ajax({
                    url:'<?php echo BASE_URL; ?>/painel/ajax/cidade1',
                    type:'POST',
                    dataType:'json',
                    data:{state:state},
                    success:function(json){
                      if(json != ''){
                        $('.cidades1').html('');
                        for(var i in json){
                           $('.cidades1').append('<option value="'+json[i].desc_cidade+'">'+json[i].desc_cidade+'</option>');
                        }
                        $('.cidades1').removeAttr('disabled');
                      }
                    }
                  });

              });

          $('.enviouForm').on('click', function(){

              var n_cartao = $('input[name=n_cartao]').val();
              var cpf = $('input[name=cpf]').val();
              var nameClients = $('input[name=name]').val();
              var data_nasc = $('input[name=data_nasc]').val();
              var cep = $('input[name=cep]').val();
              var address = $('input[name=address]').val();
              var number_address = $('input[name=number_address]').val();
              var neighb_address = $('input[name=neighb_address]').val();
              var state_address = $('input[name=state_address]').val();
              var city_address = $('input[name=city_address]').val();

              if(n_cartao != '' && cpf != '' && nameClients != '' && data_nasc != '' && cep != '' && address != '' && number_address != '' && neighb_address != '' && state_address != '' && city_address != '' ){
                 $('#myModalRegister').modal('show');
              }else{
                $('.avisocampovazio').css('display', 'block');
              }

             

          });    

          $('input[name=n_cartao],input[name=cpf],input[name=name],input[name=data_nasc],input[name=cep],input[name=address],input[name=number_address],input[name=neighb_address],input[name=state_address],input[name=city_address]').on('focus', function(){
              $('.avisocampovazio').css('display', 'none');
           });  

          $('.n_cartao, .cpf, .name, .cell01, .phone01, .cep, .obs').on('focus', function(){
            $('.alertError').css('display','none');
          }); 


          $('.CancelRegisterUser').on('click', function(){
              var id = $(this).attr('data-id');

              $('.idSelectCancell').val(id);

              $('#myModalRegister2').modal('show');
          });
           
          
          $('.clickSimCancel').on('click', function(){
              var id = $('.clickSimDel').val();
              window.location.href = "<?php echo BASE_URL; ?>/painel/";
          });
          

        });   
</script>

<script type="text/javascript">
  $(function(){
      $('.confirmarAcaoRegister').on('click', function(){

      var senha = $('.senhauserRegister').val();

      if(senha != ''){
          $.ajax({
            url:'<?php echo BASE_URL; ?>/painel/ajax/confirmesenhaRegister',
            type:'POST',
            dataType:'json',
            data:{senha:senha},
            success:function(json){
              if(json == 2){
                $('.senhaUserAddPontoRegister1').css('display','block');
              }else{
                  $('.idUserQueCadastrou').val(json);

                  $('input[name=address]').removeAttr('disabled');
                  $('input[name=neighb_address]').removeAttr('disabled');
                  $('input[name=state_address]').removeAttr('disabled');
                  $('input[name=city_address]').removeAttr('disabled');

                  $('.formderegister').submit();

              }
            }
          });
      }else{
          $('.senhaUserAddPontoRegister2').css('display', 'block');
      }

    });

    $('.senhauserRegister').on('focus',function(){
      $('.senhaUserAddPontoRegister1').css('display','none');
      $('.senhaUserAddPontoRegister2').css('display','none');
    });

    $('.n_cartao').on('blur', function(){

      var card = $(this).val();
      var card = '7678647'+card;


                  $.ajax({
                    url:'<?php echo BASE_URL; ?>/painel/ajax/conferecad',
                    type:'POST',
                    dataType:'json',
                    data:{card:card},
                    success:function(json){
                      if(json == false){
                          $('.cadJaCadastrado').css('display','block');
                          $('.enviouForm').css('visibility', 'hidden');
                      }else{
                          $('.enviouForm').css('visibility', 'visible');
                      }
                    }
                  });

    });

     $('.n_cartao').on('focus', function(){
         $('.cadJaCadastrado').css('display','none');
     });

});    
</script>


<!-- Modal -->
<div id="myModalRegister" class="modal fade" role="dialog" data-backdrop="static" style="position: fixed;">
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
              <div class="alert alert-danger senhaUserAddPontoRegister1">
                <strong>SENHA INCORRETA!</strong>
              </div>
              <div class="alert alert-danger senhaUserAddPontoRegister2">
                <strong>VOCÊ PRECISA PREENCHER SUA SENHA!</strong>
              </div>    

              <script type="text/javascript">
                $(document).ready(function(){
                    $('.testee').html('<input type="password" id="senhauserRegister" autocomplete="off" name="senhauserRegister" class="form-control senhauserRegister" required="required"  >');
                });
              </script>

            <strong>SENHA: </strong>  <div class="testee"></div>
          </div>
          <div class="modal-footer">
            <center><button type="button" class="btn btn-success confirmarAcaoRegister" >CONFIRMAR </button><a href="<?php echo BASE_URL; ?>/painel/register" class="btn btn-danger irAoInicio" style="font-size: 1em;" >CANCELAR </a></center>
          </div>

      </div>  

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
    <center><label >CADASTRO DE CLIENTE</label></center>
  </div>

  <div class="caixapontuacao">
    <label class="titlePontu"></label><br><br>
    <form method="POST" class="formderegister" >

      
      <input type="hidden" name="idUserQueCadastrou" class="idUserQueCadastrou" value="" required="required" />

      <br>
        <?php if(!empty($error)): ?>
          <div class="alert alert-danger alertError"><?php echo $error; ?></div>
          <script type="text/javascript">
            setTimeout(function(){
              window.location.href="<?php echo BASE_URL; ?>/painel/register";
            }, 1500);
          </script>
        <?php endif; ?>  
        <?php if(!empty($success)): ?>
          <div class="alert alert-success alertError"><?php echo $success; ?></div>
          <script type="text/javascript">
            setTimeout(function(){
              window.location.href="<?php echo BASE_URL; ?>/painel/consult";
            }, 1500);
          </script>
        <?php endif; ?>  
      <br>

      <div class="alert alert-danger cadJaCadastrado"><strong>ESSE CARTÃO JÁ FOI CADASTRADO!</strong></div>

      <label>CÓDIGO DO CARTÃO</label><span style="font-size: .7em;color: #00cd66;"> (campo obrigatorio)</span>
      <div class="areaCode">
        <div class="areaCodeDivs">
           <input type="text" required="required" name="init_cartao" class="form-control" value="7678647" style="pointer-events: none;
  touch-action: none;background: #e9e9e9;" /><br>
        </div> 
        <div class="areaCodeDivs">
          <input type="text" name="n_cartao" required="required" class="form-control n_cartao" maxlength="6" placeholder="000000" /><br>
        </div>  
      </div>
      <label>CPF</label><span style="font-size: .7em;color: #00cd66;"> (campo obrigatorio)</span>
      <input type="text" name="cpf" class="form-control cpf" required="required" placeholder="000.000.000-00" onkeydown="javascript: fMasc( this, mCPF );" /><br>

      <div class="areaNameData">
        <div>
          <label>NOME DO CLIENTE</label><span style="font-size: .7em;color: #00cd66;"> (campo obrigatorio)</span>
          <input type="text" name="name" class="form-control nameClients" placeholder="Nome Completo" required="required" /><br>
        </div>
        <div>
          <label class="data_nasc_title">DATA DE NASCIMENTO</label><span style="font-size: .7em;color: #00cd66;"> (campo obrigatorio)</span>
          <input type="date" name="data_nasc" class="form-control data_nasc" placeholder="00/00/0000" required="required" /><br>
        </div>
      </div>  

      <div class="div_phonesss">
          <div class="fone01">
            <label>Celular </label>
            <input type="text" name="cell01" class="form-control cell01" placeholder="(00) 00000 - 0000" onkeydown="javascript: fMasc( this, mCel );"  />
          </div>  
          <div class="fone02">
            <label>Telefone </label>
            <input type="text" name="phone01" class="form-control phone01" placeholder="(00) 0000 - 0000" onkeydown="javascript: fMasc( this, mTel );" />
          </div>
      </div>
      <br>
        <!-- ENDEREÇO -->
        <div class="parteEndereco">
            <div class="form-group form-group2">
              <div class="contener_form-group">
                <div class="divCep">
                  <label>Cep:</label><span style="font-size: .7em;color: #00cd66;"> (campo obrigatorio)</span>
                  <input type="text" name="cep" placeholder ="00000-000" class="form-control cep" required="required" onkeydown="javascript: fMasc( this, mCEP );" />
                </div>
                <div class="divPesquisa">
                 <button type="button" class="search" data-toggle="modal" data-target="#buscacep" ><img src="<?php echo BASE_URL; ?>/assets/images/search.png"  border="0" alt="" /></button> 
                </div> 
              </div> 
            </div>  

              <div class="form-group ">
                <label>Endereço:</label><span style="font-size: .7em;color: #00cd66;"> (campo obrigatorio)</span>
                <input type="text" name="address" placeholder="Endereço" class="form-control address" required="required" style="background: #ccc;pointer-events: none;
  touch-action: none;" readonly="readonly"   />
              </div>  

              <div class="form-group form-group2">
                <label>Número:</label><span style="font-size: .7em;color: #00cd66;"> (campo obrigatorio)</span>
                <input type="text" name="number_address" placeholder="000" class="form-control number_address" required="required" />
              </div>

              <div class="form-group">
                <label>Bairro:</label><span style="font-size: .7em;color: #00cd66;"> (campo obrigatorio)</span>
                <input type="text" name="neighb_address" placeholder="Bairro" class="form-control neighb_address" required="required" style="background: #ccc;pointer-events: none;
  touch-action: none;" readonly="readonly"  />
              </div>   

               <div class="form-group form-group2">
                <label>Complemento:</label>
                <input type="text" name="address2" placeholder="" class="form-control address2"   />
              </div>  

              <div class="form-group">
                <label>Estado:</label><span style="font-size: .7em;color: #00cd66;"> (campo obrigatorio)</span>
                <select name="state_address" class="form-control state_address" required="required" style="background: #ccc;pointer-events: none;
  touch-action: none;" readonly="readonly" >
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
                 </select>
              </div>

              <div class="form-group form-group2">
                <label>Cidade:</label><span style="font-size: .7em;color: #00cd66;"> (campo obrigatorio)</span>
                <input type="text" name="city_address" class="form-control city_address" placeholder="Cidade" required="required" style="background: #ccc;pointer-events: none;
  touch-action: none;" readonly="readonly" />
              </div>



      </div>         
      
      <label>Observação:</label>
      <textarea class="form-control obs" name="obs" style="height: 150px;" ></textarea> <br>

      <div class="alert alert-danger avisocampovazio">
          <strong>Por favor, preencha todos os campos obrigatorios!</strong>
      </div>

      <input type="button" class="btn btn-primary enviouForm" value="Cadastrar">
      <a href="<?php echo BASE_URL; ?>/painel" class="btn btn-danger CancelRegisterUser" >Cancelar</a>

    </form>
  </div>

<br><br>
</div>



















