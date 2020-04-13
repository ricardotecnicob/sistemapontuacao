<style type="text/css"> 
	.photoNow{width: 150px;height: 150px;border-radius: 100%;}
	.photoNow img{width: 100%;border-radius: 100%;}
	.myPorfileForm{margin: auto;width: 80%;}
	.myPorfileForm label{font-size: 1.3em;}
	.alterarSenha{font-size: 1.8em;}
	.avisoErro{display: none;}

	.linha{height: 1px;margin:auto;background: #ccc;margin-bottom: 10px;margin-top: 10px;}

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
      .titulosite{position: absolute;top:100px;left: 37%;}
      .titulosite label{font-size: 2.5em;margin-top: 50px;}
    }

    @media all and (min-width: 960px){
      .titulosite{position: absolute;top:100px;left: 40%;}
      .titulosite label{font-size: 2.5em;margin-top: 50px;}
    }

    @media all and (min-width: 1024px){
      .titulosite{position: absolute;top:100px;left: 40%;}
      .titulosite label{font-size: 2.5em;margin-top: 50px;}
    }

    @media all and (min-width: 1280px){
      .titulosite{position: absolute;top:100px;left: 41%;}
      .titulosite label{font-size: 2.5em;margin-top: 50px;}
    }

    @media all and (min-width: 1366px){
      .titulosite{position: absolute;top:100px;left: 42%;}
      .titulosite label{font-size: 2.5em;margin-top: 50px;}
    }

    @media all and (min-width: 1680px){
      .titulosite{position: absolute;top:100px;left: 43%;}
      .titulosite label{font-size: 2.5em;margin-top: 50px;}
    }

    @media all and (min-width: 1920px){

      .titulosite{position: absolute;top:100px;left: 44%;}
      .titulosite label{font-size: 2.5em;margin-top: 50px;}

    }


</style>

<script type="text/javascript">
	$(function(){
		$('.pass02').on('blur', function(){
			var pass01 = $('input[name="pass01"]').val();
			var pass02 = $('input[name="pass02"]').val();

			if(pass01 != ''){
				if(pass01 == pass02){
					//$('.Btalterar').removeClass('disabled');
					$('.avisoErro').css('display','none');
					$('.pass02').css('border','1px solid green');
					$('.Btalterar').removeClass('disabled');
				}else{
					$('.Btalterar').addClass('disabled');
					$('.avisoErro').css('display','block');
					$('.pass02').css('border','1px solid red');
				}
			}	
		});
	});
</script>


<div class="container-fluid">
  <div>
    <img src="<?php echo BASE_URL; ?>/painel/assets/images/TEMPLATE/LogoBrasilComputadoresPNG2.png" border="0" alt="" class="logo" />
  </div>
  <div class="titulosite">
    <center><label >MEU PERFIL</label></center>
  </div>

  <div class="caixapontuacao">

<div id="uploadimageModal5" class="modal" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">TAMANHO MAXIMO 338x338</h4>
          </div>
          <div class="modal-body">
            <div class="row">
            <div class="col-md-8 text-center">
              <div id="image_demo5" style="width:350px; margin-top:30px"></div>
            </div>
            <div class="col-md-4" style="padding-top:30px;">
              <br />
              <br />
              <br/>
              <button class="btn btn-success crop_image5">CORTAR IMAGEM</button>
          </div>
        </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">SAIR</button>
          </div>
      </div>
    </div>
</div>


<form method="POST" enctype="multipart/form-data" class="myPorfileForm">

	<center>	
		<?php if(empty($viewData['user_imagem'])): ?>
			<div class="photoNow"><img src="<?php echo BASE_URL; ?>/painel/assets/images/TEMPLATE/user2.png" border="0" alt=""></div><br/>
		<?php else: ?>
			<div class="photoNow"><img src="<?php echo BASE_URL; ?>/painel/assets/images/<?php echo $viewData['user_imagem']; ?>" border="0" alt=""></div><br/>
		<?php endif; ?>	
	</center>

	 				<div class="panel panel-default">
                        <div class="panel-heading">ADICIONAR FOTO DE PERFIL <span style="color: red">1MB</span></div>
                        <div class="panel-body" align="center">
                          <input type="file" class="form-control" name="upload_image5 " id="upload_image5" />
                          <br />
                          <div id="uploaded_image5"></div>
                        </div>
                     </div>

	<label>Nome Usuário:</label>
	<input type="text" name="nameNew" value="<?php echo $viewData['user_name']; ?>" required="required" placeholder="Name User" class="form-control" ><br>
	<label>E-mail Usuário:</label><br>
	<?php echo $viewData['user_email']; ?>
	<br><br>

	<p class="linha"></p>

	<?php if($grupo == 2 || $grupo == 13): ?>
		<span class="alterarSenha">Trocar a senha</span><br><br>

		<label>Nova Senha:</label><br>
		<input type="password" autocomplete="off" name="pass01" placeholder=" " class="form-control pass01" ><br>
		<label>Nova Senha<span>(novamente)</span>:</label><br>
		<input type="password" name="pass02" placeholder=" " autocomplete="off"  class="form-control pass02" ><br>
		<div class="alert alert-danger avisoErro">SENHAS DIFERENTES!</div>

	<?php endif; ?>

	<input type="submit" name="" class="btn btn-default Btalterar" value="ALTERAR">
	<a href="<?php echo BASE_URL; ?>/painel/" class="btn btn-danger" >Cancelar</a>


</form>
<br><br>
</div>
</div>


<br><br>


<script>  
	$(document).ready(function(){

			$image_crop = $('#image_demo5').croppie({
		    enableExif: true,
		    viewport: {
		      width:338,
		      height:338,
		      type:'circle' //circle square
		    },
		    boundary:{
		      width:300,
		      height:300
		    }
		  });


		  $('#upload_image5').on('change', function(){
		    var reader = new FileReader();
		    reader.onload = function (event) {
		      $image_crop.croppie('bind', {
		        url: event.target.result
		      }).then(function(){
		        console.log('jQuery bind complete');
		      });
		    }
		    reader.readAsDataURL(this.files[0]);
		    $('#uploadimageModal5').modal('show');
		  });

		  $('.crop_image5').click(function(event){
		    $image_crop.croppie('result', {
		      type: 'canvas',
		      size: 'viewport'
		    }).then(function(response){
		      $.ajax({
		        url:"<?php echo BASE_URL; ?>/painel/users/imgdepoiment",
		        type: "POST",
		        async: true,
		        data:{"image": response},
		        success:function(data)
		        {
		          $('#uploadimageModal5').modal('hide');
		          $('#uploaded_image5').html(data);
		        }
		      });
		    })
		  });

	});  
</script>

