<div id="videos">
  <?php 
  $FormatoForm = "V";
  include "videos/busca.php";

  $largura = 60;
  $altura = 50;
  $limite2 = 1;
  $colunas = 1;
  $Cor1 = "#000000";
  $Cor2 = "#000000";
  $acao = "ver_destaque";
  $ordem = "ORDER BY rand()";

  include "videos/exibe.php";

  ?>

  <div class="videos-filtrados">
    <div class="header">
      <h2>V&iacute;deos recentes</h2>
    </div>
  <?php
  $largura = 130;
  $altura = 82;
  $limite2 = 6;
  $colunas = 3;
  $largura_coluna = 150;
  $qt_letras1 = 38;
  $palavra = "V�deos";
  $link_page = "v�deo";
  $link_page2 = "?pg=v�deo";
  $paginacao = "N";
  $img_thumb = "S";
  $acao = "ver2";
  $Cor1 = "#003399";
  $Cor2 = "#000000";
  $ordem = "ORDER BY id DESC";
  include "videos/exibe2.php";
  ?>
  </div>

  <div class="videos-filtrados">
    <div class="header">
      <h2>Os 10 mais visualizados</h2>
    </div>
  <?
  $largura = 100;
  $altura = 65;
  $limite2 = 9;
  $colunas = 3;
  $largura_coluna = 150;
  $qt_letras1 = 38;
  $palavra = "V�deos";
  $link_page = "v�deo";
  $link_page2 = "?pg=v�deo";
  $paginacao = "N";
  $img_thumb = "S";
  $acao = "ver2";
  $Cor1 = "#003399";
  $Cor2 = "#000000";
  $ordem = "ORDER BY visitas DESC";
  include "videos/exibe2.php";
  ?>
  </div>
</div> <!-- #Videos -->