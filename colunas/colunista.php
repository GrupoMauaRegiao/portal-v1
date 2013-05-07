<table>
  <tr>
    <td>
      <img src="/images/setona.jpg" />
      <?php
        $id = $_GET[id];
        $id = $url_parts[1];

        if ($id=='') {
          $id = $id;
        }
        
        $sql5 = mysql_query("SELECT * FROM tb_users WHERE id='$id'");
        $dados5 = mysql_fetch_array($sql5);
        
        echo "<font>Colunista - $dados5[nome]</font>";
      ?>
    </td>
  </tr>
  <tr>
    <td>
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
        //include "paginas/colunas/exibe_por_colunista.php";
      ?>
    </td>
  </tr>
  <tr>
    <td>
      <table>
        <tr>
          <td>
            <table>
              <tr>
                <?php
                  $sql5 = mysql_query("SELECT * FROM tb_users WHERE id='$dados[id_colunista]' LIMIT 1");
                  $dados5=mysql_fetch_array($sql5);
                ?>

               <?php if(!empty($dados5[foto1])){ ?>
                 <td>
                   <img src="<?="/thumbs.php?w=$largura&h=$altura&imagem=images/users/$dados5[foto1]";?>" />
                 </td>
               <?php } else { ?>
                 <td>
                   <img src="<?="/thumbs.php?w=$largura&h=$altura&imagem=images/layout/sem_foto.jpg";?>" />
                 </td>
               <?php } ?>
                <td>
                  <table>
                    <tr>
                      <td>
                        <?php
                          echo "<font>Nome: $dados5[nome]</font>";

                          $sql6 = mysql_query("SELECT * FROM tb_colunas_cat WHERE id='$dados[id_cat]'");
                          $dados6 = mysql_fetch_array($sql6);

                          echo "<font> / Categoria: $dados6[nome]</font>";
                        ?>
                      </td>
                    </tr>
                    <tr>
                      <td>
                        <?php echo "<font>Ocupa&ccedil;&atilde;o: $dados5[ocupacao]</font>"; ?>
                      </td>
                    </tr>
                    <tr>
                    <td>
                      <table>
                        <tr>
                          <td>
                            <img src="/images/icomail.gif" />
                          </td>
                          <td>
                            <a href="mailto:<? echo "$dados5[email]";?>">
                              <?php echo "$dados5[email]"; ?>
                            </a>
                          </td>
                        </tr>
                      </table>
                    </td>
                  </tr>
                </table>
              </td>
            </tr>
          </table>
        </td>
      </tr>
    </table>
  </td>
  </tr>
  <tr>
    <td>
      <font>
        <img src="/images/setona.jpg" /> Últimas Postagens
      </font>
    </td>
  </tr>
  <tr>
    <td>
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
    </td>
  </tr>
</table>