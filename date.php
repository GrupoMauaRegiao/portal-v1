<?php
/*
  Snippet que entrega a string:

    Quinta-feira,
    7 de Junho de 1954

*/

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

  function associaPartesDataComNomes($parteData, $arrayComNomes) {
    for ($i = 1, $len = count($arrayComNomes); $i <= $len; $i += 1) {
      if ($parteData == $i) {
        $parteData = $arrayComNomes[$i - 1];
      }
    }
    return $parteData;
  }

  echo associaPartesDataComNomes(date('w'), $diasDaSemana) . ", <br />
       $dia de " . associaPartesDataComNomes(date('m'), $meses) . " de $ano";
?>