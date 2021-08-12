<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\invoices;

class Invoices_Report extends Controller
{
    public function index(){

     return view('reports.invoices_report');
        
    }

    public function Search_invoices(Request $request){

    $rdio = $request->rdio;


 // Case 1 : Using Invoices Status
    
    if ($rdio == 1) {
       
       
 // If The User Didn't select the Date
        if ($request->type && $request->start_at =='' && $request->end_at =='') {
            
           $invoices = invoices::select('*')->where('Status','=',$request->type)->get();
           $type = $request->type;
           return view('reports.invoices_report',compact('type'))->withDetails($invoices);
        }
        
// If the User select the dateق
        else {
           
          $start_at = date($request->start_at);
          $end_at = date($request->end_at);
          $type = $request->type;
          
          $invoices = invoices::whereBetween('invoice_Date',[$start_at,$end_at])->where('Status','=',$request->type)->get();
          return view('reports.invoices_report',compact('type','start_at','end_at'))->withDetails($invoices);
          
        }

 
        
    } 
    
//  Case 2 : Using the Invoices Number   

    else {
        
        $invoices = invoices::select('*')->where('invoice_number','=',$request->invoice_number)->get();
        return view('reports.invoices_report')->withDetails($invoices);
        
    }

    
     
    }
    
}