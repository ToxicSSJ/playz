<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Order;
use PDF;

class OrderController extends Controller
{

    public function generatePDF($id){
        $order = Order::find($id);
  
        $pdf = PDF::loadView('pdf', compact('user'));
        return $pdf->download('invoice.pdf');
  
    }

}
