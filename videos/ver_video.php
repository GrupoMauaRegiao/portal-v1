<div id="videos">
  <div class="header-videos">
    <div class="imagem">
      <img src="/images/setona.jpg" alt="" />
    </div>
    
    <div class="titulo">
      <h1>
        V&iacute;deos
      </h1>
    </div>
  </div>

<?php
  $FormatoForm = "V";
  include "videos/busca.php";

  $id = trim($url_parts[1]);
  $acao = $_GET[acao]; 
?>

<div class="video-destaque">
  <?php
    if ($acao != "busca") {
      $acao = "VerFlash";
      include "videos/ajax.php";
    }
  ?>
</div>

<?php if ($acao != "busca") { ?>
<div class="videos-filtrados">
  <div class="header">
    <h2>V&iacute;deos relacionados</h2>
  </div>
    <?
      $largura = 142;
      $altura = 105; 
      $limite2 = 6;
      $colunas = 3;
      $largura_coluna = 150; 
      $qt_letras1 = 38;
      $palavra = "Vídeos";
      $paginacao = "N";
      $img_thumb = "S";
      $acao = "ver2";
      $Cor1 = "#FF9900";
      $Cor2 = "#000000";
      $ordem = "ORDER BY rand()";
      include "videos/exibe2.php";
    ?>
  </div>
<? } else {?>
<div class="videos-filtrados">
  <div class="header">
    <h2>Resultados de V&iacute;deos</h2>
  </div>
    <?
      $largura = 142;
      $altura = 105; 
      $limite2 = 6;
      $colunas = 3;
      $largura_coluna = 150; 
      $qt_letras1 = 38;
      $palavra = "Vídeos";
      $link_page = "entretenimento__vídeo";
      $link_page2 = "?pg=$_GET[pg]&acao=$_GET[acao]&page=$_GET[page]&key=$_GET[key]&id_categoria=$_GET[id_categoria]";
      $paginacao = "S";
      $img_thumb = "S";
      $acao = "ver2";
      $Cor1 = "#FF9900";
      $Cor2 = "#000000";
      $ordem = "ORDER BY nome";
      include "videos/exibe2.php";
    ?>
  </div>
<? }?>
  </div>
</div> <!-- #Videos -->