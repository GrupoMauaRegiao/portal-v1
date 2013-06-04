<?php
  $variables = (strtolower($_SERVER['REQUEST_METHOD']) == 'GET') ? $_GET : $_POST;

  foreach ($variables as $k => $v) {
    $$k = $v;
  }

  $id = $_GET[id];
  $id = trim($url_parts[2]);
  $tmp__ID = explode("-", trim($url_parts[2]));
  $__ID = $tmp__ID[0];
  $busca5 = "SELECT * FROM tb_guia WHERE id='$id'";
  $sql5 = mysql_query($busca5);
  $dados5 = mysql_fetch_array($sql5);
  $busca6 = "SELECT * FROM tb_estados WHERE id='$id'";
  $sql6 = mysql_query($busca6);
  $dados6 = mysql_fetch_array($sql6);
  $busca7 = "SELECT * FROM tb_cidades WHERE id='$id'";
  $sql7 = mysql_query($busca7);
  $dados7 = mysql_fetch_array($sql7);
  $dados25 = mysql_fetch_array(mysql_query("SELECT * FROM tb_cidades WHERE id='$dados5[id_cidade]'"));
  $dados26 = mysql_fetch_array(mysql_query("SELECT * FROM tb_estados WHERE id='$dados5[id_estado]'"));

  $busca = "SELECT * FROM tb_guia WHERE id='$id'";
  $sql = mysql_query($busca);
  $dados = mysql_fetch_array($sql);
  $tabela1 = "galerias";
  $imgDir = "images/guia/$dados[id]/"; 
  $thumbDir = "images/guia/$dados[id]/"; 
  $images = scandir($imgDir);
  $thumbs = scandir($thumbDir);
  $ignore = array( ".", ".." );

?>

<div class="empresa">

  <div class="header-sobre">
    <div class="nome-empresa">
      <h2><?php echo $dados5[nome]; ?></h2>
    </div>
    <?php # Descrição ?>
    <?php if (!empty($dados5[empresa_texto1])) { ?>
      <div class="descricao">
        <p><?php echo $dados5[empresa_texto1]; ?></p>
      </div>
    <?php } ?>
  </div>

  <div class="informacoes-empresa">
    <?php # Endereço ?>
    <?php if (!empty($dados5[endereco]) ) { ?>
      <div class="endereco">
        <h3>Endere&ccedil;o e contato:</h3>
        <p><?php echo $dados5[endereco] . ", " . $dados5[numero] . " " . $dados5[complemento] . " &#8211; " . $dados5[bairro] . " &#8211 " . $dados25[nome] . " &#8211 " . $dados26[nome]; ?></p>
      </div>
    <?php } ?>

    <?php # Telefone ?>
    <?php if (!empty($dados5[fone1])) { ?>
      <div class="telefone">
        <p><span>Telefone (s):</span><br /> <?php echo "(" . $dados5[ddd1] . ") " . $dados5[fone1]; ?></p>

        <?php if (!empty($dados5[fone2])) { ?>
          <p><?php echo "(" . $dados5[ddd2] . ") " . $dados5[fone2]; ?></p>
        <?php } ?>
      </div>
    <?php } ?>

    <?php # E-mail ?>
    <?php if (!empty($dados5[email])) { ?>
      <div class="email">
        <p><span>E-mail:</span><br /> <a target="_blank" href="mailto: <?php echo $dados5[email]; ?>"><?php echo $dados5[email]; ?></a></p>
      </div>
    <?php } ?>

    <?php # Website ?>
    <?php if (!empty($dados5[site])) { ?>
      <div class="website">
        <p><span>Website:</span><br /> <a target="_blank" href="http://<?php echo $dados5[site]; ?>"><?php echo str_replace("/", "", $dados5[site]); ?></a></p>
      </div>
    <?php } ?>

    <?php if (!empty($dados5[google_map])) { ?>
      <div class="mapa">
        <div class="google-maps">
          <h3>Localiza&ccedil;&atilde;o no mapa:</h3>
          <?php echo $dados5[google_map]; ?>
        </div>
      </div>
    <?php } ?>
  </div> <?php # Informações da empresa ?>

  <div class="multimidia">

    <?php if (!empty($dados5[video])) { ?>
      <div class="video">
        <h3>V&iacute;deo:</h3>
        <div class="player">
          <?php echo "
            <object width='600' height='360'>
              <param name='movie' value='http://www.youtube.com/v/$dados5[video]?version=3&amp;hl=pt_BR'></param>
              <param name=  allowFullScreen' value='true'></param>
              <param name='allowscriptaccess' value='always'></param>
              <param name='wmode' value='transparent' /></param>
              <embed src='http://www.youtube.com/v/$dados5[video]?version=3&amp;hl=pt_BR' type='application/x-shockwave-flash' width='600' height='360' wmode='transparent' allowscriptaccess='always' allowfullscreen='true'></embed>
            </object>"; ?>
        </div>
      </div>
    <?php } ?>

    <?php if (count($images) > 0) { ?>
      <div class="imagens">
        <h3>Imagens:</h3>
        <?php
          for($i = 0; $i < count($images); $i += 1) {
            if(count($thumbs) > $i) {
              if (!in_array($images[$i], $ignore) && !in_array($thumbs[$i], $ignore)) { ?>
                <div class="imagem">
                  <img src="/timthumb.php?w=200&h=100&src=/images/guia/<?php echo $dados[id]; ?>/<?php echo $thumbs[$i]; ?>" alt="" />
                </div>
              <?php } ?>
            <?php } ?>
          <?php } ?>
      </div>
    <?php } ?>
  </div> <?php # Multimídia ?>

  <div class="mais-empresas">
    <div class="header">
      <h2>+ Empresas</h2>
    </div>
    <?php
      $largura = 120;
      $altura = 75; 
      $limite2 = 8;
      $colunas = 4;
      $largura_coluna = 155; 
      $qt_letras0 = 65;
      $qt_letras1 = 65;
      $paginacao = "N";
      $acao = "ver4";
      $img_thumb = "S";
      $exibedesc = "S";
      $cortitulo = "#478500";
      $class = "img_borda";
      include "guia/exibe.php";
    ?>
  </div>
</div>