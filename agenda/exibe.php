<?php
/*
    /home/paginas/agendas/exibe.php
*/
?>

<?php
$variables=(strtolower($_SERVER['REQUEST_METHOD'])== 'GET') ? $_GET : $_POST;
foreach ($variables as $k=> $v)
$$k=$v;

$tabela1 = "tb_agendas";
$tabela2 = "locais";
$tabela3 = "cidades";
$tabela4 = "galerias_cat";
$file = "$tabela1";

// FIM DA ACAO DE AGENDA

if ($acao == "ultimas") {
  $data = date("Y-m-d");
  $busca = "SELECT * FROM $tabela1 WHERE status='S' AND data1>='$data' ORDER by data1 ASC LIMIT $limite";
  $sql = mysql_query($busca);
  $total = mysql_num_rows($sql);

  if ($total > 0) {
?>
<table>

<?php
  while($dados = mysql_fetch_array($sql)) {
?>
  <tr>
    <td></td>
  </tr>

  <tr>
    <td>
      <table>
  <tr>
  <?php if ($img_thumb == S) {
          if(!empty($dados[imagem])) {
  ?>
    <td>
      <table>
        <tr>
          <td>
            <table>
              <tr>
                <td>
                  <a href="thumbs.php?w=<?=$LarguraFoto;?>&imagem=images/<?="$tabela1/$dados[imagem]";?>" rel='lightbox' title="<?=$dados[nome]?>">
                    <img src="<?="thumbs.php?w=$largura&h=$altura&imagem=images/$tabela1/$dados[imagem]";?>" width="<?=$largura?>" height="<?=$altura?>" onmouseover="makevisible(this,0)" onmouseout="makevisible(this,1)" alt="" />
                  </a>
                </td>
              </tr>
            </table>
          </td>
        </tr>
      </table>
    </td>

    <td width="8"></td>

    <?php } ?>
  <?php } ?>

    <td>

<?php
  $dados2 = mysql_fetch_array(mysql_query("SELECT * FROM $tabela2 WHERE id='$dados[id_local]'"));
  $dados3 = mysql_fetch_array(mysql_query("SELECT * FROM $tabela3 WHERE id='$dados2[id_cidade]'"));

  echo "<a href='?pg=$link_page'>";
  echo "<font class='titulos2'>".strftime("%d/%m", strtotime($dados[data1]))."</font> | $dados2[nome] em $dados3[nome]<br>";  

  $contatamanho = strlen($dados[nome]);

  if ($contatamanho > $qt_letras) {
    $nome = substr_replace($dados[nome], "...", $qt_letras, $contatamanho - $qt_letras);
  } else {
    $nome = "$dados[nome]";
  }

  echo "<font class='titulos2' color='$Cor1'>$nome</font>";
echo "</a>";

?>
  </td>
</tr>
</table>
</td>
</tr>

  <tr>
    <td height="6"></td>
  </tr>

  <tr>
    <td colspan="4" height="1" bgcolor="<?=$corcelula2?>"></td>
  </tr>

<?php } ?>
</table>
<?php } else { ?>
  <table>
    <tr>
      <td><br />
        Nenhum <b>registro</b> encontrado!<br />
      </td>
    </tr>
  </table>
  <?php } ?>
<?php }
// FIM DA ACAO DE AGENDA
?>

<?php

  if ($acao == "listar") {
    $data = date("Y-m-d");
    $busca = "SELECT * FROM $tabela1 WHERE status='S' AND data1>='$data' ORDER by data1";

    if ($paginacao == "S") {
      $total_reg = $qts_ultimos;

    if(!$page) {
      $page = "1";
    }

    $inicio = $page - 1;
    $inicio = $inicio * $total_reg;
    $limite = mysql_query("$busca LIMIT $inicio,$total_reg");
  } else {
    $limite = mysql_query("$busca");
  }

  $todos = mysql_query("$busca");
  $tr = mysql_num_rows($todos);
  $tp = @ceil($tr / $total_reg);

  if ($tr > 0) {
?>

  <?php 
    while ($dados = mysql_fetch_array($limite)) {
      $data = explode("-", $dados[data1]);
      $data1 = "$data[2]";
      $data2 = explode("-", $dados[data2]);
      $data2 = "$data2[2]";
  ?>
<div class="item-agenda"> <?php // Agenda ?>
  <div class="data-evento">
    <div class="dia-evento">
      <?php echo $data1; ?>
    </div>
    <div class="mes-evento">
      <?php
      if ($data[1] == "01") {
        $mes = "Janeiro";
      }

      if ($data[1] == "02") {
        $mes = "Fevereiro";
      }

      if ($data[1] == "03") {
        $mes = "Março";
      }

      if ($data[1] == "04") {
        $mes = "Abril";
      }

      if ($data[1] == "05") {
        $mes = "Maio";
      }

      if ($data[1] == "06") {
        $mes = "Junho";
      }

      if ($data[1] == "07") {
        $mes = "Julho";
      }

      if ($data[1] == "08") {
        $mes = "Agosto";
      }

      if ($data[1] == "09") {
        $mes = "Setembro";
      }

      if ($data[1] == "10") {
        $mes = "Outubro";
      }

      if ($data[1] == "11") {
        $mes = "Novembro";
      }

      if ($data[1] == "12") {
        $mes = "Dezembro";
      }

      ?>
      <?php echo $mes; echo $dados[data2] != "0000-00-00" ? "<span>, até o dia $data2</span>" : ""; ?>
    </div>
  </div> <!-- #Data do evento -->

    <?php if ($img_thumb == S) {
      if (!empty($dados[imagem])) { ?>
      <div class="imagem-evento">
        <img src="/timthumb.php?w=500&amp;h=120&amp;src=/images/agendas/<?php echo $dados[imagem]; ?>" alt="" />
      </div>
    <?php } ?>
  <?php } ?>
      <div class="informacao-evento">
        <div class="nome-evento">
          <?php echo $dados[nome]; ?>
        </div>
        <div class="descricao-evento">
          <?php echo $dados[descricao]; ?>
        </div>
      </div> <!-- #Informacao do evento -->
</div> <?php // #Agenda ?>
  <?php } // WHILE ?>

  <?php // INICIO DA PAGINAÇÃO
    if ($paginacao == "S") {
     // include "paginas/paginacao.php";
    }
  // FIM DA PAGINAÇÃO
  ?>
  <?php } else { ?>
    <table>
      <tr>
        <td>
          <br />Nenhum <b>registro</b> encontrado!<br /><br />
        </td>
      </tr>
    </table>
  <?php } ?>
<?php } // FIM DA ACAO DE AGENDA ?>

<?php // INICIO DA ACAO AGENDA POR ID_LOCAL
  if ($acao == "agenda_local") {
    $data = date("Y-m-d");
    $busca = "SELECT * FROM $tabela1 WHERE status='S' AND data1>='$data' AND id_local='$id' ORDER by data1 desc";

  if ($paginacao == "S") {
    $total_reg = $qts_ultimos;
    
    if (!$page) {
      $page = "1";
    }

    $inicio = $page - 1;
    $inicio = $inicio * $total_reg;
    $limite = mysql_query("$busca LIMIT $inicio,$total_reg");
  } else {
    $limite = mysql_query("$busca");
  }

  $todos = mysql_query("$busca");
  $tr = mysql_num_rows($todos);
  $tp = @ceil($tr / $total_reg);
?>

<table>
  <tr>
    <td class="titulos2 branco">PRÓXIMOS EVENTOS</td>
  </tr>
</table>

<?php if ($tr > 0) { ?>
<table>
  <tr>
    <td></td>
  </tr>

  <?php while ($dados = mysql_fetch_array($limite)) {
    $data = explode("-", $dados[data1]);
    $data1 = "$data[2]";
  ?>
  <tr>
    <td>
      <table>
        <tr>
          <td>
<?php
  echo "<font class='titulosAgenda branco'><b>$data1</b></font><br>";
  echo "<font class='titulos branco'><b>";

  if ($data[1] == "01") {
    echo "Jan";
  }

  if ($data[1] == "02") {
    echo "Fev";
  }

  if ($data[1] == "03") {
    echo "Mar";
  }

  if ($data[1] == "04") {
    echo "Abr";
  }

  if ($data[1] == "05") {
    echo "Mai";
  }

  if ($data[1] == "06") {
    echo "Jun";
  }

  if ($data[1] == "07") {
    echo "Jul";
  }

  if ($data[1] == "08") {
    echo "Ago";
  }

  if ($data[1] == "09") {
    echo "Set";
  }

  if ($data[1] == "10") {
    echo "Out";
  }

  if ($data[1] == "11") {
    echo "Nov";
  }

  if ($data[1] == "12") {
    echo "Dez";
  }

echo "</b></font>";

?>
</td>
<?php if ($img_thumb == S) { ?>
  <td>
    <a href="thumbs.php?w=<?=$LarguraFoto;?>&imagem=images/<?="$tabela1/$dados[imagem]";?>" rel='lightbox' title="<?=$dados[nome]?>"><img src="thumbs.php?w=<?=$largura?>&h=<?=$altura?>&imagem=images/<?="$tabela1/$dados[imagem]";?>">
    </a>
  </td>
<?php } ?>

<td></td>	
<td>
<?php
  echo "<font class='titulos2 cor'><b>$dados[nome]</b></font><br>";

  $sql2 = "SELECT * FROM $tabela2 WHERE id = '$dados[id_local]'";
  $sql2 = mysql_query($sql2);
  $dados2 = mysql_fetch_array($sql2);

  echo "<a href='?pg=local&id=$dados2[id]'>$dados2[nome]</a> - ";

  $sql3 = "SELECT * FROM $tabela3 WHERE id = '$dados2[id_cidade]'";
  $sql3 = mysql_query($sql3);
  $dados3 = mysql_fetch_array($sql3);

  echo "$dados3[nome]<br />";
  echo nl2br("$dados[descricao]");
?>
</td>
</tr>
</table>
</td>
</tr>

<tr>
  <td></td>
</tr>
  <?php } ?>
</table>
  <?php } else { ?>
  <table>
    <tr>
      <td>Nenhum <b>registro</b> encontrado!</td>
    </tr>
  </table>
  <?php } ?>
<?php } // FIM DA ACAO AGENDA POR ID_LOCAL ?>