<style type="text/css">

    /* IPÊ FIDELIDADE */

    .caixapontuacao{}
    .caixapontuacao .titlePontu{font-size: 1.2em;}

    .clickSelection{max-width: 445px; width: 100%; margin-top: 50px;margin-bottom: 20px;background: transparent;display: flex;visibility: hidden;}/**/
    .areaCompletar1{background: transparent;flex:2;display: flex;}
    .areaCompletar2{background: transparent;flex:1;display: flex;}
    .areaCompletarDiv{background: transparent;display: flex;margin-top: 10px;height: 100px;flex-direction: column;}
    .areaCompletarDiv .pEspecial1{margin-right: 38px;padding-top: 10px;}
    .areaCompletarDiv .pEspecial2{padding-top: 5px;display: none;}
    .areaCompletarDiv .pEspecial3{padding-top: 5px;display: none;}
    .areaCompletarDiv .pEspecial4{padding-top: 5px;display: none;}
    .areaCompletarDiv .nCoo{margin-top: 3px;}
    .areaCompletarDiv .nlitros{margin-top: 3px;display: none;}
    .areaCompletarDiv .nlitros2{margin-top: 3px;display: none;}
    .areaCompletarDiv .nlitros3{margin-top: 3px;display: none;}
    .clickSelection label{font-size: 1em;}
    .clickSelection input{width: 150px;margin-right: 10px;}
    .areaCompletar2 button{height: 75px;margin-top: 10px;font-size: 1.3em;}
    .campolitros,.passerrado{display: none;}
    .clickSelectionTitulo{margin-top: 5px;margin-right: 10px;}
    .nlitros{}

    .clickSelection2{display: none;}

    .areaPontoss{display: flex;}
    .seis_prime_nume{width: 49%;margin-right: 10px;}
    .seis_ulti_nume{width: 49%;}

    .modal-title{font-size: 2em;color: #999;padding-top: 30px;}

    .logoEmpresa{height: 120px;}
    .logoEmpresa img{height: 100%;}

    .senhaUserAddPonto{display: none;}  
    .senhaUserAddPonto2{display: none;}

    .nameUser2{font-size: 2em;}
    .totalPontosClients{font-size: 1.3em;}
    .pontTotal{font-size: 2.5em;background: blue;padding:30px;border-radius: 100%;color: white;}
    .irAoInicio{font-size: 1.3em;}
    .nameUltimoAtendent{}

    .campoCooViscaliza{display: none;}
    .campoCooViscaliza2{display: none;}


    @media all and (min-width: 600px){
      
    }

    @media all and (min-width: 768px){
      
    }

    @media all and (min-width: 800px){
      
    }

    @media all and (min-width: 960px){
      
    }

    @media all and (min-width: 1024px){
      
    }

    @media all and (min-width: 1280px){
      
    }

    @media all and (min-width: 1366px){
      
    }

    @media all and (min-width: 1680px){
      
    }

    @media all and (min-width: 1920px){

    }


    .cpf,.n_cartao,.seis_ulti_nume{background-image: url('<?php echo BASE_URL; ?>/assets/images/search.png');background-repeat:no-repeat;background-size:20px 20px;background-position:5px;padding-left: 28px;}

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
      $('.m1').addClass('ativo');
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

    $('.clickEscolha').on('click', function(){
      var qualButton = $(this).attr('data-select');
      var name = $(this).attr('data-name');
      var ativo =  $('.btn_ativo').val();
      var verifica = $(this).attr('data-ativo');


      $('.clickSelection').css('visibility','visible');
      $('.clickSelection2').css('display','none');
      //$('.pontuar').addClass('disabled');


      if(verifica == 'ATIVO'){
        $(this).attr('data-ativo','');

        $('.disel'+qualButton+'').css('border','0px solid rgba(0,0,0,0)');

        if(qualButton == 1){
          $('.areaCompletarDiv .pEspecial2').css('display','none');
          $('.areaCompletarDiv .pEspecial2').css('margin-top','-5px');
          $('.areaCompletarDiv .nlitros').css('display','none');
          $('.areaCompletarDiv .nlitros').attr('data-ativo','');
        }else if(qualButton == 2){
          $('.areaCompletarDiv .pEspecial3').css('display','none');
          $('.areaCompletarDiv .pEspecial3').css('margin-top','-5px');
          $('.areaCompletarDiv .nlitros2').css('display','none');
          $('.areaCompletarDiv .nlitros2').attr('data-ativo','');
        }else if(qualButton == 3){
          $('.areaCompletarDiv .pEspecial4').css('display','none');
          $('.areaCompletarDiv .pEspecial4').css('margin-top','-8px');
          $('.areaCompletarDiv .nlitros3').css('display','none');
          $('.areaCompletarDiv .nlitros3').attr('data-ativo','');
        }

      }else{
        $(this).attr('data-ativo','ATIVO');

        $('.disel'+qualButton+'').css('border','3px solid rgba(0,0,0,0.5)');

        if(qualButton == 1){
          $('.areaCompletarDiv .pEspecial2').css('display','block');
          $('.areaCompletarDiv .pEspecial2').css('margin-top','-5px');
          $('.areaCompletarDiv .nlitros').css('display','block');
          $('.areaCompletarDiv .nlitros').attr('data-ativo','ATIVO');
        }else if(qualButton == 2){
          $('.areaCompletarDiv .pEspecial3').css('display','block');
          $('.areaCompletarDiv .pEspecial3').css('margin-top','-5px');
          $('.areaCompletarDiv .nlitros2').css('display','block');
          $('.areaCompletarDiv .nlitros2').attr('data-ativo','ATIVO');
        }else if(qualButton == 3){
          $('.areaCompletarDiv .pEspecial4').css('display','block');
          $('.areaCompletarDiv .pEspecial4').css('margin-top','-8px');
          $('.areaCompletarDiv .nlitros3').css('display','block');
          $('.areaCompletarDiv .nlitros3').attr('data-ativo','ATIVO');
        }

      }

    });


    $('.pontuar').on('click', function(){

      var passou1 = false;
      var passou2 = false;
      var passou3 = false;

      var n1 = "";
      var n2 = "";
      var n3 = "";

      var name = $('input[name=name]').val();

      var litros = $('input[name=nlitros]').val();
      var litros2 = $('input[name=nlitros2]').val();
      var litros3 = $('input[name=nlitros3]').val();


      var litrosATIVO = $('input[name=nlitros]').attr('data-ativo');
      var litros2ATIVO = $('input[name=nlitros2]').attr('data-ativo');
      var litros3ATIVO = $('input[name=nlitros3]').attr('data-ativo');

      var coo = $('input[name=nCoo]').val();
      var cpf =  $('input[name=cpf]').val();
      var n_pri = $('input[name=seis_prime_nume]').val();
      var n_cartao =  $('input[name=n_cartao]').val(); 
      var seis_ulti_nume = $('input[name=seis_ulti_nume]').val(); 
      //var btn_ativo = $('.btn_ativo').val();


      if(litrosATIVO != ''){
        n1 = "DIESEL";
        if(litros != 0 && litros != ''){
          passou1 = true;
        }
      }

      if(litros2ATIVO != ''){
        n2 = "GASOLINA";

        if(litros2 != 0 && litros2 != ''){
          passou2 = true;
        }

      }

      if(litros3ATIVO != ''){
        n3 = "ETANOL"; 

        if(litros3 != 0 && litros3 != ''){
          passou3 = true;
        }

      }


      if(litrosATIVO == 'ATIVO' && litros2ATIVO == 'ATIVO' && litros3ATIVO == 'ATIVO'){
         if(litros != 0 && litros != '' && litros2 != 0 && litros2 != '' && litros3 != 0 && litros3 != ''){
            //PODE PONTUAR
            inteligente(coo,passou1,passou2,passou3,name,cpf,litros,litros2,litros3,n1,n2,n3);
         }else{
           $('.campolitros').css('display','block');
         }
      }else if(litrosATIVO == 'ATIVO' && litros2ATIVO == 'ATIVO' && litros3ATIVO == ''){
        if(litros != 0 && litros != '' && litros2 != 0 && litros2 != ''){
            //PODE PONTUAR
            inteligente(coo,passou1,passou2,passou3,name,cpf,litros,litros2,litros3,n1,n2,n3);
         }else{
           $('.campolitros').css('display','block');
         }
      }else if(litrosATIVO == 'ATIVO' && litros2ATIVO == '' && litros3ATIVO == 'ATIVO'){
        if(litros != 0 && litros != '' && litros3 != 0 && litros3 != ''){
            //PODE PONTUAR
            inteligente(coo,passou1,passou2,passou3,name,cpf,litros,litros2,litros3,n1,n2,n3);
         }else{
           $('.campolitros').css('display','block');
         }
      }else if(litrosATIVO == 'ATIVO' && litros2ATIVO == '' && litros3ATIVO == ''){
        if(litros != 0 && litros != ''){
            //PODE PONTUAR
            inteligente(coo,passou1,passou2,passou3,name,cpf,litros,litros2,litros3,n1,n2,n3);
         }else{
           $('.campolitros').css('display','block');
         }
      }else if(litrosATIVO == '' && litros2ATIVO == 'ATIVO' && litros3ATIVO == ''){
        if(litros2 != 0 && litros2 != ''){
            //PODE PONTUAR
            inteligente(coo,passou1,passou2,passou3,name,cpf,litros,litros2,litros3,n1,n2,n3);
         }else{
           $('.campolitros').css('display','block');
         }
      }else if(litrosATIVO == '' && litros2ATIVO == 'ATIVO' && litros3ATIVO == 'ATIVO'){
        if(litros2 != 0 && litros2 != '' && litros3 != 0 && litros3 != ''){
            //PODE PONTUAR
            inteligente(coo,passou1,passou2,passou3,name,cpf,litros,litros2,litros3,n1,n2,n3);
         }else{
           $('.campolitros').css('display','block');
         }
      }else if(litrosATIVO == '' && litros2ATIVO == 'ATIVO' && litros3ATIVO == 'ATIVO'){
        if(litros2 != 0 && litros2 != '' && litros3 != 0 && litros3 != ''){
            //PODE PONTUAR
            inteligente(coo,passou1,passou2,passou3,name,cpf,litros,litros2,litros3,n1,n2,n3);
         }else{
           $('.campolitros').css('display','block');
         }
      }else if(litrosATIVO == '' && litros2ATIVO == '' && litros3ATIVO == 'ATIVO'){
        if(litros3 != 0 && litros3 != ''){
            inteligente(coo,passou1,passou2,passou3,name,cpf,litros,litros2,litros3,n1,n2,n3);
         }else{
           $('.campolitros').css('display','block');
         }
      }

    });

    $('.cpf').on('blur', function(){
      var cpf = $(this).val();
      var n_cartao = $('.n_cartao').val();
      var seis_ulti_nume = $('.seis_ulti_nume').val();

      var dadoinfo1 = cpf;

      $.ajax({
        url:'<?php echo BASE_URL; ?>/painel/ajax/infopontuacao',
        type:'POST',
        dataType:'json',
        data:{dadoinfo1:dadoinfo1},
        success:function(json){
          if(json != ''){
            $('.n_cartao').val('');
            $('.seis_ulti_nume').val('');

            $('.n_cartao').val(json.codigo_cartao);
            $('.seis_ulti_nume').val(json.seis_ultimos_codigos);
            $('.nameClients').val(json.nome);

            if(cpf != '' || n_cartao != '' || seis_ulti_nume != ''){
              $('.clickEscolha').removeAttr('disabled');
            }else{
              $('.clickEscolha').attr('disabled',true);
              $('.clickSelection').css('visibility','hidden');
              $('.clickEscolha').css('border','0px solid rgba(0,0,0,0)');
            }

          }  

        }
      });

    });

    
    $('.n_cartao').on('blur', function(){
      var n_cartao = $(this).val();
      var cpf = $('.cpf').val();
      var seis_ulti_nume = $('.seis_ulti_nume').val();

      var dadoinfo2 = n_cartao;

      $.ajax({
        url:'<?php echo BASE_URL; ?>/painel/ajax/infopontuacao',
        type:'POST',
        dataType:'json',
        data:{dadoinfo2:dadoinfo2},
        success:function(json){
          if(json != ''){
            $('.cpf').val('');
            $('.seis_ulti_nume').val('');

            $('.cpf').val(json.cpf);
            $('.seis_ulti_nume').val(json.seis_ultimos_codigos);
            $('.nameClients').val(json.nome);

             if(cpf != '' || n_cartao != '' || seis_ulti_nume != ''){
              $('.clickEscolha').removeAttr('disabled');
            }else{
              $('.clickEscolha').attr('disabled',true);
              $('.clickSelection').css('visibility','hidden');
              $('.clickEscolha').css('border','0px solid rgba(0,0,0,0)');
            }

          }
        }
      });


    });

    $('.seis_ulti_nume').on('blur', function(){
      var seis_ulti_nume = $(this).val();
      var cpf = $('.cpf').val();
      var n_cartao = $('.n_cartao').val();

      var dadoinfo3 = seis_ulti_nume;

      $.ajax({
        url:'<?php echo BASE_URL; ?>/painel/ajax/infopontuacao',
        type:'POST',
        dataType:'json',
        data:{dadoinfo3:dadoinfo3},
        success:function(json){
          if(json != ''){
            $('.cpf').val('');
            $('.n_cartao').val('');

            $('.cpf').val(json.cpf);
            $('.n_cartao').val(json.codigo_cartao);
            $('.nameClients').val(json.nome);

            if(cpf || '' && n_cartao || '' || seis_ulti_nume != ''){
              $('.clickEscolha').removeAttr('disabled');
            }else{
              $('.clickEscolha').attr('disabled',true);
              $('.clickSelection').css('visibility','hidden');
              $('.clickEscolha').css('border','0px solid rgba(0,0,0,0)');
            }
          }  

        }
      });

    

    });



    $('.nlitros,.nlitros2,.nlitros3,.password,.nCoo').on('focus', function(){
      $('.campolitros').css('display','none');
      $('.passerrado').css('display','none');
    });

    $('.cancelAcao').on('click', function(){
      $('#myModal2').modal('show');
    });

    $('.confirmarAcao').on('click', function(){

      var senha = $('.senhauser').val();

      if(senha != ''){
          var nome = $('input[name=name]').val();
          var cpf = $('input[name=cpf]').val();
          var coo = $('input[name=nCoo]').val();

          var qntLitro = $('input[name=nlitros]').val();
          var qntLitro2 = $('input[name=nlitros2]').val();
          var qntLitro3 = $('input[name=nlitros3]').val();
          var redificacao = 0;


          var ativo = '';
          var ativo2 = '';
          var ativo3 = '';

          
          if(qntLitro == ''){
            qntLitro = 0;
          }else{
            ativo = 1;
          }

          if(qntLitro2 == ''){
            qntLitro2 = 0;
          }else{
            ativo2 = 2;
          }

          if(qntLitro3 == ''){
            qntLitro3 = 0;
          }else{
             ativo3 = 3;
          }



          $.ajax({
            url:'<?php echo BASE_URL; ?>/painel/ajax/confirmesenha',
            type:'POST',
            dataType:'json',
            data:{senha:senha,cpf:cpf,coo:coo,ativo:ativo,ativo2:ativo2,ativo3:ativo3,qntLitro:qntLitro,qntLitro2:qntLitro2,qntLitro3:qntLitro3,redificacao:redificacao},
            success:function(json){
              if(json == 2){
                $('.senhaUserAddPonto').css('display','block');
              }else{
                $('#myModal').modal('hide');

                    $.ajax({
                      url:'<?php echo BASE_URL; ?>/painel/ajax/pontos',
                      type:'POST',
                      dataType:'json',
                      data:{cpf:cpf},
                      success:function(json){
                        $('.nameUser2').html(nome);
                        $('.pontTotal').html(json.pontos);
                        $('.nameUltimoAtendente').html(json.nameatendente);
                      }
                    }); 

              
                $('#myModal3').modal('show');
              }
            }
          });

      }else{
          $('.senhaUserAddPonto2').css('display', 'block');
      }



    });

    $('.senhauser').on('focus',function(){
      $('.senhaUserAddPonto').css('display','none');
      $('.senhaUserAddPonto2').css('display','none');
    });

    $('#myModal').on('hide.bs.modal', function (event) {
        setTimeout(function(){
          window.location.href="<?php echo BASE_URL; ?>/painel/";
        }, 15000);
    })

    
    $('.nCoo').on('blur', function(){
        var value = $(this).val();  

        if(value != ''){

          $.ajax({
            url:'<?php echo BASE_URL; ?>/painel/ajax/cooConfere',
            type:'POST',
            dataType:'json',
            data:{value:value},
            success:function(json){
                if(json == 1){
                  $('.campoCooViscaliza').css('display','block');
                  $('.pontuar').css('visibility','hidden');
                }else if(json == 2){
                  $('.campoCooViscaliza2').css('display','block');
                  $('.pontuar').css('visibility','hidden');
                }else if(json == 3){

                   $('.pontuar').css('visibility','visible');
                }
            }
          }); 

        }

    });

    $('.nCoo').on('focus', function(){
      $('.campoCooViscaliza').css('display','none');
      $('.campoCooViscaliza2').css('display','none');
    }); 

  });




  function inteligente(coo,passou1,passou2,passou3,name,cpf,litros,litros2,litros3,n1,n2,n3){
      
      if(coo != '' && coo.length == 6){ 
        if(passou1 == false && passou2 == false && passou3 == false){
            $('.campolitros').css('display','block');
        }else{
            $('.diselComun').addClass('disabled');

            $('.nlitros').attr('readonly',true);
            $('.nlitros').css('point-events','none');

            $('.nlitros2').attr('readonly',true);
            $('.nlitros2').css('point-events','none');

            $('.nlitros3').attr('readonly',true);
            $('.nlitros3').css('point-events','none');

            $('.pontuar').addClass('disabled');

            $('.nameUser').html(name);
            $('.cpfUser').html(cpf);

            //ALTERAR
    


    // .typeCom2{visibility: hidden;}
    // .quantLitros2{visibility: hidden;}

    // .typeCom3{visibility: hidden;}
    // .quantLitros3{visibility: hidden;}

            if(litros == ''){
              $('.typeCom').css('display','none');
              $('.quantLitros').css('display','none');
              $('.l1').css('display','none');
            }

            if(litros2 == ''){
              $('.typeCom2').css('display','none');
              $('.quantLitros2').css('display','none');
              $('.l2').css('display','none');
            }

            if(litros3 == ''){
              $('.typeCom3').css('display','none');
              $('.quantLitros3').css('display','none');
              $('.l3').css('display','none');
            }

            $('.quantLitros').html(litros);
            $('.quantLitros2').html(litros2);
            $('.quantLitros3').html(litros3);

            $('.typeCom').html(n1+':');
            $('.typeCom2').html(n2+':');
            $('.typeCom3').html(n3+':');


            $('.cooNotinha').html(coo);

            $('#myModal').modal('show');
        }
      }else{
        $('.campolitros').css('display','block');
      }

    }


</script>


  <script>
      function somenteNumeros(num) {
          var er = /[^0-9.,]/;
          er.lastIndex = 0;
          var campo = num;
          if (er.test(campo.value)) {
            campo.value = "";
          }
      }
   </script>


<script type="text/javascript">
  $(document).ready(function(){
    //$('#myModal').modal('show');
  })
</script>


<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog" data-backdrop="static" style="position: fixed;">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" style="display: none;">&times;</button>
        <div class="modal-title"><center><p>CONFIRMAÇÃO DA PONTUAÇÃO</p></center></div>
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
            <strong class="topcs">NOME:</strong> <label class="nameUser"></label> <br>
            <strong class="topcs">CPF:</strong> <label class="cpfUser"></label> <br>
            <strong class="topcs">COO:</strong> <label class="cooNotinha"></label><br>
            <strong class="topcs typeCom">COMBUSTÍVEL:</strong>  <label class="quantLitros">10</label><strong class="l1" >L<br> </strong> 
            <strong class="topcs typeCom2">COMBUSTÍVEL:</strong> <label class="quantLitros2">10</label><strong class="l2" >L<br></strong>
            <strong class="topcs typeCom3">COMBUSTÍVEL:</strong> <label class="quantLitros3">10</label><strong class="l3" >L<br></strong>

            <br>

            <div class="alert alert-danger senhaUserAddPonto">
              <strong>SENHA INCORRETA!</strong>
            </div>
            <div class="alert alert-danger senhaUserAddPonto2">
              <strong>VOCÊ PRECISA PREENCHER SUA SENHA!</strong>
            </div>

             <script type="text/javascript">
                $(document).ready(function(){
                    $('.testee4').html('<input type="password" autocomplete="off" name="senhauser" class="form-control senhauser" required="required" >');
                });
              </script>

            <strong>SENHA: (123) </strong> <div class="testee4"></div> 

          </div>
          <div class="modal-footer">
            <center><button type="button" class="btn btn-success confirmarAcao" >CONFIRMAR </button><button type="button" class="btn btn-danger cancelAcao" >CANCELAR</button></center>
          </div>

      </div>  

      </div>
    </div>

  </div>
</div>

<!-- Modal -->
<div id="myModal3" class="modal fade" role="dialog" data-backdrop="static" style="position: fixed;">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" style="display: none;">&times;</button>
        <div class="modal-title"><center><p>PONTUAÇÃO CONFIRMADA</p></center></div>
      </div>
      <div class="modal-body">

        <script type="text/javascript">
          $(function(){
            
          });   
    </script>

        <div class="divApresResgate">

          <center>
            <div class="logoEmpresa">
              <img src="<?php echo BASE_URL; ?>/painel/assets/images/TEMPLATE/LogoBrasilComputadoresPNG2.png" border="0" alt="">
            </div>
        </center>   
        <br>

          <div class="alert alert-warning">
                <center>
                  <i class="fa fa-exclamation-triangle" style="font-size: 5em;color: #FFC125;"></i><br>
                  <strong  style="font-size: 1.8em;">Aviso!</strong><br>
                  <strong style="font-size: 1.2em;">Essa tela será fechada em 15 segundos</strong>
                </center> 
              </div>

          <hr/>
          <div class="infoUser">
            <center><label class="nameUser2"><!--  Ricardo Augusto de Aguiar Alves  --></label> <br>
            <strong class="topcs totalPontosClients">Total de Pontos:</strong> <br><br><br> 
            <strong class="topcs pontTotal"><!-- 999.999 --></strong><br><br><br>
            <strong class="topcs nameUltimoAtendent">Último Atendente: <span class="nameUltimoAtendente"><!-- Ricardo Augusto de Aguiar Alves --></span></strong> <br>
              </center>
            <br><br>
            

          </div>
          <div class="modal-footer">
            <center><a href="<?php echo BASE_URL; ?>/painel" class="btn btn-success irAoInicio" >INÍCIO </a></center>
          </div>

      </div>  

      </div>
    </div>

  </div>
</div>

<br><br>

<!-- Modal -->
<div id="myModal2" class="modal fade" role="dialog" style="position: fixed; " data-backdrop="static">
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
          <a href="<?php echo BASE_URL; ?>/painel/" class="btn btn-success" >SIM</a>
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
  <div class="">
  <label style="font-size: 2em;" ><?php echo NOMEDOSISTEMA; ?></label>
  </div>
  <br>

  <div class="caixapontuacao">
    <label class="titlePontu"></label><br><br>
    <form method="POST">

      <label>CPF</label>
      <input type="text" name="cpf" class="form-control cpf" placeholder="000.000.000-00" onkeydown="javascript: fMasc( this, mCPF );" /><br>

      <label>CÓDIGO DO CARTÃO</label>
      <input type="text" name="n_cartao" class="form-control n_cartao" placeholder="0000000000000" /><br>

      <label>SEIS ÚLTIMOS NÚMERO DO CARTÃO</label>

      <div class="areaPontoss">
        <input type="text" name="seis_prime_nume" class="form-control seis_prime_nume" value="7678647" readonly="readonly" style="pointer-events: none;" /> <input type="text" name="seis_ulti_nume" class="form-control seis_ulti_nume" placeholder="000000" /><br>
      </div><br>

      <label>NOME DO CLIENTE</label>
      <input type="text" name="name" class="form-control nameClients" readonly="readonly" style="pointer-events: none;" /><br>
      <?php if(!empty($listProdu)): ?>
        <?php foreach($listProdu as $pro): ?>
          <?php if($pro['id'] != 5):  ?>
            <button type="button" data-select="<?php echo $pro['id']; ?>" data-ativo="" data-name="<?php echo $pro['name_prod']; ?>" disabled="disabled" class="btn btn-primary clickEscolha diselComun disel<?php echo $pro['id']; ?>"><?php echo $pro['name_prod']; ?></button>
          <?php endif; ?>  
        <?php endforeach; ?>
      <?php endif; ?>  

      <!-- <input type="hidden" name="btn_ativo" class="btn_ativo" > -->

      <div class="clickSelection">
        <div class="areaCompletar1">
           <div class="areaCompletarDiv">
              <p class="pEspecial1">NÚMERO COO</p>  
              <p class="pEspecial2">LITROS <label class="clickSelectionTitulo">DIESEL</label></p>
              <p class="pEspecial3">LITROS <label class="clickSelectionTitulo">GASOLINA</label></p>
              <p class="pEspecial4">LITROS <label class="clickSelectionTitulo">ETANOL</label></p>
           </div>
           <div class="areaCompletarDiv">   
            <input type="text" maxlength="6" onkeyup="somenteNumeros(this);" name="nCoo" class="form-control nCoo" />
            <input type="text" name="nlitros"  data-ativo="" onkeyup="somenteNumeros(this);" class="form-control nlitros" placeholder="0" /> 
            <input type="text" name="nlitros2"  data-ativo="" onkeyup="somenteNumeros(this);" class="form-control nlitros2" placeholder="0" /> 
            <input type="text" name="nlitros3"  data-ativo="" onkeyup="somenteNumeros(this);" class="form-control nlitros3" placeholder="0" /> 
           </div>     
        </div> 
        <div class="areaCompletar2">
          <button type="button" class="btn btn-success pontuar"  >Pontuar</button>
        </div> 
      </div>
       <div class="clickSelection2">
        <center><h2>CONFIGURAR</h2></center>
      </div>
      <br><br><br>
      <div class="alert alert-danger campolitros">
        <strong>Preencha Campo <span style="text-transform: uppercase;" >Litros</span> ou <span style="text-transform: uppercase;" >Campo COO</span> !</strong>
      </div>
      <div class="alert alert-danger campoCooViscaliza">
        <strong>Esse código COO já foi cadastrado!</strong>
      </div>
       <div class="alert alert-danger campoCooViscaliza2">
        <strong>Você não pode usar esse código COO para pontuar! <br/> Por favor procure o GERENTE! </strong>
      </div>

    </form>
  </div>

<br><br>
</div>






























