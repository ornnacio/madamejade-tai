<?php

namespace App\Charts;

use ArielMejiaDev\LarapexCharts\LarapexChart;

class GraficoVendas
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function build(): \ArielMejiaDev\LarapexCharts\BarChart
    {

      function UniqueRandomNumbersWithinRange($min, $max, $quantity) {
          $numbers = range($min, $max);
          shuffle($numbers);
          return array_slice($numbers, 0, $quantity);
      }

      $data = UniqueRandomNumbersWithinRange(500, 1500, 11);

        return $this->chart->barChart()
            ->setTitle('Vendas do último ano')
            ->addData('Quantidade', $data)
            ->setXAxis(['Janeiro', 'Fevereiro', 'Março', 'Abril', 'Maio', 'Junho', 'Julho', 'Agosto', 'Setembro', 'Outubro', 'Novembro'])
            ->setFontFamily('Helvetica')
            ->setColors(['#b3a63e']);
    }
}
