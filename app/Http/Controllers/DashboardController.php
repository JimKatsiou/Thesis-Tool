<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    function tableView(){
        return view('pages.tables.tableView');
    }


    function insidetableView_1()
    {
        return view('pages.tables.insidetableView_1');
    }

    function chartViewPie()
    {
        //return view('pages.charts.fetch');
        return view('pages.charts.chart_pie');
    }

    function chartViewLine()
    {
        //return view('pages.charts.fetch');
        return view('pages.charts.line_charts.line_charts');
    }
}
