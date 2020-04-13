<?php if(!empty($aviso)): ?> 
	<script type="text/javascript">
		$('#naoTemPermissao').modal('show');
		$('#naoTemPermissao .modal-content').css('width','100%');
		$('#naoTemPermissao').css('z-index','99999999999999');
	</script>
	<?php exit; ?>
<?php else: ?>

<?php endif; ?>	

<?php if(BASE_URL.'/painel/permissions'): ?>
	<script type="text/javascript">$('.navMenuLeft').css('display','none');$('.menuMinhaConta').css('display','block');</script>
<?php endif; ?>


<script type="text/javascript">
   $(document).ready(function(){
        $('.listNavBar ul .l2').css('background','#0f1315');
   });
</script>



<style type="text/css">
	.tabarea{height: 40px;}
	.tabitem{float: left;width: 46%;height: 40px;text-align: center;border-bottom: 1px solid #e9e9e9;padding-top: 11px;background: #ccc;cursor: pointer;}
	.activetab{border-bottom:1px solid #fff;background: #fff;}
	.tabbody{display: none;width: 93%;}

	th{background: #e9e9e9;}
	td{background: #FBFBFB;}

	<?php if(BASE_URL.'/painel/permissions'): ?>
		.menuarea2 ul .permissionsPg a{background: #000;border-left: 2px solid yellow;}
		/*
		.menuarea2 li:nth-child(1){background-image: url('<?php echo BASE_URL; ?>/assets/images/template/key.png');height: 40px;line-height: 40px;font-size: 13px;padding-left: 30px;background-size: 15px;background-repeat: no-repeat;background-position: 10px 11px;}
		*/
	<?php endif; ?>
		
	<?php if(BASE_URL.'/painel/permissions'): ?>
		.menuarea2 ul .permissionsPg a{background: #000;border-left: 2px solid yellow;}
		/*
		.menuarea2 li:nth-child(1){background-image: url('<?php echo BASE_URL; ?>/assets/images/template/key.png');height: 40px;line-height: 40px;font-size: 13px;padding-left: 30px;background-size: 15px;background-repeat: no-repeat;background-position: 10px 11px;}
		*/
	<?php endif; ?>

	.btn-default{background: #1F3F77;border:1px solid #1F3F77;color: white;padding: 11px;}
	.btn-default:hover{background: rgba(25,25,112,1);border:1px solid #1F3F77;color: white;}

	 .titulosite{position: absolute;top:100px;left: 34%;}
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
      .titulosite{position: absolute;top:100px;left: 34%;}
      .titulosite label{font-size: 2.5em;margin-top: 50px;}
    }

    @media all and (min-width: 768px){
      .titulosite{position: absolute;top:100px;left: 37%;}
      .titulosite label{font-size: 2.5em;margin-top: 50px;}
    }

    @media all and (min-width: 800px){
      .titulosite{position: absolute;top:100px;left: 38%;}
      .titulosite label{font-size: 2.5em;margin-top: 50px;}
    }

    @media all and (min-width: 960px){
      .titulosite{position: absolute;top:100px;left: 40%;}
      .titulosite label{font-size: 2.5em;margin-top: 50px;}
    }

    @media all and (min-width: 1024px){
      .titulosite{position: absolute;top:100px;left: 41%;}
      .titulosite label{font-size: 2.5em;margin-top: 50px;}
    }

    @media all and (min-width: 1280px){
      .titulosite{position: absolute;top:100px;left: 44%;}
      .titulosite label{font-size: 2.5em;margin-top: 50px;}
    }

    @media all and (min-width: 1366px){
      .titulosite{position: absolute;top:100px;left: 43%;}
      .titulosite label{font-size: 2.5em;margin-top: 50px;}
    }

    @media all and (min-width: 1680px){
      .titulosite{position: absolute;top:100px;left: 44%;}
      .titulosite label{font-size: 2.5em;margin-top: 50px;}
    }

    @media all and (min-width: 1920px){

      .titulosite{position: absolute;top:100px;left: 45%;}
      .titulosite label{font-size: 2.5em;margin-top: 50px;}

    }

</style>

<script type="text/javascript">
	
	$(function(){
		$('.tabitem').on('click', function(){
			$('.activetab').removeClass('activetab');
			$(this).addClass('activetab');

			var item = $('.activetab').index();
			$('.tabbody').hide();
			$('.tabbody').eq(item).show();
		});
		$('.tabbody').eq(0).show();
	});

</script>

<div class="container-fluid">
  <div>
    <img src="<?php echo BASE_URL; ?>/painel/assets/images/TEMPLATE/LogoBrasilComputadoresPNG2.png" border="0" alt="" class="logo" />
  </div>
  <div class="titulosite">
    <center><label >PERMISSÕES</label></center>
  </div>

  <div class="caixapontuacao">


<div class="tabarea">
	<div class="tabitem activetab">Grupos de Permissões</div>
	<?php if($grupo == 2): ?>
		<div class="tabitem">Permissões</div>
	<?php endif; ?>	
</div>
<div class="tabcontant">
	<div class="tabbody">
	 <br/><a href="<?php echo BASE_URL; ?>/painel/permissions/add_group/" class="btn btn-default">Adicionar Grupo de Permissão</a><br/><br/>
		<table class="table table-bordered" >
		    <thead>
		      <tr>
		        <th>NOME DO GRUPO DA PERMISSÃO</th>
		        <th width="160" style="text-align: center;">AÇÕES</th>
		      </tr>
		    </thead>
		    <tbody>
		    	<?php foreach($permissions_group_list as $p): ?>
				      <tr>
				        <td><?php echo $p['name']; ?></td>
				        <td>
				        	<center>
				        		
				        		<?php if($p['id'] == '2'): ?>
				        			<?php if($grupo == '2'): ?>
				        				<a href="<?php echo BASE_URL; ?>/painel/permissions/edit_group/<?php echo $p['id']; ?>" class="btn btn-info">Editar</a>
				        			<?php endif; ?>	
				        		<?php else: ?>
				        				<a href="<?php echo BASE_URL; ?>/painel/permissions/edit_group/<?php echo $p['id']; ?>" class="btn btn-info">Editar</a>
				        		<?php endif; ?>		

				        		<?php if($p['id'] != '2'): ?>
				        			<a href="<?php echo BASE_URL; ?>/painel/permissions/delete_group/<?php echo $p['id']; ?>" onClick="return confirm('Tem certeza que deseja EXCLUIR? ')" class="btn btn-danger">Excluir</a>
				        		<?php endif; ?>	

				        	</center>	
				        </td>
				      </tr>
		        <?php endforeach; ?>
		    </tbody>
		  </table>

	</div>
	<div class="tabbody">
		<br/><a href="<?php echo BASE_URL; ?>/painel/permissions/add/" class="btn btn-default">Adicionar Permissão</a><br/><br/>
		<table class="table table-bordered" >
		    <thead>
		      <tr>
		        <th>NOME DA PERMISSÃO</th>
		        <th width="12" style="text-align: center;">AÇÕES</th>
		      </tr>
		    </thead>
		    <tbody>
		    	<?php foreach($permissions_list as $p): ?>
				      <tr>
				        <td><?php echo $p['name']; ?></td>
				        <td>
				        	<center>
				        		<a href="<?php echo BASE_URL; ?>/painel/permissions/delete/<?php echo $p['id']; ?>" onClick="return confirm('Tem certeza que deseja EXCLUIR? ')" class="btn btn-danger">Excluir</a>
				        	</center>	
				        </td>
				      </tr>
		        <?php endforeach; ?>
		    </tbody>
		  </table>

	</div>
</div>
<br><br>

</div>
</div>
