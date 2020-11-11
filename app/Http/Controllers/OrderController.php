<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Order;
use PDF;
use App;

class OrderController extends Controller
{

    public function generatePDF($id){
        $pdf = App::make('InvoicePDF');
        return $pdf->generatePDF($id);
    }

}
