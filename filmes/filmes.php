<div id="filmes">
  <?php
    $id = $_GET[id];
    $id = $url_parts[1];

    if ($id == '') {
      $id_cat = $id;
    }

    $sql5 = mysql_query("SELECT * FROM tb_filmes_cat WHERE id='$id'");
    $dados5 = mysql_fetch_array($sql5);
  ?>

  <?php echo "<div>$dados5[nome]</div>"; ?>
  <?php
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
  ?>
</div>