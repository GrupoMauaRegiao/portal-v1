<?php
/*
    /home/paginas/agenda.php 
*/
?>

<table width="100%" border="0" cellpadding="0" cellspacing="0"> 

  <tr>
    <td>
      <img src="/images/setona.jpg" width="30" height="30" />
      <div>Agenda de Eventos</div>
    </td>
  </tr>

  <tr>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>
<?
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
    </td>
  </tr>

</table>