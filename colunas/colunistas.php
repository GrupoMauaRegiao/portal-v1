<table>
  <tr>
    <td>
      <img src="/images/setona.jpg" alt="" />
      <font size="6" face="Trebuchet MS">Colunistas</font>
    </td>
  </tr>
  <tr>
</table>

      <?php
        $largura = 80;
        $altura = 65;
        $largurap = 70;
        $alturap = 70;
        $limite2 = 15;
        $colunas = 2;
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
        $acao = "ver_colunistas2";
        include "paginas/colunas/exibe.php";
      ?>

      <div class="ultimas-materias">
        <h3>Últimas publicações</h3>
      </div>

      <?php
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
        include "paginas/colunas/exibe2.php";
      ?>