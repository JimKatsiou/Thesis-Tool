<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardContoller extends Controller
{
    function tableView(){
        return view('pages.tables.tableView');
    }

    function tableView_2()
    {
        return view('pages.tables.tableView_2');
    }

    function chartView()
    {
        //return view('pages.charts.fetch');
        return view('pages.charts.chart_1');
    }

    function chartViewPie()
    {
        //return view('pages.charts.fetch');
        return view('pages.charts.chart_pie');
    }
}
