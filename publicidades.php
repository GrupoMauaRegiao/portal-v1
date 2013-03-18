<?

$variables=(strtolower($_SERVER['REQUEST_METHOD'])== 'GET') ? $_GET : $_POST;
foreach ($variables as $k=> $v)
$$k = $v;

$palavra = "Publicidades";
$tabela = "tb_publicidades";
$file = "publicidades";



// iniçio da acao INSERI NO BD

if ($acao== "insertbd") {
  $dir = "../images/publicidades";
  $uploaddir = "$dir/";

  if ($imagem != "none") {
    if (@copy($_FILES['imagem']['tmp_name'], $uploaddir . $_FILES['imagem']['name'])) {
      $imagem1 = $_FILES['imagem']['name'];
    }
  }

$sql = "INSERT INTO $tabela (nome , tipo, formato, pagina, posicao,  imagem, url, link, cliques, html, status) VALUES ('$nome', '$tipo', '$formato', '$pagina', '$posicao', '$imagem1', '$url', '$link', '0', '$html', 'S')";

echo $sql;

$sql2 = mysql_query($sql);
$mgs = "<b>$palavra</b> Inserida com Sucesso!";

echo "
<table border='0' align='center' cellpadding='0' cellspacing='0' style='border: 1px solid $corcelula1;'>

  <tr>
   <td width='400' bgcolor='$corcelula2' align='center' class='titulos'>&nbsp;$mgs</td>
  </tr>
</table>
<br />
";
} 

// iniçio da acao UPDATE NO BD

if($acao == "updatebd") {
  if ($nova_imagem == "S") {
    $dir = "../images/publicidades";
    @unlink("$dir/$imagem_antiga");
    $uploaddir = "$dir/";
    
    if($imagem != "none") {
      if (@copy($_FILES['imagem']['tmp_name'], $uploaddir . $_FILES['imagem']['name'])) {
        $imagem1 = $_FILES['imagem']['name'];
      }
    }
  } else {
    $imagem1 = "$imagem_antiga";
  }

  $sql = "UPDATE $tabela SET nome='$nome', tipo='$tipo', formato='$formato', pagina='$pagina', posicao='$posicao', imagem='$imagem1', url='$url', link='$link', html='$html' WHERE id='$id'";

  $sql2 = mysql_query($sql);
  $mgs = "<b>$palavra</b> Alterada com Sucesso!";

  echo "
  <table border='0' align='center' cellpadding='0' cellspacing='0' style='border: 1px solid $corcelula1;'>

    <tr>
      <td width='400' bgcolor='$corcelula2' align='center' class='titulos'>&nbsp;$mgs</td>
    </tr>
  </table>
<br />
";
}

// iniçio da acao STATUS NO BD

if($acao == "status"){

$sql = "UPDATE $tabela SET status='$status' WHERE id='$id'";

$sql2 = mysql_query($sql);

$mgs = "Status Alterado com Sucesso!";

echo "<table border='0' align='center' cellpadding='0' cellspacing='0' style='border: 1px solid $corcelula1;'>

  <tr>

   <td width='400' bgcolor='$corcelula2' align='center' class='titulos'>&nbsp;$mgs</td>

  </tr>

</table>

<br>

";

//echo "<meta http-equiv='refresh' content='0;URL=?pg=$file'>";

} 

// fim da acao STATUS NO BD





// iniçio da acao EXCLUIR SELECIONADOS

if($acao == "excluir_selecionados"){



  $listas = implode("|", $listas);

//  echo "$planos<hr>";

  $lista = explode("|", $listas);

  $total = count($lista);

//  echo $total;

    for($i=0; $i<$total; $i++){

    $sql = "delete from $tabela WHERE id='$lista[$i]'";

    $sql2 = mysql_query($sql);

    //echo "$sql<br>";

      $dados = mysql_fetch_array(mysql_query("SELECT * FROM $tabela WHERE id='$lista[$i]'"));

      $dir = "../images/publicidades";

      @unlink("$dir/$dados[imagem]");

    }  

$mgs = "<b>$palavra2 </b>Excluída com Sucesso!";

echo "<table border='0' align='center' cellpadding='0' cellspacing='0' style='border: 1px solid $corcelula1;'>

  <tr>

   <td width='400' bgcolor='$corcelula2' align='center' class='titulos'>&nbsp;$mgs</td>

  </tr>

</table>

<br>

";

//echo "<meta http-equiv='refresh' content='2;URL=?pg=$file'>";

} 

// fim da acao EXCLUIR SELECIONADOS





// iniçio da acao FORM DE CADASTRO E ALTERAR

//if($acao== "FORM"){



$form1 = "FORMULARIO";



$sql=mysql_query("SELECT * FROM $tabela WHERE id='$id'");

$dados = mysql_fetch_array($sql);



$data1 = explode("-", $dados[data1]);

$data2 = explode("-", $dados[data2]);

?>

<script>

function HabilitarFoto() {

nForm = document.forms['<?=$form1?>'];

    if(nForm.elements['nova_imagem'].checked = true) {

        nForm.elements['imagem'].disabled = false;

    nForm.elements['imagem'].className= "input";

    }

}

function DesabilitarFoto() {

nForm.elements['imagem'].disabled = true;

nForm.elements['imagem'].className = "inputon";

}

</script>

      <form action="?pg=<?=$file?>" method="post" enctype="multipart/form-data" name="<?=$form1?>">
        <fieldset style="width:100%;">
          <input name="acao" type="hidden" value="<?=(empty($id))?"insertbd":"updatebd";?>">
          <input name="id" type="hidden" value="<?=$id?>">
          <input name="imagem_antiga" type="hidden" value="<?=$dados[imagem]?>">

          <table width="99%" align="center" cellpadding="0" cellspacing="0">
            <tr>
              <td>
                <font class="titulos">
                  <?=(empty($id))?"Cadastrar":"Alterar";?> <?="$palavra"; ?>
                </font> (<a href="<?="?pg=$file";?>">Cadastrar Novo</a>)
              </td>
            </tr>
          </table>

          <table width="99%" border="0" align="center" cellpadding="2" cellspacing="0">
            <tr>
              <td>Tipo: <br />
                <select name="tipo" class="input" onblur="this.className='input';" onfocus="this.className='inputon';">
                  <option value="imagem" <?=($dados[tipo] == imagem) ? selected : ""; ?>>
                    Imagem (JPG, GIF)
                  </option>
                  <option value="flash" <?=($dados[tipo] == flash) ? selected : ""; ?>>
                    Flash (SWF)
                  </option>
                  <option value="html" <?=($dados[tipo] == html) ? selected : ""; ?>>
                    HTML
                  </option>
                </select>
              </td>
            </tr>

          <tr>
            <td >Tamanho: <br />
              <select name="formato" class="input" onblur="this.className='input';" onfocus="this.className='inputon';">
                <option value="640" <?=($dados[formato] == 640) ? selected : ""; ?>>
                  Banner: abaixo das notícias (640 x 200 px)
                </option>
                <option value="6402" <?=($dados[formato] == 6402) ? selected : ""; ?>>
                  Banner: abaixo do guia comercial (640 x 200 px)
                </option>
                <option value="728" <?=($dados[formato] == 728) ? selected : ""; ?>>
                  Banner: topo (728 x 90 px)
                </option>
                <option value="300" <?=($dados[formato] == 300) ? selected : ""; ?>>
                  Banner: meio da home (300 x 250 px)
                </option>
                <option value="180" <?=($dados[formato] == 180) ? selected : ""; ?>>
                  Banner: lateral direita I (180 x 100 px)
                </option>
                <option value="1802" <?=($dados[formato] == 1802) ? selected : ""; ?>>
                  Banner: lateral direita II (180 x 150 px)
                </option>
                <option value="140" <?=($dados[formato] == 140) ? selected : ""; ?>>
                  Banner: lateral esquerda (140 x 160 px)
                </option>

              </select>
            </td>
          </tr>

          <tr>
            <td valign="middle">Páginas Internas: <br />
              <select id="p" name="pagina" class="input" onblur="this.className='input';" onfocus="this.className='inputon';" >
        <?

        $caminho = "../estrutura";
        $rep = opendir($caminho);

        while ($file5 = readdir($rep)) {
          $tipo = explode(".", $file5);

          if ($file5 != '..' && $file5 !='.' && $file5 !='' && $file5 != 'Thumbs.db' && $tipo[1] == "php") {
            if (!is_dir($file5)) {
              $arquivo5 = explode(".", $file5);
        ?>
              <option value='<?=$arquivo5[0]?>' <?=($dados[pagina] == "$arquivo5[0]")?"selected":"";?>>
                <?=$arquivo5[0];?>
              </option>
        <?
            }
          }
        }

        closedir($rep);

        ?>
              </select>
            </td>
          </tr>

        <tr>
          <td>Posição: <br />
          
            <select name="posicao" class="input" onblur="this.className='input';" onfocus="this.className='inputon';">
              <option value='1' <?=($dados[posicao] == 1) ? selected : ""; ?>>1</option>
              <option value='2' <?=($dados[posicao] == 2) ? selected : ""; ?>>2</option>
              <option value='3' <?=($dados[posicao] == 3) ? selected : ""; ?>>3</option>
              <option value='4' <?=($dados[posicao] == 4) ? selected : ""; ?>>4</option>
              <option value='5' <?=($dados[posicao] == 5) ? selected : ""; ?>>5</option>
              <option value='6' <?=($dados[posicao] == 6) ? selected : ""; ?>>5</option>
              <option value='7' <?=($dados[posicao] == 7) ? selected : ""; ?>>7</option>
              <option value='8' <?=($dados[posicao] == 8) ? selected : ""; ?>>8</option>
              <option value='9' <?=($dados[posicao] == 9) ? selected : ""; ?>>9</option>
              <option value='10' <?=($dados[posicao] == 10) ? selected : ""; ?>>10</option>
              <option value='11' <?=($dados[posicao] == 11) ? selected : ""; ?>>11</option>
              <option value='12' <?=($dados[posicao] == 12) ? selected : ""; ?>>12</option>
            </select>

            Caso cadastre varios banners na mesma posi&ccedil;&atilde;o eles ir&atilde;o randomizar

          </td>
        </tr>

        <tr>
          <td>
            <fieldset>
              <legend>
                Imagem:&nbsp;
              </legend>
      <?

      if (!empty($id)) {
        if ($dados[formato] == "728") {
          $largura = "728";
          $altura = "90";
        }

        if ($formato == "640") {
          $largura = "640";
          $altura = "200";
        }

        if ($formato == "6402") {
          $largura = "640";
          $altura = "200";
        }
        
        if ($formato == "180") {
          $largura = "180";
          $altura = "60";
        }

        if ($formato == "1802"){
          $largura = "180";
          $altura = "150";
        }
        
        if ($formato=="300"){
          $largura = "300";
          $altura = "250";
        }

        if ($dados[tipo] == 'imagem') {
          if(!empty($dados[url])) {
            echo "<img width='$largura' height='$altura' name='imagem1' src='../images/publicidades/$dados[url]' border='0'>";
          } else {
            echo "<img width='$largura' height='$altura' name='imagem1' src='../images/publicidades/$dados[imagem]' border='0'>";
          }
        } 

        if ($dados[tipo] == 'flash') {
            if (!empty($dados[url])) {
              echo "<embed src='$dados[url]' quality='high' pluginspage='http://www.macromedia.com/go/getflashplayer' type='application/x-shockwave-flash' width='$largura' height='$altura'></embed>";
            } else {
              echo "<embed src='../images/publicidades/$dados[imagem]' quality='high' pluginspage='http://www.macromedia.com/go/getflashplayer' type='application/x-shockwave-flash' width='$largura' height='$altura'></embed>";
            }
          }

          if ($dados[tipo] == 'html') {
            echo $dados[html];
          }
      }

      ?>
            <table border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td valign="middle">
                  <table border="0" cellspacing="0" cellpadding="0">
                    <tr>
                      <td valign="middle">
                        <? if (empty($id)) { ?>
                          <input class="inputon" name='imagem' type='file' size="16">
                        <? } else { ?>
                          Trocar Imagem?:
                          <input name="nova_imagem" type="radio" value="N" checked="checked" onclick="javascript:DesabilitarFoto()" />N&atilde;o
                          <input name="nova_imagem" type="radio" value="S" onclick="javascript: HabilitarFoto();" >Sim <br />
                          <input class="inputon" name='imagem' type='file' size="16" disabled="disabled">
                        <? } ?>
                      </td>
                    </tr>
                  </table>
                </td>
              </tr>
            </table>
          </fieldset>
        </td>
      </tr>

      <tr>
        <td>
          HTML: usar para Google AdSense <br />
          <textarea name="html" style="width:350px; height:100px;" cols="55" rows="3" class="input" onblur="this.className='input';" onfocus="this.className='inputon';"><? echo $dados[html]?></textarea>
        </td>
      </tr>

      <tr>
        <td>Nome do cliente: <br />
          <input name="nome" type="text" class="input" onblur="this.className='input';" onfocus="this.className='inputon';"  size="35" value="<?=$dados[nome]?>" />
        </td> 
      </tr>

      <tr>
        <td>URL do Banner: <br />
            <input name="url" type="text" class="input" onblur="this.className='input';" onfocus="this.className='inputon';"  size="35" value="<?=$dados[url]?>" /> Utilizar apenas para pegar banners externos. Exemplo: http://www.diariominas.com.br/banner.gif
        </td> 
      </tr>

      <tr>
        <td>Link: <br />
          <input name="link" type="text" class="input" onblur="this.className='input';" onfocus="this.className='inputon';"  size="35" value="<?=$dados["link"]?>" />
        </td>
      </tr>

      <tr>
        <td valign="middle">
          <input style="width:110px;" type="submit" class="input" onblur="this.className='input';" onfocus="this.className='inputon';" name='btgravar' value="<?=(empty($id))?"Cadastrar":"Alterar";?>" />
        </td>
      </tr>

    </table>
  </fieldset>
</form>

<?

// inicio da acao LISTAR

//if($acao == "listar"){



$form2 = "FORMLISTA";



$busca = "SELECT * FROM $tabela order by nome";

//echo $busca;



$total_reg = "50";



if(!$page){

$page = "1";

}



$inicio = $page-1;

$inicio = $inicio*$total_reg;



$limite = mysql_query("$busca LIMIT $inicio,$total_reg");

$todos = mysql_query("$busca");



$tr = mysql_num_rows($todos);

//$tr = count($op); 

//echo $tr;



$tp = ceil($tr / $total_reg);



?>





<form action="?pg=<?=$file?>" method="POST" name="<?=$form2?>">

<fieldset style="width:100%;">



<input name="acao" type="hidden" value="excluir_selecionados">

<table width="99%" align="center" cellpadding="0" cellspacing="0">

<tr><td><font class="titulos">Lista de <b><?=$palavra?></b> </font></td>

  <td align="right"><strong><? echo "<b><font color=$coronmouse>$tr</font></b>";?></strong> registros! </td>

</tr>

</table>





<table width="99%"  border="0" align="center" cellpadding="2" cellspacing="1">

  <tr bgcolor="#CCCCCC">

    <td width="6%" align="center" bgcolor="#C0C0C0"><b>ID</b></td>

    <td width="36%" align="center"><b>NOME CLIENTE</b></td>

    <td width="13%" align="center"><b>TIPO</b></td>

    <td width="13%" align="center"><b>FORMATO</b></td>

    <td width="12%" align="center"><b>P&Aacute;GINA</b></td>

    <td width="11%" align="center"><b>POSI&Ccedil;&Atilde;O</b></td>

    <td width="9%" align="center" bgcolor="#C0C0C0"><b>A&Ccedil;&Otilde;ES</b></td>

  </tr>

<? 

$i=0;

while ($dados=mysql_fetch_array($limite)) {

  if (($i%2)==0) { $bgcolor="#FFFFFF"; } else { $bgcolor="#e5e5e5"; }

  ?>

  <tr>

    <td align="center" bgcolor="<? echo $bgcolor; ?>"><table width="90%" border="0" cellspacing="0" cellpadding="2">

        <tr>

          <td width="20"><input id='check_sel' name='listas[]' type='checkbox' value='<?="$dados[id]";?>' /></td>

          <td><b><?=$dados[id];?></b></td>

        </tr>

    </table></td>

    <td bgcolor="<? echo $bgcolor?>"><b><?=$dados[nome]; ?> </b></td>

    <td align="center" bgcolor="<? echo $bgcolor?>"><?=$dados[tipo]; ?></td>

    <td align="center" bgcolor="<? echo $bgcolor?>"><?=$dados[formato]; ?></td>

    <td align="center" bgcolor="<? echo $bgcolor?>"><?=$dados[pagina]; ?></td>

    <td align="center" bgcolor="<? echo $bgcolor?>"><?=$dados[posicao]; ?></td>

    <td align="center" bgcolor="<? echo $bgcolor; ?>"><a href="?pg=<?=$file?>&acao=status&id=<?=$dados[id];?>&status=<?=($dados[status]=="S")?"N":"S";?>"><img src="<?=$usite?>images/admin/status_<?=($dados[status]=="S")?"on":"off";?>.png" alt='Alterar Status para <?=($dados[status]=="S")?"OFF":"ON";?>' border='0' /></a> <a href="?pg=<?=$file?>&acao=FORM&id=<?=$dados[id]?>"><img src="<?=$usite?>images/admin/botao_edit.png" alt="Alterar" border="0" /></a></td>

  </tr>

  <? $i++; }?>

      <tr>

      <td colspan="7"><table border="0" align="center" cellpadding="0" cellspacing="0">

        <tr>

          <td width="100" align="right" valign="top"><?

if($page > 1){

$anterior = $page -1;

  $url = "?pg=$pg&acao=$acao&page=$anterior";

echo "<a href='$url'>&laquo; Anterior</a>&nbsp;|&nbsp;";

} else {

echo "<font color='$corcelula2'>&laquo; Anterior</font>&nbsp;|&nbsp;";

}

?>          </td>

          <td align="center"><? 

for($i=1; $i<$page; $i++)

if($i>=$page-5)

  echo "<a href='?pg=$pg&acao=$acao&page=$i'>$i</a> | ";

echo "<font color='$coronmouse'><b>$page</b></font> ";





for($i=$page+1; $i<=$tp; $i++)

if($i<=$page+5)

  echo " | <a href='?pg=$pg&acao=$acao&page=$i'>$i</a>";



?></td>

          <td width="100" align="left" valign="top"><?

if($tp > $page){

$proxima = $page +1;

  $url = "?pg=$pg&acao=$acao&page=$proxima";



echo "&nbsp;|&nbsp;<a href='$url'>Pr&oacute;xima &raquo;</a>";

} else {

echo "&nbsp;|&nbsp;<font color='$corcelula2'>Pr&oacute;xima &raquo;</font>";

}

?></td>

        </tr>

      </table></td>

    </tr>

    <tr>

      <td colspan="7"><input style="width:110px;" class="input" onblur="this.className='input';" onfocus="this.className='inputon';" type="button" value="Selecionar Todos" onclick='SelectAll();' id="sel_todos"> 

        <input style="width:110px;" name="Button" type="button" class="input" onblur="this.className='input';" onfocus="this.className='inputon';" value="Excluir Selecionados" onClick="checkdeletetion();"></td>

    </tr>

</table>



</fieldset>

</form><br/>