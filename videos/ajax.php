<?php

@include "../../config.php";
extract($_GET);
extract($_POST);
$palavra1 = "Categorias";
$palavra2 = "Sub-Categorias";
$tabela1 = "tb_videos";
$tabela2 = $tabela1."_categorias";

// iniçio da acao SUBCATEGORIAS

if ($acao == "VerFlash") {
  $busca = "SELECT * FROM $tabela1 WHERE status='S' AND id='$id'";
  $sql = mysql_query($busca);
  $dados = mysql_fetch_array($sql);

  // Contabiliza visitas
  $visitas = $dados[visitas];
  $visitas +=1 ;
  $var = "UPDATE $tabela1 SET visitas='$visitas' WHERE id='$id'";
  $sql = mysql_query($var);
  $Cor1 = "#003399";
  $Cor2 = "#000000";
  $tira1 = "425";
  $inseri1 = "100%";
  $html1 = str_replace($tira1, $inseri1, $dados[html]);
  $tira2 = "344";
  $inseri2 = "338";
  $html2 = str_replace($tira2, $inseri2, $html1);
  $sql2 = "SELECT * FROM $tabela2 WHERE id='$dados[id_categoria]'";
  $sql2 = mysql_query($sql2);
  $dados2 = mysql_fetch_array($sql2);
?>

  <? if (!empty($dados[descricao])) {?>
    <div class="descricao">
      <p>
        <?php echo $dados[descricao]; ?>
      </p>
    </div>
  <? }?>

  <div class="categoria">
    <p>
      <b>Categoria:</b> <?php echo $dados2[nome]; ?>
    </p>
  </div>

  <div class="descricao">
    <p>
      <?php $dados[nome]; ?>
    </p>
  </div>

  <div class="data">
    <p>
      <?php echo strftime("%d/%m/%Y", strtotime($dados[data])); ?>
    </p>
  </div>

  <div class="views">
    <p>
      <b>Views:</b> <?php echo $dados[visitas]; ?>
    </p>
  </div>
  
  <?php echo $html2; ?>

<? } ?>