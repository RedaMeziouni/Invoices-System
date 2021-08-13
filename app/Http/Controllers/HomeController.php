<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\invoices;

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
        // 
        $count_all =invoices::count();
        $count_invoices1 = invoices::where('Value_Status', 1)->count();
        $count_invoices2 = invoices::where('Value_Status', 2)->count();
        $count_invoices3 = invoices::where('Value_Status', 3)->count();

        // Checking for Invoices Percentage
        if($count_invoices2 == 0){
            $nspainvoices2 = 0;
        }
        else{
            $nspainvoices2 = $count_invoices2 / $count_all * 100;
        }
  
          if($count_invoices1 == 0){
              $nspainvoices1 = 0;
          }
          else{
              $nspainvoices1 = $count_invoices1/ $count_all * 100;
          }
  
          if($count_invoices3 == 0){
              $nspainvoices3 = 0;
          }
          else{
              $nspainvoices3 = $count_invoices3/ $count_all * 100;
          }
        
        // 1st Chart 
        
        $chartjs = app()->chartjs
        ->name('barChartTest')
        ->type('bar')
        ->size(['width' => 350, 'height' => 250])
        ->labels(['UnPaid Invoices', 'Paid Invoices', 'Partial Invoices'])
        ->datasets([
            [
                "label" => "UnPaid Invoices",
                'backgroundColor' => ['#ec5858'],
                'data' => [$nspainvoices2]
            ],
            [
                "label" => "Paid Invoices",
                'backgroundColor' => ['#1EAE98'],
                'data' => [$nspainvoices1]
            ],
            [
                "label" => "Partial Invoices",
                'backgroundColor' => ['#ff9642'],
                'data' => [$nspainvoices3]
            ],
            ])
            ->options([]);

            // 2nd Chart
            $chartjs_2 = app()->chartjs
            ->name('pieChartTest')
            ->type('pie')
            ->size(['width' => 350, 'height' => 250])
            ->labels(['UnPaid Invoices', 'Paid Invoices', 'Partial Invoices'])
            ->datasets([
                [
                    'backgroundColor' => ['#ec5858', '#1EAE98','#ff9642'],
                    'data' => [$nspainvoices2, $nspainvoices1,$nspainvoices3]
                ]
            ])
            ->options([]);


        return view('home', compact('chartjs', 'chartjs_2'));
        }
}
