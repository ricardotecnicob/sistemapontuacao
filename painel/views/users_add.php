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

</style>


<div class="container-fluid">
  <div>
    <img src="<?php echo BASE_URL; ?>/painel/assets/images/TEMPLATE/LogoBrasilComputadoresPNG2.png" border="0" alt="" class="logo" />
  </div>
  <div class="titulosite">
    <center><label >ÚSUARIOS - ADICIONAR</label></center>
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

<form method="post" class="form">

	<label for="name" class="title">Nome do Usuário</label><br/>
	<input type="text" name="name" id="name" placeholder="Nome do Usuário" autofocus="autofocus" class="form-control" required="required"><br/>

	<label for="name" class="title">Função do Usuário</label><br/>
	<input type="text" name="funcao" id="name" placeholder="Função do Usuário" autofocus="autofocus" class="form-control" required="required"><br/>

	<label for="email" class="title">Email do Usuário</label><br/>
	<input type="email" name="email" id="email" placeholder="E-mail do Usuário" autofocus="autofocus" class="form-control" ><br/>

	<label for="password" class="title">Senha do Usuário</label><br/>
	<input type="password" autocomplete="off" name="password" id="password" placeholder="Senha do Usuário" autofocus="autofocus" class="form-control" required="required"><br/>

	<label for="group" class="title">Groupo de Permissões</label><br/>
	<select name="group" class="form-control" id="group" required="required" >
		<option value="" selected="">Escolha um Grupo</option>

      <?php foreach($group_list as $g): ?>
        <center>
          <?php if($grupo == 2): ?>
              <option value="<?php echo $g['id']; ?>"  ><?php echo $g['name']; ?></option>
          <?php elseif($grupo == 13): ?>  
              <?php if($g['id'] != 2): ?>
               <option value="<?php echo $g['id']; ?>"  <?php echo($g['id'] == $user_info['id_group'])?'selected="selected"':''; ?> ><?php echo $g['name']; ?></option>
              <?php endif; ?>  
          <?php elseif($grupo == 19): ?>  
              <?php if($g['id'] != 2 && $g['id'] != 13 && $g['id'] != 14 && $g['id'] != 19): ?>
                <option value="<?php echo $g['id']; ?>"  ><?php echo $g['name']; ?></option>
              <?php endif; ?>  
          <?php endif; ?>   
        </center>
      <?php endforeach; ?>


	</select><br/>


	<input type="submit" class="btn btn-default add" value="Adicionar" >
	<a href="<?php echo BASE_URL; ?>/painel/users/" class="btn btn-danger" >Cancelar</a>
	
</form>

<br><br>
</div>
</div>
