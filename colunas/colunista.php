

<table width="630" border="0" align="center" cellpadding="0" cellspacing="0">



  <tr>

    <td valign="top"><img src="/images/setona.jpg" width="30" height="30" />

      <?

$id = $_GET[id];

$id = $url_parts[1];

if($id=='')

$id = $id;



$sql5 = mysql_query("SELECT * FROM tb_users WHERE id='$id'");

$dados5=mysql_fetch_array($sql5);

	

	?>

    <? echo "<font size='6' color='#1E4B7A' face='trebuchet MS'>Colunista - $dados5[nome]</font>"; ?></td>

  </tr>

  <tr>

    <td valign="top">&nbsp;</td>

  </tr>

  <tr>



    <td valign="top"><?

$id = $_GET[id];

$id = $url_parts[1];

if($id=='')

$id = $id;

$string = $id;

$idc = $string{0};

//echo $idc;

$busca = "SELECT * FROM tb_colunas WHERE status='S' AND id_colunista='$id' ORDER by data desc";

//echo $busca;

$sql = mysql_query($busca);

//echo $sql;

$dados  = mysql_fetch_array($sql);

$largura = 120;



            $altura = 100;



            $largurap = 70;



            $alturap = 70;



            $limite2 = 1;



            $colunas = 1;



            $largura_coluna = 620;



            $qt_letras1 = 95;



			$qt_letras2 = 65;



            $palavra = "Not&iacute;cias";



            $link_page = "noticia";



            $link_page2 = "?pg=noticias";



            $img_thumb = "S";



            $paginacao = "N";



			$Cor1 = "#00427F";



			$Cor2 = "#000000";



            $ordem = "order by data desc";



            $acao = "ultima";



          //include "paginas/colunas/exibe_por_colunista.php";



            ?></td>



  </tr>

  <tr>

    <td valign="top"><table width="620" border="0" cellspacing="1" cellpadding="1">

      <tr>

        <td><table width="620" border="0" cellspacing="1" cellpadding="1">

          <tr>

            <? $sql5 = mysql_query("SELECT * FROM tb_users WHERE id='$dados[id_colunista]' LIMIT 1");

	         $dados5=mysql_fetch_array($sql5);?>

            <? if(!empty($dados5[foto1])){?>

            <td width="120"><img src="<?="/thumbs.php?w=$largura&h=$altura&imagem=images/users/$dados5[foto1]";?>" width="<?=$largura?>" height="<?=$altura?>" border="0"/></td>

            <? }else {?>

            <td width="120"><img src="<?="/thumbs.php?w=$largura&h=$altura&imagem=images/layout/sem_foto.jpg";?>" width="<?=$largura?>" height="<?=$altura?>" border="0"/></td>

            <? } ?>

            <td width="500" align="right" valign="top"><table width="98%" border="0" cellspacing="1" cellpadding="1">

              <tr>

                <td><? echo "<font size='3' color='#1E4B7A' face='trebuchet MS'>Nome: $dados5[nome]</font>";?>

                  <? $sql6 = mysql_query("SELECT * FROM tb_colunas_cat WHERE id='$dados[id_cat]'");

	         $dados6=mysql_fetch_array($sql6);?>

                  <?php echo "<font size='3' color='#1E4B7A' face='trebuchet MS'> / Categoria: $dados6[nome]</font>";?></td>

              </tr>

              <tr>

                <td><?php echo "<font size='3' color='#1E4B7A' face='trebuchet MS'> Ocupa&ccedil;&atilde;o: $dados5[ocupacao]</font>";?></td>

              </tr>

              <tr>

                <td><table width="100%" border="0" cellspacing="1" cellpadding="1">

                  <tr>

                    <td width="5%"><img src="/images/icomail.gif" width="14" height="10" /></td>

                    <td width="95%"><a href="mailto:<? echo "$dados5[email]";?>" id="links_not" class="noticiadestaque3"><? echo "$dados5[email]";?></a></td>

                  </tr>

                  <tr>

                    <td>&nbsp;</td>

                    <td>&nbsp;</td>

                  </tr>

                </table></td>

              </tr>

            </table></td>

          </tr>

        </table></td>

      </tr>

      <tr>

        <td>&nbsp;</td>

      </tr>

      <tr>

        <td height="8"></td>

      </tr>

      <tr>

        <td bgcolor="#CCCCCC" height="1"></td>

      </tr>

      <tr>

        <td height="8"></td>

      </tr>

    </table></td>

  </tr>

  <tr>

    <td valign="top">&nbsp;</td>

  </tr>

  <tr>

    <td valign="top"><font size='4' color='#1E4B7A' face="Trebuchet MS, Arial, Helvetica, sans-serif"><img src="/images/setona.jpg" width="20" height="20" /> Últimas Postagens</font></td>

  </tr>

  <tr>

    <td valign="top" height="5"></td>

  </tr>

  <tr>

    <td valign="top"><?

	$id = $_GET[id];		

          

            $largura = 80;



            $altura = 65;



            $largurap = 70;



            $alturap = 70;



            $limite2 = 15;



            $colunas = 1;



            $largura_coluna = 620;



            $qt_letras1 = 95;



			$qt_letras2 = 65;



            $palavra = "Not&iacute;cias";



            $link_page = "noticia";



            $link_page2 = "?pg=noticias";



            $img_thumb = "S";



            $paginacao = "S";



			$Cor1 = "#00427F";



			$Cor2 = "#000000";



            $ordem = "order by data desc";



            $acao = "ultimas";



          include "paginas/colunas/exibe_por_colunista.php";



            ?></td>

  </tr>



</table>

