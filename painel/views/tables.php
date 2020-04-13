<?php if(!empty($naotempermissao)): ?>
  <script type="text/javascript">
    $(document).ready(function(){
      $('#naoTemPermissao').modal('show');
    });
  </script> 
<?php endif; ?>  

<script type="text/javascript">
    $(document).ready(function(){
      $('.m5').addClass('ativo');
    });
</script> 

   <style type="text/css">

    .container-fluid{margin-top: 100px;}
    .caixapontuacao{}
    .caixapontuacao .titlePontu{font-size: 1.2em;}
    .tableDePontos{width: 200px;height: 150px;background: #26325c;font-size: 1.3em;text-align: center;padding-top: 50px;font-weight: bold;color: white;border-radius: 5px;}
    .tableDePontos:hover{cursor: pointer;background: #1c274e; }
    a:hover{text-decoration: none;}

  </style>


<div class="container-fluid">
  <div>
    <img src="<?php echo BASE_URL; ?>/painel/assets/images/TEMPLATE/LogoBrasilComputadoresPNG2.png" border="0" alt="" class="logo" />
  </div>
  <div class="titulosite">
    <center><label >MINHAS TABELAS</label></center>
  </div>

  <div class="caixapontuacao">
    <label class="titlePontu"></label><br><br>

    <a href="<?php echo BASE_URL; ?>/painel/tables/info_table_pontos">
      <div class="tableDePontos">
            TABELAS <br> DE PONTOS
      </div>
    </a>

  </div>

<br><br>
</div>






























