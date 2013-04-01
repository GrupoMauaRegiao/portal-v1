<?
$numeroVideo = 0;

$variables=(strtolower($_SERVER['REQUEST_METHOD'])== 'GET') ? $_GET : $_POST;

foreach ($variables as $k=> $v)

$$k=$v;
$id = $_GET[id];
$palavra = "Vídeos";
$tabela1 = "tb_videos";
$file = "videos";
// FIM DA ACAO LISTAR

if ($acao == "listar") {
  $dia = $_GET[dia];
  $mes = $_GET[mes];
  $ano = $_GET[ano];

  if (!empty($dia))
  $wh01 = "AND data1 LIKE ('%-%-".$dia."')";

  if (!empty($mes))
  $wh02 = "AND data1 LIKE ('%-".$mes."-%')";

  if (!empty($ano))
  $wh03 = "AND data1 LIKE ('".$ano."-%-%')";

  $busca = "SELECT * FROM $tabela1 WHERE status='S' AND id_categoria='$idcat' $wh01 $wh02 $wh03 order by data1 desc";

  if ($paginacao == "S") {
    $total_reg = $qts_ultimos;
    
    if (!$page) {
      $page = "1";
    }

    $inicio = $page-1;
    $inicio = $inicio*$total_reg;
    $limite = mysql_query("$busca LIMIT $inicio,$total_reg");
  } else {
    $limite = mysql_query("$busca");
  } 

$todos = mysql_query("$busca");
$tr = mysql_num_rows($todos);
$tp = @ceil($tr / $total_reg);

?>

<?

$dia = (!empty($_GET[dia]))?"$_GET[dia]":date("d");
$mes = (!empty($_GET[mes]))?"$_GET[mes]":date("m");
$ano = (!empty($_GET[ano]))?"$_GET[ano]":date("Y");

?>

<form id="busca" name="busca" method="get">
  <input name="pg" type="hidden" id="pg" value="<?=$_GET[pg]?>">
  <table border="0" cellpadding="2" cellspacing="0">
    <tr>
      <td><b>Filtrar:</b></td>
      <td>
        <select name="mes" style="width:120;" class="input" onblur="this.className='input';" onfocus="this.className='inputon';" >
          <option value="" >--</option>
          <option value="01" <?=($mes == 01)?"selected":"";?>>Janeiro</option>
          <option value="02" <?=($mes == 02)?"selected":"";?>>Fevereiro</option>
          <option value="03" <?=($mes == 03)?"selected":"";?>>Mar&ccedil;o</option>
          <option value="04" <?=($mes == 04)?"selected":"";?>>Abril</option>
          <option value="05" <?=($mes == 05)?"selected":"";?>>Maio</option>
          <option value="06" <?=($mes == 06)?"selected":"";?>>Junho</option>
          <option value="07" <?=($mes == 07)?"selected":"";?>>Julho</option>
          <option value="08" <?=($mes == 08)?"selected":"";?>>Agosto</option>
          <option value="09" <?=($mes == 09)?"selected":"";?>>Setembro</option>
          <option value="10" <?=($mes == 10)?"selected":"";?>>Outubro</option>
          <option value="11" <?=($mes == 11)?"selected":"";?>>Novembro</option>
          <option value="12" <?=($mes == 12)?"selected":"";?>>Dezembro</option>
        </select></td>

      <td>
        <select name="ano" class="input" onblur="this.className='input';" onfocus="this.className='inputon';">
<?

  $total_anos = date("Y")-2008+2;
  
  for($ii=0; $ii<$total_anos; $ii++){
    $aa = "200".$ii+7;
   echo "<option value='$aa' ";
   echo ($ano==$aa)?"selected":"";
   echo ">$aa</option>";
  }

?>

        </select>
      </td>

      <td align="right"><input style="height:19;" type="submit" value="Buscar" class="input" onBlur="this.className='input';" onFocus="this.className='inputon';"></td>
    </tr>
  </table>

  <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
    <tr>
      <td height="6"></td>
    </tr>

    <tr>

      <td bgcolor="<?=$Cor1?>" height="1"></td>

    </tr>

    <tr>

      <td height="6"></td>

    </tr>

  </table>

  <?  if($tr > 0){?>

  <!--Foram encontradas (<strong><? echo $tr;?></strong>) coberturas.<br><br>-->

  <table border="0" cellpadding="1" cellspacing="0">

    <?

// Agora vamos montar o c&oacute;digo. Pegue o valor total de resultados: 

$total = mysql_num_rows($limite); 

// Defina o n&uacute;mero de colunas que voc&ecirc; deseja exibir: 

//$colunas = "3"; 

//$colunas = "$qts_colunas"; 

// Agora vamos ao "truque": 

if ($total>0) { 

for ($i = 0; $i < $total; $i++) { 

if (($i%$colunas)==0) { 



$colspan = $colunas+$colunas+$colunas;

?>

    <tr>

      <? }?>

      <?

$dados = mysql_fetch_array($limite) ;



?>

      <td align="center" valign="top"><table border="0" cellpadding="0" cellspacing="0">

          <tr>

            <td width="<?=$largura+5;?>" height="<?=$altura+8;?>" align="left" valign="middle"><table border="0" cellpadding="1" cellspacing="0" bgcolor="<?=$Cor1?>">

                <tr>

                  <td><table border="0" cellspacing="0" cellpadding="2">

                      <tr>

                        <td bgcolor="#FFFFFF"><a href='<?="?pg=$link_page&id=$dados[id]";?>'><img src="<?=($img_thumb=="S")?"thumbs.php?w=$largura&h=$altura&imagem=":""; echo (!empty($dados[foto]))?"images/$tabela1/$dados[id]/$dados[foto]":"images/layout/img_semfoto.jpg";?>" width="<?=$largura?>" height="<?=$altura?>" border="0" style="FILTER: alpha(opacity=100);" onMouseOver="makevisible(this,0)" onMouseOut="makevisible(this,1)"></a></td>

                      </tr>

                    </table></td>

                </tr>

              </table></td>

            <td width="5"></td>

            <td width="<?=$largura_coluna?>" valign="middle"><table width="100%" border="0" cellspacing="0" cellpadding="0">

                <tr>

                  <td><?

echo "<a href='?pg=$link_page&id=$dados[id]'>";



  $contatamanho = strlen($dados[nome]);

  if($contatamanho > $qt_letras){

  $nome = substr_replace($dados[nome], "...", $qt_letras, $contatamanho - $qt_letras);

  } else {

  $nome = $dados[nome];

  }   

  echo "<font class='titulos cor'>$nome</font><br>";



    $sql2 = "SELECT * FROM $tabela2 WHERE id = '$dados[id_local]'";

    $sql2 = mysql_query($sql2);

    $dados2 = mysql_fetch_array($sql2);

    echo "$dados2[nome] - ";



      $sql3 = "SELECT * FROM $tabela3 WHERE id = '$dados2[id_cidade]'";

      $sql3 = mysql_query($sql3);

      $dados3 = mysql_fetch_array($sql3);

      echo "$dados3[nome]<br>"; 

      

$dt = explode("-", $dados[data1]);

$data = "$dt[2]/$dt[1]/$dt[0]";

echo "$data";

  

echo "</a>";

?></td>

                </tr>

                <!--

            <tr>

              <td height="9"><table width="100%" border="0" cellspacing="0" cellpadding="0">

                <tr>

                  <td width="<?=$largura_coluna-16;?>" background="images/layout/img_home_galeria.gif"></td>

                  <td width="16" align="right"><img src="images/layout/img_menu.gif" width="9" height="10" /></td>

                </tr>

              </table></td>

            </tr>

-->

              </table></td>

            <? if($limite2 > 1){?>

            <td width="15"></td>

            <? }?>

          </tr>

        </table></td>

      <? }?>

    </TR>

    <? }?>

  </table>

</form>

<?

// INICIO DA PAGINAÇÃO

if($paginacao == "S"){

  include "estrutura/paginacao.php";

}

// FIM DA PAGINAÇÃO

?>

<? } else {?>

<table width="100%" border="0" cellspacing="0" cellpadding="0">

  <tr>

    <td align="center"><br />

      nenhum<b> registro </b>encontrada!<br /></td>

  </tr>

</table>

<? }?>

<?

}

// FIM DA ACAO LISTAR

?>

<?

// FIM DA ACAO COBERTURA

if($acao == "ver"){



$busca = "SELECT * FROM $tabela1 WHERE status = 'S' $ordem";

//echo $busca;

$sql = mysql_query($busca);

$dados = mysql_fetch_array($sql);



$tira1 = "425";

$inseri1 = "400";

$html1 = str_replace($tira1, $inseri1, $dados[html]);

$tira2 = "344";

$inseri2 = "300";

$html2 = str_replace($tira2, $inseri2, $html1);

?>

<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">

  <tr>

    <td><?

echo "<font class='titulos2' color='$Cor1'><b>$dados[nome]</b></font>";

?></td>

    <td align="right"><b>

      <?

    //echo "Data: <font color='$Cor1'>".strftime("%d de %B de %Y", strtotime($dados[data]))."</font>";?>

    </b></td>

  </tr>

  <? if(!empty($dados[descricao])){?>

  <tr>

    <td colspan="2"><?=$dados[descricao];?></td>

  </tr>

  <? }?>

  <tr>

    <td height="5" colspan="2"></td>

  </tr>

  <tr>

    <td valign="top" colspan="2"><?=$html2?></td>

  </tr>

</table>

<?php

}

if ($acao == "ver_destaque") {
  $busca = "SELECT * FROM $tabela1 WHERE status = 'S' $ordem";
  $sql = mysql_query($busca);
  $dados = mysql_fetch_array($sql);
  $tira1 = "480";
  $inseri1 = "350";
  $html1 = str_replace($tira1, $inseri1, $dados[html]);
  $tira2 = "385";
  $inseri2 = "300";
  $html2 = str_replace($tira2, $inseri2, $html1);
?>

<?php echo "<div>$dados[nome]</div>"; ?>
  <?=$html2?>
<?php }


if($acao == "ver2") {
  if (!empty($key)) {
    $wh01 = "AND nome LIKE '%$key%'";
  }

  if (!empty($id_categoria)) {
    $wh02 = "AND id_categoria = '$id_categoria'";
  }

  if (!empty($id_subcategoria)) {
    $wh03 = "AND id_subcategoria = '$id_subcategoria'";
  }

  $busca = "SELECT * FROM $tabela1 WHERE status='S' $wh01 $wh02 $wh03 $ordem";

  if($paginacao == "S") {
    $total_reg = $qts_ultimos;
    
    if(!$page) {
      $page = "1";
    }

    $inicio = $page-1;
    $inicio = $inicio*$total_reg;
    $limite = mysql_query("$busca LIMIT $inicio,$total_reg");
  } else {
    $limite = mysql_query("$busca LIMIT $limite2");
  } 

$todos = mysql_query("$busca");
$tr = mysql_num_rows($todos);
$tp = @ceil($tr / $total_reg);

if($tr > 0) {

?>
<table class="box-videos" width="180" border="0" cellpadding="1" cellspacing="0">
  <?

// Agora vamos montar o c&oacute;digo. Pegue o valor total de resultados: 

$total = mysql_num_rows($limite); 

// Defina o n&uacute;mero de colunas que voc&ecirc; deseja exibir: 

//$colunas = "3"; 

//$colunas = "$qts_colunas"; 

// Agora vamos ao "truque": 

if ($total>0) { 

for ($i = 0; $i < $total; $i++) { 

if (($i%$colunas)==0) { 



$colspan = $colunas+$colunas+$colunas;

?>
  <tr class="video-<?php echo $numeroVideo += 1; ?>">
    <? }?>
    <?

$dados = mysql_fetch_array($limite) ;



?>
    <td class="video-preview">
      <table border="0" cellpadding="0" cellspacing="0">
      <tr>
        <td width="80" valign="middle">
          <table width="99%" border="0" align="left" cellpadding="0" cellspacing="0" >
          <tr>
            <td valign="top" >
              <table border="0" cellpadding="1" cellspacing="0">
              <tr>
                <td width="80">
                  <? if(!empty($dados[foto0])){ ?>
                  <img class="imagem-video" src="thumbs.php?w=70&amp;h=55&amp;imagem=images/videos/<? echo $dados[foto0]?>" width="65" height="50" border="0" style="FILTER: alpha(opacity=100);" onmouseover="makevisible(this,0)" onmouseout="makevisible(this,1)"/>
                  <? } else { ?>
                  <img class="imagem-video" src="<? echo $dados[ffftube]?>" width="65" height="50" border="0" style="FILTER: alpha(opacity=100);" onmouseover="makevisible(this,0)" onmouseout="makevisible(this,1)" />
                  <? } ?>
                </td>
              </tr>
            </table></td>
          </tr>
          <tr>
            <td align="center" valign="top"></td>
          </tr>
        </table></td>
      </tr>
    </table>
  </td>
    <td class="informacoes">
      <table width="96%" border="0" cellspacing="0" cellpadding="0">
        <tr>
        <?

$contatamanho1 = strlen($dados[nome]);

  if ($contatamanho1 > $qt_letras1) {
    $nome = substr_replace($dados[nome], "...", $qt_letras1, $contatamanho1 - $qt_letras1);
  } else {
    $nome = $dados[nome];
  }

  if (strlen($nome) > 44) {
    $nome = substr($nome, 0, 42) . '...';
    echo "<div class='titulo-videos'><a href=\"/ver_video/$dados[id]-" . str_replace(" ","_",$dados['nome']) . ".html\">" . ($numeroVideo > 1 ? "$numeroVideo. " : "") . "$nome</a></div>";
  } else {
    echo "<div class='titulo-videos'><a href=\"/ver_video/$dados[id]-" . str_replace(" ","_",$dados['nome']) . ".html\">" . ($numeroVideo > 1 ? "$numeroVideo. " : "") . "$nome</a></div>";
  }
?>
        </tr>
        <tr>
  <?php if ($numeroVideo > 1) { ?>

  <?php } else { ?>
          <div class="info-video">
  <?
    echo " <div class='data-video'><span>". strftime("%d/%m/%Y", strtotime($dados[data])) ."</span></div><br />";
    echo " <div class='visitas-video'><span>Visitas: $dados[visitas]</span></div>";
  ?>
          </div>
  <?php } ?>
        </tr>
      </table>
  </td>
    <? }?>
  </tr>
  <? }?>
</table>
<br />

<?

// INICIO DA PAGINAÇÃO

if($paginacao == "S"){

  include "estrutura/paginacao.php";

}

// FIM DA PAGINAÇÃO

?>

<? } else {?>

<table width="100%" border="0" cellspacing="0" cellpadding="0">

  <tr>

    <td align="center">nenhum<b> registro</b><b> </b>encontrado!</td>

  </tr>

</table>

<?

} // FIM DO ELSE 

} // FIM DA ACAO VER4







// INICIO DA ACAO VER

if($acao == "ver3"){



  if(!empty($key)){

  $wh01 = "AND nome LIKE '%$key%'";

  }



  if(!empty($id_categoria)){

  $wh02 = "AND id_categoria = '$id_categoria'";

  }



  if(!empty($id_subcategoria)){

  $wh03 = "AND id_subcategoria = '$id_subcategoria'";

  }

  

  $busca = "SELECT * FROM $tabela1 WHERE status='S' $wh01 $wh02 $wh03 $ordem";

  //echo $busca;



  if($paginacao == "S"){

  

    $total_reg = $qts_ultimos;

  

    if(!$page){

    $page = "1";

    }



    $inicio = $page-1;

    $inicio = $inicio*$total_reg;

    $limite = mysql_query("$busca LIMIT $inicio,$total_reg");

  } else {

    $limite = mysql_query("$busca LIMIT $limite2");

  } 



$todos = mysql_query("$busca");



$tr = mysql_num_rows($todos);



$tp = @ceil($tr / $total_reg);





if($tr > 0){

?>

<table border="0" cellpadding="1" cellspacing="0">

  <?

// Agora vamos montar o c&oacute;digo. Pegue o valor total de resultados: 

$total = mysql_num_rows($limite); 

// Defina o n&uacute;mero de colunas que voc&ecirc; deseja exibir: 

//$colunas = "3"; 

//$colunas = "$qts_colunas"; 

// Agora vamos ao "truque": 

if ($total>0) { 

for ($i = 0; $i < $total; $i++) { 

if (($i%$colunas)==0) { 



$colspan = $colunas+$colunas+$colunas;

?>

  <tr>

    <? }?>

    <?

$dados = mysql_fetch_array($limite) ;



?>

    <td align="center" valign="top"><table width="98%" border="0" align="left" cellpadding="0" cellspacing="0">

        <tr>

          <td><!--<a href="javascript:MostrarDados('estrutura/videos/ajax.php?acao=VerFlash&id=', '<?=$dados[id]?>', 'VerFlash');">-->

            <table border="0" cellpadding="1" cellspacing="0" style="border:1px solid <?=$Cor1;?>;">

              <tr>

                <td><a href="?pg=<?=$link_page?>&id=<?=$dados[id]?>&id_categoria=<?=$dados[id_categoria]?>"><img src="<?=($img_thumb=="S")?"thumbs.php?w=$largura&h=$altura&imagem=":""; echo (!empty($dados[foto0]))?"images/$tabela1/$dados[foto0]":"images/layout/img_local_semfoto.jpg";?>" width="<?=$largura?>" height="<?=$altura?>" border="0" style="FILTER: alpha(opacity=100);" onmouseover="makevisible(this,0)" onmouseout="makevisible(this,1)" /></a></td>

              </tr>

          </table></td>

          <td width="5"></td>

          <td><b class='titulos laranja'>

            <?=$palavra?>

            </b><br />

            <a href="?pg=<?=$link_page?>&id=<?=$dados[id]?>&id_categoria=<?=$dados[id_categoria]?>">

            <?

$contatamanho1 = strlen($dados[nome]);

if($contatamanho1 > $qt_letras1){

$nome = substr_replace($dados[nome], "...", $qt_letras1, $contatamanho1 - $qt_letras1);

} else {

$nome = $dados[nome];

}

echo $nome;

?>

          </a></td>

        </tr>

      </table></td>

    <? if($limite2 > 1){?>

    <td width="15"></td>

    <? }?>

    <? }?>

  </TR>

  <? }?>

</table>

<?

// INICIO DA PAGINAÇÃO

if($paginacao == "S"){

  include "estrutura/paginacao.php";

}

// FIM DA PAGINAÇÃO

?>

<? } else {?>

<table width="100%" border="0" cellspacing="0" cellpadding="0">

  <tr>

    <td align="center">nenhum<b> registro</b><b> </b>encontrado!</td>

  </tr>

</table>

<?

} // FIM DO ELSE 

} // FIM DA ACAO VER

?>