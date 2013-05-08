<table>
  <tr>
    <td>
      <img src="/images/setona.jpg" alt="" />
      <?php
        $id = $_GET[id];
        $id = $url_parts[1];

        if ($id=='') {
          $id = $id;
        }
        
        $sql5 = mysql_query("SELECT * FROM tb_users WHERE id='$id'");
        $dados5 = mysql_fetch_array($sql5);
      ?>
      <font size="6" face="Trebuchet MS">Colunista</font>
    </td>
  </tr>
</table>

<div class="perfil-colunista">
  <?php
    $id = $_GET[id];
    $id = $url_parts[1];

    if ($id == '') {
      $id = $id;
    }
    
    $string = $id;
    $idc = $string{0};
    
    $busca = "SELECT * FROM tb_colunas WHERE status='S' AND id_colunista='$id' ORDER by data desc";
    $sql = mysql_query($busca);
    $dados = mysql_fetch_array($sql);
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

    $sql5 = mysql_query("SELECT * FROM tb_users WHERE id='$dados[id_colunista]' LIMIT 1");
    $dados5=mysql_fetch_array($sql5);
  ?>

    <?php if (!empty($dados5[foto1])) { ?>
      <div class="imagem">
        <img
          src="<?php echo "/timthumb.php?w=200&h=150&src=images/users/" . $dados5[foto1]; ?>"
          alt="<?php echo $dados5[nome]; ?>"
          title="<?php echo $dados5[nome]; ?>" />
      </div>
    <?php } else { ?>
      <div class="imagem">
        <img
          src="<?php echo "/timthumb.php?w=200&h=150&src=images/layout/sem_foto.jpg"; ?>"
          alt="Sem foto" 
          title="Sem foto" />
      </div>
    <?php } ?>

    <div class="informacoes">
      <?php
        $sql6 = mysql_query("SELECT * FROM tb_colunas_cat WHERE id='$dados[id_cat]'");
        $dados6 = mysql_fetch_array($sql6);

        $frasePerfil = "<strong>" . $dados5[nome] . "</strong> é " . $dados5[ocupacao] . ".<br /> No Portal Mauá e Região, contribui com publicações na categoria <i>" . $dados6[nome] . "</i>.";
      ?>
      <img src="http://portalmauaeregiao.com.br/images/file.png" alt="" />
      <p><?php echo str_replace("..", ".", $frasePerfil); ?></p>
      
      <img src="http://portalmauaeregiao.com.br/images/mail.png" alt="" />
      <p><a target="_blank" href="mailto:<?php echo $dados5[email]; ?>"><?php echo $dados5[email]; ?></a></p>
    </div>
</div>

<div class="ultimas-materias">
  <h3>Últimas publicações</h3>
</div>

<?php
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
?>