<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BarController extends Controller
{
        function chartView()
        {
            //return view('pages.charts.fetch');
            return view('pages.charts.bar_charts');
        }

        function barChartView()
        {
            //return view('pages.charts.fetch');
            return view('pages.charts.bar_charts.bar1_cost_effective');
        }

        function barChartView_1()
        {
            return view('pages.charts.bar_charts.cost_effective');
        }

}
