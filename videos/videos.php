<table width="630" border="0" cellspacing="0" cellpadding="0">

  <tr>

    <td align="center">

<table width="630" border="0" cellspacing="0" cellpadding="7">

  <tr>

    <td height="30" colspan="2"><img src="/images/setona.jpg" width="30" height="30" /> <font size='6' color='#1E4B7A' face="Trebuchet MS, Verdana">V&iacute;deos</font></td>

  </tr>

  <tr>

    <td height="10" colspan="2"></td>

    </tr>

  <tr>

    <td width="246" align="left" valign="top"><font color="#003399" face="Trebuchet MS, Verdana">Seja Bem Vindo!</font><br />

    <br />

<? $FormatoForm = "V"; include "videos/busca.php";?></td>

    <td width="356" align="center" valign="top" bgcolor="#e7e7e7"><?

$largura = 60;

$altura = 50; 

$limite2 = 1;

$colunas = 1;

$Cor1 = "#000000";

$Cor2 = "#000000";



$acao = "ver_destaque";

$ordem = "ORDER BY rand()";

include "videos/exibe.php";

?></td>

  </tr>

</table>

<br />

<table width="100%" border="0" cellpadding="0" cellspacing="0">

<tr>

            <td align="left" valign="top"><font size='4' color='#1E4B7A' face="Trebuchet MS, Arial, Helvetica, sans-serif"><img src="/images/setona.jpg" width="20" height="20" /> V&iacute;deos recentes</font></td>

        </tr>

  <tr><td height="7"></td></tr>

  <tr>

    <td align="center" valign="bottom"><?

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

?></td>

  </tr>

</table>

<br />

<table width="100%" border="0" cellpadding="0" cellspacing="0">

  <tr>

    <td align="left" valign="top"><font size='4' color='#1E4B7A' face="Trebuchet MS, Arial, Helvetica, sans-serif"><img src="/images/setona.jpg" width="20" height="20" /> Os 10 mais visualizados</font></td>

  </tr>



  <tr><td height="7"></td></tr>

  <tr>

    <td align="center" class="negrito"><?

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

?></td>

  </tr>

</table>

    </td>

  </tr>

</table>

<br />

<br />

