<?php

namespace App\Charts;

use App\Models\User;
use App\Models\Surat;
use ArielMejiaDev\LarapexCharts\LarapexChart;

class UserChart
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function build(): \ArielMejiaDev\LarapexCharts\PieChart
    {
        $surats = Surat::all();
        $User = User::all();

        $data = $User->map(function ($pep) use ($surats) {
            return $surats->where('id_user', $pep->id)->count();
        });

        $labels = $User->pluck('user')->toArray();

        return $this->chart->PieChart()
            ->setTitle('User paling akhtif')
            ->setSubtitle(date('Y'))
            ->setWidth(500)
            ->addData($data->toArray())
            ->setLabels($labels);
    }
}
