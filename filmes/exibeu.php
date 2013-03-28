<?php
$variables=(strtolower($_SERVER['REQUEST_METHOD'])== 'GET') ? $_GET : $_POST;

foreach ($variables as $k=> $v)
$$k=$v;

$tabela1 = "tb_filmes";
$tabela2 = "users";
$tabela3 = "cidades";
$file = "$tabela1";

if ($acao == "ultimo_filme") {
  if (!empty($limite2)) {
    $limite2 = "LIMIT $limite2";
  }

  $busca = "SELECT * FROM $tabela1 WHERE status='S' AND id_cat='$id' $ordem ";

  if ($paginacao == "S") {
    $total_reg = $qts_ultimos; ;

    if (!$page) {
      $page = "1";
    }

    $inicio = $page - 1;
    $inicio = $inicio * $total_reg;
    $limite = mysql_query("$busca LIMIT $inicio,$total_reg");
  } else {
    $limite = mysql_query("$busca $limite2");
  }

  $todos = mysql_query("$busca");
  $tr = mysql_num_rows($todos);
  $tp = @ceil($tr / $total_reg);

  if ($tr > 0) {
?>

<table border="0" cellpadding="1" cellspacing="0">
  <?php
  $total = mysql_num_rows($limite); 

  if ($total > 0) {
    for ($i = 0; $i < $total; $i += 1) {
      if (($i % $colunas) == 0) {
        $colspan = $colunas + $colunas + $colunas;
  ?>
  <tr>
  <?php } ?>
  <?php $dados = mysql_fetch_array($limite); ?>

  <td align="center" valign="top">
    <table border="0" cellpadding="0" cellspacing="0" onmouseover="this.style.backgroundColor='#E4EAED';" onmouseout="this.style.backgroundColor='#F7F7F7';">
      <tr>
        <td width="<?=$largura_coluna?>" align="right" valign="middle">
          <table width="100%" border="0" align="left" cellpadding="0" cellspacing="0">
            <tr>
              <?php if (!empty($dados[foto])) { ?>
              <td width="100px" height="<?=$altura+10;?>" align="left" valign="top">
                <table border="0" cellpadding="1" cellspacing="0" width="100px" >
                  <tr>
                    <td>
                      <table border="0" cellspacing="0" cellpadding="1" width="130px">
                        <tr>
                          <td>
                            <a href='<?="/filme/$dados[id]";?>-<?= str_replace(" ","_",$dados['titulo']); ?>.html' class="test img_borda">
                              <img src="<?="/thumbs.php?w=$largura&h=$altura&imagem=images/filmes/$dados[id]/$dados[foto]";?>" width="<?=$largura?>" height="<?=$altura?>" border="0" style="FILTER: alpha(opacity=100);" onMouseOver="makevisible(this,0)" onMouseOut="makevisible(this,1)">
                            </a>
                          </td>
                        </tr>
                      </table>
                    </td>
                  </tr>
                </table>
              </td>
              <?php }?>
              <td align="right" valign="middle">
              <?php if ($exibir_cat=="S") { ?>
                <table width="100%" border="0" cellpadding="1" cellspacing="0">
                  <tr>
                    <td bgcolor="<?=$corcelula2?>">
                    <?php
                      $dados2 = mysql_fetch_array(mysql_query("SELECT * FROM tb_filmes_cat WHERE id='$dados[id_cat]'"));
                      echo "<div><b>$dados2[nome]</b></div>";	
                    ?>
                    </td>
                  </tr>
                  <tr>
                    <td height="3"></td>
                  </tr>
                </table>
            <?php } ?>
                <table width="100%" border="0" cellpadding="0" cellspacing="0">
                  <tr>
                    <td>
                      <a href='<?="/filme/$dados[id]";?>-<?= str_replace(" ","_",$dados['titulo']); ?>.html'>
                      <?php
                        $contatamanho1 = strlen($dados[titulo]);

                        if ($contatamanho1 > $qt_letras1) {
                          $titulo = substr_replace($dados[titulo], "...", $qt_letras1, $contatamanho1 - $qt_letras1);
                        } else {
                          $titulo = $dados[titulo];
                        }

                        $contatamanho2 = strlen($dados[subtitulo]);

                        if ($contatamanho2 > $qt_letras2) {
                          $subtitulo = substr_replace($dados[subtitulo], "...", $qt_letras2, $contatamanho2 - $qt_letras2);
                        } else {
                          $subtitulo = $dados[subtitulo];
                        }

                        echo "<div>$titulo</div><br />";
                        echo "<div>$subtitulo</div></b><br />";	
                        echo "</a>";
                      ?>
                  </td>
                </tr>
              </table>
            </td>
          </tr>
        </table>
      </td>
    </tr>
    <tr>
      <td height="2" colspan="4"></td>
    </tr>

    <tr>
      <td colspan="4" height="1" bgcolor="<?=$corcelula2?>"></td>
    </tr>

    <tr>
      <td height="2" colspan="4"></td>
    </tr>
  </table>
</td>
  <?php } ?>
    </tr>
<?php } ?>
</table>
<?php
if ($paginacao == "S") {
  include "paginas/paginacao.php";
}
?>
<?php } else { ?>
  <table width="100%" border="0" cellspacing="0" cellpadding="0">
    <tr>
      <td align="center"><br />
        Nenhum <b>registro</b><b> </b>encontrado!<br />
        <br />
      </td>
    </tr>
  </table>
<?php
  } // FIM DO ELSE
} // FIM DA ACAO VER ULTIMAS
?>

<?php
  if ($acao == "ver_todos") {
    if (!empty($limite2)) {
      $limite2 = "LIMIT $limite2";
    }

    $busca = "SELECT * FROM $tabela1 WHERE status='S' $ordem";

    if ($paginacao == "S") {
      $total_reg = "10";

      if (!$page) {
        $page = "1";
      }

      $inicio = $page - 1;
      $inicio = $inicio * $total_reg;
      $limite = mysql_query("$busca LIMIT $inicio,$total_reg");
  } else {
    $limite = mysql_query("$busca $limite2");
  }

  $todos = mysql_query("$busca");
  $tr = mysql_num_rows($todos);
  $tp = @ceil($tr / $total_reg);
  
  if($tr > 0) {
?>
<table border="0" cellpadding="1" cellspacing="0">
<?php
$total = mysql_num_rows($limite);

if ($total>0) {
  for ($i = 0; $i < $total; $i += 1) {
    if (($i % $colunas) == 0) {
      $colspan = $colunas+$colunas+$colunas;
?>
  <tr>
<?php } ?>

<?php $dados = mysql_fetch_array($limite); ?>
  <td align="center" valign="top"><table border="0" cellpadding="0" cellspacing="0">
    <tr>
      <td width="<?=$largura_coluna?>" align="right" valign="middle"><table width="100%" border="0" align="left" cellpadding="0" cellspacing="0">
        <tr>
          <?php if (!empty($dados[foto])) { ?>
          <td width="100px" height="<?=$altura+10;?>" align="left" valign="top">
            <table border="0" cellpadding="1" cellspacing="0" width="100px" >
              <tr>
                <td>
                  <table border="0" cellspacing="0" cellpadding="1" width="130px">
                    <tr>
                      <td>
                        <a href='<?="/filme/$dados[id]";?>-<?= str_replace(" ","_",$dados['titulo']); ?>.html' class="test img_borda"><img src="<?="/thumbs.php?w=$largura&h=$altura&imagem=images/filmes/$dados[id]/$dados[foto]";?>" width="<?=$largura?>" height="<?=$altura?>" border="0" style="FILTER: alpha(opacity=100);" onMouseOver="makevisible(this,0)" onMouseOut="makevisible(this,1)"></a>
                      </td>
                    </tr>
                  </table>
                </td>
              </tr>
            </table>
          </td>
<?php } ?>
  <td align="right" valign="top">
  <? if ($exibir_cat=="S") { ?>
    <table width="100%" border="0" cellpadding="1" cellspacing="0">
      <tr>
        <td bgcolor="<?=$corcelula2?>">
          <?php
            $dados2 = mysql_fetch_array(mysql_query("SELECT * FROM tb_filmes_cat WHERE id='$dados[id_cat]'"));
            echo "<font size='4' color='#004df3' face='Trebuchet MS'><b>$dados2[nome]</b></font> - ";

          ?>
        </td>
      </tr>
      <tr>
        <td height="3"></td>
      </tr>
    </table>

  <?php } ?>

  <table width="100%" border="0" cellpadding="0" cellspacing="0">
    <tr>
      <td>
        <a href='<?="/filme/$dados[id]";?>-<?= str_replace(" ","_",$dados['titulo']); ?>.html' class="titulos_filmes">
        <?php
          $contatamanho1 = strlen($dados[titulo]);

          if ($contatamanho1 > $qt_letras1) {
            $titulo = substr_replace($dados[titulo], "...", $qt_letras1, $contatamanho1 - $qt_letras1);
          } else {
            $titulo = $dados[titulo];
          }
          
          $contatamanho2 = strlen($dados[subtitulo]);
          
          if ($contatamanho2 > $qt_letras2) {
            $subtitulo = substr_replace($dados[subtitulo], "...", $qt_letras2, $contatamanho2 - $qt_letras2);
          } else {
            $subtitulo = $dados[subtitulo];
          }

          echo "$titulo<br>";
          echo "<font size='2' color='#004df3'>$subtitulo</font><br>";
          echo "</a>";
        ?>
      </td>
    </tr>
  </table>
</td>
</tr>
</table>
</td>
</tr>
<tr>
  <td height="2" colspan="4"></td>
</tr>
    <tr>
      <td colspan="4" height="1" bgcolor="<?=$corcelula2?>"></td>
    </tr>

    <tr>
      <td height="2" colspan="4"></td>
    </tr>
  </table>
</td>

<?php } ?>
  </tr>
<?php } ?>
</table>
<?php
  if ($paginacao == "S") {
    include "paginas/paginacao.php";
  }
?>

<?php } else { ?>
  <table width="100%" border="0" cellspacing="0" cellpadding="0">
    <tr>
      <td align="center"><br />
        Nenhum <b>registro</b><b> </b>encontrado!<br />
        <br />
      </td>
    </tr>
  </table>

<?php
  } // FIM DO ELSE
} // FIM DA ACAO VER ULTIMAS
?>