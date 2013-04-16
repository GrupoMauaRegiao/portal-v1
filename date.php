<?php
    $dia = date('d');
    $mes = date('m');
    $ano = date('Y');
    $diaDaSemana = date('w');

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

    for ($i = 1, $len = count($diasDaSemana); $i <= $len; $i += 1) {
      if ($diaDaSemana == $i) {
        $diaDaSemana = $diasDaSemana[$i - 1];
      }
    }

    for ($i = 1, $len = count($meses); $i <= $len; $i += 1) {
      if ($mes == $i) {
        $mes = $meses[$i - 1];
      }
    }

    echo "$diaDaSemana, <br />
          $dia de $mes de $ano";
?>