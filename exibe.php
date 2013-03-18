<?
$variables=(strtolower($_SERVER['REQUEST_METHOD']) == 'GET') ? $_GET : $_POST;

foreach ($variables as $k=> $v)
$$k = $v;

$palavra = "Publicidade";
$tabela = "tb_publicidades";
$file = "publicidades";

if ($acao == "exibe") {
  if ($formato == "728") {
    $largura = "728";
    $altura = "90";
  }

  if ($formato == "180"){
    $largura = "180";
    $altura = "100";
  }
  
  if ($formato == "640"){
    $largura = "640";
    $altura = "200";
  }
  
  if ($formato == "6402"){
    $largura = "640";
    $altura = "200";
  }

  if ($formato == "1802") {
    $largura = "180";
    $altura = "150";
  }

  if ($formato == "300") {
      $largura = "300";
      $altura = "250";
  }

  if ($formato == "140") {
    $largura = "140";
    $altura = "160";
  }

  if (!empty($posicao)) {
    $posicao = "AND posicao ='$posicao'";
  }

  if (!empty($pga)) {
    $paginaq = "AND pagina ='$pga'";
  }

  $busca = "SELECT * FROM $tabela WHERE status = 'S' AND formato = '$formato' $paginaq $posicao GROUP by rand() LIMIT 1";
  $query = mysql_query($busca);
  $total = mysql_num_rows($query);

  if ($total == 0) {
    echo "<img width='$largura' height='$altura' src='".$usite."images/layout/sem_banner".$formato.".gif' border='0'>";
  } else {
    $dados = mysql_fetch_array($query);

    // Exibir banner imagem
    if ($dados[tipo] == 'imagem') {
      if (!empty($dados[url])) {
        echo "<a href='$dados[link]' target='_blank'><img width='$largura' height='$altura' name='imagem1' src='$dados[url]' border='0'></a>";
      } else {
        echo "<a href='$dados[link]' target='_blank'><img width='$largura' height='$altura' name='imagem1' src='".$usite."images/publicidades/$dados[imagem]' border='0'></a>";
      }
    }

    // Exibir banner flash
    if ($dados[tipo] == 'flash') {
      if(!empty($dados[url])) {
        echo "<embed src='$dados[url]' quality='high' pluginspage='http://www.macromedia.com/go/getflashplayer' type='application/x-shockwave-flash' width='$largura' height='$altura'></embed>";
      } else {
        echo "<script>exibeFash('".$usite."images/publicidades/$dados[imagem]', $largura, $altura, 1, 1);</script>";
      }
    }

    // Exibir banner HTML
    if ($dados[tipo] == 'html') {
      echo $dados[html];
    }
  }
}

?>