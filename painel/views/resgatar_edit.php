<?php if(!empty($aviso)): ?> 
  <script type="text/javascript">
    $('#naoTemPermissao').modal('show');
    $('#naoTemPermissao .modal-content').css('width','100%');
    $('#naoTemPermissao').css('z-index','99999999999999');
  </script>
  <?php exit; ?>
<?php else: ?>

<?php endif; ?> 

<?php if(BASE_URL.'/painel/users'): ?>
  <script type="text/javascript">$('.navMenuLeft').css('display','none');$('.menuMinhaConta').css('display','block');</script>
<?php endif; ?>

<script type="text/javascript">
    $(document).ready(function(){
      $('.m4').addClass('ativo');
      //$('#myModalPremiacao').modal();
    });
</script> 

<style type="text/css">
  .table-bordered{width: 93%;}

  <?php if(BASE_URL.'/painel/users'): ?>
    .menuarea2 ul .userPg a{background: #000;border-left: 2px solid yellow;}/*
    .menuarea2 li:nth-child(2){background-image: url('<?php echo BASE_URL; ?>/assets/images/template/user.png');height: 40px;line-height: 40px;font-size: 13px;padding-left: 30px;background-size: 15px;background-repeat: no-repeat;background-position: 10px 11px;}*/
  <?php endif; ?>
    
  <?php if(BASE_URL.'/painel/users'): ?>
    .menuarea2 ul .userPg a{background: #000;border-left: 2px solid yellow;}/*
    .menuarea2 li:nth-child(2){background-image: url('<?php echo BASE_URL; ?>/assets/images/template/user.png');height: 40px;line-height: 40px;font-size: 13px;padding-left: 30px;background-size: 15px;background-repeat: no-repeat;background-position: 10px 11px;}*/
  <?php endif; ?>


        .titulosite{position: absolute;top:100px;left: 25%;}
      .titulosite label{font-size: 2.5em;margin-top: 50px;}

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

    .imagemAtual{height: 200px;}

</style>


<div class="container-fluid">
  <div>
    <img src="<?php echo BASE_URL; ?>/painel/assets/images/TEMPLATE/LogoBrasilComputadoresPNG2.png" border="0" alt="" class="logo" />
  </div>
  <div class="titulosite">
    <center><label >EDITANDO - PRÊMIO</label></center>
  </div>

  <div class="caixapontuacao">

<?php if(!empty($error_msg)): ?>
  <div class="alert alert-danger"><?php echo $error_msg; ?></div>
<?php endif; ?> 

<script type="text/javascript">
   $(document).ready(function(){
        $('.listNavBar ul .l3').css('background','#0f1315');
   });
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
      function somenteNumerosInteiros(num){
        var er = /[^0-9]/;
          er.lastIndex = 0;
          var campo = num;
          if (er.test(campo.value)) {
            campo.value = "";
          }
      }
   </script>

<!-- 
    antes de enviar ver se 
    quantitade é um numero
    e quantos pontos
 -->

 

<form method="POST" class="form" enctype="multipart/form-data" >

  <center>
      <img src="<?php echo BASE_URL; ?>/painel/assets/images/<?php echo $infopremio['imagem']; ?>" border="0" alt="" class="imagemAtual" />
      <br><label>IMAGEM ATUAL</label>
  </center>
  <br>

  <label for="imagempremio" class="title">Imagem Prêmio <strong style="color: red;font-size: .9em;" >( OBS: TAMANHO MÁXIMO 1MB / 100px X 100px )</strong></label><br/>
  <input type="file" name="imagempremio" id="imagempremio" placeholder="Imagem Prêmio" autofocus="autofocus"  class="form-control"  ><br/>

  <label for="name" class="title">Nome do Prêmio</label><br/>
  <input type="text" name="name" id="name" placeholder="Nome do Prêmio" autofocus="autofocus" class="form-control" value="<?php echo $infopremio['name']; ?>" required="required"><br/>

  <label for="name" class="title">Quantidade em Estoque</label><br/>
  <input type="text" name="quantestoque" onkeyup="somenteNumerosInteiros(this);" id="quantestoque" placeholder="0" value="<?php echo $infopremio['quantidade']; ?>" autofocus="autofocus" class="form-control" required="required"><br/>

  <label for="pontos" class="title">Quantos Pontos</label><br/>
  <input type="text" autocomplete="off" onkeyup="somenteNumeros(this);" name="pontos" id="pontos" placeholder="0" value="<?php echo $infopremio['quantos_pontos']; ?>" autofocus="autofocus" class="form-control" required="required"><br/>


  <input type="submit" class="btn btn-default add" value="Atualizar" >
  <a href="<?php echo BASE_URL; ?>/painel/" class="btn btn-danger" >Cancelar</a>
  
</form>

<br><br>
</div>
</div>
