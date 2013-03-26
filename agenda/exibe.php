<?

$variables=(strtolower($_SERVER['REQUEST_METHOD'])== 'GET') ? $_GET : $_POST;

foreach ($variables as $k=> $v)

$$k=$v;



$tabela1 = "tb_agendas";

$tabela2 = "locais";

$tabela3 = "cidades";

$tabela4 = "galerias_cat";



$file = "$tabela1";







// FIM DA ACAO DE AGENDA

if($acao == "ultimas"){



$data = date("Y-m-d");

$busca = "SELECT * FROM $tabela1 WHERE status='S' AND data1>='$data' ORDER by data1 ASC LIMIT $limite";

//echo $busca;

$sql = mysql_query($busca);

//echo $sql;



$total = mysql_num_rows($sql);

//echo $total;



	if($total > 0){

?>



<table width="100%" border="0" cellspacing="0" cellpadding="0">

  

<?

while($dados = mysql_fetch_array($sql)){

?>

<tr><td height="5"></td></tr>

  <tr>

    <td>

	  <table border="0" cellspacing="0" cellpadding="0">

  <tr>

  <? if($img_thumb == S){

  		if(!empty($dados[imagem])){

  ?>

    <td width="55"><table border="0" cellpadding="1" cellspacing="0" bgcolor="<?=$corcelula1?>">

      <tr>

        <td><table border="0" cellspacing="0" cellpadding="3">

            <tr>

              <td bgcolor="#FFFFFF"><a href="thumbs.php?w=<?=$LarguraFoto;?>&imagem=images/<?="$tabela1/$dados[imagem]";?>" rel='lightbox' title="<?=$dados[nome]?>"><img src="<?="thumbs.php?w=$largura&h=$altura&imagem=images/$tabela1/$dados[imagem]";?>" width="<?=$largura?>" height="<?=$altura?>" border="0" style="FILTER: alpha(opacity=100);" onmouseover="makevisible(this,0)" onmouseout="makevisible(this,1)" /></a></td>

            </tr>

        </table></td>

      </tr>

    </table>

      </td>

      <td width="8"></td>

	<? }}?>

    

    <td>

<?

$dados2 = mysql_fetch_array(mysql_query("SELECT * FROM $tabela2 WHERE id='$dados[id_local]'"));

$dados3 = mysql_fetch_array(mysql_query("SELECT * FROM $tabela3 WHERE id='$dados2[id_cidade]'"));



echo "<a href='?pg=$link_page'>";

echo "<font class='titulos2'>".strftime("%d/%m", strtotime($dados[data1]))."</font> | $dados2[nome] em $dados3[nome]<br>";  



$contatamanho = strlen($dados[nome]);

	if($contatamanho > $qt_letras){

	$nome = substr_replace($dados[nome], "...", $qt_letras, $contatamanho - $qt_letras);

	} else {

	$nome = "$dados[nome]";

	}

	echo "<font class='titulos2' color='$Cor1'>$nome</font>";

echo "</a>";

?></td>



  </tr>

</table>



</td>

  </tr>

      <tr><td height="6"></td></tr>

	  	  <tr><td colspan="4" height="1" bgcolor="<?=$corcelula2?>"></td></tr>

<? }?>

</table>





	<? } else {?>



<table width="100%" border="0" cellspacing="0" cellpadding="0">

  <tr>

    <td align="center"><br />

    nenhum <b>registro</b> encontrado!<br /></td>

  </tr>

</table>



	<? }?>



<?

}

// FIM DA ACAO DE AGENDA

?>  









<?

// FIM DA ACAO DE AGENDA

  if ($acao == "listar") {



$data = date("Y-m-d");

$busca = "SELECT * FROM $tabela1 WHERE status='S' AND data1>='$data' ORDER by data1";



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



<table width="630px" border="0" cellspacing="0" cellpadding="0">

  <tr><td height="4"></td></tr>

<? while($dados = mysql_fetch_array($limite)){



$data = explode("-", $dados[data1]);

$data1 = "$data[2]";



$data2 = explode("-", $dados[data2]);

$data2 = "$data2[2]";

?>

  <tr>

    <td style="border: 1px solid <?=$Cor1?>;">

	  <table width="630" border="0" cellpadding="0" cellspacing="2">

  <tr>

  <td width="84" height="70" align="center" valign="middle" bgcolor="#CCCCCC">

<?

echo "<font class='titulos2 branco test'><b>$data1</b>";

echo ($dados[data2]!="0000-00-00")?"/<b>$data2</b></font><br>":"</font><br>";

echo "<font class='titulos branco'><b>";

	if($data[1] == "01"){ echo "Jan";}

	if($data[1] == "02"){ echo "Fev";}

	if($data[1] == "03"){ echo "Mar";}

	if($data[1] == "04"){ echo "Abr";}

	if($data[1] == "05"){ echo "Mai";}

	if($data[1] == "06"){ echo "Jun";}

	if($data[1] == "07"){ echo "Jul";}

	if($data[1] == "08"){ echo "Ago";}

	if($data[1] == "09"){ echo "Set";}

	if($data[1] == "10"){ echo "Out";}

	if($data[1] == "11"){ echo "Nov";}

	if($data[1] == "12"){ echo "Dez";}

echo "</b></font>";	

?></td>

  <? if($img_thumb == S){

	  if(!empty($dados[imagem])){

  ?>

    <td width="110" align="center" valign="top"><a href="/thumbs.php?w=<?=$LarguraFoto;?>&imagem=images/<?="agendas/$dados[imagem]";?>" rel='lightbox' title="<?=$dados[nome]?>"><img src="/thumbs.php?w=<?=$largura?>&imagem=images/<?="agendas/$dados[imagem]";?>" border="0"></a></td>

	<? }}?>

<td width="11"></td>	

    <td width="415" valign="top">

<?

//echo "<a href='?pg=$link_page'>";

echo "<font class='titulos2' color='$Cor1'>$dados[nome]</font><br>";

	

echo "$dados[descricao]";

//echo "</a>";

?></td>



  </tr>

</table>



</td>

  </tr>

<tr><td height="5"></td></tr>  

<? }?>

</table>

<br />



<?

// INICIO DA PAGINAÇÃO

if($paginacao == "S"){

	include "paginas/paginacao.php";

}

// FIM DA PAGINAÇÃO

?>





	<? } else {?>



<table width="100%" border="0" cellspacing="0" cellpadding="0">

  <tr>

    <td align="center"><br />

    nenhum <b>registro</b> encontrado!<br />

    <br /></td>

  </tr>

</table>



	<? }?>



<?

}

// FIM DA ACAO DE AGENDA

?>  











<?

// INICIO DA ACAO AGENDA POR ID_LOCAL

if($acao == "agenda_local"){



$data = date("Y-m-d");

$busca = "SELECT * FROM $tabela1 WHERE status='S' AND data1>='$data' AND id_local='$id' ORDER by data1 desc";



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



?>

<table width="100%" border="0" cellspacing="0" cellpadding="0">

                <tr>

                  <td height="22" background="images/layout/img_menu_eventos.gif" class="titulos2 branco">&nbsp;&nbsp;PRÓXIMOS EVENTOS</td>

                </tr>

</table>



<? 	if($tr > 0){?>



<table width="100%" border="0" cellspacing="0" cellpadding="0">

  <tr><td height="4"></td></tr>

<? while($dados = mysql_fetch_array($limite)){



$data = explode("-", $dados[data1]);

$data1 = "$data[2]";

?>

  <tr>

    <td style="border: 1px solid <?=$Cor1?>;">

	  <table border="0" cellspacing="2" cellpadding="0">

  <tr>

  <td width="50" height="50" align="center" valign="middle" bgcolor="<?=$Cor1?>">

<?

echo "<font class='titulosAgenda branco'><b>$data1</b></font><br>";

echo "<font class='titulos branco'><b>";

	if($data[1] == "01"){ echo "Jan";}

	if($data[1] == "02"){ echo "Fev";}

	if($data[1] == "03"){ echo "Mar";}

	if($data[1] == "04"){ echo "Abr";}

	if($data[1] == "05"){ echo "Mai";}

	if($data[1] == "06"){ echo "Jun";}

	if($data[1] == "07"){ echo "Jul";}

	if($data[1] == "08"){ echo "Ago";}

	if($data[1] == "09"){ echo "Set";}

	if($data[1] == "10"){ echo "Out";}

	if($data[1] == "11"){ echo "Nov";}

	if($data[1] == "12"){ echo "Dez";}

echo "</b></font>";	

?></td>

  <? if($img_thumb == S){?>

    <td width="55" align="right"><a href="thumbs.php?w=<?=$LarguraFoto;?>&imagem=images/<?="$tabela1/$dados[imagem]";?>" rel='lightbox' title="<?=$dados[nome]?>"><img src="thumbs.php?w=<?=$largura?>&h=<?=$altura?>&imagem=images/<?="$tabela1/$dados[imagem]";?>" border="0"></a></td>

	<? }?>

<td width="2"></td>	

    <td>

<?

//echo "<a href='?pg=$link_page'>";

echo "<font class='titulos2 cor'><b>$dados[nome]</b></font><br>";



	$sql2 = "SELECT * FROM $tabela2 WHERE id = '$dados[id_local]'";

	$sql2 = mysql_query($sql2);

	$dados2 = mysql_fetch_array($sql2);

	//echo "$dados2[nome] - ";

	echo "<a href='?pg=local&id=$dados2[id]'>$dados2[nome]</a> - ";



		$sql3 = "SELECT * FROM $tabela3 WHERE id = '$dados2[id_cidade]'";

		$sql3 = mysql_query($sql3);

		$dados3 = mysql_fetch_array($sql3);

		echo "$dados3[nome]<br>";	

	

echo nl2br("$dados[descricao]");

//echo "</a>";

?></td>



  </tr>

</table>



</td>

  </tr>

<tr><td height="5"></td></tr>  

<? }?>

</table>





	<? } else {?>



<table width="100%" border="0" cellspacing="0" cellpadding="0">

  <tr>

    <td align="center">nenhum <b>registro</b> encontrado!</td>

  </tr>

</table>



	<? }?>



<?

}

// FIM DA ACAO AGENDA POR ID_LOCAL

?>  

