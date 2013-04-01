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
  <h2>V&iacute;deos recentes</h2>
</div>

<?php
$largura = 130;
$altura = 82;
$limite2 = 6;
$colunas = 3;
$largura_coluna = 150;
$qt_letras1 = 38;
$palavra = "Vídeos";
$link_page = "vídeo";
$link_page2 = "?pg=vídeo";
$paginacao = "N";
$img_thumb = "S";
$acao = "ver2";
$Cor1 = "#003399";
$Cor2 = "#000000";
$ordem = "ORDER BY id DESC";
include "videos/exibe2.php";
?>

<div class="videos-filtrados">
  <h2>Os 10 mais visualizados</h2>
</div>

<?
$largura = 100;
$altura = 65;
$limite2 = 9;
$colunas = 3;
$largura_coluna = 150;
$qt_letras1 = 38;
$palavra = "Vídeos";
$link_page = "vídeo";
$link_page2 = "?pg=vídeo";
$paginacao = "N";
$img_thumb = "S";
$acao = "ver2";
$Cor1 = "#003399";
$Cor2 = "#000000";
$ordem = "ORDER BY visitas DESC";
include "videos/exibe2.php";
?>