<style type="text/css">
	.bordamenu{border-bottom:1px solid #2b2d76;}

	.titleForm{font-size: 2em;margin-top: 50px;margin-bottom: 50px;}
	.titleForm label{}

	.contentForm{max-width: 768px; margin:auto;padding: 10px;}
	.contentForm label{margin-top: 20px;}
	.envioForm{padding: 10px;background: #2b2d76;color: white;border-radius: 3px;}
	.envioForm:hover{background: #13143e;color: white;}

	.mapForm{width: 100%;height: 400px;}
	.mapForm iframe{width: 100%;height: 100%;}
</style>

<script type="text/javascript">
   $(document).ready(function(){
        $('.menulist .m6').addClass('active');
   });
</script>



<div class="formularioContato">
	<div class="titleForm">
		<center><label style="color: #000;" >FALE CONOSCO</label></center>
	</div>
	<div class="contentForm">
		<form method="POST" class="">
			<label><i class="fa fa-caret-right"></i> NOME DA EMPRESA/PESSOA: </label><br>
			<input type="text" name="name" class="form-control" required="required" >

			<label><i class="fa fa-caret-right"></i> TELEFONE: </label><br>
			<input type="text" name="phone" class="form-control" required="required" >

			<label><i class="fa fa-caret-right"></i> E-MAIL: </label><br>
			<input type="email" name="email" class="form-control" required="required" >

			<label><i class="fa fa-caret-right"></i> ASSUNTO: </label><br>
			<input type="text" name="assunto" class="form-control" required="required" >

			<label><i class="fa fa-caret-right"></i> MENSAGEM: </label><br>
			<textarea  name="menssage" class="form-control" style="height: 150px;" required="required" ></textarea><br>

			<input type="submit" name="" class="envioForm" value="ENVIAR"><br><br>

		</form>
	</div>
</div>

<div class="mapForm">
	<iframe src="<?php echo $info_contact['linkmap']; ?>" frameborder="0" style="border:0" allowfullscreen></iframe>
</div>

