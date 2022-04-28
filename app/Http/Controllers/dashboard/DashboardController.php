<?php

namespace App\Http\Controllers\dashboard;

use App\Category;
use App\Client;
use App\Http\Controllers\Controller;
use App\Product;
use App\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){

        $clien=Client::count();
        $product=Product::count();
        $cats=Category::count();
        $users=User::count();
        $zero=0;

        $chartjs = app()->chartjs
            ->name('lineChartTest')
            ->type('line')
            ->size(['width' => 400, 'height' => 400])
            ->labels(['Categories','Products','Users','Clients'])
            ->datasets([
                [
                    "label" => "Statistics",
                    'backgroundColor' => "rgb(247, 250, 248)",
                    'borderColor' => "rgba(38, 185, 154, 0.7)",
                    "pointBorderColor" => "rgba(38, 185, 154, 0.7)",
                    "pointBackgroundColor" => "rgba(38, 185, 154, 0.7)",
                    "pointHoverBackgroundColor" => "#fff",
                    "pointHoverBorderColor" => "rgba(220,220,220,1)",
                    'data' => [$cats,$product,$users,$clien,$zero],
                ],

            ])
            ->options([]);

        $chartjs1 = app()->chartjs
            ->name('barChartTest')
            ->type('bar')
            ->size(['width' => 400, 'height' => 200])
            ->labels(['Categories','Products','Users','Clients'])
            ->datasets([
                [
                    "label" => "Statistics",
                    'backgroundColor' =>['#db39a5', '#0c2f91','#e8860e','#0ec429'],
                    'borderColor' => "rgba(38, 185, 154, 0.7)",
                    "pointBorderColor" => "rgba(38, 185, 154, 0.7)",
                    "pointBackgroundColor" => "rgba(38, 185, 154, 0.7)",
                    "pointHoverBackgroundColor" => "#fff",
                    "pointHoverBorderColor" => "rgba(220,220,220,1)",
                    'data' => [$cats,$product,$users,$clien,$zero],
                ],

            ])
            ->options([]);

        return view('dashboard.dashboard', compact('chartjs','chartjs1'));


    }//end of function
}//end of controller
