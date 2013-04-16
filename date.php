<?php
    $dia = date('d');
    $ano = date('Y');

    $diasDaSemana = Array(
      'Segunda-feira', 'Terça-feira', 'Quarta-feira',
      'Quinta-feira', 'Sexta-feira', 'Sábado',
      'Domingo'
    );

    $meses = Array(
      'Janeiro', 'Fevereiro', 'Março',
      'Abril', 'Maio', 'Junho',
      'Julho', 'Agosto', 'Setembro',
      'Outubro', 'Novembro', 'Dezembro'
    );

    function associaPartesDatasComNomes($parteData, $arrayComNomes) {
      for ($i = 1, $len = count($parteData); $i <= $len; $i += 1) {
        if ($parteData == $i) {
          $parteData = $arrayComNomes[$i - 1];
        }
      }
      return $parteData;
    }

    echo associaPartesDatasComNomes(date(w), $diasDaSemana) . ", <br />
         $dia de " . associaPartesDatasComNomes(date(m), $meses) . " de $ano";
?>