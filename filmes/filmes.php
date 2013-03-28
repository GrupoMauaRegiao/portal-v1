

<table width="630" border="0" align="center" cellpadding="0" cellspacing="0">



  <tr>

    <td valign="top"><img src="/images/setona.jpg" width="30" height="30" />

    <?

$id = $_GET[id];

$id = $url_parts[1];

if($id=='')

$id_cat = $id;



$sql5 = mysql_query("SELECT * FROM tb_filmes_cat WHERE id='$id'");

$dados5=mysql_fetch_array($sql5);

	

	?>

    <? echo "<font size='6' color='#1E4B7A' face='trebuchet MS'>$dados5[nome]</font>"; ?></td>

  </tr>

  <tr>

    <td valign="top">&nbsp;</td>

  </tr>

  <tr>



    <td valign="top"><?

			$idcat = $_GET['id'];

          

            $largura = 80;



            $altura = 65;



            $largurap = 70;



            $alturap = 70;



            $limite2 = 3;

			$limite = 3;



            $colunas = 1;



            $largura_coluna = 620;



            $qt_letras1 = 95;



			$qt_letras2 = 65;



            $img_thumb = "S";



            $paginacao = "S";



			$Cor1 = "#00427F";



			$Cor2 = "#000000";



            $ordem = "order by data desc";



            $acao = "ultimo_filme";



            include "paginas/filmes/exibeu.php";



            ?></td>



  </tr>



</table>

