<?php
/*
    /home/paginas/agenda.php 
*/
?>
<div id="agenda">
  <div class="icone">
    <img src="/images/setona.jpg" alt="" />
  </div>
  <div class="header-agenda">
    <h1>Agenda de eventos</h1>
  </div>
<?php
  $largura = 100;
  $limite = 10;
  $qt_letras = 60;
  $palavra = "Agenda";
  $link_page = "agenda";
  $fotos = "S";
  $paginacao = "S";
  $img_thumb = "S";
  $outras = "N";
  $Cor1 = "#003399";
  $Cor2 = "#000000";
  $acao = "listar";
  include "agendas/exibe.php";
?>
</div>