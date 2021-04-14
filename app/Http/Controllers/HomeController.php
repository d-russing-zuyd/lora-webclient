<?php

namespace App\Http\Controllers;

use LaravelDaily\LaravelCharts\Classes\LaravelChart;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $chart_options = [
            'chart_title' => 'Sensoren',
            'chart_type' => 'line',
            'report_type' => 'group_by_date',
            'model' => 'App\Models\Data',
            'conditions' => [
              ['name' => 'Geul', 'condition' => 'sensor_id = 1', 'color' => 'green'],
//              ['name' => 'Geul2', 'condition' => 'sensor_id = 2', 'color' => 'blue'],
            ],
            'group_by_field' => 'created_at',
            'group_by_period' => 'hour',
//            'aggregate_function' => 'avg',
//            'aggregate_field' => 'data',
            'filter_field' => 'created_at',
            'group_by_field_format' => 'Y-m-d',
//            'entries_number' => '5',
            'column_class' => 'card-body'
//            'aggregate_function' => 'sum',

        ];
        $chart1 = new LaravelChart($chart_options);

        return view('home', compact('chart1'));

    }
}
