<script type="text/javascript" language="javascript" src="/rate/js/behavior.js"></script>
<script type="text/javascript" language="javascript" src="/rate/js/rating.js"></script>
<link rel="stylesheet" type="text/css" href="/rate/css/rating.css" />

<?php
$variables = (strtolower($_SERVER['REQUEST_METHOD']) == 'GET') ? $_GET : $_POST;

foreach ($variables as $k => $v)
$$k=$v;

$tabela1 = "tb_guia";
$tabela2 = $tabela1."_categorias";
$file = "guia";

if ($acao == "listar") {
  if (!empty($categoria)) {
    $wh2 = "AND id_categoria='$categoria'";
  }

  if (!empty($subcategoria)) {
    $wh3 = "AND id_subcategoria='$subcategoria'";
  }

  if (!empty($produto)) {
    $wh4 = "AND nome LIKE '%$produto%'";
  }

$busca = "SELECT * FROM $tabela1 WHERE status='S' $wh2 $wh3 $wh4 order by nome";

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

if ($tr > 0) {
?>



<form id="busca" name="busca" method="get">
  <input name="pg" type="hidden" value="<?=$tabela1?>_busca">
  <input name="acao" type="hidden" value="listar">

  <table border="0" cellpadding="2" cellspacing="0">
    <tr>
      <td class="laranja">
        <b>Pesquisar:</b>
      </td>
      <td>
        <input name="produto" type="text" class="input" onfocus="this.className='inputon';" onblur="this.className='input';" size="45" >
      </td>

      <td align="right">
        <input type="submit" value="Buscar" class="input" onblur="this.className='input';" onfocus="this.className='inputon';">
      </td>
    </tr>
  </table>
</form>

<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td align="right">
      Foram encontradas (<strong><? echo $tr;?></strong>) registros.
    </td>
  </tr>

  <tr>
    <td bgcolor="<?=$coronmouse?>" height="1"></td>
  </tr>
</table>

<table border="0" cellpadding="1" cellspacing="0">

<?php

$total = mysql_num_rows($limite);

if ($total > 0) {
  for ($i = 0; $i < $total; $i+=1) {
    if (($i%$colunas) == 0) {
      $colspan = $colunas + $colunas + $colunas;
?>
  <tr>
<?php } ?>

<?php $dados = mysql_fetch_array($limite); ?>

  <td align="center" valign="top">
    <table border="0" cellpadding="0" cellspacing="0">
      <tr>
        <td width="<?=$largura+5;?>" height="<?=$altura+8;?>" align="left" valign="middle">
          <a href='<?="?pg=$link_page&id=$dados[id]";?>'>
          <img src="<?=($img_thumb=="S")?"thumbs.php?w=$largura&h=$altura&imagem=":""; echo (!empty($dados[foto01]))?"images/$tabela1/$dados[id]/$dados[foto01]":"images/layout/img_local_semfoto.jpg";?>" border="0" width="<?=$largura?>" height="<?=$altura?>" /></a></td>
          <td width="<?=$largura_coluna?>" valign="middle">
            <table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td>
<?php

echo "<font class='titulos red'>$dados[nome]</font><br />";

  $contatamanho1 = strlen($dados[descricao_pequena]);
  
  if ($contatamanho1 > $qt_letras1) {
    $descricao = substr_replace($dados[descricao_pequena], "...", $qt_letras1, $contatamanho1 - $qt_letras1);
  } else {
    $descricao = $dados[descricao_pequena];
  }

echo "$descricao<br /><br />";

if ($dados[preco_normal] != "0.00") {}

if ($dados[preco_oferta] != "0.00") {
  echo "<font class='titulos red'>À Vista R$ " . number_format($dados[preco_oferta], '2',',','.')."</font><br />";
  $taxa = "2.2";
  $divisao = "6";
  $valoravista = $dados[preco_oferta];
  $porcentagem = "1.".$taxa*$divisao;
  $valor_com_juros1 = $valoravista * $porcentagem;
  $valor_com_juros2 = number_format($valor_com_juros1, '2', ',', '.');
  $valormensal1 = $valor_com_juros1 / $divisao;
  $valormensal2 = number_format($valormensal1, '2', ',', '.');
  echo "ou 6x de R$ $valormensal2<br /><br />";
} else {
  echo "<a href='?pg=fale_conosco&produto=$id'><font class='titulos'><strong>Consulte-nos!</strong></font></a><br><br>";
}

echo "<a href='?pg=$link_page&id=$dados[id]'><img src='images/layout/bt_detalhes.gif' border='0'></a>";

?>
                </td>
              </tr>
            </table>
          </td>
          
          <td width="5"></td>
        </tr>
        <tr>
          <td colspan="3">
            <img src="images/layout/img_cantored_b.gif" width="<?=$largura_coluna?>" height="8" />
            <img src="images/layout/img_cantored_4.gif" width="8" height="8" />
          </td>
        </tr>

        <tr>
          <td height="5" colspan="3"></td>
        </tr>
      </table>
    </td>
  <?php } ?>
  </tr>
<?php } ?>
</table>

<? if($paginacao == "S"){?>



<table border="0" align="right" cellpadding="0" cellspacing="0">

  <tr>

    <td align="center">

  

  

<table border="0" cellpadding="2" cellspacing="1">

<tr>  

  <? 

for($i=1; $i<$page; $i++)

if($i>=$page-5)



echo "<td width='12' align='center' style='border:1px solid $coronmouse;'><a href='$link_page2&page=$i'><b><font class='red'>$i</font></b></a></td>";

echo "<td width='12' align='center' style='border:1px solid $coronmouse;' bgcolor='$coronmouse' class='branco'><b>$page</b></td>";



for($i=$page+1; $i<=$tp; $i++)

if($i<=$page+5)



echo "<td width='12' align='center' style='border:1px solid $coronmouse;'><a href='$link_page2&page=$i'><b><font class='red'>$i</font></b></a></td>";



?>

</tr>

</table>



</td>

</tr>

</table>

<? }?>







  <? } else {?>



<table width="100%" border="0" cellspacing="0" cellpadding="0">

  <tr>

    <td align="center">nenhum <b>Produto</b> encontrado!</td>

  </tr>

</table>



  <? }?>





<?

}

// FIM DA ACAO LISTAR



// FIM DA ACAO VER1

if($acao == "ver1"){



  if(!empty($id_cat)){

  $wh2 = "AND id_categoria='$id_cat'";

  }



$busca = "SELECT * FROM $tabela1 WHERE status='S' AND destacar='S' $wh2 ORDER by RAND() LIMIT $limite2";



  if($paginacao == "S"){

  

    $total_reg = $qts_ultimos;

  

    if(!$page){

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





if($tr > 0){

?>

<table border="0" cellpadding="1" cellspacing="2">

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

    <td align="center" valign="top" width="208"  onMouseOver="this.style.backgroundColor='#E4EAED';" onMouseOut="this.style.backgroundColor='#F7F7F7';"><table width="208" border="0" cellspacing="0" cellpadding="0" bgcolor="#F7F7F7">

  <tr>

    <td width="70" align="left" valign="top" >

    <? $sql22 = "SELECT * FROM tb_guia_categorias WHERE id='$dados[id_categoria]'";

$dados22 = mysql_fetch_array(mysql_query($sql22)); ?>

    <a href='<?="/guia/$dados22[nome]/$dados[id]";?>-<?= str_replace(" ","_",$dados['nome']); ?>.html' ><img src="<?=($img_thumb=="S")?"/thumbs.php?w=$largura&h=$altura&imagem=":""; echo (!empty($dados[foto0]))?"images/guia/$dados[id]/$dados[foto0]":"images/layout/img_local_semfoto.jpg";?>" border="0" width="<?=$largura?>" height="<?=$altura?>" /></a></td>

    <td width="4">&nbsp;</td>

    <td width="170" align="left" valign="top"><table width="100%" border="0" align="left" cellpadding="0" cellspacing="0">

      <tr>

        <td align="left" valign="top"><?

$contatamanho0 = strlen($dados[nome]);

if($contatamanho0 > $qt_letras0){

$nome = substr_replace($dados[nome], "...", $qt_letras0, $contatamanho0 - $qt_letras0);

} else {

$nome = $dados[nome];

}

echo "<div class='guiatitulo'>$nome</b></div>";

?>

<? echo "<div class='guiafone'>Tel: <b>($dados[ddd1]) $dados[fone1]</b></div>";?></td>

      </tr>



    </table></td>

  </tr>

  <tr>

    <td colspan="3" height="5px"></td>

  </tr>

</table></td>

    <? }?>

  </TR>

  <? }?>

</table>



<? if($paginacao == "S"){?>



<table border="0" align="right" cellpadding="0" cellspacing="0">

  <tr>

    <td align="center">

  

  

<table border="0" cellpadding="2" cellspacing="1">

<tr>  

  <? 

for($i=1; $i<$page; $i++)

if($i>=$page-5)



echo "<td width='12' align='center' style='border:1px solid $coronmouse;'><a href='$link_page2&page=$i'><b><font class='red'>$i</font></b></a></td>";

echo "<td width='12' align='center' style='border:1px solid $coronmouse;' bgcolor='$coronmouse' class='branco'><b>$page</b></td>";



for($i=$page+1; $i<=$tp; $i++)

if($i<=$page+5)



echo "<td width='12' align='center' style='border:1px solid $coronmouse;'><a href='$link_page2&page=$i'><b><font class='red'>$i</font></b></a></td>";



?>

</tr>

</table>



</td>

</tr>

</table>

<? }?>







  <? } else {?>



<table width="100%" border="0" cellspacing="0" cellpadding="0">

  <tr>

    <td align="center">nenhum<b> Produto</b><b> </b>encontrado!</td>

  </tr>

</table>



  <? }?>





<?

}

// FIM DA ACAO LISTAR



// FIM DA ACAO VER1

if($acao == "ver2"){



  

$busca = "SELECT * FROM $tabela1 WHERE status='S' ORDER by RAND()";



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

    <td align="center" valign="top" width="152"><table width="154" border="0" align="center" cellpadding="0" cellspacing="0">

      <tr>

        <td align="center" valign="top" width="130">

         <? $sql22 = "SELECT * FROM tb_guia_categorias WHERE id='$dados[id_categoria]'";

$dados22 = mysql_fetch_array(mysql_query($sql22)); ?>

        <a href='<?="/guia/$dados22[nome]/$dados[id]";?>-<?= str_replace(" ","_",$dados['nome']); ?>.html' class="<?=$class?>"><img src="<?=($img_thumb=="S")?"/thumbs.php?w=$largura&h=$altura&imagem=":""; echo (!empty($dados[foto0]))?"images/guia/$dados[id]/$dados[foto0]":"images/layout/img_local_semfoto.jpg";?>" border="0" width="<?=$largura?>" height="<?=$altura?>" /></a></td>

        <td align="center" valign="top" width="24"></td>

      </tr>

      <tr>

        

        <td align="center">&nbsp;</td>

      </tr>

      <tr>

        <td align="center"><?

$contatamanho0 = strlen($dados[nome]);

if($contatamanho0 > $qt_letras0){

$nome = substr_replace($dados[nome], "...", $qt_letras0, $contatamanho0 - $qt_letras0);

} else {

$nome = $dados[nome];

}

echo "<font size='2' color='$cortitulo'><b>$nome</b></font><br>";

?></td>

        <td align="center">&nbsp;</td>

      </tr>

      <tr>

        <td align="center"><? echo "<font color='$cortitulo'><b>($dados[ddd1]) $dados[fone1]</b></font>";?></td>

        <td align="center">&nbsp;</td>

      </tr>

      <tr>

        <td height="5px"></td>

        <td></td>

      </tr>

    </table></td>

    <? }?>

  </TR>

  <? }?>

</table>



<? if($paginacao == "S"){?>



<table border="0" align="right" cellpadding="0" cellspacing="0">

  <tr>

    <td align="center">

  

  

<table border="0" cellpadding="2" cellspacing="1">

<tr>  

<?



// INICIO DA PAGINAÇÃO



if($paginacao == "S"){



  include "paginas/paginacao.php";



}



// FIM DA PAGINAÇÃO



?>



</tr>

</table>



</td>

</tr>

</table>

<? }?>







  <? } else {?>



<table width="100%" border="0" cellspacing="0" cellpadding="0">

  <tr>

    <td align="center">nenhum<b> Produto</b><b> </b>encontrado!</td>

  </tr>

</table>



  <? }?>





<?

}

// FIM DA ACAO LISTAR



// FIM DA ACAO VER1

if($acao == "ver3"){



if(!empty($id_cat)){

  $wh2 = "AND id_categoria='$id_cat'";

  }



$busca = "SELECT * FROM $tabela1 WHERE status='S' $wh2 ORDER by RAND()";



  if($paginacao == "S"){

  

    $total_reg = $qts_ultimos;

  

    if(!$page){

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

    <td align="center" valign="top" width="170"><table width="170" border="0" align="center" cellpadding="0" cellspacing="0">

      <tr>

        <td align="center" valign="top" width="144">

         <? $sql22 = "SELECT * FROM tb_guia_categorias WHERE id='$dados[id_categoria]'";

$dados22 = mysql_fetch_array(mysql_query($sql22)); ?>

        <a href='<?="/guia/$dados22[nome]/$dados[id]";?>-<?= str_replace(" ","_",$dados['nome']); ?>.html' class="<?=$class?>"><img src="<?=($img_thumb=="S")?"/thumbs.php?w=$largura&h=$altura&imagem=":""; echo (!empty($dados[foto0]))?"images/guia/$dados[id]/$dados[foto0]":"images/layout/img_local_semfoto.jpg";?>" border="0" width="<?=$largura?>" height="<?=$altura?>" /></a></td>

        <td align="center" valign="top" width="22"></td>

      </tr>

      <tr>

        

        <td align="center">&nbsp;</td>

      </tr>

      <tr>

        <td align="center"><?

$contatamanho0 = strlen($dados[nome]);

if($contatamanho0 > $qt_letras0){

$nome = substr_replace($dados[nome], "...", $qt_letras0, $contatamanho0 - $qt_letras0);

} else {

$nome = $dados[nome];

}

echo "<font size='2' color='$cortitulo'><b>$nome</b></font><br>";

?></td>

        <td align="center">&nbsp;</td>

      </tr>

      <tr>

        <td align="center"><? echo "<font color='$cortitulo'><b>($dados[ddd1]) $dados[fone1]</b></font>";?></td>

        <td align="center">&nbsp;</td>

      </tr>

      <tr>

        <td height="5px"></td>

        <td></td>

      </tr>

    </table></td>

    <? }?>

  </TR>

  <? }?>

</table>



<? if($paginacao == "S"){?>



<table border="0" align="right" cellpadding="0" cellspacing="0">

  <tr>

    <td align="center">

  

  

<table border="0" cellpadding="2" cellspacing="1">

<tr>  

<?  if($paginacao == "S"){

     

for($i=1; $i<$page; $i++)

if($i>=$page-5)



echo "<td width='12' align='center' style='border:1px solid #cccccc;'><a href='$link_page2/$i'><b><font color='$Cor1'>$i</font></b></a></td>";

echo "<td width='12' align='center' style='border:1px solid #cccccc;' bgcolor='#478500' class='branco'><b>$page</b></td>";



for($i=$page+1; $i<=$tp; $i++)

if($i<=$page+5)



echo "<td width='12' align='center' style='border:1px solid #cccccc;'><a href='$link_page2/$i'><b><font color='$Cor1'>$i</font></b></a></td>";



}

  ?>



</tr>

</table>



</td>

</tr>

</table>

<? }?>







  <? } else {?>



<table width="100%" border="0" cellspacing="0" cellpadding="0">

  <tr>

    <td align="center">nenhum<b> Produto</b><b> </b>encontrado!</td>

  </tr>

</table>



  <? }?>





<?

}

// FIM DA ACAO LISTAR



// FIM DA ACAO VER1

if($acao == "ver4"){



  

$busca = "SELECT * FROM $tabela1 WHERE status='S' ORDER by RAND() LIMIT $limite2";



  if($paginacao == "S"){

  

    $total_reg = $qts_ultimos;

  

    if(!$page){

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

    <td align="center" valign="top" width="144px"><table width="138" border="0" align="center" cellpadding="0" cellspacing="0">

      <tr>

        <td align="center" valign="top" width="138">

          <? $sql22 = "SELECT * FROM tb_guia_categorias WHERE id='$dados[id_categoria]'";

$dados22 = mysql_fetch_array(mysql_query($sql22)); ?>

          <a href='<?="/guia/$dados22[nome]/$dados[id]";?>-<?= str_replace(" ","_",$dados['nome']); ?>.html' class="<?=$class?>"><img src="<?=($img_thumb=="S")?"/thumbs.php?w=$largura&h=$altura&imagem=":""; echo (!empty($dados[foto0]))?"images/guia/$dados[id]/$dados[foto0]":"images/layout/img_local_semfoto.jpg";?>" border="0" width="<?=$largura?>" height="<?=$altura?>" /></a></td>

        </tr>

      <tr>

        

        </tr>

      <tr>

        <td align="center"><?

$contatamanho0 = strlen($dados[nome]);

if($contatamanho0 > $qt_letras0){

$nome = substr_replace($dados[nome], "...", $qt_letras0, $contatamanho0 - $qt_letras0);

} else {

$nome = $dados[nome];

}

echo "<font size='2' color='$cortitulo'><b>$nome</b></font><br>";

?></td>

        </tr>

      <tr>

        <td align="center"><? echo "<font color='$cortitulo'><b>($dados[ddd1]) $dados[fone1]</b></font>";?></td>

        </tr>

      <tr>

        <td height="5"></td>

        </tr>

    </table></td>

    <? }?>

  </TR>

  <? }?>

</table>



<? if($paginacao == "S"){?>



<table border="0" align="right" cellpadding="0" cellspacing="0">

  <tr>

    <td align="center">

  

  

<table border="0" cellpadding="2" cellspacing="1">

<tr>  

  <? 

for($i=1; $i<$page; $i++)

if($i>=$page-5)



echo "<td width='12' align='center' style='border:1px solid $coronmouse;'><a href='$link_page2&page=$i'><b><font class='red'>$i</font></b></a></td>";

echo "<td width='12' align='center' style='border:1px solid $coronmouse;' bgcolor='$coronmouse' class='branco'><b>$page</b></td>";



for($i=$page+1; $i<=$tp; $i++)

if($i<=$page+5)



echo "<td width='12' align='center' style='border:1px solid $coronmouse;'><a href='$link_page2&page=$i'><b><font class='red'>$i</font></b></a></td>";



?>

</tr>

</table>



</td>

</tr>

</table>

<? }?>







  <? } else {?>



<table width="100%" border="0" cellspacing="0" cellpadding="0">

  <tr>

    <td align="center">nenhum<b> Produto</b><b> </b>encontrado!</td>

  </tr>

</table>



  <? } }?>